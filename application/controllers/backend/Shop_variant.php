<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_variant extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_variant');
        $this->load->model('backend/Model_shop_variant_item');

    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['variant'] = $this->Model_shop_variant->show();


        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar',$data, true);
        $this->load->view('backend/view_header', $data);
        $this->load->view('backend/view_shop_variant', $data);
        $this->load->view('backend/view_footer', $data);
    }

    public function add()
    {
        $error = '';
        $success = '';

        if (isset($_POST['shop_variant_add'])) {

            $form_data = array(
                'title' => $this->input->post('title'),
                'type' => $this->input->post('type'),
                'variant_item' => json_encode($this->input->post('variant_item'))
            );

            $this->Model_shop_variant->add($form_data);

            $success = 'Variant has been added successfully!';
            $this->session->set_flashdata('success', $success);
            redirect(base_url('backend/shop-variant'));
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['variant_item'] = $this->Model_shop_variant_item->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_variant_add', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function edit($id)
    {
        // If there is no variant in this id, then redirect
        $tot = $this->Model_shop_variant->shop_variant_check($id);

        if (!$tot) {
            redirect(base_url('backend/shop-variant'));
        }

        $data['setting'] = $this->Model_common->all_setting();
        $error = '';
        $success = '';


        if (isset($_POST['shop_variant_edit'])) {
            $data['variant'] = $this->Model_shop_variant->getSingleShopVariant($id);

                $form_data = array(
                    'title' => $this->input->post('title'),
                    'type' => $this->input->post('type'),
                    'variant_item' => json_encode($this->input->post('variant_item')),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                $this->Model_shop_variant->update($id,$form_data);

                $success = 'Variant is updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-variant'));
        } else {

            $data['variant'] = $this->Model_shop_variant->getSingleShopVariant($id);
            $data['variant_item'] = $this->Model_shop_variant_item->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_variant_edit', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_variant->shop_variant_check($id);
        if (!$tot) {
            redirect(base_url('backend/shop-variant'));
        }

        $this->Model_shop_variant->delete($id);

        $success = 'Variant is deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/shop-variant'));
    }
}
