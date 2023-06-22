<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_product extends CI_Model
{
    public function all_product_category(?int $limit = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_product_category');
        $this->db->where('status', 'Active');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function all_product(?int $limit = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop_product');
        $this->db->where('status', 'Active');
        $this->db->where('block_the_sale', 'No');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }

    //action urunleri shop ta gosterilmiyor 
    public function all_product_action($data = 'de', $land_id = 16) //landid default 16 deutschland
    {
        $sql = "SELECT * 
				FROM tbl_shop_product t1
				JOIN tbl_shop_product_lang t2
				ON t1.id = t2.product_id
				WHERE t2.lang_code = ? AND t2.land_id = ? AND t1.status = ?
                ORDER BY t1.row";
        $query = $this->db->query($sql, array($data, $land_id, 'Show'));
        return $query->result_array();
    }

    function product_check($id, $lang = "de")
    {
        $sql = "SELECT * 
                FROM tbl_shop_product t1
                JOIN tbl_shop_product_lang t2
                ON t1.id = t2.product_id
                JOIN tbl_shop_product_category t3
                ON t3.category_id = t1.category_id
                JOIN tbl_shop_product_category_lang t4
                ON t4.product_category_id = t3.category_id
                WHERE t1.id = ? AND t2.lang_code = ? AND t4.lang_code = ?";

        $query = $this->db->query($sql, array($id, $lang, $lang));
        return $query->first_row('array');
    }

    function get_single_product($product_id, $lang = "de")
    {
        $sql = "SELECT * 
                FROM tbl_shop_product t1
                JOIN tbl_shop_product_lang t2
                ON t1.id = t2.product_id
                JOIN tbl_shop_product_category t3
                ON t3.category_id = t1.category_id
                JOIN tbl_shop_product_category_lang t4
                ON t4.product_category_id = t3.category_id
                WHERE t1.id = ? AND t2.lang_code = ? AND t4.lang_code = ?";

        $query = $this->db->query($sql, array($product_id, $lang, $lang));
        return $query->first_row('array');
    }

    function get_single_product_photo($product_id)
    {
        $sql = "SELECT * FROM tbl_shop_product_photo WHERE product_id = ?";
        $query = $this->db->query($sql, array($product_id));
        return $query->result_array();
    }

    // function product_check($id, $lang="de")
    // {
    //     $sql = "SELECT * 
    //             FROM tbl_shop_product t1
    //             JOIN tbl_shop_product_lang t2
    //             ON t1.id = t2.product_id
    //             WHERE t1.id = ? AND t2.lang_code = ?";

    //     $query = $this->db->query($sql,array($id,$lang));
    //     return $query->first_row('array');
    // }

    function get_product_with_category_id($category_id, $lang = "de")
    {
        $sql = "SELECT * 
                FROM tbl_shop_product t1
                JOIN tbl_shop_product_lang t2
                ON t1.id = t2.product_id
                WHERE t1.category_id = ? AND t2.lang_code = ? AND t1.block_the_sale = ?";

        $query = $this->db->query($sql, array($category_id, $lang, 'Yes'));
        return $query->result_array();
    }

    function get_single_category($category_id, $lang = "de")
    {
        $sql = "SELECT * 
                FROM tbl_shop_product_category t1
                JOIN tbl_shop_product_category_lang t2
                ON t2.product_category_id = t1.category_id
                WHERE t1.category_id = ? AND t1.block_the_sale = ? AND t2.lang_code = ?";
        $query = $this->db->query($sql, array($category_id, 'Yes', $lang));
        return $query->first_row('array');
    }
}
