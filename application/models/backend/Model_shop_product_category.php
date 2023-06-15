<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop_product_category extends CI_Model
{

    function get_auto_increment_id(){
        $sql = "SHOW TABLE STATUS LIKE 'tbl_shop_product_category'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $this->db->select("*");
        $this->db->from('tbl_shop_product_category');

        $query = $this->db->get();
        return $query->result_array();

    }

    function add($data) {
        $this->db->insert('tbl_shop_product_category',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_shop_product_category',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_product_category');
    }

    function getSingleProductCategory($id)
    {
        $sql = "SELECT * FROM tbl_shop_product_category WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function product_category_check($id)
    {
        $sql = "SELECT * FROM tbl_shop_product_category WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

}