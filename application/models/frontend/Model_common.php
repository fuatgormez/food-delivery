<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_common extends CI_Model
{
    public function getUser()
    {
        $query = $this->db->query("SELECT * FROM tbl_user");
        return $query->result_array();
    }

    public function all_setting()
    {
        $query = $this->db->query("SELECT * FROM tbl_setting WHERE id=1");
        return $query->first_row('array');
    }
    
    public function email_configuration()
    {
        $query = $this->db->query("SELECT * FROM tbl_email_configuration WHERE id=1");
        return $query->first_row('array');
    }

    public function all_store()
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_store');
        $this->db->where('status', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSingleStore($id)
    {
        $sql = "SELECT * FROM tbl_shop_store WHERE id=?";
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    public function extension_check_photo($ext)
    {
        if (in_array($ext, ['ico','ICO','jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF','svg','SVG'])) {
            return true;
        } else {
            return false;
        }
    }
}
