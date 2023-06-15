<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    private $checkSession;

    function __construct()
    {
        parent::__construct();

        $this->load->model('backend/Model_common');
        $this->load->model('backend/Model_customer');

        $this->load->library('gumlet');
        // $this->load->library('tinify');

        $this->checkSession();
        // if($this->router->fetch_method() !== "logout")

    }

    public function index(){
        !$this->checkSession ? redirect(base_url('backend/account/logout')) : null;
        $data['setting'] = $this->Model_common->all_setting();
        $data['customer'] = $this->Model_customer->getAllCustomer();

        $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
        $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);

        $this->load->view('backend/view_header', $data);
        $this->load->view('backend/view_customer',$data);
        $this->load->view('backend/view_footer', $data);
    }

    public function edit($id)
    {
        !$this->checkSession ? redirect(base_url('backend/account/logout')) : null;
        $valid = 1;
        $data['customer'] = $this->Model_customer->getCustomerById($id);

        if(isset($_POST['customer_update'])){
            $form_data = array(
                "firstname" => $this->input->post('firstname'),
                "lastname" => $this->input->post('lastname'),
                "email" => $this->input->post('email'),
                "phone" => $this->input->post('phone'),
                'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
            );

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];


		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'You must have to select a photo for featured photo<br>';
		    }

		    if($valid == 1) {
		        $final_name = $id.'.'.strtolower($ext);

                unlink('./public/uploads/product_photos/' . $data['product']['photo']);
                unlink('./public/uploads/product_photos/thumbnail/' . $data['product']['photo']);
                $form_data['photo'] = $final_name;
                $this->gumlet->crop($path_tmp, './public/uploads/customer/' . $final_name, 500, 500);
                $this->gumlet->crop($path_tmp, './public/uploads/customer/thumbnail/' . $final_name, 150, 150);
		    }

            $this->Model_customer->updateCustomer($id,$form_data);

            $this->session->set_flashdata('success', 'Customer has been updated successfully!');
            redirect(base_url('backend/customer/edit/'.$id));
        } else {
            $data['setting'] = $this->Model_common->all_setting();
            $data['customer'] = $this->Model_customer->getCustomerById($id);
            $data['customer_address'] = $this->Model_customer->customer_address($id);

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_customer_edit',$data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function customer_address_add($customer_id)
    {

        $data['setting'] = $this->Model_common->all_setting();
        $error = '';
        $success = '';

        if (isset($_POST['add_customer_address'])) {
            $valid = 1;

            if ($valid == 1) {
                $form_data = array(
                    'customer_id' => $customer_id,
                    'title' => $this->input->post('title'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'street' => $this->input->post('street'),
                    'street_no' => $this->input->post('street_no'),
                    'postcode' => $this->input->post('postcode'),
                    'phone' => $this->input->post('phone'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );
                $this->Model_customer->add_customer_address($form_data);

                $success = 'Customer Address has been insert successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/customer/edit/' . $customer_id));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/customer/edit/' . $customer_id));
            }
        } else {

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $data['customer_id'] = $customer_id;
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_customer_address_add');
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function customer_address_delete($id, $customer_id)
    {
        $tot = $this->Model_customer->check_customer_address($id, $customer_id);
        if (!$tot) { redirect(base_url('backend/customer/edit/'.$customer_id));}

        $this->Model_customer->delete_customer_address($id);

        $success = 'Customer Adress has been delete successfully';
        $this->session->set_flashdata('success', $success);
        redirect(base_url('backend/customer/edit/'.$customer_id));
    }

    public function customer_address($id, $customer_id)
    {
        // If there is no product in this id, then redirect
        $tot = $this->Model_customer->check_customer_address($id, $customer_id);

        if (!$tot) {  redirect(base_url('backend/customer/edit/'.$customer_id)); }

        $data['setting'] = $this->Model_common->all_setting();
        $error = '';
        $success = '';


        if (isset($_POST['add_customer_address'])) {
            $valid = 1;

            if ($valid == 1) {
                $form_data = array(
                    'customer_id' => $customer_id,
                    'title' => $this->input->post('title'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'street' => $this->input->post('street'),
                    'street_no' => $this->input->post('street_no'),
                    'postcode' => $this->input->post('postcode'),
                    'phone' => $this->input->post('phone'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );
                $this->Model_customer->add_customer_address($form_data);

                $success = 'Customer Address has been updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/customer/edit/' . $customer_id));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/customer/edit/' . $customer_id));
            }
        } if (isset($_POST['update_customer_address'])) {
            $valid = 1;

            if ($valid == 1) {
                $form_data = array(
                    'title' => $this->input->post('title'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'street' => $this->input->post('street'),
                    'street_no' => $this->input->post('street_no'),
                    'postcode' => $this->input->post('postcode'),
                    'phone' => $this->input->post('phone'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'status' => $this->input->post('status') == NULL ? 'Passive' : 'Active'
                );
                $this->Model_customer->update_customer_address($id, $customer_id, $form_data);

                $success = 'Customer Address has been updated successfully';
                $this->session->set_flashdata('success', $success);
                redirect(base_url('backend/customer/edit/' . $customer_id));
            } else {
                $this->session->set_flashdata('error', $error);
                redirect(base_url('backend/customer/edit/' . $customer_id));
            }
        } else {

            $data['customer_address'] = $this->Model_customer->check_customer_address($id, $customer_id);

            $data['page_header'] = $this->load->view('backend/view_page_header', $data, true);
            $data['sidebar'] = $this->load->view('backend/view_sidebar', $data, true);
            $this->load->view('backend/view_header', $data);
            $this->load->view('backend/view_customer_address_edit', $data);
            $this->load->view('backend/view_footer', $data);
        }
    }

    public function checkSession()
    {
        if ($this->session->userdata('id')) {
            $this->checkSession = true;
        } else {
            $this->checkSession = false;
        }
    }
}
