<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_tax extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_tax');
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['tax'] = $this->Model_shop_tax->show();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header');
        $this->load->view('backend/view_shop_tax', $data);
        $this->load->view('backend/view_footer');
    }

    public function add()
    {
        $error = '';
        $success = '';

        if (isset($_POST['tax_add'])) {

            $valid = 1;

            $this->form_validation->set_rules('tax', 'Tax', 'trim|required|integer|is_unique[tbl_shop_tax.value]');

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
                $this->session->set_flashdata('error', $error);
            }

            if($valid == 1) {
                $form_data = array(
                    'value'     => $this->input->post('tax'),
                    'status'    => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                $this->Model_shop_tax->add($form_data);

                $success = 'Tax has been added successfully!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-tax'));
            } else {
                redirect(base_url('backend/shop-tax/add'));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['tax'] = $this->Model_shop_tax->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header');
            $this->load->view('backend/view_shop_tax_add', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function edit($id)
    {
        // If there is no postcode in this id, then redirect
        $tot = $this->Model_shop_tax->shop_tax_check($id);

        if (!$tot) {redirect(base_url('backend/shop-tax'));}



        if (isset($_POST['tax_update'])) {
            $data['tax'] = $this->Model_shop_tax->getSingleShopTax($id);
            $data['setting'] = $this->Model_common->all_setting();
            
            $error = '';
            $success = '';
            $valid = 1;

            if($this->input->post('tax') != $tot['value']) {
                $uniq = '|is_unique[tbl_shop_tax.value]';
            }

            $this->form_validation->set_rules('tax', 'Tax', 'trim|required|integer'.$uniq);

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
                $this->session->set_flashdata('error', $error);
            }
            
            if($valid == 1) {
                $form_data = array(
                    'value' => $this->input->post('tax'),
                    'status'    => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );
    
                $this->Model_shop_tax->update($id, $form_data);

                $success = 'Tax is updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-tax'));
            } else {
                redirect(base_url('backend/shop-tax/edit/'.$id));
            }
        } else {

            $data['tax'] = $this->Model_shop_tax->getSingleShopTax($id);

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_tax_edit', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_tax->shop_tax_check($id);
        if (!$tot) {
            redirect(base_url('backend/shop-tax'));
        }

        $this->Model_shop_tax->delete($id);

        $success = 'Tax is deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/shop-tax'));
    }
}
