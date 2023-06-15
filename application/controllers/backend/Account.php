<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    private $checkSession;

    function __construct()
    {
        parent::__construct();

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_user');

        $this->load->helper("cookie");
        $this->load->library('gumlet');
        // $this->load->library('tinify');

        $this->checkSession();
        // if($this->router->fetch_method() !== "logout")

    }

    public function index(){
        $this->checkSession ? redirect(base_url('backend/dashboard')) : redirect(base_url('backend/account/logout'));
    }

    public function login()
    {
        $this->checkSession ? redirect(base_url('backend/dashboard')) : null;
        $error = '';
        $data = array();

        if (isset($_POST['login'])) {

            // Getting the form data
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            // Checking the username
            $un = $this->Model_user->checkUsername($username);

            if (!$un) {
                // exit('!un');
                $error = 'Username is wrong!';
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/account/login'));
            } else {
                // When username found, checking the password
                $user_data = array(
                    'username' => $username,
                    'password' => sha1($password)
                );
                $pw = $this->Model_user->checkPassword($user_data);

                if (!$pw) {
                    // exit('!pw');
                    $error = 'Password is wrong!';
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url('backend/account/login'));
                } else if($pw['status'] === "Passive") {
                    // exit('passive');
                    $error = 'Your account has been deactivated!';
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url('backend/account/login'));
                } else {
                    // exit('remember:'.$this->input->post("remember", true));
                    $remember = $this->input->post("remember", true);
                    if ($remember == 1) {
                        $this->cookie->backendLogin();
                    } else {
                        delete_cookie("remember");
                    }

                    // When username and password both are correct
                    $array = array(
                        'id' => $pw['id'],
                        'username' => $pw['username'],
                        'password' => $pw['password'],
                        'firstname' => $pw['firstname'],
                        'lastname' => $pw['lastname'],
                        'email' => $pw['email'],
                        'photo' => $pw['photo'],
                        'role' => $pw['role'],
                        'status' => $pw['status']
                    );

                    $this->session->set_userdata($array);
                    // var_dump($_SESSION);
                    // exit('correct');
                    redirect(base_url('backend/dashboard'));
                }
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();

            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_login', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    function logout()
    {
        // $this->logger->user($this->session->userdata('username'))->type('logout')->id(1)->token(sha1(mt_rand()))->comment('Logout was successfully!')->log();

        $this->session->sess_destroy();

        redirect(base_url('backend/account/login'));
    }

    public function profile($id)
    {
        !$this->checkSession ? redirect(base_url('backend/account/logout')) : null;
        $data['setting'] = $this->Model_common->all_setting();
        $data['profile'] = $this->Model_user->getUserById($id);


        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);

        $this->load->view('backend/view_header', $data);
        $this->load->view('backend/view_profile', $data);
        $this->load->view('backend/view_footer', $data);
    }

    public function profile_edit($id)
    {
        !$this->checkSession ? redirect(base_url('backend/account/logout')) : null;
        $valid = 1;
        $error='';
        $data['setting'] = $this->Model_common->all_setting();
        $data['profile'] = $this->Model_user->getUserById($id);

        if (isset($_POST['profile_update'])) {
            $this->form_validation->set_rules('firstname','First Name','trim|required');
            $this->form_validation->set_rules('lastname','Last Name','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('username','Username','trim|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            }

		    if($valid == 1) {
                $form_data = array(
                    "firstname" => $this->input->post('firstname'),
                    "lastname" => $this->input->post('lastname'),
                    "email" => $this->input->post('email'),
                    "phone" => $this->input->post('phone')
                );
    
                $this->input->post('password') ? $form_data['password'] = sha1($this->input->post('password')) : null;

                $path = $_FILES['photo']['name'];
                $path_tmp = $_FILES['photo']['tmp_name'];

                if(!empty($path)) {
                    $ext = pathinfo( $path, PATHINFO_EXTENSION );
                    $file_name = basename( $path, '.' . $ext );
                    $ext_check = $this->Model_common->extension_check_photo($ext);
                    if($ext_check == FALSE) {
                        $valid = 0;
                        $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                    }
                    $final_name = $data['profile']['username'].'-'.$id.'.'.strtolower($ext);

                    unlink('./public/uploads/user/' . $final_name);
                    unlink('./public/uploads/user/thumbnail/' . $final_name);
                    $form_data['photo'] = $final_name;
                    $this->gumlet->crop($path_tmp, './public/uploads/user/' . $final_name, 500, 500);
                    $this->gumlet->crop($path_tmp, './public/uploads/user/thumbnail/' . $final_name, 150, 150);
                }

                $this->Model_user->update($id,$form_data);

                $this->session->set_flashdata('success', 'Your profile has been updated successfully!');
                redirect(base_url('backend/account/profile/'.$id));
		    } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/account/profile/'.$id));
            }
        }

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header', $data);
        $this->load->view('backend/view_profile', $data);
        $this->load->view('backend/view_footer', $data);
    }

    public function checkSession()
    {
        if ($this->session->userdata('id')) {
            $this->checkSession = true;
        } else {
            $this->checkSession = false;
        }
    }
}
