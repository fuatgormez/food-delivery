<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_order extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_order');
    }

    public function index()
    {
        $data = array();
        $data['setting'] = $this->Model_common->all_setting();
        $data['order'] = $this->Model_shop_order->show();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header');
        $this->load->view('backend/view_shop_order', $data);
        $this->load->view('backend/view_footer');
    }

    public function detail($id)
    {
        $data['setting'] = $this->Model_common->all_seetting();
        $data['order'] = $this->Model_shop_order->getSingleShopOrder($id);

        $data['page_header'] = $this->load->view('backend/view_page_header', $data ,true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header');
        $this->load->view('backend/view_shop_order_detail', $data);
        $this->load->view('backend/view_footer');
    }

    public function edit($id)
    {
        // If there is no order in this id, then redirect
        $tot = $this->Model_shop_order->shop_order_check($id);

        if (!$tot) {redirect(base_url('backend/shop-order'));}

        $data['setting'] = $this->Model_common->all_setting();

        if (isset($_POST['order_update'])) {
            $data['order'] = $this->Model_shop_order->getSingleShopOrder($id);
            
            $error = '';
            $success = '';
            $valid = 1;

            if($this->input->post('order_number') != $tot['order_number']) {
                $uniq = '|is_unique[tbl_shop_order.order_number]';
            }

            $this->form_validation->set_rules('order_number', 'Order Number', 'trim|required|integer'.$uniq);

            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
                $this->session->set_flashdata('error', $error);
            }
            
            if($valid == 1) {
                $form_data = array(
                    'order_number' => $this->input->post('order_number'),
                    'status'    => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );
    
                $this->Model_shop_order->update($id,$form_data);

                $success = 'Order has been updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-order'));
            } else {
                redirect(base_url('backend/shop-order/edit/'.$id));
            }
        } else {
            $data['order'] = $this->Model_shop_order->getSingleShopOrder($id);

            $data['page_header'] = $this->load->view('backend/view_page_header', $data ,true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_order_edit', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_order->shop_order_check($id);
        if (!$tot) {
            redirect(base_url('backend/shop-order'));
        }

        $this->Model_shop_order->delete($id);

        $success = 'Order has been deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/shop-order'));
    }
}
