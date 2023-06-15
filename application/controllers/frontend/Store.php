<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model(FRONTEND . '/Model_common');
	}

	public function index()
	{
        $data['setting'] = $this->Model_common->all_setting();

		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_home');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer');
	}

    public function all()
	{
        $data['setting'] = $this->Model_common->all_setting();
        $data['store'] = $this->Model_common->all_store();

        if(!$data['store']){exit('no store find');}

		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_header', $data);
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_preloader');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_menu');
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_select_store', $data);
		$this->load->view(FRONTEND.'/'.DESIGN_MODE.'/view_footer', $data);
	}

    public function select($id)
	{
        $store = $this->Model_common->getSingleStore($id);

        if($store) {
            $this->session->set_userdata('store', $store);
            redirect(base_url());
        } else {
            redirect(base_url('all-store'));
        }

	}
}