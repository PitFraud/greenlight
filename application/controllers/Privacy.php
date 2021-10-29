<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        // $this->load->model('Loginmodel');
        $this->load->helper('url');
        $this->load->model('Home_model');
    }

    public function PrivacyDetail()
    {
        $data['banner'] = $this->Home_model->getBannerImage();
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['user_name'] = $this->Home_model->getUsername($user_id);
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();

        $this->load->view('Headers/header_home',$data);
        $this->load->view('privacy-policy',$data);
        $this->load->view('Footers/footer_home',$data);
    }
}