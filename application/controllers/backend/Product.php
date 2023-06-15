<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    function __construct()
    {        
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect(base_url('backend/account/logout'));
        }

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_product');
        $this->load->model('backend/Model_shop_product_category');
        $this->load->model('backend/Model_shop_variant');
        $this->load->model('backend/Model_shop_tax');

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

        $data['products'] = $this->Model_shop_product->show();
        // $data['products'] = count($this->Model_shop_product->show($lang)) > 0 ? $this->Model_shop_product->show($lang) : $this->Model_shop_product->show('de');
        // $data['product_categories'] = $this->Model_shop_product->get_all_product_category();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header');
        $this->load->view('backend/view_shop_product', $data);
        $this->load->view('backend/view_footer');
    }

    public function add()
    {
        $error = '';
        $success = '';

        $data['setting'] = $this->Model_common->all_setting();

        if (isset($_POST['product_add'])) {
            $valid = 1;

            $path = $_FILES['photo']['name'];
            $path_tmp = $_FILES['photo']['tmp_name'];


            if (!empty($path)) {
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $file_name = basename($path, '.' . $ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                    $this->session->set_flashdata('error', $error);
                }

                if ($valid == 1) {
                    $next_id = $this->Model_shop_product->get_auto_increment_id();
                    foreach ($next_id as $row) {
                        $ai_id = $row['Auto_increment'];
                    }

                    $final_name = 'product_' . $ai_id . '.' . $ext;

                    if (!empty($path_tmp)) {
                        $final_name = 'product_' . $ai_id . '.' . strtolower($ext);
                        // $final_name_thumb = 'product_thumb_' . $ai_id . '.' . strtolower($ext);
                        // $form_data['photo'] = $final_name;

                        $this->gumlet->crop($path_tmp, './public/uploads/product_photos/' . $final_name, 500, 500);
                        $this->gumlet->crop($path_tmp, './public/uploads/product_photos/thumbnail/' . $final_name, 150, 150);
                        // move_uploaded_file($path_tmp, './public/uploads/product_photos/thumbnail/' . $final_name);
                    }
                }
            }

            $check_product_with_item_id = $this->Model_shop_product->get_all_product_with_item_id($this->input->post('item_id'));

            if($check_product_with_item_id) {
                $valid = 0;
                $this->session->set_flashdata('error', 'item id allready exists!');
            }

            if ($valid == 1) {

                $form_data = array(
                    'category_id' => $this->input->post('category_id'),
                    'item_id' => $this->input->post('item_id'),
                    'sku' => $this->input->post('sku'),
                    'name' => $this->input->post('name'),
                    'slug' => $this->slug->url($this->input->post('name')),
                    'price' => $this->input->post('price'),
                    'tax' => $this->input->post('tax'),
                    'description' => $this->input->post('description'),
                    'variant' => json_encode($this->input->post('variant')),
                    'photo' => $final_name ?? '',
                    'tag' => $this->input->post('tag'),
                    'allergy' => $this->input->post('allergy'),
                    'seo_title' => $this->input->post('seo_title'),
                    'seo_description' => $this->input->post('seo_description'),
                    'seo_keyword' => $this->input->post('seo_keyword'),
                    'seo_url' => $this->input->post('seo_url'),
                    'delivery_time_start' => $this->input->post('delivery_time_start') ?? '00:00',
                    'delivery_time_end' => $this->input->post('delivery_time_end') ?? '00:00',
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                $this->Model_shop_product->add($form_data);

                $success = 'Product has been added successfully!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/product'));
            } else {
                redirect(base_url('backend/product/add'));
            }
        } else {
            $data['categories'] = $this->Model_shop_product_category->show();
            $data['variant'] = $this->Model_shop_variant->show();
            $data['tax'] = $this->Model_shop_tax->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            
            $this->load->view('backend/view_header');
            $this->load->view('backend/view_shop_product_add',$data);
            $this->load->view('backend/view_footer');
        }
    }

    public function edit($id)
    {
        // If there is no product in this id, then redirect
        $tot = $this->Model_shop_product->product_check($id);

        if (!$tot) {
            redirect(base_url('backend/product'));
            exit;
        }

        $data['setting'] = $this->Model_common->all_setting();
        $error = '';
        $success = '';


        if (isset($_POST['product_update'])) {
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
                $data['product'] = $this->Model_shop_product->getSingleProduct($id);
                // $data['product'] = $this->Model_shop_product->getData($id);

                $form_data = array(
                    'category_id' => $this->input->post('category_id'),
                    'item_id' => $this->input->post('item_id'),
                    'sku' => $this->input->post('sku'),
                    'name' => $this->input->post('name'),
                    'slug' => $this->slug->url($this->input->post('name')),
                    'price' => $this->input->post('price'),
                    'tax' => $this->input->post('tax'),
                    'description' => $this->input->post('description'),
                    'variant' => json_encode($this->input->post('variant')),
                    'tag' => $this->input->post('tag'),
                    'allergy' => $this->input->post('allergy'),
                    'seo_title' => $this->input->post('seo_title'),
                    'seo_description' => $this->input->post('seo_description'),
                    'seo_keyword' => $this->input->post('seo_keyword'),
                    'seo_url' => $this->input->post('seo_url'),
                    'delivery_time_start' => $this->input->post('delivery_time_start') ?? '00:00',
                    'delivery_time_end' => $this->input->post('delivery_time_end') ?? '00:00',
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                if (!empty($path)) {
                        $final_name = 'product_' . $id . '.' . strtolower($ext);
                        unlink('./public/uploads/product_photos/' . $data['product']['photo']);
                        unlink('./public/uploads/product_photos/thumbnail/' . $data['product']['photo']);
                        $form_data['photo'] = $final_name;

                        $this->gumlet->crop($path_tmp, './public/uploads/product_photos/' . $final_name, 500, 500);
                        $this->gumlet->crop($path_tmp, './public/uploads/product_photos/thumbnail/' . $final_name, 150, 150);
                        // move_uploaded_file($path_tmp, './public/uploads/product_photos/' . $final_name);
                    }
                    $this->Model_shop_product->update($id, $form_data);

                if (isset($_FILES['photos']["name"]) && isset($_FILES['photos']["tmp_name"])) {
                    $photos = array();
                    $photos = $_FILES['photos']["name"];
                    $photos = array_values(array_filter($photos));

                    $photos_temp = array();
                    $photos_temp = $_FILES['photos']["tmp_name"];
                    $photos_temp = array_values(array_filter($photos_temp));

                    $next_id1 = $this->Model_shop_product->get_auto_increment_id1();
                    foreach ($next_id1 as $row1) {
                        $ai_id1 = $row1['Auto_increment'];
                    }

                    $z = $ai_id1;

                    $m = 0;
                    $final_names = array();
                    for ($i = 0; $i < count($photos); $i++) {

                        $ext = pathinfo($photos[$i], PATHINFO_EXTENSION);
                        $ext_check = $this->Model_common->extension_check_photo($ext);
                        if ($ext_check == FALSE) {
                            // Nothing to do, just skip
                        } else {
                            $final_names[$m] = $z . '.' . strtolower($ext);
                            $this->gumlet->crop($path_tmp, './public/uploads/product_photos/' . $final_names, 500, 500);
                            // move_uploaded_file($photos_temp[$i], "./public/uploads/product_photos/" . $final_names[$m]);
                            $m++;
                            $z++;
                        }
                    }
                }

                for ($i = 0; $i < count($final_names); $i++) {
                    $form_data = array(
                        'product_id' => $id,
                        'category_id' => $this->input->post('category_id'),
                        'photo' => $final_names[$i]
                    );
                    $this->Model_shop_product->add_photos($form_data);
                }

                $success = 'Product is updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/product'));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/product/edit/' . $id));
            }
        } else {

            $data['product'] = $this->Model_shop_product->getSingleProduct($id);
            $data['categories'] = $this->Model_shop_product_category->show();
            $data['variant'] = $this->Model_shop_variant->show();
            $data['tax'] = $this->Model_shop_tax->show();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_shop_product_edit', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_product->product_check($id);
        if (!$tot) {
            redirect(base_url('backend/product'));
        }

        $data['product'] = $this->Model_shop_product->getSingleProduct($id);
        if ($data['product']) {
            unlink('./public/uploads/product_photos/' . $data['product']['photo']);
            unlink('./public/uploads/product_photos/thumbnail/' . $data['product']['photo']);
        }

        $product_photos = $this->Model_shop_product->get_all_photos_by_category_id($id);
        foreach ($product_photos as $row) {
            unlink('./public/uploads/product_photos/' . $row['photo']);
        }

        $this->Model_shop_product->delete($id);

        $success = 'Product is deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/product'));
    }

    public function single_photo_delete($photo_id = 0, $product_id = 0)
    {

        $product_photo = $this->Model_shop_product->product_photo_by_id($photo_id);
        unlink('./public/uploads/product_photos/' . $product_photo['photo']);

        $this->Model_shop_product->delete_product_photo($photo_id);

        redirect(base_url() . 'backend/shop/product/edit/' . $product_id);
    }

    public function api(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, OPTIONS, POST, GET, PUT");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        echo json_encode(array('products' =>$this->Model_shop_product->show()));
    }
}
