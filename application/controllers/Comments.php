<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Home_model');
    $this->load->model('General_model');
    $this->load->model('SingleProduct_model');
    $this->load->model('Comment_Model');
  }
/*To add a comment againt a product*/
  public function addProductComment(){
    if(!isset($_SESSION['user_id'])){
      redirect(base_url('Register/Login'));
    }
    $product_id=intval($this->input->post('product_id'));
    $product_user_id=$_SESSION['user_id'];
    $product_comment=$this->input->post('post_comment');
    $result=$this->Comment_Model->insertProductComment($product_id,$product_user_id,$product_comment);
    if($result){
      redirect(base_url('singleProduct/'.$product_id));
    }
    else{
      return false;
    }
  }
}
