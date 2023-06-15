<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_coupon extends CI_Controller
{

    function __construct()
    {        
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect(base_url('backend/account/logout'));
        }

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_coupon');
        $this->load->model('backend/Model_shop_store');

        // $data['setting'] = $this->Model_common->get_setting_data();

        // if (!in_array($this->session->userdata('role'), ['Administrator'])) {
        //     if ($data['setting']['website_status_backend'] === "Passive") {
        //         $data['message'] = $data['setting']['website_status_backend_message'];
        //         redirect(base_url('backend/info'));
        //     }
        // }

        $this->load->library('slug');
        $this->load->library('gumlet');
        $this->load->library('tinify');

        // ini_set('post_max_size', '256M');
        // ini_set('upload_max_filesize', '256M');
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['coupon'] = $this->Model_shop_coupon->show();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar',$data, true);
        $this->load->view('backend/view_header', $data);
        $this->load->view('backend/view_shop_coupon', $data);
        $this->load->view('backend/view_footer', $data);
    }

    public function add()
    {
        $error = '';
        $success = '';

        if (isset($_POST['coupon_add'])) {
            $valid = 1;

            $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'trim|required');
            if ($this->input->post('discount_type') === "fixed_cart") {
                $this->form_validation->set_rules('amount', 'Amount', 'trim|decimal|required');
                $amount = $this->input->post('amount');
                $percent = 0;
            } else {
                $this->form_validation->set_rules('percent', 'Percent', 'trim|numeric|required');
                $amount = 0.00;
                $percent = $this->input->post('percent');
            }
            $this->form_validation->set_rules('discount_type', 'Discount type', 'trim|required');
            // $this->form_validation->set_rules('valid_date_from', 'Valid Date from', 'date|required');
            // $this->form_validation->set_rules('valid_date_to', 'Valid Date to', 'date|required');
            // $this->form_validation->set_rules('min_spend', 'Minimum spend', 'trim|decimal');
            // $this->form_validation->set_rules('max_spend', 'Maximum spend', 'trim|decimal');
            // $this->form_validation->set_rules('max_limit', 'Max Limit', 'trim|numeric|required');


            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];


            if (!empty($path)) {
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $file_name = basename($path, '.' . $ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                }

                if ($valid == 1) {
                    $next_id = $this->Model_shop_coupon->get_auto_increment_id();
                    foreach ($next_id as $row) {
                        $ai_id = $row['Auto_increment'];
                    }

                    $final_name = 'coupon_' . $ai_id . '.' . $ext;

                    if (!empty($path_tmp)) {
                        $final_name = 'coupon_' . $ai_id . '.' . strtolower($ext);

                        if($this->input->post('photo_px') == 0){ $width = 415; $height = 320;}
                        if($this->input->post('photo_px') == 1){ $width = 1155; $height = 670;}

                        $this->gumlet->crop($path_tmp, './public/uploads/coupon/' . $final_name, $width, $height);
                        $this->gumlet->crop($path_tmp, './public/uploads/coupon/thumbnail/' . $final_name, 150, 150);
                    }
                }
            }

            if ($valid == 1) {

                $form_data = array(
                    'store_id' => json_encode($this->input->post('store_id')),
                    'code' => $this->input->post('coupon_code'),
                    'amount' => $amount,
                    'percent' => $percent,
                    'discount_type' => $this->input->post('discount_type'),
                    'valid_date_from' => $this->input->post('valid_date_from'),
                    'valid_date_to' => $this->input->post('valid_date_to'),
                    'min_spend' => $this->input->post('min_spend'),
                    'max_spend' => $this->input->post('max_spend'),
                    'max_limit' => $this->input->post('max_limit'),
                    'title' => $this->input->post('title'),
                    'photo' => $final_name,
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                $this->Model_shop_coupon->add($form_data);

                $success = 'Coupon has been added successfully!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-coupon'));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/shop-coupon/add'));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['store'] = $this->Model_shop_store->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_coupon_add', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function edit($id)
    {
        // If there is no coupon in this id, then redirect
        $tot = $this->Model_shop_coupon->coupon_check($id);

        if (!$tot) { redirect(base_url('backend/shop-coupon'));}

        $data['setting'] = $this->Model_common->all_setting();
        $error = '';
        $success = '';


        if (isset($_POST['coupon_update'])) {
            $valid = 1;

            $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'trim|required');
            if ($this->input->post('discount_type') === "fixed_cart") {
                $this->form_validation->set_rules('amount', 'Amount', 'trim|decimal|required');
                $amount = $this->input->post('amount');
                $percent = 0;
            } else {
                $this->form_validation->set_rules('percent', 'Percent', 'trim|numeric|required');
                $amount = 0.00;
                $percent = $this->input->post('percent');
            }

            $this->form_validation->set_rules('discount_type', 'Discount type', 'trim|required');
            $this->form_validation->set_rules('valid_date_from', 'Valid Date from', 'date|required');
            $this->form_validation->set_rules('valid_date_to', 'Valid Date to', 'date|required');
            $this->form_validation->set_rules('min_spend', 'Minimum spend', 'trim|decimal');
            $this->form_validation->set_rules('max_spend', 'Maximum spend', 'trim|decimal');
            $this->form_validation->set_rules('max_limit', 'Max Limit', 'trim|numeric|required');


            if ($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];

            if (!empty($path)) {
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $file_name = basename($path, '.' . $ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                }
            }

            if ($valid == 1) {
                $data['coupon'] = $this->Model_shop_coupon->getSingleCoupon($id);

                $form_data = array(
                    'store_id' => json_encode($this->input->post('store_id')),
                    'code' => $this->input->post('coupon_code'),
                    'amount' => $amount,
                    'percent' => $percent,
                    'discount_type' => $this->input->post('discount_type'),
                    'valid_date_from' => $this->input->post('valid_date_from'),
                    'valid_date_to' => $this->input->post('valid_date_to'),
                    'min_spend' => $this->input->post('min_spend'),
                    'max_spend' => $this->input->post('max_spend'),
                    'max_limit' => $this->input->post('max_limit'),
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                if (!empty($path)) {
                        $final_name = 'coupon_' . $id . '.' . strtolower($ext);
                        unlink('./public/uploads/coupon/' . $data['coupon']['photo']);
                        unlink('./public/uploads/coupon/thumbnail/' . $data['coupon']['photo']);
                        $form_data['photo'] = $final_name;

                        if($this->input->post('photo_px') == 0){ $width = 415; $height = 320;}
                        if($this->input->post('photo_px') == 1){ $width = 1155; $height = 670;}

                        $this->gumlet->crop($path_tmp, './public/uploads/coupon/' . $final_name, $width, $height);
                        $this->gumlet->crop($path_tmp, './public/uploads/coupon/thumbnail/' . $final_name, 150, 150);
                        $form_data['photo'] = $final_name;
                    }
                    $this->Model_shop_coupon->update($id, $form_data);

                $success = 'Coupon has been updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-coupon'));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/shop-coupon/edit/' . $id));
            }
        } else {
            $data['coupon'] = $this->Model_shop_coupon->getSingleCoupon($id);
            $data['store'] = $this->Model_shop_store->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_coupon_edit', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_coupon->coupon_check($id);
        if (!$tot) { redirect(base_url('backend/shop-coupon'));}

        $data['coupon'] = $this->Model_shop_coupon->getSingleCoupon($id);
        if ($data['coupon']) {
            unlink('./public/uploads/coupon/' . $data['coupon']['photo']);
            unlink('./public/uploads/coupon/thumbnail/' . $data['coupon']['photo']);
        }

        $this->Model_shop_coupon->delete($id);

        $success = 'Coupon is deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/shop-coupon'));
    }

    public function generate_code()
    {
        $coupon_code = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10));
        $return_coupon_code = array(
            'csrf_fg' => $this->security->get_csrf_hash(),
            'coupon_code' => strtoupper($coupon_code)
        );

        exit(json_encode($return_coupon_code));
    }

    public function api()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, OPTIONS, POST, GET, PUT");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        echo json_encode(array('coupon' =>$this->Model_shop_coupon->show()));
    }
}
