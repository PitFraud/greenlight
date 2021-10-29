<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SubCategory_model extends CI_Model
{

	public function getSubCategoryPageTable($id,$limit,$offset)
	{

    $this->db->select('*');
    $this->db->from('product_sub_category');
     $this->db->join('product_list','product_list.pro_sub_cat_id = product_sub_category.pro_sub_cat_id');
    $this->db->where('product_sub_category.pro_sub_cat_id',$id);
    $this->db->limit($limit,$offset);
    $query = $this->db->get();
    return $query->result();
    }
    
    public function numRows($id)
	{
        //get number of row for pagination
        $this->db->select('*');
        $this->db->from('product_sub_category');
        $this->db->join('product_list','product_list.pro_sub_cat_id = product_sub_category.pro_sub_cat_id');
        $this->db->where('product_sub_category.pro_sub_cat_id',$id);
        $query = $this->db->get();
        return $query->num_rows();
	}

}
