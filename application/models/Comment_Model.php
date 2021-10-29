<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_Model extends CI_Model{

	public function __Construct(){
			parent::__Construct();
			$this->load->helper('url');
			// $this->load->model('Comment_Model');
			$this->load->model('Comment_Model');
	}
	/*To insert a comment against an item*/
	public function insertProductComment($product_id,$product_user_id,$product_comment){
		$insert_array=array(
			'cmt_user_id_fk'=>$product_user_id,
			'cmt_product_id_fk'=>intval($product_id),
			'cmt_description'=>$product_comment,
			'updated_at'=>Date('Y-m-dH:i:s'),
		);
		$query=$this->db->insert('tbl_comments',$insert_array);
		return ($query==true) ? true : false;
	}

	public function alterProductComment($comment_id,$product_id,$product_user_id,$product_comment){
		$update_array=array(
			'cmt_user_id_fk'=>$product_user_id,
			'cmt_product_id_fk'=>$product_id,
			'cmt_description'=>$product_comment,
			'updated_at'=>date('Y-m-d H:i:s'),
		);
		$query=$this->db->where('cmt_id',$comment_id)->update($update_array);
		return ($query==true) ? true : false;

	}
/*Get all comments against a product item*/
	public function getSingleItemComments($product_id){
		$query=$this->db->select('*')
		->join('users','users.id=tbl_comments.cmt_user_id_fk')
		->where('cmt_product_id_fk', $product_id)
		->order_by('created_at','DESC')
		->get('tbl_comments');
		$records=$query->result();
		return $records;
	}

}
