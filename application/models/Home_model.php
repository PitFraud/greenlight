<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_Model extends CI_Model
{

	public function getBannerImage()
	{

    $this->db->select('*');
    $this->db->from('frnt_banner');
    $this->db->order_by('ban_seq','asc');
    $query = $this->db->get();
    return $query->result();
	}

    public function getProscroImage()
    {

    $this->db->select('*');
    $this->db->from('frnt_product_scroll');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = frnt_product_scroll.prosco_link_psc_fk');
    $this->db->order_by('proscro_display_ord','asc');
    $query = $this->db->get();
    return $query->result();
    }

    public function getLocationDetails()
    {

    $this->db->select('*');
    $this->db->from('locations');
    $this->db->order_by('loc_city_name','asc');
    $query = $this->db->get();
    return $query->result();
    }

    public function getMenuCategory()
    {

    $this->db->select('*');
    $this->db->from('frnt_menu_cat');
    $this->db->order_by('menu_cat_order','asc');
    $query = $this->db->get();
    return $query->result();
    }

    public function getMenuHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_menu');
    $this->db->order_by('menu_display_order','asc');
    $query = $this->db->get();
    return $query->result();
    }

    public function getSubMenuHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_sub_menu');
    // $this->db->order_by('menu_display_order','asc');
    $query = $this->db->get();
    return $query->result();
    }


    public function getHotDealsHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_hot_deals');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = frnt_hot_deals.deal_psc_fk');
    $this->db->order_by('deal_disp_order','asc');
    $query = $this->db->get();
    return $query->result();
    }


    public function getSuperDealsHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_super_deals');
    $query = $this->db->get();
    return $query->result();
    }


    public function getSpecialOffersHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_special_offer');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = frnt_special_offer.spoff_psc_fk');
    $query = $this->db->get();
    return $query->result();
    }

    public function getDODHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_deal_of_day');
    $this->db->limit(12);
    $query = $this->db->get();
    return $query->result();
    }

    public function getProductList()
    {

    $this->db->select('product_list.pro_list_id, product_list.pro_sub_cat_id, product_list.pro_list_name, product_list.pro_list_details, product_list.prod_list_price_original, product_list.pro_list_dicount_price, product_list.pro_list_stock, product_list.pro_list_status, product_list.pro_list_enter_date, product_list.pro_list_img, product_sub_category.pro_sub_cat_name');
    $this->db->from('product_list');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $query = $this->db->get();
    return $query->result();
    }

    public function getProductListFooter()
    {

    $this->db->select('product_list.pro_list_id, product_list.pro_sub_cat_id, product_list.pro_list_name, product_list.pro_list_details, product_list.prod_list_price_original, product_list.pro_list_dicount_price, product_list.pro_list_stock, product_list.pro_list_status, product_list.pro_list_enter_date, product_list.pro_list_img, product_sub_category.pro_sub_cat_name, product_category.prod_cat_name');
    $this->db->from('product_list');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $this->db->join('product_category','product_category.pro_cat_id = product_sub_category.pro_cat_id_fk');
    $query = $this->db->get();
    return $query->result();
    }

    public function getProductjsonFooter($id)
    {

    $this->db->select('product_list.pro_list_id, product_list.pro_sub_cat_id, product_list.pro_list_name, product_list.pro_list_details, product_list.prod_list_price_original, product_list.pro_list_dicount_price, product_list.pro_list_stock, product_list.pro_list_status, product_list.pro_list_enter_date, product_list.pro_list_img, product_sub_category.pro_sub_cat_name, product_category.prod_cat_name');
    $this->db->from('product_list');
    $this->db->where('pro_list_id ',$id);
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $this->db->join('product_category','product_category.pro_cat_id = product_sub_category.pro_cat_id_fk');
    $query = $this->db->get();
    return $query->result();
    }


    public function getLatestProduct()
    {

    $this->db->select('product_list.pro_list_id, product_list.pro_sub_cat_id, product_list.pro_list_name, product_list.pro_list_details, product_list.prod_list_price_original, product_list.pro_list_dicount_price, product_list.pro_list_stock, product_list.pro_list_status, product_list.pro_list_enter_date, product_list.pro_list_img, product_sub_category.pro_sub_cat_name');
    $this->db->from('product_list');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $query = $this->db->get();
    return $query->result();
    }


    public function getLagestProdHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_latest_product');
    $this->db->limit(8);
    $query = $this->db->get();
    return $query->result();
    }


    public function getVariousProdList(){

    $this->db->select('product_list.pro_list_id, product_list.pro_sub_cat_id, product_list.pro_list_name, product_list.pro_list_details, product_list.prod_list_price_original, product_list.pro_list_dicount_price, product_list.pro_list_stock, product_list.pro_list_status, product_list.pro_list_enter_date, product_list.pro_list_img, product_sub_category.pro_sub_cat_name');
    $this->db->from('product_list');
    $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
    $query = $this->db->get();
    return $query->result();
    }


    public function getVariousProdHome()
    {

    $this->db->select('*');
    $this->db->from('frnt_various_product');
    $this->db->limit(8);
    $query = $this->db->get();
    return $query->result();
    }


    public function getsubmenutable($id)
    {

    $this->db->select('*');
    $this->db->from('frnt_sub_menu');
    $this->db->where('menu_parent_id',$id);
    $query = $this->db->get();
    return $query->result();
    }


    public function locationstable()
    {
        $this->db->select('*');
        $this->db->from('locations');
        $query = $this->db->get();
        return $query->result();
    }


    public function getUserImage($user_id)
    {
        $this->db->select('*');
        $this->db->from('user_profile_img');
        $this->db->where('user_id_fk', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getMenuCatTable()
  {
    $this->db->select('*');
    $this->db->from('product_category');
    $query = $this->db->get();
    return $query->result();
    }


    public function getFooterDetail()
    {
      $this->db->select('*');
      $this->db->from('frnt_footer_details');
      $this->db->where('footer_detail_status',1);
      $query = $this->db->get();
      return $query->result();
      }

    public function getAds($user_id)
    {
        $this->db->select('*');
        $this->db->from('product_list');
        $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getUserName($user_id)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getLogo()
    {
        $this->db->select('*');
        $this->db->from('logo');
        $query = $this->db->get();
        return $query->result();
    }
}
