<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_customer extends CI_Model
{
    function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_shop_customer'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getAllCustomer()
    {
        $query = $this->db->query("SELECT * FROM tbl_shop_customer");
        return $query->result_array();
    }

    public function getCustomerById($id){
        $sql = "SELECT * FROM tbl_shop_customer WHERE id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->first_row('array');
    }

    function updateCustomer($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_shop_customer', $data);
        return $this->db->affected_rows();
    }

    function checkPhone($phone)
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

    function checkPassword($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_customer');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    public function customer_address($customer_id)
    {
        $where = array('customer_id' => $customer_id );
		$this->db->select('*');
		$this->db->from('tbl_shop_customer_address');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result_array();
    }

    function add_customer_address($data) {
        $this->db->insert('tbl_shop_customer_address',$data);
        return $this->db->insert_id();
    }

    function update_customer_address($id, $customer_id, $data)
    {
        $this->db->where(array('id' => $id, 'customer_id' => $customer_id));
        $this->db->update('tbl_shop_customer_address', $data);
        return $this->db->affected_rows();
    }

    function delete_customer_address($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_customer_address');
    }

    function check_customer_address($id, $customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_customer_address');
        $this->db->where(array('id' => $id , 'customer_id' => $customer_id));
        $query = $this->db->get();
        return $query->first_row('array');
    }
}
