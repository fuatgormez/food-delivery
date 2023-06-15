<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_configuration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_email_configuration');
    }

    public function index()
    {
        $data['email_configuration'] = $this->Model_email_configuration->getSingleEmailConfiguration(1);

        if (isset($_POST['update'])) {
            $error = '';
            $success = '';
            $valid = 1;

            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('port', 'Port', 'trim|required|integer');
            $this->form_validation->set_rules('encryption', 'Encryption', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
                $this->session->set_flashdata('error', $error);
            }

            if($valid == 1) {
                $form_data = array(
                    'email' => $this->input->post('email'),
                    'host' => $this->input->post('host'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'port' => $this->input->post('port'),
                    'encryption' => $this->input->post('encryption')
                );

                $this->Model_email_configuration->update(1, $form_data);

                $success = 'Email Configuration has been updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/email-configuration'));
            } else {
                redirect(base_url('backend/email-configuration'));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_email_configuration', $data);
            $this->load->view('backend/view_footer');
        }
    }
}
