<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front_end_model extends CI_Model
{
	public function getBannersTable($param)
	{
		$this->db->select('*');
		$this->db->from('frnt_banner');
        $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}


	public function getCount($last_query)
	{
		return $this->db->query($last_query)->num_rows();
	}
	

	public function getMenusTable($param)
	{
		$this->db->select('frnt_menu.menu_id, frnt_menu.menu_name, frnt_menu.menu_link, frnt_menu.menu_entered_date, frnt_menu.menu_display_order, frnt_menu.menu_status, frnt_menu_cat.menu_cat_name')
         ->from('frnt_menu')
         ->join('frnt_menu_cat', 'frnt_menu_cat.menu_cat_id = frnt_menu.menu_cat_id');
		$query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}

	public function getSubmenusTable($param)
	{

		$this->db->select('frnt_sub_menu.sub_menu_id, frnt_sub_menu.sub_menu_name, frnt_sub_menu.sub_menu_link, frnt_sub_menu.sub_menu_status, frnt_menu.menu_name')
         ->from('frnt_sub_menu')
         ->join('frnt_menu', 'frnt_sub_menu.menu_parent_id = frnt_menu.menu_id');
		$query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}

	public function getProductScrollTable($param)
	{
		$this->db->select('frnt_product_scroll.proscro_id, frnt_product_scroll.proscro_display_ord, frnt_product_scroll.proscro_enter_date, frnt_product_scroll.proscro_status, product_sub_category.pro_sub_cat_name')
		->from('frnt_product_scroll')
		->join('product_sub_category','product_sub_category.pro_sub_cat_id = frnt_product_scroll.prosco_link_psc_fk');
        $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}

	public function getMenuCategoryTable($param)
	{
		$this->db->select('*');
		$this->db->from('frnt_menu_cat');
        $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}

	public function getHotDealsTable($param)
	{
		$this->db->select('frnt_hot_deals.deal_id, frnt_hot_deals.deal_second_head, frnt_hot_deals.deal_disp_order, frnt_hot_deals.deal_image, product_sub_category.pro_sub_cat_name')
		->from('frnt_hot_deals')
		->join('product_sub_category','product_sub_category.pro_sub_cat_id = frnt_hot_deals.deal_psc_fk');
        $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}

	public function getSuperDealsTable($param)
	{
		$this->db->select('*');
		$this->db->from('frnt_super_deals');
		$this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = frnt_super_deals.super_sub_category_fk');
        $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}


	public function getSpecialOffTable($param)
	{
		$this->db->select('*')
		->from('frnt_special_offer')
		->join('product_sub_category','product_sub_category.pro_sub_cat_id = frnt_special_offer.spoff_psc_fk');
        $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}


	public function getDealsOfDayTable($param)
	{
		$this->db->select('frnt_deal_of_day.dod_id, frnt_deal_of_day.dod_discount, frnt_deal_of_day.dod_entered_date, frnt_deal_of_day.dod_status, product_list.pro_list_name')
         ->from('frnt_deal_of_day')
         ->join('product_list', 'product_list.pro_list_id = frnt_deal_of_day.dod_product_id');
         $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}


	public function getLatestProductTable($param)
	{
		$this->db->select('frnt_latest_product.latpro_id, frnt_latest_product.latpro_ent_date, frnt_latest_product.latpro_status, product_list.pro_list_name')
         ->from('frnt_latest_product')
         ->join('product_list', 'product_list.pro_list_id = frnt_latest_product.latpro_pro_id');
         $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}


	public function getVariousPlantTable($param)
	{
		$this->db->select('frnt_various_product.varpro_id, frnt_various_product.varpro_enter_date, frnt_various_product.varpro_status, product_list.pro_list_name')
         ->from('frnt_various_product')
         ->join('product_list', 'product_list.pro_list_id = frnt_various_product.varpro_pro_id');
         $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}
}
