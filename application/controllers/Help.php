<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        // $this->load->model('Loginmodel');
        $this->load->helper('url');
        $this->load->model('Help_model');
        $this->load->model('General_model');
        $this->load->model('Home_model');
        $this->load->model('Help_model');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('simple_html_dom');
    }

    public function Helppage()
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
            $data['logo'] =$this->Home_model->getLogo();
            
            $this->load->view('Headers/header_home',$data);
            $this->load->view('Help',$data);
            $this->load->view('Footers/footer_home',$data);
       
    }

    public function FindHtmlContent()
    {
       
        $html =  file_get_html('https://google.co.in');
        // $this->dom->clear(); 
        // unset($this->dom);
        foreach($html->find('a') as $element){
                echo $element->href . '<br>';
        }        
        
    }

}