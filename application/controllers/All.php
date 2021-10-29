<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        // $this->load->model('Loginmodel');
        $this->load->helper('url');
        $this->load->model('General_model');
        $this->load->model('Home_model');
        $this->load->model('All_model');
        $this->load->library('pagination');
        $this->load->library('session');
        
    }

    public function AllPage()
    {       
            @$uri_id = $this->uri->segment(3);
            //Pagination Start
            // $config['base_url'] = base_url('category/$id/');
            // $config['page_query_string'] = TRUE;
            $config['base_url'] = base_url('All/AllPage/');
            $config['total_rows'] = $this->All_model->numRows();
            $config['per_page'] = 8;
            $config['uri_segment'] = 3;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li class='page-item'>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li class='page-item'>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li class='page-item'>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li class='page-item'>";
            $config['last_tagl_close'] = "</li>";
            $config['next_link'] = "&Rang;";
            $config['prev_link'] = "&Lang;";


            $this->pagination->initialize($config);
            //Pagination End

            @$user_id = $this->session->userdata('user_id');
            $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
            $data['user_name'] = $this->Home_model->getUsername($user_id);
            $data['menu_cate'] = $this->Home_model->getMenuCategory();
            $data['menu'] = $this->Home_model->getMenuHome();
            $data['submenu'] = $this->Home_model->getSubMenuHome();
            $data['location'] = $this->Home_model->getLocationDetails();
            $data['menu_cat'] = $this->Home_model->getMenuCatTable();
            $data['subcategory_page'] = $this->All_model->getSubCategoryPageTable($config['per_page'],$uri_id);
            $data['footer_details'] = $this->Home_model->getFooterDetail();
            $data['logo'] =$this->Home_model->getLogo();
            
            $this->load->view('Headers/header_home',$data);
            $this->load->view('All',$data);
            $this->load->view('Footers/footer_home',$data);
       
    }


}