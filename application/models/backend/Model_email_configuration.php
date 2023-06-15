<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_email_configuration extends CI_Model
{

    function get_auto_increment_id(){
        $sql = "SHOW TABLE STATUS LIKE 'tbl_email_configuration'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $this->db->select("*");
        $this->db->from('tbl_email_configuration');

        $query = $this->db->get();
        return $query->result_array();

    }

    function add($data) {
        $this->db->insert('tbl_email_configuration',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_email_configuration',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_email_configuration');
    }

    function get_all_email_configuration() {

        $this->db->select("*");
        $this->db->from('tbl_email_configuration');

        $query = $this->db->get();
        return $query->result_array();

    }

    function getSingleEmailConfiguration($id)
    {
        $sql = "SELECT * FROM tbl_email_configuration WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function email_configuration_check($id)
    {
        $sql = "SELECT * FROM tbl_email_configuration WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}