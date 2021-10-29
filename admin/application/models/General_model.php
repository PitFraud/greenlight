<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_model extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }
	
    // Return all records in the table
    public function get_all($table)
    {
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
	
	// Return all records from the table based on id
    public function getall($table,$id)
    {
		$this->db->where($id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
 
    // Return only one row
    public function get_row($table,$primaryfield,$id)
    {
        $this->db->where($primaryfield,$id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->row();
        }
        return false;
    }
 
    // Return one only field value
    public function get_data($table,$primaryfield,$fieldname,$id)
    {
        $this->db->select($fieldname);
        $this->db->where($primaryfield,$id);
        $q = $this->db->get($table);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        return array();
    }
 
    // Insert into table
    public function add($table,$data)
    {
        return $this->db->insert($table, $data);
    }
    
    // Insert into table and return last insert id
    public function add_returnID($table,$data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
        
    }
    // Update data to table
    public function update($table,$data,$primaryfield,$id)
    {
        $this->db->where($primaryfield, $id);
        $q = $this->db->update($table, $data);
        return $q;
    }
	// Update data to table
    public function updat($table,$data,$primaryfield,$id,$secondaryfield,$id1)
    {
        $this->db->where($primaryfield, $id);
		$this->db->where($secondaryfield, $id1);
        $q = $this->db->update($table, $data);
        return $q;
    }
	// Update data to table
    public function upda($table,$data,$primaryfield,$id,$secondaryfield,$idk,$thirdfield,$idke)
    {
        $this->db->where($primaryfield, $id);
		$this->db->where($secondaryfield, $idk);
		$this->db->where($thirdfield, $idke);
        $q = $this->db->update($table, $data);
        return $q;
    }
	// Update data to table without ID
    public function updatefin($table,$data)
    {
        $q = $this->db->update($table, $data);
        return $q;
    }
 
    // Delete record from table
    public function delete($table,$primaryfield,$id)
    {
    	$this->db->where($primaryfield,$id);
    	$q = $this->db->delete($table);
        return $q;
    }
 

    // Check whether a value has duplicates in the database
    public function has_duplicate($value, $tabletocheck, $fieldtocheck)
    {
        $this->db->select($fieldtocheck);
        $this->db->where($fieldtocheck,$value);
        $result = $this->db->get($tabletocheck);
 
        if($result->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
 
    // Check whether the field has any reference from other table
    // Normally to check before delete a value that is a foreign key in another table
    public function has_child($value, $tabletocheck, $fieldtocheck)
    {
        $this->db->select($fieldtocheck);
        $this->db->where($fieldtocheck,$value);
        $result = $this->db->get($tabletocheck);
 
        if($result->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
 
    // Return an array to use as reference or dropdown selection
    public function get_ref($table,$key,$value,$dropdown=false)
    {
        $this->db->from($table);
        $this->db->order_by($value);
        $result = $this->db->get();
 
        $array = array();
        if ($dropdown)
            $array = array("" => "Please Select");
 
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
            $array[$row[$key]] = $row[$value];
            }
        }
        return $array;
    }
    public function admin_data($user_id){
        $this->db->select('*');
         $this->db->from('admin_login');
         $this->db->where('id',$user_id);
         $query = $this->db->get();
         return $query->row();
    }
    public function getAdminData($id){
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row();
	
    }
    public function getPriceCategories()
    {
        $this->db->select('*');
        $this->db->where('pcategory_status',1);
        return $this->db->get('tbl_pricecategory')->result();
    }
    public function getCompanies()
    {
        $this->db->select('*');
        $this->db->where('cmp_status',1);
        return $this->db->get('tbl_companyinfo')->result();
    }
    public function getMainCategorylist()
    {
        $this->db->select('*');
        $this->db->where('category_status',1);
        return $this->db->get('tbl_category')->result();
    }
    public function getSubCategorylist()
    {
        $this->db->select('*');
        $this->db->where('subcategory_status',1);
        return $this->db->get('tbl_subcategory')->result();
    }
    public function getUnitlist()
    {
        $this->db->select('*');
        $this->db->where('unit_status',1);
        return $this->db->get('tbl_unit')->result();

    }
    public function fin_year()
    {
        $this->db->where('fin_status',1);
        $query=$this->db->get('tbl_finyear');
        return $query->row();
    }
    public function getSuppliers()
    {
        $this->db->select('*');
        $this->db->from('tbl_supplier');
        if ($this->session->userdata['user_type'] =='C')
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('company_id',$company);
        }
        $this->db->where('supplier_status',1);
        return $this->db->get()->result();
    }
    public function getCustomers()
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        if ($this->session->userdata['user_type'] =='C')
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('company_id',$company);
        }
        $this->db->where('custstatus',1);
        return $this->db->get()->result();
    }
    public function getItemlist()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        if ($this->session->userdata['user_type'] =='C')
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('company_id',$company);
        }
        $this->db->where('product_status',1);
        // $this->db->where('tbl_product.product_type','RM');
        return $this->db->get()->result();
    }
    public function getItemlists($cmp_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');  
        $this->db->where('company_id',$cmp_id);
        $this->db->where('product_status',1);
        // $this->db->where('tbl_product.product_type','RM');
        return $this->db->get()->result();
    }
    public function getPriceAmount($id,$cat)
    {
        $this->db->select('item_price,product_code,product_id');
        $this->db->from('tbl_pricelist');
        $this->db->join('tbl_product','tbl_product.product_id = tbl_pricelist.item_id');
        $this->db->where('tbl_pricelist.item_id',$id);
        $this->db->where('tbl_pricelist.pcategory_id',$cat);
        return $this->db->get()->result();
    }
    public function getPriceAmounts($code,$cat)
    {
        $this->db->select('item_price,product_code,product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_pricelist','tbl_product.product_id = tbl_pricelist.item_id');
        $this->db->where('tbl_product.product_code',$code);
        $this->db->where('tbl_pricelist.pcategory_id',$cat);
        return $this->db->get()->result();
    }
    public function getProductnames($code)
    {
        $this->db->select('item_price,product_code,product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_pricelist','tbl_product.product_id = tbl_pricelist.item_id');
        $this->db->where('tbl_product.product_code',$code);
        if ($this->session->userdata['user_type'] =='C')
        {
            $company =  $this->session->userdata['cmp_id'];
            $this->db->where('tbl_product.cmp_id',$company);
        }
        return $this->db->get()->result();
    }
    public function getSupplierbyCompanyid($cmp_id)
    {
        $this->db->select('*');
        $this->db->where('company_id',$cmp_id);
        $this->db->where('supplier_status',1);
        return $this->db->get('tbl_supplier')->result();
    }
    public function getCustomerbyCompanyid($cmp_id)
    {
        $this->db->select('*');
        $this->db->where('company_id',$cmp_id);
        $this->db->where('custstatus',1);
        return $this->db->get('tbl_customer')->result();
    }
    public function getCustomersData($cust_id)
    {
        $this->db->select('*');
        $this->db->where('cust_id',$cust_id);
        $this->db->where('custstatus',1);
        return $this->db->get('tbl_customer')->result();
    }
    // public function getTaxamonuts()
    // {
    //     $this->db->select('*');
    //     $this->db->where('unit_status',1);
    //     return $this->db->get('tbl_unit')->result();
    // }
    // public function getTaxlist()
    // {
    //     $this->db->select('*');
    //     $this->db->where('tax_status',1);
    //     return $this->db->get('tbl_taxdetails')->result();
    // }

    public function getProductList()
    {
        $this->db->select('product_list.pro_list_id, product_list.pro_list_name, product_list.pro_list_enter_date, product_sub_category.pro_sub_cat_name, product_category.prod_cat_name');
        $this->db->from('product_list');
        $this->db->join('product_sub_category','product_sub_category.pro_sub_cat_id = product_list.	pro_sub_cat_id');
        $this->db->join('product_category','product_category.pro_cat_id = product_sub_category.	pro_cat_id_fk');
        return $this->db->get()->result();
    }
}
?>