<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        // $this->load->model('Loginmodel');
        $this->load->helper('url');
       
		$this->load->model('Home_model');
        $this->load->model('Search_model');
    }
	public function index()
	{
        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['user_name'] = $this->Home_model->getUsername($user_id);
        $data['banner'] = $this->Home_model->getBannerImage();
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['footer_details'] = $this->Home_model->getFooterDetail();

        $data['proscro'] = $this->Home_model->getProscroImage();
        $data['hot_deals'] = $this->Home_model->getHotDealsHome();
        $data['super_deals'] = $this->Home_model->getSuperDealsHome();
        $data['special_offer'] = $this->Home_model->getSpecialOffersHome();
        $data['dod'] = $this->Home_model->getDODHome();
        $data['product_list'] = $this->Home_model->getProductList();
        $data['product_list_footer'] = $this->Home_model->getProductListFooter();
        $data['latest_product_list'] = $this->Home_model->getLatestProduct();
        $data['latest_product'] = $this->Home_model->getLagestProdHome();
        $data['Various_product_list'] = $this->Home_model->getVariousProdList();
        $data['Various_product'] = $this->Home_model->getVariousProdHome();
        $data['menu_cat'] = $this->Home_model->getMenuCatTable();
        $data['logo'] =$this->Home_model->getLogo();
        
        //  var_dump($data['proscro']);
        $this->load->view('Headers/header_home',$data);
		$this->load->view('Home',$data);
        $this->load->view('Footers/footer_home',$data);
    }


    public function product_json(){
        $id = $this->input->post('id');
        $data = $this->Home_model->getProductjsonFooter($id);
        echo json_encode($data);
    }

    public function submenu(){
        $id = $this->input->post('id');
        $data = $this->Home_model->getsubmenutable($id);
        echo json_encode($data);
    }


    public function loctab()
    {
       $data = $this->Home_model->locationstable();
       echo json_encode($data);
    }

    

}