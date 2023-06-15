<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop_tax extends CI_Model
{

    function get_auto_increment_id(){
        $sql = "SHOW TABLE STATUS LIKE 'tbl_shop_tax'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $this->db->select("*");
        $this->db->from('tbl_shop_tax');

        $query = $this->db->get();
        return $query->result_array();

    }

    function add($data) {
        $this->db->insert('tbl_shop_tax', $data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_shop_tax', $data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_tax');
    }

    function get_all_tax() {

        $this->db->select("*");
        $this->db->from('tbl_shop_tax');

        $query = $this->db->get();
        return $query->result_array();

    }

    function getSingleShopTax($id)
    {
        $sql = "SELECT * FROM tbl_shop_tax WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function shop_tax_check($id)
    {
        $sql = "SELECT * FROM tbl_shop_tax WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}