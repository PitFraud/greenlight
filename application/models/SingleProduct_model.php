<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SingleProduct_model extends CI_Model
{

	public function getProductPageList($pro_list_id)
	{

    // $this->db->select('product_list.pro_list_name ,product_list.pro_list_details ,product_list.prod_list_price_original ,product_list.pro_list_dicount_price ,product_list.pro_list_stock ,product_list.pro_list_img ,productlist_images.proli_img_name, product_sub_category.pro_sub_cat_name, users.first_name, productlist_review.prolist_re_comment');
    $this->db->select('*');
    // $this->db->join('productlist_images','productlist_images.proli_img_list_fk = product_list.pro_list_id');
    // $this->db->join('product_sub_category', 'product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    // $this->db->join('users', 'users.id = product_list.user_id');
    // $this->db->join('productlist_review', 'productlist_review.prolist_re_pro_fk = product_list.pro_list_id');
    // $this->db->join('prolist_reply', 'prolist_reply.prolist_rp_list_fk = product_list.pro_list_id');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $this->db->from('product_list');

    $this->db->where('pro_list_id',$pro_list_id);
    $query = $this->db->get();
    return $query->result();
	}




    public function getUsersList()
	{

    // $this->db->select('product_list.pro_list_name ,product_list.pro_list_details ,product_list.prod_list_price_original ,product_list.pro_list_dicount_price ,product_list.pro_list_stock ,product_list.pro_list_img ,productlist_images.proli_img_name, product_sub_category.pro_sub_cat_name, users.first_name, productlist_review.prolist_re_comment');
    $this->db->select('*');
    $this->db->join('user_profile_img','user_profile_img.user_id_fk = users.id');
    $this->db->from('users');

    $query = $this->db->get();
    return $query->result();
	}


    public function getProductCategory()
	{

    $this->db->select('*');
    $this->db->from('product_category');

    $query = $this->db->get();
    return $query->result();
	}


    public function getProSubCategory()
	{

    $this->db->select('*');
    $this->db->from('product_sub_category');

    $query = $this->db->get();
    return $query->result();
	}


    public function getReview()
	{

    $this->db->select('*');
    $this->db->join('users','users.id = productlist_review.prolist_re_usr_id');
    $this->db->join('user_profile_img','user_profile_img.user_id_fk = productlist_review.prolist_re_usr_id');
    $this->db->from('productlist_review');

    $query = $this->db->get();
    return $query->result();
	}


    public function getReply()
	{

    $this->db->select('*');
    $this->db->join('users','users.id = prolist_reply.prolist_rp_user_id');
    $this->db->join('user_profile_img','user_profile_img.user_id_fk = prolist_reply.prolist_rp_user_id');
    $this->db->from('prolist_reply');

    $query = $this->db->get();
    return $query->result();
	}

    public function getMultImage()
	{

    $this->db->select('*');
    $this->db->from('productlist_images');

    $query = $this->db->get();
    return $query->result();
	}


    public function getRelatedProducts()
	{

    $this->db->select('*');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $this->db->limit(4);
    $this->db->from('product_list');

    $query = $this->db->get();
    return $query->result();
	}

    public function getValidRating($user_id,$prod_id)
	{

    $this->db->select('*');
    $this->db->from('pro_list_star_rating');
    $this->db->where('user_fk',$user_id);
    $this->db->where('prod_list_fk',$prod_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
	}

    public function getStarRating($pro_list_id = 66){

    $data = "SELECT * , COUNT(prod_list_star_rating) AS product_star, SUM(prod_list_star_rating) / COUNT(prod_list_star_rating) AS average_rating FROM pro_list_star_rating WHERE prod_list_fk = $pro_list_id GROUP BY prod_list_fk";
    $querys = $this->db->query($data);
    return $querys->result();

	}

	public function getProductDetails($product_id){
		$query=$this->db->select('*')->where("pro_list_id",$product_id)->get('product_list');
		$records=$query->result();
		return $records[0];
	}

}
