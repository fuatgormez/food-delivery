<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

		$this->load->model('backend/Model_common');
		$this->load->model('backend/Model_setting');

		$data['setting'] = $this->Model_common->all_setting();

		if (!in_array($this->session->userdata('role'), ['Administrator','Superadmin'])) {
			// if ($data['setting']['website_status_backend'] === "Passive") {
			// 	$data['message'] = $data['setting']['website_status_backend_message'];
			// }
			redirect(base_url('backend/info'));
		}
	}
	public function index()
	{
		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->all_setting();

		$data['page_header'] = $this->load->view('backend/view_page_header',$data,true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar',$data,true);
		$this->load->view('backend/view_header', $data);
		$this->load->view('backend/view_setting', $data);
		$this->load->view('backend/view_footer');
	}

	public function update()
	{
		$error = '';
		$success = '';

		if (isset($_POST['setting_update'])) {
				if($_FILES['logo']['size'] > 0)
					$this->upload($_FILES, 'logo', $this->input->post('logo_width'), $this->input->post('logo_height'));
				if(!empty($_FILES['favicon']['size']))
					$this->upload($_FILES, 'favicon', $this->input->post('favicon_width'), $this->input->post('favicon_height'));

			$form_data = array(
				'site_name'         => $this->input->post('site_name'),
				'site_url'         	=> $this->input->post('site_url'),
				'mobile_status'     => $this->input->post('mobile_status') == NULL ? 'Passive' : 'Active',
				'frontend_status'   => $this->input->post('frontend_status') == NULL ? 'Passive' : 'Active',
				'backend_status'   	=> $this->input->post('backend_status') == NULL ? 'Passive' : 'Active'
			);
			$this->Model_setting->update($form_data);
			$success = 'Setting has been updated successfully!';
			$this->session->set_flashdata('success', $success);

			redirect(base_url() . 'backend/setting');
		}
	}

	public function upload($file, $field, $width, $height)
	{
		$error = 'Access denied!';
		if (isset($file)) {

			$this->load->library('gumlet');
        	$this->load->library('tinify');

			$data['setting'] = $this->Model_common->all_setting();

			$valid = 1;
			$path = $file[$field]['name'];
			$path_tmp = $file[$field]['tmp_name'];

			if (!empty($path)) {
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				$file_name = basename($path, '.' . $ext);
				$ext_check = $this->Model_common->extension_check_photo($ext);
				if ($ext_check == FALSE) {
					$valid = 0;
					$error = 'You must have to upload jpg, jpeg, gif or png file<br>';
				}
			} else {
				$valid = 0;
				$error = 'You must have to select a photo<br>';
			}
			if ($valid == 1) {
				// removing the existing photo
				unlink('./public/uploads/' . $data['setting'][$field]);

				// updating the data
				$final_name = $field . '.' . $ext;
				// move_uploaded_file($path_tmp, './public/uploads/' . $final_name);

				// if($this->input->post('photo_px') == 0){ $width = 415; $height = 320;}
                // if($this->input->post('photo_px') == 1){ $width = 1155; $height = 670;}

				if(strtolower($ext === "svg")) {
					move_uploaded_file($path_tmp, './public/uploads/' . $final_name);
				} else {
					$this->gumlet->crop($path_tmp, './public/uploads/' . $final_name, $width, $height);
					// $this->gumlet->crop($path_tmp, './public/uploads/coupon/thumbnail/' . $final_name, 150, 150);
				}

				$form_data = array(
					$field => $final_name
				);
				return $this->Model_setting->update($form_data);

				// $success = 'Logo is updated successfully!';
				// $this->session->set_flashdata('success', $success);
				// redirect(base_url() . 'backend/admin/setting');
			} else {
				$this->session->set_flashdata('error', $error);
				redirect(base_url() . 'backend/setting');
			}
		}
	}
}
