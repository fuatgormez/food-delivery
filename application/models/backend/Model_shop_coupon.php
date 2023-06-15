<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop_coupon extends CI_Model
{

    function get_auto_increment_id(){
        $sql = "SHOW TABLE STATUS LIKE 'tbl_shop_coupon'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $this->db->select("*");
        $this->db->from('tbl_shop_coupon');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_all_photos_by_category_id($id){
        $this->db->select("*");
        $this->db->from('tbl_shop_coupon');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_coupon_category() {
        $this->db->select("*");
        $this->db->from('tbl_shop_coupon_category');

        $query = $this->db->get();
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_shop_coupon',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_shop_coupon',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_coupon');
    }

    function get_all_coupon() {

        $this->db->select("*");
        $this->db->from('tbl_shop_coupon');

        $query = $this->db->get();
        return $query->result_array();

    }

    function getSinglecoupon($id)
    {
        $sql = "SELECT * FROM tbl_shop_coupon WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function getSinglecouponLang($id)
    {
        $sql = "SELECT * FROM tbl_shop_coupon WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    function coupon_check($id)
    {
        $sql = "SELECT * FROM tbl_shop_coupon WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}