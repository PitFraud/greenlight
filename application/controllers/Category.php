<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller{

	function __construct(){
		parent::__construct();
		// $this->load->model('Loginmodel');
		$this->load->helper('url');
		$this->load->model('General_model');
		$this->load->model('Home_model');
		$this->load->model('Category_model');
		$this->load->library('pagination');
		$this->load->library('session');
	}

	public function CategoryMenu($id){
		if(!empty($id)){
			$cat_ids = $id;
		}
		@$uri_id = $this->uri->segment(4);
		//Pagination Start
		// $config['base_url'] = base_url('category/$id/');
		// $config['page_query_string'] = TRUE;
		$config['base_url'] = base_url('Category/CategoryMenu/'.$cat_ids.'/');
		$config['total_rows'] = $this->Category_model->numRows($id);
		$config['per_page'] = 8;
		$config['uri_segment'] = 4;
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
		// $data['category_page'] = $this->Category_model->getCategoryPageTable($id,$config['per_page'],$uri_id);
		$data['subcategory_id']=$id;
		$data['category_page'] = $this->Category_model->getCategoryPageTable($id);
		$data['footer_details'] = $this->Home_model->getFooterDetail();
		$data['logo'] =$this->Home_model->getLogo();
		// echo"<pre>",print_r($data['footer_details'],1),"</pre>"; die;
		$this->load->view('Headers/header_home',$data);
		$this->load->view('Category',$data);
		$this->load->view('Footers/footer_home',$data);
	}
	public function get_offer($subcategory_id){
		@$user_id = $this->session->userdata('user_id');
		$data['user_image_header'] = $this->Home_model->getUserImage($user_id);
		$data['user_name'] = $this->Home_model->getUsername($user_id);
		$data['menu_cate'] = $this->Home_model->getMenuCategory();
		$data['menu'] = $this->Home_model->getMenuHome();
		$data['submenu'] = $this->Home_model->getSubMenuHome();
		$data['location'] = $this->Home_model->getLocationDetails();
		$data['menu_cat'] = $this->Home_model->getMenuCatTable();
		$data['subcategory_id']=$subcategory_id;
		// $data['category_page'] = $this->Category_model->getCategoryPageTable($id);
		$data['footer_details'] = $this->Home_model->getFooterDetail();
		$data['logo'] =$this->Home_model->getLogo();
		/*For get all offer details*/
		$data['offers'] =$this->Category_model->fetch_all_offers();

		$this->load->view('Headers/header_home',$data);
		$this->load->view('Offers_new',$data);
		$this->load->view('Footers/footer_home',$data);

	}

	public function get_events($subcategory_id) {
		@$user_id = $this->session->userdata('user_id');
		$data['user_image_header'] = $this->Home_model->getUserImage($user_id);
		$data['user_name'] = $this->Home_model->getUsername($user_id);
		$data['menu_cate'] = $this->Home_model->getMenuCategory();
		$data['menu'] = $this->Home_model->getMenuHome();
		$data['submenu'] = $this->Home_model->getSubMenuHome();
		// $data['location'] = $this->Home_model->getLocationDetails();
		$data['menu_cat'] = $this->Home_model->getMenuCatTable();
		// $data['subcategory_id']=$subcategory_id;
		// $data['category_page'] = $this->Category_model->getCategoryPageTable($id);
		$data['footer_details'] = $this->Home_model->getFooterDetail();
		$data['logo'] =$this->Home_model->getLogo();
		$data['menu_cat'] = $this->Home_model->getMenuCatTable();
		$data['event_details'] = $this->Category_model->fetch_all_events();
		// $data['event_details']=$this->
      // $this->load->view('Events', $subcategory_id);
			$this->load->view('Headers/header_home',$data);
			$this->load->view('Events', $data);
			$this->load->view('Footers/footer_home',$data);
   }


}
