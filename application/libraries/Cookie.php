<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cookie
{
    private $_CI;

    function __construct()
    {
        $this->_CI = &get_instance();
        // $this->_CI->load->model('backend/admin/Model_common');
    }

    public function index()
    {
        redirect(base_url());
    }

    public function create ()
    {
        $cookie = array(
            'name'   => 'onboading',
            'value'  => true,
            'expire' =>  86500,
            'secure' => false
        );
        // delete_cookie("onboadding");
        // $this->input->cookie('onboading')

        $this->_CI->input->set_cookie($cookie);
    }

    public function login(){
        $cookie = array(
            'name'   => 'customer_cookie',
            'value'  => 1,
            'expire' => time() + ( 365 * 24 * 60 * 60), //one year
            'path'   => '/'
        );
        $this->_CI->input->set_cookie($cookie);
    }
    
    public function backendLogin(){
        $cookie = array(
            'name'   => 'remember',
            'value'  => '1',
            'expire' => '31536000',
            'path'   => '/'
        );
        $this->_CI->input->set_cookie($cookie);
    }
}
