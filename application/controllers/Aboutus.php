<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller 
{
	function __construct() {
        parent::__construct();
          
        $this->load->helper('url');
       
		$this->load->model('Home_model');
        $this->load->model('General_model');
        $this->load->model('Aboutus_model');
    }
	public function aboutDetail()
	{
        //getting User Id from session data
        @$user_id = $this->session->userdata('user_id');
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['user_name'] = $this->Home_model->getUsername($user_id);
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['about_us'] = $this->Aboutus_model->getAboutDetailTable();
        $data['our_team'] = $this->Aboutus_model->getOurTeamTable();
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();
            // var_dump($data['our_team']);
            $this->load->view('Headers/header_home',$data);
            $this->load->view('Aboutus',$data);
            $this->load->view('Footers/footer_home',$data);
        
    }


    
}