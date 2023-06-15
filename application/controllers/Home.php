<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if(!$this->session->userdata('store')) {redirect(base_url('all-store'));}

        $this->load->model(FRONTEND . '/Model_common');
	}

	public function index()
	{
        $data['setting'] = $this->Model_common->all_setting();
        $data['all_store'] = $this->Model_common->all_store();

		// echo '<pre>';
		// print_r($_SESSION);
		// print_r($this->session->userdata('customer_session'));
		// exit;

		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_home');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer');
	}

	public function onboading()
	{
		return $this->load->view('frontend/onboading');
	}
}
