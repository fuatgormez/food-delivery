<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    private $checkSession;

    function __construct()
    {
        parent::__construct();

        $this->load->model(FRONTEND . '/Model_common');
        $this->load->model(FRONTEND . '/Model_customer');

        $this->load->library('mail');
        $this->load->library('sms');
        $this->load->library("cookie");
        $this->load->library('gumlet');

        $this->checkSession();
        // if($this->router->fetch_method() !== "logout")

    }

    public function index(){
        // $this->checkSession ? redirect(base_url()) : redirect(base_url('account/signin'));
    }

    public function signin()
    {
        $this->checkSession ? redirect(base_url('home')) : null;
        $msg = '';
        $data = array();

        if ($_POST) {

            // Getting the form data
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            // Checking the username or Email
            $un = $this->Model_customer->check_email($email);

            if (!$un) {
                $msg = 'Email is wrong!';
                $this->session->set_flashdata('error', $msg);
                exit(json_encode(array('status' => 400, 'msg' => $msg)));
                // redirect(base_url('backend/account/signin'));
            } else {
                // When username / email found, checking the password
                $user_data = array(
                    'email' => $email,
                    'password' => sha1($password)
                );
                $pw = $this->Model_customer->check_password($user_data);

                if (!$pw) {
                    $msg = 'Password is wrong!';
                    $this->session->set_flashdata('error', $msg);
                    exit(json_encode(array('status' => 400, 'msg' => $msg)));
                } else if($pw['status'] === "Passive") {
                    $msg = 'Your account has been deactivated!';
                    $this->session->set_flashdata('error', $msg);
                    exit(json_encode(array('status' => 400, 'msg' => $msg)));
                } else {
                    // When username and password both are correct
                    $this->create_session($pw);
                    exit(json_encode(array('status' => 200, 'msg' => 'Loggin successfull!')));
                }
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['all_store'] = $this->Model_common->all_store();

            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_signin', $data);
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
        }
    }

    public function signup()
    {
        $this->checkSession ? redirect(base_url('home')) : null;

        if ($_POST) {

            // Getting the form data
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $password = $this->input->post('password');

            $valid = 1;
            $msg = '';

            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $msg .= validation_errors();
            }

            if($valid == 0) {
                exit(json_encode(array('status' => 400, 'msg' => $msg)));
            }

            // Checking the username
            $check_email = $this->Model_customer->check_email($email);
            $check_phone = $this->Model_customer->check_phone($phone);

            if ($check_email) {
                exit(json_encode(array('status' => 400, 'msg' => 'Email already exists!')));
            } elseif($check_phone) {
                exit(json_encode(array('status' => 400, 'msg' => 'Phone already exists!')));
            } else {
                $customer = array(
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'phone' => $phone,
                    'password' => sha1($password)
                );
                $insert_customer = $this->Model_customer->add($customer);

                $this->create_session($this->Model_customer->getCustomerById($insert_customer));

                exit(json_encode(array('status' => 200, 'msg' => 'You are registered successfully!')));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['all_store'] = $this->Model_common->all_store();

            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_signup', $data);
            $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
        }
    }

    public function forgot_password()
    {
        $this->checkSession ? redirect(base_url('home')) : null;
        
        $data['setting'] = $this->Model_common->all_setting();
        $data['all_store'] = $this->Model_common->all_store();
        
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_forgot_password', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
    }

    public function verify()
    {
        if($this->input->post('phone')) {
            $phone = $this->input->post('phone');

            $valid = 1;
            $msg = '';

            $this->form_validation->set_rules('phone', 'Phone Number', 'trim|numeric|required');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $msg .= validation_errors();
            }

            if($valid == 1) {
                $this->session->set_userdata('customer_phone', $this->input->post('phone'));
                $this->send_otp($phone);
            } else {
                echo json_encode(array('status' => 400, 'msg' => $msg));
            }

            $this->Model_customer->verify_phone($this->input->post('phone'), array('verified' => 1));
        }
    }

    public function verification($param)
    {
        !$this->session->userdata('otp_code') ? redirect(base_url('account/forgot-password')) : null;

        if($param == 'forgot-password') {
            $url = 'account/new-password';
        } elseif($param === 'verify-phone') {
            $url = 'account/dashboard';
        } else {
            $url = 'home';
        }

        $data['setting'] = $this->Model_common->all_setting();
        $data['all_store'] = $this->Model_common->all_store();
        $data['url'] = $url;

        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_verification', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
    }

    public function verification_otp()
    {
        $valid = 1;
        $msg = '';
        $this->form_validation->set_rules('otp_code', 'Code', 'trim|numeric|required');
        $this->form_validation->set_rules('url', 'Url', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $valid = 0;
            $msg .= validation_errors();
        }

        if($valid == 1) {
            $result = '';
            if($this->input->post('otp_code') == $this->session->userdata('otp_code')) {
                $this->session->set_userdata('password_validation', 1);
                $result = json_encode(array('status' => 200, 'msg' => 'success', 'url' => $this->input->post('url')));
            } else {
                $this->session->set_userdata('password_validation', 0);
                $result = json_encode(array('status' => 400, 'msg' => 'Mobile number verification failed!'));
            }
            echo $result;
        } else {
            echo json_encode(array('status' => 400, 'msg' => $msg));
        }
    }

    public function verification_email()
    {
        json_encode(array('status' => 400, 'msg' => 'Bad request!'));
    }

    public function send_otp($phone)
    {
        $response = '';
        $check_phone = $this->Model_customer->check_phone($phone);
        if($check_phone) {
            $sms_code = $this->create_random_code();
            $this->session->set_userdata('otp_code', $sms_code);
            $this->mail->send($check_phone['email'], $sms_code);
            // $this->sms->twilio($phone, $sms_code);
            // $this->sms->seven77($phone, $sms_code);
            $response = json_encode(array('status' => 200, 'msg' => 'success'));
        } else {
            $response = json_encode(array('status' => 400, 'msg' => 'Please enter a valid mobile number.'));
        }
        echo $response;
    }

    public function new_password()
    {

        !$this->session->userdata('otp_code') ? redirect(base_url('account/forgot-password')) : null;

        if($this->session->userdata('password_validation') == 1) {
            if($_POST) {
                $password = $this->input->post('password');

                $valid = 1;
                $msg = '';

                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

                if ($this->form_validation->run() == FALSE) {
                    $valid = 0;
                    $msg .= validation_errors();
                }

                if($valid == 1) {
                    $data =array(
                        'password' => sha1($password)
                    );
                    $this->Model_customer->update_password($this->session->userdata('customer_phone'), $data);
                    
                    $this->session->unset_userdata('password_validation');
                    $this->session->unset_userdata('otp_code');
                    $this->session->unset_userdata('customer_phone');

                    echo json_encode(array('status' => 200, 'msg' => 'Your password has been updated successfully!'));

                } else {
                    echo json_encode(array('status' => 400, 'msg' => $msg));
                }
            } else {   
                $data['setting'] = $this->Model_common->all_setting();
                $data['all_store'] = $this->Model_common->all_store();
                
                $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
                $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
                $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
                $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_new_password', $data);
                $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
            }
        } else {
            redirect(base_url());
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(FRONTEND . '/account/signin'));
    }

    public function dashboard()
    {
        !$this->checkSession ? redirect(base_url(FRONTEND . '/account/logout')) : null;

        $data['setting'] = $this->Model_common->all_setting();
        $data['all_store'] = $this->Model_common->all_store();
        $data['customer'] = $this->Model_customer->getCustomerById($this->session->userdata('customer_session')['id']);
        $data['customer_address'] = $this->Model_customer->address($this->session->userdata('customer_session')['id']);

        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_customer_dashboard', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
    }

    public function profile_edit($id)
    {
        !$this->checkSession ? redirect(base_url(FRONTEND . '/account/logout')) : null;
        $valid = 1;
        $error='';
        $data['setting'] = $this->Model_common->all_setting();
        $data['all_store'] = $this->Model_common->all_store();
        $data['profile'] = $this->Model_customer->getUserById($id);

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

                    unlink('./public/uploads/customer/' . $final_name);
                    unlink('./public/uploads/customer/thumbnail/' . $final_name);
                    $form_data['photo'] = $final_name;
                    $this->gumlet->crop($path_tmp, './public/uploads/customer/' . $final_name, 500, 500);
                    $this->gumlet->crop($path_tmp, './public/uploads/customer/thumbnail/' . $final_name, 150, 150);
                }

                $this->Model_customer->update($id, $form_data);

                $this->session->set_flashdata('success', 'Your profile has been updated successfully!');
                redirect(base_url(FRONTEND . '/account/profile/'.$id));
		    } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url(FRONTEND . '/account/profile/'.$id));
            }
        }

        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_profile', $data);
        $this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
    }

    public function get_address()
    {
        $id = $this->input->post('id');

        $valid = 1;
        $msg = '';

        $this->form_validation->set_rules('id', 'id', 'trim|numeric|required');

        if ($this->form_validation->run() == FALSE) {
            $valid = 0;
            $msg .= validation_errors();
        }

        if($valid == 0) {
            exit(json_encode(array('status' => 400, 'message' => $msg)));
        }

        $address = $this->Model_customer->get_address($id);

        if($address) {
            exit(json_encode(array('status' => 200, 'address' => $address)));
        } else {
            exit(json_encode(array('status' => 400, 'message' => 'not found address')));
        }
    }

    public function add_address()
    {
        if($_POST){
            // Getting the form data
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $phone = $this->input->post('phone');
            $street = $this->input->post('street');
            $street_no = $this->input->post('street_no');
            $postcode = $this->input->post('postcode');
            $floor = $this->input->post('floor');
            $city = 'Berlin';//$this->input->post('city');
            $country = 'Deutschland';//$this->input->post('country');

            $valid = 1;
            $msg = '';

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required');
            $this->form_validation->set_rules('street', 'Street', 'required');
            $this->form_validation->set_rules('street_no', 'Street No', 'required');
            $this->form_validation->set_rules('postcode', 'Postcode', 'numeric|required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('country', 'Counrty', 'required');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $msg .= validation_errors();
            }

            if($valid == 0) {
                exit(json_encode(array('status' => 400, 'msg' => $msg)));
            } else {
                $address = array(
                    'title' => $title,
                    'description' => $description,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'phone' => $phone,
                    'street' => $street,
                    'street_no' => $street_no,
                    'floor' => $floor,
                    'postcode' => $postcode,
                    'city' => $city,
                    'country' => $country,
                    'customer_id' => $this->session->userdata('customer_session')['id']
                );

                $this->Model_customer->add_address($address);
                exit(json_encode(array('status' => 200, 'msg' => 'Address has been added successfully!')));
            }
        }
    }

    public function update_address()
    {
        if($_POST){
            // Getting the form data
            $id = $this->input->post('id');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $phone = $this->input->post('phone');
            $street = $this->input->post('street');
            $street_no = $this->input->post('street_no');
            $postcode = $this->input->post('postcode');
            $floor = $this->input->post('floor');
            $city = 'Berlin';//$this->input->post('city');
            $country = 'Deutschland';//$this->input->post('country');

            $valid = 1;
            $msg = '';

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required');
            $this->form_validation->set_rules('street', 'Street', 'required');
            $this->form_validation->set_rules('street_no', 'Street No', 'required');
            $this->form_validation->set_rules('postcode', 'Postcode', 'numeric|required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('country', 'Counrty', 'required');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $msg .= validation_errors();
            }

            if($valid == 0) {
                exit(json_encode(array('status' => 400, 'msg' => $msg)));
            } else {
                $address = array(
                    'title' => $title,
                    'description' => $description,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'phone' => $phone,
                    'street' => $street,
                    'street_no' => $street_no,
                    'floor' => $floor,
                    'postcode' => $postcode,
                    'city' => $city,
                    'country' => $country,
                    'customer_id' => $this->session->userdata('customer_session')['id']
                );

                $this->Model_customer->update_address($id, $address);
                exit(json_encode(array('status' => 200, 'msg' => 'Address has been added successfully!')));
            }
        }
    }
    
    public function delete_address()
    {
        if($_POST){
            // Getting the form data
            $id = $this->input->post('id');

            $valid = 1;
            $msg = '';

            $this->form_validation->set_rules('id', 'id', 'trim|numeric|required');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $msg .= validation_errors();
            }

            if($valid == 0) {
                exit(json_encode(array('status' => 400, 'msg' => $msg)));
            } else {
                $this->Model_customer->delete_address($id);
                exit(json_encode(array('status' => 200, 'msg' => 'Address has been deleted successfully!')));
            }
        }
    }

    public function create_session($data)
    {
        $customer = array(
            'id'        => $data['id'],
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'photo'     => $data['photo'],
            'status'    => $data['status']
        );
        return $this->session->set_userdata('customer_session', $customer);
    }

    public function upload()
    {
        $path = $_FILES['photo']['name'];
        $path_tmp = $_FILES['photo']['tmp_name'];

        $form_data = [];

        if(!empty($path)) {
            $ext = pathinfo( $path, PATHINFO_EXTENSION );
            $file_name = basename( $path, '.' . $ext );
            $ext_check = $this->Model_common->extension_check_photo($ext);
            if($ext_check == FALSE) {
                $valid = 0;
                $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
            }
            $final_name = '1000.'.strtolower($ext);
            // $final_name = $data['profile']['username'].'-'.$id.'.'.strtolower($ext);

            unlink('./public/uploads/customer/' . $final_name);
            unlink('./public/uploads/customer/thumbnail/' . $final_name);
            $form_data['photo'] = $final_name;
            $this->gumlet->crop($path_tmp, './public/uploads/customer/' . $final_name, 500, 500);
            $this->gumlet->crop($path_tmp, './public/uploads/customer/thumbnail/' . $final_name, 150, 150);
        }

        return $form_data;
    }

    public function create_random_code()
    {
        return random_int(100000, 999999);
    }

    public function checkSession()
    {
        if ($this->session->userdata('customer_session')) {
            $this->checkSession = true;
        } else {
            $this->checkSession = false;
        }
    }
}
