<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

		// $this->load->library('logger/logger');

		$this->load->model('backend/Model_common');

		$data['setting'] = $this->Model_common->all_setting();

		// if (!in_array($this->session->userdata('role'), ['Administrator','Superadmin'])) {

		// 	exit('access denied');
		// 	if ($data['setting']['website_status_backend'] === "Passive") {
		// 		$data['message'] = $data['setting']['website_status_backend_message'];
		// 		redirect(base_url('backend/info'));
		// 	}
		// }
	}
	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		// $data['logs'] = json_decode(json_encode($this->logger->get()), true);

		$data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
		$data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
		$this->load->view('backend/view_header', $data);
		$this->load->view('backend/view_dashboard', $data);
		$this->load->view('backend/view_footer');
	}
}
