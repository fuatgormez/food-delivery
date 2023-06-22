<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model 
{

    function get_all_customer() {
        $sql = "SELECT * FROM tbl_shop_customer";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_customer_data ($id)
    {
        $sql = "SELECT * FROm tbl_shop_customer WHERE id = ?";
        $query = $this->db->query($sql, $id);
        return $query->first_row('array');
    }

    function user_check($id)
    {
        $sql = 'SELECT * FROM tbl_shop_customer WHERE id=?';
        $query = $this->db->query($sql,$id);
        return $query->first_row();
    }

    function check_phone($phone)
	{
        $where = array(
            'phone' => $phone
		);
		$this->db->select('*');
		$this->db->from('tbl_shop_customer');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
    }
    
    function check_email($email)
	{
        $where = array(
            'email' => $email
		);
		$this->db->select('*');
		$this->db->from('tbl_shop_customer');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    function check_password($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_customer');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }
    
    function getCustomerById($id)
    {
        $sql = 'SELECT * FROM tbl_shop_customer WHERE id=?';
        $query = $this->db->query($sql, $id);
        return $query->first_row('array');
    }

    function add($data) {
        $this->db->insert('tbl_shop_customer', $data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id', $id);
        $this->db->update('tbl_shop_customer', $data);
    }

    function update_password($phone, $data) {
        $this->db->where('phone', $phone);
        $this->db->update('tbl_shop_customer', $data);
    }
    
    function verify_phone($phone, $data) {
        $this->db->where('phone', $phone);
        $this->db->update('tbl_shop_customer', $data);
    }

    public function get_address($id)
    {
        $where = array('id' => $id);
		$this->db->select('*');
		$this->db->from('tbl_shop_customer_address');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->first_row('array');
    }

    public function address($customer_id)
    {
        $where = array('customer_id' => $customer_id );
		$this->db->select('*');
		$this->db->from('tbl_shop_customer_address');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
    }

    function add_address($data) {
        $this->db->insert('tbl_shop_customer_address',$data);
        return $this->db->insert_id();
    }

    function update_address($id, $data)
    {
        $this->db->where(array('id' => $id));
        $this->db->update('tbl_shop_customer_address', $data);
        return $this->db->affected_rows();
    }

    function delete_address($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_customer_address');
    }

    function check_address($id, $customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_customer_address');
        $this->db->where(array('id' => $id , 'customer_id' => $customer_id));
        $query = $this->db->get();
        return $query->first_row('array');
    }
}