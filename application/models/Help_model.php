<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Help_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


public function getHelpSearchTable($search_result,$limit,$offset)
    {
        if(empty($search_result)){
            return array();
    }
    
   $this->db->like('pro_sub_cat_name', $search_result);
   $this->db->or_like('pro_list_name', $search_result);
  
   $this->db->limit($limit,$offset);
    
   
    $this->db->join('product_category','product_sub_category.pro_cat_id_fk = product_category.pro_cat_id');
    $this->db->join('product_list','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $query = $this->db->get('product_sub_category');
    // return $str = $this->db->last_query();
    return $query->result();
}


public function numRows()
	{
        $this->db->select('*');
        $this->db->join('product_category','product_sub_category.pro_cat_id_fk = product_category.pro_cat_id');
        $this->db->join('product_list','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
        $query = $this->db->get('product_sub_category');
        return $query->num_rows();
	}
    
}
?>