<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        if(!$this->session->has_userdata('name') ){
            header('Location: '.base_url('Register/Login'));
            exit;
        }
        // $this->load->model('Loginmodel');
        $this->load->helper('url');
        $this->load->model('Wishlist_model');
        $this->load->model('General_model');
        $this->load->model('Home_model');
    }

    public function Wishlistpage()
    {
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['product_wishlist'] = $this->Wishlist_model->getProductWishList($user_id);
        $data['user_name'] = $this->Home_model->getUsername($user_id);
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();
        
        // var_dump($data['product_wishlist']);
        $this->load->view('Headers/header_home',$data);
		$this->load->view('Wishlist',$data);
        $this->load->view('Footers/footer_home',$data);
    }

	public function AddWishList()
    {
        $user_id = $this->input->post('user_ids');
        $prolist_id = $this->input->post('id');
        $data = $this->Wishlist_model->getWishListTable($user_id,$prolist_id);

        $insert  = array(
            'pro_wish_user_fk'=> $user_id,
            'pro_wish_prolist_fk' => $prolist_id,
            'pro_wish_like' => 1,
            'pro_wish_date' => date("Y-m-d"),
        );

        if($data == NULL){
            $result = $this->General_model->add_returnID('prodlist_wishlist',$insert);
			$response_text = 'Product added to Wishlist';
            echo json_encode($response_text);
        }
        else{
            $response_text = 'Product Already Exist in your Wishlist';
            echo json_encode($response_text);
        }
    }

    public function DeleteWishlist($id)
    {
    $data = $this->General_model->delete('prodlist_wishlist','pro_wish_id',$id);		
    if($data) {
        $response['text'] = 'Deleted successfully';
        $response['type'] = 'success';
    }
    else{
        $response['text'] = 'Something went wrong';
        $response['type'] = 'error';
    }
    $response['layout'] = 'topRight';
    redirect('/wishlist/', 'refresh');
    }

}