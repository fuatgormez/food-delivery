<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_postcode extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_postcode');
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['postcode'] = $this->Model_shop_postcode->show();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header');
        $this->load->view('backend/view_shop_postcode', $data);
        $this->load->view('backend/view_footer');
    }

    public function add()
    {
        $error = '';
        $success = '';

        if (isset($_POST['postcode_add'])) {

            $valid = 1;

            $this->form_validation->set_rules('postcode', 'postcode', 'trim|required|integer|is_unique[tbl_shop_postcode.code]');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
                $this->session->set_flashdata('error', $error);
            }

            if($valid == 1) {
                $form_data = array(
                    'code' => $this->input->post('postcode'),
                    'min_spend' => $this->input->post('min_spend'),
                    'status'                => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );
                
                $this->Model_shop_postcode->add($form_data);
                
                $success = 'postcode has been added successfully!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-postcode'));
            } else {
                redirect(base_url('backend/shop-postcode/add'));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['postcode'] = $this->Model_shop_postcode->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header');
            $this->load->view('backend/view_shop_postcode_add', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function edit($id)
    {
        // If there is no postcode in this id, then redirect
        $tot = $this->Model_shop_postcode->shop_postcode_check($id);

        if (!$tot) {redirect(base_url('backend/shop-postcode'));}

        $data['setting'] = $this->Model_common->all_setting();

        if (isset($_POST['postcode_update'])) {
            $data['postcode'] = $this->Model_shop_postcode->getSingleShoppostcode($id);
            
            $error = '';
            $success = '';
            $valid = 1;

            if($this->input->post('postcode') != $tot['code']) {
                $uniq = '|is_unique[tbl_shop_postcode.code]';
            }

            $this->form_validation->set_rules('postcode', 'postcode', 'trim|required|integer'.$uniq);

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
                $this->session->set_flashdata('error', $error);
            }
            
            if($valid == 1) {
                $form_data = array(
                    'code' => $this->input->post('postcode'),
                    'min_spend' => $this->input->post('min_spend'),
                    'status'    => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );
    
                $this->Model_shop_postcode->update($id,$form_data);

                $success = 'postcode is updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-postcode'));
            } else {
                redirect(base_url('backend/shop-postcode/edit/'.$id));
            }
        } else {

            $data['postcode'] = $this->Model_shop_postcode->getSingleShoppostcode($id);

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_postcode_edit', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_postcode->shop_postcode_check($id);
        if (!$tot) {
            redirect(base_url('backend/shop-postcode'));
        }

        $this->Model_shop_postcode->delete($id);

        $success = 'postcode is deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/shop-postcode'));
    }
}
