<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop_product extends CI_Model
{

    function get_auto_increment_id(){
        $sql = "SHOW TABLE STATUS LIKE 'tbl_shop_product'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $this->db->select("*");
        $this->db->from('tbl_shop_product');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_all_photos_by_category_id($id){
        $this->db->select("*");
        $this->db->from('tbl_shop_product');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_product_category() {
        $this->db->select("*");
        $this->db->from('tbl_shop_product_category');

        $query = $this->db->get();
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_shop_product',$data);
        return $this->db->insert_id();
    }

    function add_photos($data) {
        $this->db->insert('tbl_shop_product_photo',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_shop_product',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_product');
    }

    function get_all_product() {

        $this->db->select("*");
        $this->db->from('tbl_shop_product');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_all_product_with_item_id($id) {

        $this->db->select("item_id");
        $this->db->from('tbl_shop_product');
        $this->db->where('item_id',$id);

        $query = $this->db->get();
        return $query->first_row();

    }

    function getSingleProduct($id)
    {
        $sql = "SELECT * FROM tbl_shop_product WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function getSingleProductLang($id)
    {
        $sql = "SELECT * FROM tbl_shop_product WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    function product_check($id)
    {
        $sql = "SELECT * FROM tbl_shop_product WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function product_photo_by_id($id)
    {
        $sql = 'SELECT * FROM tbl_shop_product_photo WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function delete_product_photo($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_product_photo');
    }
}