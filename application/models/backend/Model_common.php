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

    public function extension_check_photo($ext)
    {
        if (in_array($ext, ['ico','ICO','jpg','JPG','png','PNG','jpeg','JPEG','gif','GIF','svg','SVG'])) {
            return true;
        } else {
            return false;
        }
    }

    public function extension_check_video($ext)
    {
        if ($ext != 'webm' && $ext != 'mkv' && $ext != 'flv' && $ext != 'ogv' && $ext != 'ogg' && $ext != 'mng' && $ext != 'avi' && $ext != 'mov' && $ext != 'wmv' && $ext != 'mp4' && $ext != 'mpeg') {
            return false;
        } else {
            return true;
        }
    }
}
