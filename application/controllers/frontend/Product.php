<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->library('cookie');
	}
	// to set cookies
	public function index(){

		$this->load->view('frontend/header');
		$this->load->view('frontend/preloader');
		$this->input->cookie('onboading') == null ? $this->onboading() : $this->load->view('frontend/product');
		$this->load->view('frontend/footer');

		$this->cookie->create();

	}

	public function onboading(){
		return $this->load->view('frontend/onboading');
	}
}