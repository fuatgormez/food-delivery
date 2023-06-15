<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_variant_item extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_variant_item');

    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['variant_item'] = $this->Model_shop_variant_item->showAll();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header', $data);
        $this->load->view('backend/view_shop_variant_item', $data);
        $this->load->view('backend/view_footer', $data);
    }

    public function add()
    {
        $error = '';
        $success = '';

        if (isset($_POST['variant_item_add'])) {

            $form_data = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'design' => $this->input->post('design'),
                'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
            );

            $this->Model_shop_variant_item->add($form_data);

            $success = 'Variant item has been added successfully!';
            $this->session->set_flashdata('success', $success);
            redirect(base_url('backend/shop-variant-item'));
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);

            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_variant_item_add', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function edit($id)
    {
        // If there is no product in this id, then redirect
        $tot = $this->Model_shop_variant_item->shop_variant_item_check($id);

        if (!$tot) {
            redirect(base_url('backend/product-variant-item'));
        }

        $data['setting'] = $this->Model_common->all_setting();
        $error = '';
        $message = '';


        if (isset($_POST['variant_item_edit'])) {
            
            if($this->Model_shop_variant_item->getSingleShopVariantItem($id)){   
                $form_data = array(
                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('price'),
                    'design' => $this->input->post('design'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                    // 'status' => $this->input->post('status') == 1 ? 'Active' : 'Passive'
                );
                
                $this->Model_shop_variant_item->update($id,$form_data);
                
                $message = 'Variant item is updated successfully';
                $this->session->set_flashdata('success', $message);
                redirect(base_url('backend/shop-variant-item'));
            } else {
                $message = 'No Variant Item';
                $this->session->set_flashdata('error', $message);
                redirect(base_url('backend/shop-variant-item'));
            }
        } else {

            $data['variant_item'] = $this->Model_shop_variant_item->getSingleShopVariantItem($id);

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_variant_item_edit', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_variant_item->shop_variant_item_check($id);
        if (!$tot) {
            redirect(base_url('backend/shop-variant-item'));
        }

        $this->Model_shop_variant_item->delete($id);

        $success = 'Variant item is deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/shop-variant-item'));
    }
}
