<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyAds extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        // $this->load->model('Loginmodel');
        $this->load->helper('url');
        $this->load->model('Help_model');
        $this->load->model('General_model');
        $this->load->model('Home_model');
        $this->load->library('session');

    }

    public function Ads()
    {
      
            @$user_id = $this->session->userdata('user_id');
            $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
            $data['user_name'] = $this->Home_model->getUsername($user_id);
            $data['menu_cate'] = $this->Home_model->getMenuCategory();
            $data['menu'] = $this->Home_model->getMenuHome();
            $data['submenu'] = $this->Home_model->getSubMenuHome();
            $data['location'] = $this->Home_model->getLocationDetails();
            $data['menu_cat'] =$this->Home_model->getMenuCatTable();
            $data['footer_details'] = $this->Home_model->getFooterDetail();
            $data['ads'] = $this->Home_model->getads($user_id);
            $data['logo'] =$this->Home_model->getLogo();
            // var_dump($data['ads']);
            $this->load->view('Headers/header_home',$data);
            $this->load->view('Ads',$data);
            $this->load->view('Footers/footer_home',$data);
       
    }


    public function deleteAdsProduct()
    {
    $pro_list_id = $this->input->post('pro_list_id');
    $data = $this->General_model->delete('product_list','pro_list_id',$pro_list_id);		
    if($data) {
        $response['text'] = 'Deleted successfully';
    }
    else{
        $response['text'] = 'Something went wrong';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
    }

}