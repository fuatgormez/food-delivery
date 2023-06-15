<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_shop_store extends CI_Model
{

    function get_auto_increment_id(){
        $sql = "SHOW TABLE STATUS LIKE 'tbl_shop_store'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $this->db->select("*");
        $this->db->from('tbl_shop_store');

        $query = $this->db->get();
        return $query->result_array();

    }

    function get_all_photos_by_category_id($id){
        $this->db->select("*");
        $this->db->from('tbl_shop_store');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_store_category() {
        $this->db->select("*");
        $this->db->from('tbl_shop_store_category');

        $query = $this->db->get();
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_shop_store',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_shop_store',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_shop_store');
    }

    function get_all_store() {

        $this->db->select("*");
        $this->db->from('tbl_shop_store');

        $query = $this->db->get();
        return $query->result_array();

    }

    function getSingleStore($id)
    {
        $sql = "SELECT * FROM tbl_shop_store WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function getSingleStoreLang($id)
    {
        $sql = "SELECT * FROM tbl_shop_store WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->result_array();
    }

    function store_check($id)
    {
        $sql = "SELECT * FROM tbl_shop_store WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}