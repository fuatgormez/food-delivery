<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) {
			redirect(base_url() . 'backend/account/login');
		}

		$this->load->model('backend/Model_common');
		$this->load->model('backend/Model_user');

		$data['setting'] = $this->Model_common->all_setting();

		// if (!in_array($this->session->userdata('role'), ['Administrator', 'Superadmin'])) {
		// 	if ($data['setting']['website_status_backend'] === "Passive") {
		// 		$data['message'] = $data['setting']['website_status_backend_message'];
		// 		redirect(base_url('backend/info'));
		// 	}
		// }

        $this->load->library('slug');
        $this->load->library('gumlet');
        $this->load->library('tinify');
	}
	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['user'] = $this->Model_user->get_all_user();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
		$this->load->view('backend/view_header', $data);
		$this->load->view('backend/view_user', $data);
		$this->load->view('backend/view_footer', $data);
	}

	public function add()
	{

		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->all_setting();
		
		
		if (isset($_POST['user_add'])) {

			$valid = 1;

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|is_unique[tbl_user.phone]');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

			if ($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error = validation_errors();
			}

			$path = $_FILES['photo']['name'];
			$path_tmp = $_FILES['photo']['tmp_name'];
			if ($path != '') {
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				$file_name = basename($path, '.' . $ext);
				$ext_check = $this->Model_common->extension_check_photo($ext);
				if ($ext_check == FALSE) {
					$valid = 0;
					$data['error'] = 'You must have to upload jpg, jpeg, gif or png file<br>';
				}
			} else {
				$valid = 0;
				$data['error'] = 'You must have to select a photo<br>';
			}
			if ($valid == 1) {

				// updating the data
				$final_name = 'user-' .$this->slug->url($this->input->post('username')). '.' . $ext;

                $this->gumlet->crop($path_tmp, './public/uploads/user/' . $final_name, 500, 500);
                $this->gumlet->crop($path_tmp, './public/uploads/user/thumbnail/' . $final_name, 150, 150);

				$form_data['photo'] = $final_name;

			} else {
				$this->session->set_flashdata('error', $error);
				$valid = 0;
			}

			if ($valid == 1) {
				
				$form_data = array(
					'username'     => $this->input->post('username'),
					'slug'     => $this->slug->url($this->input->post('username')),
					'email'     => $this->input->post('email'),
					'firstname'     => $this->input->post('firstname'),
					'lastname'     => $this->input->post('lastname'),
					'phone'     => $this->input->post('phone'),
					'description'     => $this->input->post('description'),
					'status'     => $this->input->post('status'),
					'role'     => $this->input->post('role'),
					'password'     => sha1( $this->input->post('password')),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
				);
				$this->Model_user->add($form_data);
				$success = 'User Information is added successfully!';

				$this->session->set_flashdata('success', $success);
				redirect(base_url() . 'backend/user');
			} else {
				$this->session->set_flashdata('error', $error);
				redirect(base_url() . 'backend/user/add');
			}
		}

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
		$this->load->view('backend/view_header', $data);
		$this->load->view('backend/view_user_add', $data);
		$this->load->view('backend/view_footer', $data);
	}

	public function edit($id)
	{

		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->all_setting();

        $data['user'] = $this->Model_user->getUserById($id);
		
		if (isset($_POST['user_update'])) {

			$valid = 1;

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

			if ($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error = validation_errors();
			}

			if ($valid == 1) {
				$form_data = array(
					'username'      => $this->input->post('username'),
					'slug'          => $this->slug->url($this->input->post('username')),
					'email'         => $this->input->post('email'),
					'firstname'     => $this->input->post('firstname'),
					'lastname'      => $this->input->post('lastname'),
					'phone'         => $this->input->post('phone'),
					'description'   => $this->input->post('description'),
					'status'        => $this->input->post('status'),
					'role'          => $this->input->post('role'),
					'password'      => $this->input->post('password') ? sha1($this->input->post('password')) : $data['user']['password'] ,
                    'status'        => $this->input->post('status') == NULL ? 'Passive' : 'Active'
				);

                if ($valid == 1) {

                    if ($_FILES['photo']['size'] > 0) {
                        $path = $_FILES['photo']['name'];
                        $path_tmp = $_FILES['photo']['tmp_name'];
                        $ext = pathinfo($path, PATHINFO_EXTENSION);
                        $file_name = basename($path, '.' . $ext);
                        $ext_check = $this->Model_common->extension_check_photo($ext);
                        if ($ext_check == FALSE) {
                            $valid = 0;
                            $this->session->set_flashdata('error', 'You must have to upload jpg, jpeg, gif or png file');
                        }
                    }

                    $final_name = 'user-' .$this->slug->url($this->input->post('username')). '.' . $ext;

                    unlink('./public/uploads/user/' . $data['user']['photo']);
                    unlink('./public/uploads/user/thumbnail/' . $data['user']['photo']);
    
                    $this->gumlet->crop($path_tmp, './public/uploads/user/' . $final_name, 500, 500);
                    $this->gumlet->crop($path_tmp, './public/uploads/user/thumbnail/' . $final_name, 150, 150);
    
                    $form_data['photo'] = $final_name;
    
                } else {
                    $this->session->set_flashdata('error', $error);
                    $valid = 0;
                }

                if ($valid == 1) { 
                    // updating the data
                    $this->Model_user->update($id, $form_data);
                    $success = 'User Information is added successfully!';
                    
                    $this->session->set_flashdata('success', $success);
                    redirect(base_url() . 'backend/user');
                }
			} else {
				redirect(base_url() . 'backend/user/edit/'.$id);
			}
		}

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
		$this->load->view('backend/view_header', $data);
		$this->load->view('backend/view_user_edit', $data);
		$this->load->view('backend/view_footer', $data);
	}

	public function delete($id) 
	{
		// If there is no User in this id, then redirect
        if($id == 1) { redirect(base_url('backend/user'));}

    	$tot = $this->Model_user->user_check($id);
    	if(!$tot) {
    		redirect(base_url().'backend/user');
    	}

        unlink('./public/uploads/user/' . $tot->photo);
        unlink('./public/uploads/user/thumbnail/' . $tot->photo);

        $this->Model_user->delete($id);
        $success = 'User is deleted successfully';
		$this->session->set_flashdata('success', $success);
		redirect(base_url().'backend/user');
    }
}
