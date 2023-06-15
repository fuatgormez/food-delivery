<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id')) { redirect(base_url('backend/account/logout'));}

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_product');
        $this->load->model('backend/Model_shop_product_category');

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

        // $file = 'public/bg.png';
        // $output = 'public/bg.jpg';
        // $this->gumlet->resize($file, $output, 50, 50);
        // $this->tinify->compress($file);
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();

        // $data['products'] = $this->Model_shop_product->show($this->session->userdata('lang_code'));
        // $data['products'] = count($this->Model_shop_product->show($lang)) > 0 ? $this->Model_shop_product->show($lang) : $this->Model_shop_product->show('de');
        // $data['product_categories'] = $this->Model_shop_product->get_all_product_category();

        $data['categories'] = $this->Model_shop_product_category->show();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header', $data);
        $this->load->view('backend/view_shop_product_category', $data);
        $this->load->view('backend/view_footer');
    }

    public function add()
    {
        $error = '';
        $success = '';


        if (isset($_POST['product_category_add'])) {
            $valid = 1;

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];

            if ($path != '') {
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $file_name = basename($path, '.' . $ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                }
            }

            if ($valid == 1) {
                $next_id = $this->Model_shop_product_category->get_auto_increment_id();
                foreach ($next_id as $row) {
                    $ai_id = $row['Auto_increment'];
                }

                if (!empty($path_tmp)) {
                    $final_name = 'product_cat_' . $ai_id . '.' . $ext;
                    $this->gumlet->crop($path_tmp, './public/uploads/product_category_photos/' . $final_name, 500, 500);
                    $this->gumlet->crop($path_tmp, './public/uploads/product_category_photos/thumbnail/' . $final_name, 150, 150);
                    // move_uploaded_file($path_tmp, './public/uploads/product_category_photos/' . $final_name);
                }

                //$array = $this->input->post('lang');

                $form_data = array(
                    'parent_id'             => $this->input->post('parent_id'),
                    'name'                  => $this->input->post('name'),
                    'short_description'     => $this->input->post('short_description'),
                    'description'           => $this->input->post('description'),
                    'slug'                  => $this->slug->url($this->input->post('name')),
                    'delivery_time_start'   => $this->input->post('delivery_time_start'),
                    'delivery_time_end'     => $this->input->post('delivery_time_end'),
                    'status'                => $this->input->post('status') == NULL ? 'Passive' : 'Active',
                    'photo'                 => $final_name ?? ''
                );
                
                $this->Model_shop_product_category->add($form_data);

                $success = 'Product category has been added successfully!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/product-category'));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/product-category/add'));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();

            $data['categories'] = $this->Model_shop_product_category->show();
            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header');
            $this->load->view('backend/view_shop_product_category_add', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function edit($id)
    {
        // If there is no product in this id, then redirect
        $tot = $this->Model_shop_product_category->product_category_check($id);

        if (!$tot) {
            redirect(base_url('backend/product-category'));
        }

        $error = '';
        $success = '';

        if (isset($_POST['product_category_edit'])) {
            $valid = 1;

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];

            if ($path != '') {
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $file_name = basename($path, '.' . $ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                }
            }

            if ($valid == 1) {
                $data['product_category'] = $this->Model_shop_product_category->getSingleProductCategory($id);
                // $data['product'] = $this->Model_shop_product->getData($id);

                $form_data = array(
                    'parent_id'             => $this->input->post('parent_id'),
                    'name'                  => $this->input->post('name'),
                    'slug'                  => $this->slug->url($this->input->post('name')),
                    'short_description'     => $this->input->post('short_description'),
                    'description'           => $this->input->post('description'),
                    'delivery_time_start'   => $this->input->post('delivery_time_start'),
                    'delivery_time_end'     => $this->input->post('delivery_time_end'),
                    'status'                => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                    if (!empty($path)) {
                        $final_name = 'product_cat_' . $id . '.' . strtolower($ext);
                        unlink('./public/uploads/product_category_photos/' . $data['product_category']['photo']);
                        unlink('./public/uploads/product_category_photos/thumbnail/' . $data['product_category']['photo']);
                        $form_data['photo'] = $final_name;
                        $this->gumlet->crop($path_tmp, './public/uploads/product_category_photos/' . $final_name, 500, 500);
                        $this->gumlet->crop($path_tmp, './public/uploads/product_category_photos/thumbnail/' . $final_name, 150, 150);
                    }

                    $this->Model_shop_product_category->update($id, $form_data);

                $success = 'Product has been updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/product-category'));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/product-category/edit/') . $id);
            }
        } else {
            $data['setting'] = $this->Model_common->get_setting_data();

            $data['categories'] = $this->Model_shop_product_category->show();
            $data['category'] = $this->Model_shop_product_category->product_category_check($id);

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header');
            $this->load->view('backend/view_shop_product_category_edit', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_product_category->product_category_check($id);
        if (!$tot) {
            redirect(base_url('backend/shop/product-category'));
        }

        $data['product_category'] = $this->Model_shop_product_category->getSingleProductCategory($id);
        if ($data['product_category']) {
            $this->Model_shop_product_category->delete($id);
            unlink('./public/uploads/product_category_photos/' . $data['product_category']['photo']);
            unlink('./public/uploads/product_category_photos/thumbnail/' . $data['product_category']['thumbnail']);
        }


        $success = 'Product category has been deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/product-category'));
    }
}
