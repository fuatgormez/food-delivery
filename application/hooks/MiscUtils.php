<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//There cannot be a file with the same name in the hooks folder and the library folder.
//hooks folder is loaded first 
class MiscUtils{
    protected $_CI;
    protected $settings;

    public function __construct()
    {

        $this->_CI =& get_instance();

        // $this->_CI->load->library('settings');
        // $this->_CI->settings->index();
    }

    public function design_mode()
    {
        $this->_CI->load->library('user_agent');
        return $this->_CI->agent->is_mobile() ? define('DESIGN_MODE', 'mobile') : define('DESIGN_MODE', 'desktop');
    }

    public function start_cache()
    {
        // if($this->_CI->uri->segment(1) !== 'backend')
        //     $this->_CI->output->cache(60);
    }

    public function check_class()
    {

        $router = load_class(APPPATH.'controllers/'.FRONTEND.'Home', 'test');
        $controller = $this->_CI->router->class;
        // $controller = $router->fetch_class();
        $method     = $router->fetch_method();

        // if($controller!='auth')
        // {
        //     echo $this->CI->userdata('admin_id');
        // }
    }

    public function authentication()
    {
        try {
            if($this->_CI->uri->segment(1) == rtrim(BACKEND,'/') && $this->_CI->uri->segment(3) != 'login') {
                return in_array($this->_CI->session->userdata('role'), ['Administrator']) == false ? ($this->_CI->session->sess_destroy() AND redirect(base_url(BACKEND.'account/logout'))) : null;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}