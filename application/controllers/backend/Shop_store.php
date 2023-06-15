<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop_store extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect(base_url('backend/account/logout'));
        }

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_shop_store');

        // $data['setting'] = $this->Model_common->get_setting_data();

        // if (!in_array($this->session->userdata('role'), ['Administrator'])) {
        //     if ($data['setting']['website_status_backend'] === "Passive") {
        //         $data['message'] = $data['setting']['website_status_backend_message'];
        //         redirect(base_url('backend/info'));
        //     }
        // }

        $this->load->library('slug');
        $this->load->library('tinify');

        // ini_set('post_max_size', '256M');
        // ini_set('upload_max_filesize', '256M');
    }

    public function index()
    {
        $data['setting'] = $this->Model_common->all_setting();
        $data['store'] = $this->Model_shop_store->show();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
        $this->load->view('backend/view_header');
        $this->load->view('backend/view_shop_store', $data);
        $this->load->view('backend/view_footer');
    }

    public function add()
    {
        $error = '';
        $success = '';

        if (isset($_POST['store_add'])) {
            $valid = 1;
            $store_name = $this->slug->url($this->input->post('name'));
            // $this->form_validation->set_rules('name', 'Store name', 'trim|required');
            // $this->form_validation->set_rules('max_limit', 'Max Limit', 'trim|numeric|required');

            // if ($this->form_validation->run() == FALSE) {
            //     $valid = 0;
            //     $error .= validation_errors();
            // }

            // echo '<pre>';
            // print_r($_FILES);
            // exit;


            if ($_FILES['logo']['size'] > 1) {
                $this->upload($_FILES['logo'], $store_name, 'logo', 415, 320);
                $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $file_name = 'logo.' . strtolower($ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                } else {
                    $logo = $file_name;
                }
            }

            if ($_FILES['favicon']['size'] > 1) {
                $this->upload($_FILES['favicon'], $store_name, 'favicon', 16, 16);
                $ext = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
                $file_name = 'favicon.' . strtolower($ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                } else {
                    $favicon = $file_name;
                }
            }

            if ($_FILES['photo']['size'] > 1) {
                $this->upload($_FILES['photo'], $store_name, 'photo', 415, 320);
                $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $file_name =  'photo.' . strtolower($ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                } else {
                    $photo = $file_name;
                }
            }

            if ($valid == 1) {

                $form_data = array(
                    'name' => $this->input->post('name'),
                    'slug' => $store_name,
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'fax' => $this->input->post('fax'),
                    'street' => $this->input->post('street'),
                    'street_number' => $this->input->post('street_number'),
                    'postcode' => $this->input->post('postcode'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'description' => $this->input->post('description'),
                    'logo' => $logo ?? '',
                    'favicon' => $favicon ?? '',
                    'photo' => $photo ?? '',
                    'working_hours' => $this->input->post('working_hours'),
                    'theme' => $this->input->post('theme'),
                    'seo_title' => $this->input->post('seo_title'),
                    'seo_keyword' => $this->input->post('seo_keyword'),
                    'seo_description' => $this->input->post('seo_description'),
                    'seo_url' => $this->input->post('seo_url'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                $this->Model_shop_store->add($form_data);

                $success = 'Store has been added successfully!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-store'));
            } else {
                redirect(base_url('backend/shop-store/add'));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);

            $this->load->view('backend/view_header');
            $this->load->view('backend/view_shop_store_add', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function edit($id)
    {
        $error = '';
        $success = '';

        $data['store'] = $this->Model_shop_store->getSingleStore($id);

        if (isset($_POST['store_update'])) {
            $valid = 1;
            $store_name = $this->slug->url($this->input->post('name'));
            // $this->form_validation->set_rules('name', 'Store name', 'trim|required');
            // $this->form_validation->set_rules('max_limit', 'Max Limit', 'trim|numeric|required');

            // if ($this->form_validation->run() == FALSE) {
            //     $valid = 0;
            //     $error .= validation_errors();
            // }

            // echo '<pre>';
            // print_r($_FILES);
            // exit;


            if ($_FILES['logo']['size'] > 1) {
                $this->upload($_FILES['logo'], $store_name, 'logo', 415, 320);
                $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $file_name = 'logo.' . strtolower($ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                } else {
                    $logo = $file_name;
                }
            }

            if ($_FILES['favicon']['size'] > 1) {
                $this->upload($_FILES['favicon'], $store_name, 'favicon', 32, 32);
                $ext = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
                $file_name = 'favicon.' . strtolower($ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                } else {
                    $favicon = $file_name;
                }
            }

            if ($_FILES['photo']['size'] > 1) {
                $this->upload($_FILES['photo'], $store_name, 'photo', 415, 320);
                $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $file_name =  'photo.' . strtolower($ext);
                $ext_check = $this->Model_common->extension_check_photo($ext);
                if ($ext_check == FALSE) {
                    $valid = 0;
                    $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
                } else {
                    $photo = $file_name;
                }
            }

            if ($valid == 1) {

                $form_data = array(
                    'name' => $this->input->post('name'),
                    'slug' => $store_name,
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'fax' => $this->input->post('fax'),
                    'street' => $this->input->post('street'),
                    'street_number' => $this->input->post('street_number'),
                    'postcode' => $this->input->post('postcode'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'description' => $this->input->post('description'),
                    'logo' => $logo ?? $data['store']['logo'],
                    'favicon' => $favicon ?? $data['store']['favicon'],
                    'photo' => $photo ?? $data['store']['photo'],
                    'working_hours' => $this->input->post('working_hours'),
                    'theme' => $this->input->post('theme'),
                    'seo_title' => $this->input->post('seo_title'),
                    'seo_keyword' => $this->input->post('seo_keyword'),
                    'seo_description' => $this->input->post('seo_description'),
                    'seo_url' => $this->input->post('seo_url'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );

                $this->Model_shop_store->update($id, $form_data);

                $success = 'Store has been updated successfully!';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/shop-store'));
            } else {
                redirect(base_url('backend/shop-store/edit/' . $id));
            }
        } else {
            $data['setting'] = $this->Model_common->all_setting();

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header');
            $this->load->view('backend/view_shop_store_edit', $data);
            $this->load->view('backend/view_footer');
        }
    }

    public function delete($id)
    {
        $tot = $this->Model_shop_store->store_check($id);
        if (!$tot) { redirect(base_url('backend/shop-store'));}

        $data['store'] = $this->Model_shop_store->getSingleStore($id);
        if ($data['store']) {
            system("rm -rf ".escapeshellarg('./public/uploads/store/' . $data['store']['slug']));
        }

        $this->Model_shop_store->delete($id);

        $success = 'Store has been deleted successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/shop-store'));
    }

    public function upload($file, $store_name, $field, $width, $height)
	{
		$message = 'Access denied!';
		if (isset($file)) {

			$this->load->library('gumlet');
        	$this->load->library('tinify');


			$valid = 1;
			$path = $file['name'];
			$path_tmp = $file['tmp_name'];

			if (!empty($path)) {
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				$file_name = basename($path, '.' . $ext);
				$ext_check = $this->Model_common->extension_check_photo($ext);
				if ($ext_check == FALSE) {
					$valid = 0;
					$message = 'You must have to upload jpg, jpeg, gif or png file<br>';
				}
			} else {
				$valid = 0;
				$message = 'You must have to select a photo<br>';
			}
			if ($valid == 1) {
				// updating the data
				$final_name = $field . '.' . $ext;

                $store_folder = './public/uploads/store/' . $store_name;
                if (!file_exists($store_folder)) {
                    mkdir($store_folder, 0755, true);
                }

                if(strtolower($ext === "svg")) {
					move_uploaded_file($path_tmp, $store_folder . '/' . $final_name);
                } else {
                    $this->gumlet->crop($path_tmp, $store_folder . '/' . $final_name, $width, $height);
                }

				return json_encode(array('valid' => $valid, 'field' => $final_name, 'message' => 'Photo has been uplaoded successfully!'));
			} else {
				return json_encode(array('valid' => $valid, 'field' => $final_name, 'message' => $message));
			}
		}
	}
}
