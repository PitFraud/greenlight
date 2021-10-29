<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category_model extends CI_Model
{
/* Get collection of items based on sub category -jishnu*/
	public function getCategoryPageTable($id){
		if(!empty($id)){
			$this->db->select('*');
			$this->db->from('product_list');
			$this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
			$this->db->where('pro_cat_id_fk',$id);
			$query=$this->db->get();
			$result=$query->result();
			return $result;
		}
		else{
			return false;
		}
	}

	public function numRows($id){
		//get number of row for pagination
		$this->db->select('*');
		$this->db->from('product_list');
		$this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
		$this->db->where('pro_cat_id_fk',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}

/*Get all data under index menu category*/
	public function fetch_subcategory_wise_data($category_id){
			$query=$this->db->select('*')
			->join('product_sub_category','product_sub_category.pro_sub_cat_id=product_list.pro_sub_cat_id')
			->where('pro_cat_id_fk',$category_id)
			->get('product_list');
			$records=$query->result();
			return $records;
	}

	public function fetch_all_offers(){
		$query=$this->db->select('*')->get('offers');
		$records=$query->result();
		return $records;
	}

	public function fetch_all_events(){
		$query=$this->db->select('*')->get('tbl_events');
		$records=$query->result();
		return $records;
	}

}
