<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop_product_variant extends CI_Model
{

    function get_auto_increment_id(){
        $sql = "SHOW TABLE STATUS LIKE 'tbl_shop_product_variant'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $this->db->select("*");
        $this->db->from('tbl_shop_product_variant');

        $query = $this->db->get();
        return $query->result_array();

    }

    function add($data) {
        $this->db->insert('tbl_shop_product_variant',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_shop_product_variant',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_product_variant');
    }

    function get_all_product_variant() {

        $this->db->select("*");
        $this->db->from('tbl_shop_product_variant');

        $query = $this->db->get();
        return $query->result_array();

    }

    function getSingleProductVariant($id)
    {
        $sql = "SELECT * FROM tbl_shop_product_variant WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function product_variant_check($id)
    {
        $sql = "SELECT * FROM tbl_shop_product_variant WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}