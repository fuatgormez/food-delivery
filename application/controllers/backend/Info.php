<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('backend/Model_common');
		$this->load->model('backend/Model_setting');

		$data['setting'] = $this->Model_common->all_setting();

		if (!$this->session->userdata('id') && !in_array($this->session->userdata('role'), ['Administrator','Superadmin'])) {
			// if ($data['setting']['website_status_backend'] === "Passive") {
			// 	$data['message'] = $data['setting']['website_status_backend_message'];
			// }
			redirect(base_url('backend/account/logout'));
		}
	}
	public function index()
	{
		$this->load->view('backend/header');
		$this->load->view('backend/info');
		$this->load->view('backend/footer');
	}
}
