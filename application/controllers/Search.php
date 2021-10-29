<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        // $this->load->model('Loginmodel');
        $this->load->helper('url');
        $this->load->library('pagination');
		$this->load->model('Home_model');
        $this->load->model('Search_model');
        $this->load->library('session');

    }
	public function index()
	{
        
    
        if($this->input->get('search') != NULL){
        $newdata = array( 
            'search'  => $this->input->get('search'), 
         );
         $this->session->set_userdata($newdata);
        }
        //  echo $this->session->userdata();
        //Pagination Start
        // $config['base_url'] = base_url('Search/index/');
        // $config['total_rows'] = $this->Search_model->numRows();
        // $config['per_page'] = 8;
        // $config['full_tag_open'] = "<ul class='pagination'>";
        // $config['full_tag_close'] ="</ul>";
        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';
        // $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        // $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        // $config['next_tag_open'] = "<li class='page-item'>";
        // $config['next_tagl_close'] = "</li>";
        // $config['prev_tag_open'] = "<li class='page-item'>";
        // $config['prev_tagl_close'] = "</li>";
        // $config['first_tag_open'] = "<li class='page-item'>";
        // $config['first_tagl_close'] = "</li>";
        // $config['last_tag_open'] = "<li class='page-item'>";
        // $config['last_tagl_close'] = "</li>";
        // $config['next_link'] = "&Rang;";
        // $config['prev_link'] = "&Lang;";


        // $this->pagination->initialize($config);
        //Pagination End
    
        $search_result = $this->session->userdata('search');
        // $search_result = 'plants';
        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['user_name'] = $this->Home_model->getUsername($user_id);
        $data['super_deals'] = $this->Home_model->getSuperDealsHome();
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        // $data['search'] = $this->Search_model->searchResults($search_result,$config['per_page'],$this->uri->segment(3));
        $data['categories'] = $this->Search_model->getCategoryCount();
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();

        //   var_dump(count($data['count']));
        $this->load->view('Headers/header_home',$data);
		$this->load->view('Search',$data);
        $this->load->view('Footers/footer_home',$data);
   

    }

    public function SearchFilter()
    {
        @$search = $this->session->userdata('search');
		@$price_val = $this->input->post('price_val');
		@$category = $this->input->post('cats');
		$config = array();
		$config['total_rows'] = $this->Search_model->numRows();
        $config['per_page'] = 8;
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
		@$page = $this->uri->segment('3');
		
		
		$output = array(
			'pagination_link'		=>	$this->pagination->create_links(),
			'product_list'			=>	$this->Search_model->searchResults($search,$config["per_page"], $page, $price_val, $category)
		);
		echo json_encode($output);
    }
}