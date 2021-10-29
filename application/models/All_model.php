<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class All_model extends CI_Model
{

	public function getSubCategoryPageTable($limit,$offset)
	{

    $this->db->select('*');
    $this->db->from('product_sub_category');
     $this->db->join('product_list','product_list.pro_sub_cat_id = product_sub_category.pro_sub_cat_id');
    $this->db->limit($limit,$offset);
    $query = $this->db->get();
    return $query->result();
    }
    
    public function numRows()
	{
        //get number of row for pagination
        $this->db->select('*');
        $this->db->from('product_sub_category');
        $this->db->join('product_list','product_list.pro_sub_cat_id = product_sub_category.pro_sub_cat_id');
        $query = $this->db->get();
        return $query->num_rows();
	}

}
