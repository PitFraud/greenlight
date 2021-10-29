<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_model extends CI_Model
{

	public function searchResults($search_result,$limit,$offset,$price_val,$category)
	{
        if(empty($search_result)){
                return array();
        }
        
       $this->db->like('pro_sub_cat_name', $search_result);
//        $this->db->or_like('prod_cat_name', $search_result);
       $this->db->or_like('pro_list_name', $search_result);
       if(isset($price_val)){
        $this->db->where('product_list.prod_list_price_original <=',$price_val);
       }

       if(isset($category)){
        $this->db->where('product_sub_category.pro_sub_cat_id',$category);       
       }
      
       $this->db->limit($limit,$offset);
        
       
        $this->db->join('product_category','product_sub_category.pro_cat_id_fk = product_category.pro_cat_id');
        $this->db->join('product_list','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
        $query = $this->db->get('product_sub_category');
        // return $str = $this->db->last_query();
        //return $query->result();
        $output ='';
        if($query->num_rows() > 0){
                foreach($query->result_array() as $row){
                        $output = '<div class="product-box mb-md-20">
                        <div class="product-img">
                          <a href="#">
                            <img src="'.base_url().'admin/assets/uploads/productlist/'.$row['pro_list_img'].'" class="img-fluid full-width" alt="product-img">
                          </a>
                          <div class="product-badge">
                            <div class="product-label discount"> <span>15%</span>
                            </div>
                          </div>
                          <div class="button-group"> <a href="wishlist.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist" tabindex="-1"><i class="pe-7s-like"></i></a>
                            <a href="compare.html" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare" tabindex="-1"><i class="pe-7s-refresh-2"></i></a><a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
                          </div>
                          </div>
                        </div>
                        <div class="product-caption text-center"> <span class="product-category"><a href="#">'.$row['pro_sub_cat_name'].'</a></span>
                          <h6 class="product-title fw-500 mt-10"><a href="shop-details.html" class="text-light-black">'.$row['pro_list_name'].'</a></h6>
                          <div class="product-money mt-10"> <span class="text-dark-red fw-500">'.$row['pro_list_dicount_price'].'</span>
                            <span class="text-price">'.$row['prod_list_price_original'].'</span>
                          </div>
                        </div>
                      </div>';
                }
                
        }
        else{
                $output = '<h3>No Data Found</h3>';
        }
        return $output;
	}


    public function numRows()
	{
        
        $this->db->select('*');
        $this->db->join('product_category','product_sub_category.pro_cat_id_fk = product_category.pro_cat_id');
        $this->db->join('product_list','product_sub_category.pro_sub_cat_id = product_list.pro_sub_cat_id');
        $query = $this->db->get('product_sub_category');
        return $query->num_rows();
	}

   public function getCategoryCount()
   {
        $this->db->select('*');
        $query = $this->db->get('product_sub_category');
        return $query->result();
   }     


   

}
