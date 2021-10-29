<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sell_model extends CI_Model
{

	public function getCategorypro()
	{

    $this->db->select('*');
    $this->db->from('product_category');
    $this->db->order_by('prod_cat_display_order','ASC');
    $query = $this->db->get();
    return $query->result();
	}


    public function getSubCategory()
	{

    $this->db->select('*');
    $this->db->from('product_sub_category');
    $this->db->where('pro_sub_cat_status',1);
    $query = $this->db->get();
    return $query->result();
	}


    public function getSubCat_prod($id)
	{

    $this->db->select('*');
    $this->db->from('product_sub_category');
    $this->db->where('pro_sub_cat_id',$id);
    $query = $this->db->get();
    return $query->result();
	}


    public function getlocationlist()
	{

    $this->db->select('*');
    $this->db->from('locations');
    $query = $this->db->get();
    return $query->result();
	}


    public function subscriptionTable($user_id)
    {
    $this->db->select('*');
    $this->db->from('tbl_payment');
    $this->db->join('subscription','subscription.subp_id = tbl_payment.pay_sub_fk');
    $this->db->where('pay_user_fk',$user_id);
    $query = $this->db->get();
    return $query->result();
    }


    public function adsTableCount($user_id)
    {
    $this->db->select('*');
    $this->db->from('subscription');
    $this->db->join('tbl_ads_post','tbl_ads_post.post_sub_fk = subscription.subp_id');
    $this->db->where('tbl_ads_post.post_user_fk',$user_id); 
    $query = $this->db->get();
    return $query->result();   
    }

    public function paymentDetails($user_id)
    {
    //Check if user is subcribed or not
    //this function is created to give validation for free users
    $this->db->select('*');
    $this->db->from('tbl_payment');
    $this->db->where('pay_user_fk',$user_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0){
        return TRUE;
    }
    else{
        return FALSE;
    }
    }

    public function freeusersTable()
    {
    $this->db->select('*');
    $this->db->from('subscription');
    $this->db->where('subp_name','Free');
    $query = $this->db->get();
    return $query->result();   
    }

    public function freeuserpostCount($user_id)
    {
    $this->db->select('*');
    $this->db->from('tbl_ads_post');
    $this->db->where('post_user_fk',$user_id);
    $query = $this->db->get();
    return $query->result();   
    }

    public function ProdlistTable($id)
    {
        $this->db->select('*');
        $this->db->from('product_list');
        $this->db->where('pro_list_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function productMultipleImage($id)
    {
        $this->db->select('proli_img_id,proli_img_name');
        $this->db->from('productlist_images');
        $this->db->where('proli_img_list_fk',$id);
        $query = $this->db->get();
        return $query->result();
    }
}
