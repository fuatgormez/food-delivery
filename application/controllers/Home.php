<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
        if(!$this->session->userdata('store')) {redirect(base_url('all-store'));}

        $this->load->model(FRONTEND . '/Model_common');
        $this->load->model(FRONTEND . '/shop/Model_product');
	}

	public function index()
	{
        $data['setting'] = $this->Model_common->all_setting();
        $data['all_store'] = $this->Model_common->all_store();
        $data['all_product'] = $this->Model_product->all_product();
        $data['all_product_category'] = $this->Model_product->all_product_category();



		// echo '<pre>';
		// var_dump($data['all_product']);

		// exit;

		// print_r($_SESSION);
		// print_r($this->session->userdata('customer_session'));
		// exit;

		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_home',$data);
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer');
	}

	public function onboading()
	{
		return $this->load->view('frontend/onboading');
	}
}
