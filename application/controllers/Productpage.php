<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productpage extends CI_Controller
{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Home_model');
		$this->load->model('General_model');
		$this->load->model('SingleProduct_model');
		$this->load->model('Comment_Model');
	}
	public function singleProduct($pro_list_id){
		//getting User Id from session data
		@$user_id = $this->session->userdata('user_id');
		$data['menu_cate'] = $this->Home_model->getMenuCategory();
		$data['menu'] = $this->Home_model->getMenuHome();
		$data['submenu'] = $this->Home_model->getSubMenuHome();
		$data['location'] = $this->Home_model->getLocationDetails();
		$data['users'] = $this->SingleProduct_model->getUsersList();
		$data['product_page'] = $this->SingleProduct_model->getProductPageList($pro_list_id);
		$data['pro_cat'] = $this->SingleProduct_model->getProductCategory();
		$data['pro_subcat'] = $this->SingleProduct_model->getProSubCategory();
		$data['review'] = $this->SingleProduct_model->getReview();
		$data['reply'] = $this->SingleProduct_model->getReply();
		$data['mult_img'] = $this->SingleProduct_model->getMultImage();
		$data['related_pro'] = $this->SingleProduct_model->getRelatedProducts();
		$data['star'] = $this->SingleProduct_model->getStarRating($pro_list_id);
		$data['menu_cat'] =$this->Home_model->getMenuCatTable();
		$data['user_image_header'] = $this->Home_model->getUserImage($user_id);
		$data['user_name'] = $this->Home_model->getUsername($user_id);
		$data['footer_details'] = $this->Home_model->getFooterDetail();
		$data['logo'] =$this->Home_model->getLogo();
		$data['current_url'] = current_url();
		/**/
		$data['product_details']=$this->SingleProduct_model->getProductDetails($pro_list_id);
		$data['pro_list_id']=$pro_list_id;
		$data['single_item_comments']=$this->Comment_Model->getSingleItemComments($pro_list_id);
		// print_r($data['product_details']); die();
		// $data['selected_image'] =$this->SingleProduct_model->get_selected_image($pro_list_id);
		$this->load->view('Headers/header_home',$data);
		$this->load->view('Productpage',$data);
		$this->load->view('Footers/footer_home',$data);
	}

	public function insertStarData(){
		$rating = $this->input->post('rating');
		$user_id = $this->input->post('sess_u_id');
		$prod_id = $this->input->post('pro_id');
		$validate = $this->SingleProduct_model->getValidRating($user_id,$prod_id);

		$data=array(
			'prod_list_fk' => $prod_id,
			'user_fk' => $user_id,
			'prod_list_star_rating' =>$rating,
			'prod_list_star_enter_date' =>date("Y-m-d"));

			if($validate != 0){
				$result = $this->General_model->updat('pro_list_star_rating',$data,'user_fk',$user_id,'prod_list_fk',$prod_id);
				$response_text = 'Star Ratings updated';
			}
			else{

				$result = $this->General_model->add_returnID('pro_list_star_rating',$data);
				$response_text = 'Star Ratings Added';
			}
		}
	}
