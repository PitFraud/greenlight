<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wishlist_model extends CI_Model
{

    public function getWishListTable($user_id,$prolist_id)
    {
        $this->db->select('*');
        $this->db->from('prodlist_wishlist');
        $this->db->where('pro_wish_user_fk',$user_id);
        $this->db->where('pro_wish_prolist_fk',$prolist_id);
        $query = $this->db->get();
        return $query->result();
    }


    public function getProductWishList($user_id)
    {
        $this->db->select('*');
        $this->db->from('prodlist_wishlist');
        $this->db->join('product_list','product_list.pro_list_id = prodlist_wishlist.pro_wish_prolist_fk');
        $this->db->where('pro_wish_user_fk',$user_id);
        $query = $this->db->get();
        return $query->result();
    }
   
    
    
}
