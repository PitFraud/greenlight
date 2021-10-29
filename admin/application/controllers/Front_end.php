<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front_end extends MY_Controller {
	public function __construct() {
		parent::__construct();
	    $this->load->helper(array('form', 'url'));
		if(! $this->is_logged_in()){
			redirect('/login');
			

		}

		$this->load->model('General_model');
		$this->load->model('Front_end_model');
		$this->load->model('Settings_model');

	}
	public function index()
	{

	}
	public function banners()
	{   
		$template['body'] = 'Front_end/Banners/list';
		$template['script'] = 'Front_end/Banners/script';
		$this->load->view('template',$template);
	}
	
	public function getBanners()
	{
			$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getBannersTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

    public function addBanner()
	{
		$this->form_validation->set_rules('ban_name', 'ban_name', 'required');
        $this->form_validation->set_rules('Ban_ent_date', 'Ban_ent_date', 'required');
        $this->form_validation->set_rules('ban_seq', 'ban_seq', 'required');
        

		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Front_end/Banners/add';
			$template['script'] = 'Front_end/Banners/script';
			$this->load->view('template', $template);
		}
		else {
			$banner_id = $this->input->post('ban_id');

            $banner_img = $_FILES['ban_img']['name'];
            
			$file_name = rand(1000,100000).'.png';
			
			if($banner_img != NULL){
				$config['upload_path']          = './assets/uploads/banners';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('ban_img'))
                {
                        $error = array('error' => $this->upload->display_errors());

						$template['body'] = 'Front_end/Banners/add';
						$template['script'] = 'Front_end/Banners/script';
						$this->load->view('template', $template);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        // $this->load->view('upload_success', $data);
                }
			}

			$data  = array(
				'banner_name'=> $this->input->post('ban_name'),
				'ban_img' => $file_name,
				'ban_seq' => $this->input->post('ban_seq'),
				'ban_ent_date' => $this->input->post('Ban_ent_date'),
			);
			if($banner_id)
			{
				$result = $this->General_model->update('frnt_banner',$data,'ban_id',$banner_id);
				$response_text = 'Banner updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_banner',$data);
				$response_text = 'Banner Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Banners/', 'refresh');
		}
	}

    public function bannerEdit($ban_id)
	{
		$template['body'] = 'Front_end/Banners/add';
		$template['script'] = 'Front_end/Banners/script';
		$where=array('ban_id'=>$ban_id);
		$template['records'] = $this->General_model->getall('frnt_banner',$where);
		$this->load->view('template', $template);
	}

	public function bannerDelete()
	{
	$banner_id = $this->input->post('ban_id');
    $data = $this->General_model->delete('frnt_banner','ban_id',$banner_id);		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}



	//Menus Crud

	public function menus()
	{   
		$template['body'] = 'Front_end/Menus/list';
		$template['script'] = 'Front_end/Menus/script';
		$this->load->view('template',$template);
	}

	public function getMenus()
	{
			$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getMenusTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	
	public function addMenu()
	{
		$this->form_validation->set_rules('menu_name', 'menu_name', 'required');
        $this->form_validation->set_rules('menu_link', 'menu_link', 'required');
        $this->form_validation->set_rules('menu_date', 'menu_date', 'required');
         $this->form_validation->set_rules('menu_order', 'menu_order', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['menu_cat'] = $this->General_model->get_all('frnt_menu_cat'); 
			$template['body'] = 'Front_end/Menus/add';
			$template['script'] = 'Front_end/Menus/script';
			$this->load->view('template', $template);
		}
		else {
			$menu_id = $this->input->post('menu_id');

			$data  = array(
				'menu_name'=> $this->input->post('menu_name'),
				'menu_cat_id'=> $this->input->post('menu_cat_id_fk'),
				'menu_link' => $this->input->post('menu_link'),
				'menu_entered_date' => $this->input->post('menu_date'),
				'menu_display_order' => $this->input->post('menu_order'),
				'menu_status' => 1,
			);
			if($menu_id)
			{
				$result = $this->General_model->update('frnt_menu',$data,'menu_id',$menu_id);
				$response_text = 'Menu updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_menu',$data);
				$response_text = 'Menu Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Menus/', 'refresh');
		}
	}


	public function menusEdit($menu_id)
	{
		$template['body'] = 'Front_end/Menus/add';
		$template['script'] = 'Front_end/Menus/script';
		$template['menu_cat'] = $this->General_model->get_all('frnt_menu_cat'); 
		$where=array('menu_id'=>$menu_id);
		$template['records'] = $this->General_model->getall('frnt_menu',$where);
		$this->load->view('template', $template);
	}

	public function menusDelete()
	{
	$menu_id = $this->input->post('menu_id');
   $data = $this->General_model->delete('frnt_menu','menu_id',$menu_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	//SubMenu Crud


	public function submenus()
	{   ;
		$template['body'] = 'Front_end/Submenus/list';
		$template['script'] = 'Front_end/Submenus/script';
		$this->load->view('template',$template);
	}

	public function getSubmenus()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getSubmenusTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}


	public function addSubmenus()
	{
		$this->form_validation->set_rules('menu_parent_id', 'menu_parent_id', 'required');
        $this->form_validation->set_rules('submenu_name', 'submenu_name', 'required');
        $this->form_validation->set_rules('submenu_link', 'submenu_link', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['menu'] = $this->General_model->get_all('frnt_menu');
			$template['body'] = 'Front_end/Submenus/add';
			$template['script'] = 'Front_end/Submenus/script';
			$this->load->view('template', $template);
		}
		else {
			$submenu_id = $this->input->post('sub_menu_id');

			$data  = array(
				'sub_menu_name'=> $this->input->post('submenu_name'),
				'sub_menu_link' => $this->input->post('submenu_link'),
				'menu_parent_id' => $this->input->post('menu_parent_id'),
				'sub_menu_status' => 1,
			);
			if($submenu_id)
			{
				$result = $this->General_model->update('frnt_sub_menu',$data,'sub_menu_id',$submenu_id);
				$response_text = 'Submenu updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_sub_menu',$data);
				$response_text = 'Submenu Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Submenus/', 'refresh');
		}
	}


	public function submenusEdit($sub_menu_id)
	{
		$template['body'] = 'Front_end/Submenus/add';
		$template['script'] = 'Front_end/Submenus/script';
		$template['menu'] = $this->General_model->get_all('frnt_menu');
		$where=array('sub_menu_id'=>$sub_menu_id);
		$template['records'] = $this->General_model->getall('frnt_sub_menu',$where);
		$this->load->view('template', $template);
	}

	public function submenusDelete()
	{
	$menu_id = $this->input->post('sub_menu_id');
   	$data = $this->General_model->delete('frnt_sub_menu','sub_menu_id',$menu_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	//Browse By Product Crud


	public function ProductScroll()
	{   ;
		$template['body'] = 'Front_end/Product_Scroll/list';
		$template['script'] = 'Front_end/Product_Scroll/script';
		$this->load->view('template',$template);
	}


	public function getProductScroll()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getProductScrollTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}


	public function addProductScroll()
	{
        $this->form_validation->set_rules('pro_sub_cat_fk', 'pro_sub_cat_fk', 'required');
        $this->form_validation->set_rules('proscro_display_ord', 'proscro_display_ord', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
			$template['body'] = 'Front_end/Product_Scroll/add';
			$template['script'] = 'Front_end/Product_Scroll/script';
			$this->load->view('template', $template);
		}
		else {
			$proscro_id = $this->input->post('proscro_id');

			$data  = array(
				'prosco_link_psc_fk' => $this->input->post('pro_sub_cat_fk'),
				'proscro_display_ord' => $this->input->post('proscro_display_ord'),
				'proscro_enter_date' => $this->input->post('proscro_enter_date'),
				'proscro_status' => 1,
			);
			if($proscro_id)
			{
				$result = $this->General_model->update('frnt_product_scroll',$data,'proscro_id',$proscro_id);
				$response_text = 'Poduct Scroll updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_product_scroll',$data);
				$response_text = 'Poduct Scroll Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/ProductScroll/', 'refresh');
		}
	}

	public function productscrollEdit($proscro_id)
	{
		$template['body'] = 'Front_end/Product_Scroll/add';
		$template['script'] = 'Front_end/Product_Scroll/script';
		$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
		$where=array('proscro_id'=>$proscro_id);
		$template['records'] = $this->General_model->getall('frnt_product_scroll',$where);
		$this->load->view('template', $template);
	}

	public function productscrollDelete()
	{
	$proscro_id = $this->input->post('proscro_id');
   	$data = $this->General_model->delete('frnt_product_scroll','proscro_id',$proscro_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	//Browse By Menu Category Crud


	public function MenuCategory()
	{   ;
		$template['body'] = 'Front_end/Menu_Cat/list';
		$template['script'] = 'Front_end/Menu_Cat/script';
		$this->load->view('template',$template);
	}

	public function getMenuCategory()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getMenuCategoryTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function addMenuCategory()
	{
		$this->form_validation->set_rules('cat_name', 'cat_name', 'required');
        $this->form_validation->set_rules('cat_seq', 'cat_seq', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['proscro'] = $this->General_model->get_all('frnt_menu_cat');
			$template['body'] = 'Front_end/Menu_Cat/add';
			$template['script'] = 'Front_end/Menu_Cat/script';
			$this->load->view('template', $template);
		}
		else {
			$cat_id = $this->input->post('cat_id');

			$data  = array(
				'menu_cat_name'=> $this->input->post('cat_name'),
				'menu_cat_order' => $this->input->post('cat_seq'),
		
			);
			if($cat_id)
			{
				$result = $this->General_model->update('frnt_menu_cat',$data,'menu_cat_id',$cat_id);
				$response_text = 'Menu Category updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_menu_cat',$data);
				$response_text = 'Menu Category Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/MenuCategory/', 'refresh');
		}
	}

	public function MenuCategoryEdit($menu_cat_id)
	{
		$template['body'] = 'Front_end/Menu_Cat/add';
		$template['script'] = 'Front_end/Menu_Cat/script';
		$template['men_cat'] = $this->General_model->get_all('frnt_menu_cat');
		$where=array('menu_cat_id'=>$menu_cat_id);
		$template['records'] = $this->General_model->getall('frnt_menu_cat',$where);
		$this->load->view('template', $template);
	}

	public function MenuCategoryDelete()
	{
	$menu_cat_id = $this->input->post('menu_cat_id');
   	$data = $this->General_model->delete('frnt_menu_cat','menu_cat_id',$menu_cat_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	//Browse By Hot Deals Crud


	public function HotDeals()
	{   ;
		$template['body'] = 'Front_end/Hot_deals/list';
		$template['script'] = 'Front_end/Hot_deals/script';
		$this->load->view('template',$template);
	}


	public function getHotDeals()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getHotDealsTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function addHotDeals()
	{
        $this->form_validation->set_rules('hdeal_2_head', 'hdeal_2_head', 'required');
        $this->form_validation->set_rules('hdeal_disp_ord', 'hdeal_disp_ord', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
			$template['body'] = 'Front_end/Hot_deals/add';
			$template['script'] = 'Front_end/Hot_deals/script';
			$this->load->view('template', $template);
		}
		else {
			$hdeal_id = $this->input->post('hdeal_id');

			$proscro_img = $_FILES['hdeal_img']['name'];
			$file_name = rand(1000,100000).'.png';
			
			if($proscro_img != NULL){
				$config['upload_path']          = './assets/uploads/hotdeals';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('hdeal_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
						$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
						$template['body'] = 'Administration/Hot_deals/add';
						$template['script'] = 'Administration/Hot_deals/script';
						$this->load->view('template', $template);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                }
			}

			$data  = array(
				'deal_second_head' => $this->input->post('hdeal_2_head'),
				'deal_psc_fk' => $this->input->post('pro_sub_cat_fk'),
				'deal_disp_order' => $this->input->post('hdeal_disp_ord'),
				'deal_image' => $file_name,
			);
			if($hdeal_id)
			{
				$result = $this->General_model->update('frnt_hot_deals',$data,'deal_id',$hdeal_id);
				$response_text = 'Hot Deals updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_hot_deals',$data);
				$response_text = 'Hot Deals Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/HotDeals/', 'refresh');
		}
	}

	public function HotDealsEdit($deal_id)
	{
		$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
		$template['body'] = 'Front_end/Hot_deals/add';
		$template['script'] = 'Front_end/Hot_deals/script';
		$where=array('deal_id'=>$deal_id);
		$template['records'] = $this->General_model->getall('frnt_hot_deals',$where);
		$this->load->view('template', $template);
	}

	public function HotDealsDelete()
	{
	$deal_id = $this->input->post('deal_id');
   	$data = $this->General_model->delete('frnt_hot_deals','deal_id',$deal_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	
	//Browse By Super Deals Crud
	public function SuperDeals()
	{ 
		$template['body'] = 'Front_end/Super_deals/list';
		$template['script'] = 'Front_end/Super_deals/script';
		$this->load->view('template',$template);
	}

	public function getSuperDeals()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getSuperDealsTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}


	public function addSuperDeals()
	{
		$this->form_validation->set_rules('sup_ban_name', 'sup_ban_name', 'required');
        $this->form_validation->set_rules('super_ent_date', 'super_ent_date', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
			$template['body'] = 'Front_end/Super_deals/add';
			$template['script'] = 'Front_end/Super_deals/script';
			$this->load->view('template', $template);
		}
		else {
			$supdeal_id = $this->input->post('supdeal_id');

			$proscro_img = $_FILES['super_img']['name'];
			$file_name = rand(1000,1000000000).'.png';
			
			if($proscro_img != NULL){
				$config['upload_path']          = './assets/uploads/superdeals';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('super_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
						redirect('/SuperDeals/', 'refresh');
						// $template['body'] = 'Front_end/Super_deals/add';
						// $template['script'] = 'Front_end/Super_deals/script';
						// $this->load->view('template', $template);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                }
			}

			$data  = array(
				'super_sub_category_fk'=> $this->input->post('pro_sub_cat_fk'),
				'super_deal_name'=> $this->input->post('sup_ban_name'),
				'super_deal_enter_date' => $this->input->post('super_ent_date'),
				'super_deal_status' => 1,
				'super_deal_img' => $file_name,
			);
			if($supdeal_id)
			{
				$result = $this->General_model->update('frnt_super_deals',$data,'super_deal_id',$supdeal_id);
				$response_text = 'Super Deals updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_super_deals',$data);
				$response_text = 'Super Deals Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/SuperDeals/', 'refresh');
		}
	}


	public function SuperDealsEdit($super_deal_id)
	{	
		$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
		$template['body'] = 'Front_end/Super_deals/add';
		$template['script'] = 'Front_end/Super_deals/script';
		$where=array('super_deal_id'=>$super_deal_id);
		$template['records'] = $this->General_model->getall('frnt_super_deals',$where);
		$this->load->view('template', $template);
	}


	public function SuperDealsDelete()
	{
	$super_deal_id = $this->input->post('super_deal_id');
   	$data = $this->General_model->delete('frnt_super_deals','super_deal_id',$super_deal_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	//Browse By Special Offers Crud
	public function SpecialOff()
	{   
		
		$template['body'] = 'Front_end/Special_offers/list';
		$template['script'] = 'Front_end/Special_offers/script';
		$this->load->view('template',$template);
	}

	public function getSpecialOff()
	{
	  $param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getSpecialOffTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function addSpecialOff()
	{
        $this->form_validation->set_rules('spoff_2_head', 'spoff_2_head', 'required');
		$this->form_validation->set_rules('spoff_seq_ord', 'spoff_seq_ord', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
			$template['body'] = 'Front_end/Special_offers/add';
			$template['script'] = 'Front_end/Special_offers/script';
			$this->load->view('template', $template);
		}
		else {
			$spoff_id = $this->input->post('spoff_id');

			$proscro_img = $_FILES['spoff_img']['name'];
			$file_name = rand(1000,100000).'.png';
			
			if($proscro_img != NULL){
				$config['upload_path']          = './assets/uploads/specialoffers';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('spoff_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
						$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
						$template['body'] = 'Administration/Special_offers/add';
						$template['script'] = 'Administration/Special_offers/script';
						$this->load->view('template', $template);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                }
			}

			$data  = array(
				'spoff_second_head' => $this->input->post('spoff_2_head'),
				'spoff_psc_fk' => $this->input->post('pro_sub_cat_fk'),
				'spoff_disp_order' => $this->input->post('spoff_seq_ord'),
				'spoff_img' => $file_name,
			);
			if($spoff_id)
			{
				$result = $this->General_model->update('frnt_special_offer',$data,'spoff_id',$spoff_id);
				$response_text = 'Special offers updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_special_offer',$data);
				$response_text = 'Special offers Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/SpecialOff/', 'refresh');
		}
	}


	public function SpecialOffEdit($spoff_id)
	{
		$template['sub_cat'] = $this->General_model->get_all('product_sub_category');
		$template['body'] = 'Front_end/Special_offers/add';
		$template['script'] = 'Front_end/Special_offers/script';
		$where=array('spoff_id'=>$spoff_id);
		$template['records'] = $this->General_model->getall('frnt_special_offer',$where);
		$this->load->view('template', $template);
	}

	public function SpecialOffDelete()
	{
	$spoff_id = $this->input->post('spoff_id');
   	$data = $this->General_model->delete('frnt_special_offer','spoff_id',$spoff_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	//Browse By Deals of the day Crud
	public function DealsOfDay()
	{  
		$template['body'] = 'Front_end/Deals_of_day/list';
		$template['script'] = 'Front_end/Deals_of_day/script';
		$this->load->view('template',$template);
	}


	public function getDealsOfDay()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getDealsOfDayTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function addDealsOfDay()
	{
		
        $this->form_validation->set_rules('dod_discount', 'dod_discount', 'required');
		$this->form_validation->set_rules('dod_enter_date', 'dod_enter_date', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['pro_list'] = $this->General_model->getProductList();
			$template['body'] = 'Front_end/Deals_of_day/add';
			$template['script'] = 'Front_end/Deals_of_day/script';
			$this->load->view('template', $template);
		}
		else {
			$dod_id = $this->input->post('dod_id');


			$data  = array(
				'dod_product_id' => $this->input->post('product_list_id'),
				'dod_discount' => $this->input->post('dod_discount'),
				'dod_entered_date' => $this->input->post('dod_enter_date'),
				'dod_status' => 1,
				
			);
			if($dod_id)
			{
				$result = $this->General_model->update('frnt_deal_of_day',$data,'spoff_id',$dod_id);
				$response_text = 'Deals Of The Day updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_deal_of_day',$data);
				$response_text = 'Deals Of The Day Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/DealsOfDay/', 'refresh');
		}
	}


	public function DealsOfDayEdit($dod_id)
	{
		$template['pro_list'] = $this->General_model->getProductList();
		// $template['pro_list'] = $this->General_model->get_all('product_list');
		$template['body'] = 'Front_end/Deals_of_day/add';
		$template['script'] = 'Front_end/Deals_of_day/script';
		$where=array('dod_id'=>$dod_id);
		$template['records'] = $this->General_model->getall('frnt_deal_of_day',$where);
		$this->load->view('template', $template);
	}


	public function DealsOfDayDelete()
	{
	$dod_id = $this->input->post('dod_id');
   	$data = $this->General_model->delete('frnt_deal_of_day','dod_id',$dod_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}

	//Browse By Our Latest products
	public function LatestProduct()
	{ 
		$template['body'] = 'Front_end/Latest_product/list';
		$template['script'] = 'Front_end/Latest_product/script';
		$this->load->view('template',$template);
	}


	public function getLatestProduct()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getLatestProductTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}


	public function addLatestProduct()
	{
		
		$this->form_validation->set_rules('latest_pro_enter_date', 'latest_pro_enter_date', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['pro_list'] = $this->General_model->getProductList();
			$template['body'] = 'Front_end/Latest_product/add';
			$template['script'] = 'Front_end/Latest_product/script';
			$this->load->view('template', $template);
		}
		else {
			$latest_prod_id = $this->input->post('latest_prod_id');


			$data  = array(
				'latpro_pro_id' => $this->input->post('product_list_id'),
				'latpro_ent_date' => $this->input->post('latest_pro_enter_date'),
				'latpro_status' => 1,
				
			);
			if($latest_prod_id)
			{
				$result = $this->General_model->update('frnt_latest_product',$data,'latpro_id',$latest_prod_id);
				$response_text = 'Latest Products updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_latest_product',$data);
				$response_text = 'Latest Products Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/LatestProduct/', 'refresh');
		}
	}


	public function LatestProductEdit($latpro_id)
	{
		$template['pro_list'] = $this->General_model->getProductList();
		// $template['pro_list'] = $this->General_model->get_all('product_list');
		$template['body'] = 'Front_end/Latest_product/add';
		$template['script'] = 'Front_end/Latest_product/script';
		$where=array('latpro_id'=>$latpro_id);
		$template['records'] = $this->General_model->getall('frnt_latest_product',$where);
		$this->load->view('template', $template);
	}


	public function LatestProductDelete()
	{
	$latpro_id = $this->input->post('latpro_id');
   	$data = $this->General_model->delete('frnt_latest_product','latpro_id',$latpro_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}


	//Browse By Our Various Plants
	public function VariousPlant()
	{ 
		$template['body'] = 'Front_end/Various_plant/list';
		$template['script'] = 'Front_end/Various_plant/script';
		$this->load->view('template',$template);
	}


	public function getVariousPlant()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Front_end_model->getVariousPlantTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}


	public function addVariousPlant()
	{
		
		$this->form_validation->set_rules('var_pro_enter_date', 'var_pro_enter_date', 'required');

		if ($this->form_validation->run() == FALSE) {
			$template['pro_list'] = $this->General_model->getProductList();
			$template['body'] = 'Front_end/Various_plant/add';
			$template['script'] = 'Front_end/Various_plant/script';
			$this->load->view('template', $template);
		}
		else {
			$var_prod_id = $this->input->post('var_prod_id');


			$data  = array(
				'varpro_pro_id' => $this->input->post('product_list_id'),
				'varpro_enter_date' => $this->input->post('var_pro_enter_date'),
				'varpro_status' => 1,
				
			);
			if($var_prod_id)
			{
				$result = $this->General_model->update('frnt_various_product',$data,'varpro_id',$var_prod_id);
				$response_text = 'Various Products updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_various_product',$data);
				$response_text = 'Various Products Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/VariousPlant/', 'refresh');
		}
	}


	public function VariousPlantEdit($varpro_id)
	{
		$template['pro_list'] = $this->General_model->getProductList();
		// $template['pro_list'] = $this->General_model->get_all('product_list');
		$template['body'] = 'Front_end/Various_plant/add';
		$template['script'] = 'Front_end/Various_plant/script';
		$where=array('varpro_id'=>$varpro_id);
		$template['records'] = $this->General_model->getall('frnt_various_product',$where);
		$this->load->view('template', $template);
	}


	public function VariousPlantDelete()
	{
	$varpro_id = $this->input->post('varpro_id');
   	$data = $this->General_model->delete('frnt_various_product','varpro_id',$varpro_id);   		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    $data_json = json_encode($response);
    echo $data_json;
	}
}