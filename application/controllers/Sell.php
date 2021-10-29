<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell extends CI_Controller 
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
       
		$this->load->model('Home_model');
        $this->load->model('Sell_model');
        $this->load->model('General_model');
    }
	public function index()
	{

        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['user_name'] = $this->Home_model->getUsername($user_id);
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['post_ad'] = $this->Sell_model->getCategorypro();
        $data['post_ad_sub'] = $this->Sell_model->getSubCategory();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['logo'] =$this->Home_model->getLogo();

        $this->load->view('Headers/header_home',$data);
		$this->load->view('Sell/sell',$data);
        $this->load->view('Footers/footer_home',$data);
    }

    public function addSellProduct($id)
    {
            @$user_id = $this->session->userdata('user_id');
            $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
            $data['user_name'] = $this->Home_model->getUsername($user_id);
            $data['menu_cate'] = $this->Home_model->getMenuCategory();
            $data['menu'] = $this->Home_model->getMenuHome();
            $data['location'] = $this->Home_model->getLocationDetails();
            $data['post_ad'] = $this->Sell_model->getCategorypro();
            $data['post_ad_sub'] = $this->Sell_model->getSubCategory();
            $data['sub_cat_prod'] = $this->Sell_model->getSubCat_prod($id);
            $data['locations'] = $this->Sell_model->getlocationlist();
            $data['menu_cat'] =$this->Home_model->getMenuCatTable();
            $data['footer_details'] = $this->Home_model->getFooterDetail();
            $data['logo'] = $this->Home_model->getLogo();
            $data['subscription_id'] = $this->Sell_model->subscriptionTable($user_id);
            $data['paid_subscriber'] = $this->Sell_model->paymentDetails($user_id);
            $data['free_users'] = $this->Sell_model->freeusersTable();
            $data['add_count'] = $this->Sell_model->freeuserpostCount($user_id);

            if($data['paid_subscriber'] == 'TRUE')
            
            {
            $data['ads_limit'] = $this->Sell_model->adsTableCount($user_id);
            $total_ad_limit = $data['ads_limit'][0]->subp_ads_no;
            $posted_ad_count = count($data['ads_limit']);
            $data['balance_ad_count'] = $total_ad_limit - $posted_ad_count;
            }
            else
            {
            $total_ad_limit = $data['free_users'][0]->subp_ads_no;
            $posted_ad_count = count($data['add_count']);
            $data['balance_ad_count'] = $total_ad_limit - $posted_ad_count;
            }
            //   var_dump($data['balance_ad_count']);
            
            $this->load->view('Headers/header_home',$data);
            $this->load->view('Sell/add',$data);
            $this->load->view('Footers/footer_home',$data);
		
    }

    public function insertSellProduct()
    {

            @$prodlist_id = $this->input->post('prodlist_id');
			$offer_img = $_FILES['p_image']['name'];
			$file_name = $offer_img;
			$path = './admin/assets/uploads/productlist';
			if($offer_img != NULL){
				$config1['upload_path']          =  $path;
                $config1['allowed_types']        = 'gif|jpg|jpeg|png';
				$config1['file_name']			=	$file_name;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config1);
                $this->upload->initialize($config1);  
                if ( ! $this->upload->do_upload('p_image'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);
                        exit;
                        //redirect('/Sell/', 'refresh');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        // $this->load->view('upload_success', $data);
                }
			}
			
			$data  = array(
				'pro_sub_cat_id '=> $this->input->post('sub_cat_id'),
				'pro_list_img'=> $file_name,
				'user_id'=> $this->input->post('user_id'),
				'pro_list_name' => $this->input->post('p_name'),
				'pro_list_details' => $this->input->post('p_details'),
				'pro_list_enter_date' => date('Y-m-d'),
                'pro_list_status' => 1,
                'prod_list_price_original' => $this->input->post('p_price'),
                'pro_list_stock' => 1,
			);

            if($prodlist_id)
			{
				$result = $this->General_model->update('product_list',$data,'pro_list_id',$prodlist_id);
				$response_text = 'Product List updated';
			}
			else{
				$result = $this->General_model->add_returnID('product_list',$data);
				$response_text = 'Product List Added';

                $prodlist_fk_id = $result;
                $data = [];  
     
                    $count1 = count($_FILES['files']['name']);  
                    
                    for($i=0;$i<$count1;$i++){  
                    
                        if(!empty($_FILES['files']['name'][$i])){  
                        $file_name2 = $_FILES['files']['name'][$i];
                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];  
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];  
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];  
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];  
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];  
                        $path2= './admin/assets/uploads/prodlist_mult_img'; 
                        $config2['upload_path'] = $path2;   
                        $config2['allowed_types'] = 'jpg|jpeg|jpeg|png|gif';  
                        $config2['max_size'] = '5000';  
                        $config2['file_name'] = $file_name2;  
                            
                        $this->load->library('upload',$config2); 
                        $this->upload->initialize($config2);  
                        //$path = $path2;
                        //$config1['upload_path'] = $path;
                        if($this->upload->do_upload('file')){  
                            $uploadData = $this->upload->data();  
                    
                    
                             
                        }  
                        $data  = array(
                            'proli_img_list_fk '=> $prodlist_fk_id,
                            'proli_img_name'=> $file_name2,
                            'proli_img_status'=> 1,
                            
                        );
                        if($prodlist_id)
                        {
                            $result = $this->General_model->update('productlist_images',$data,'proli_img_list_fk',$prodlist_id);
                            $response_text = 'Product List updated';
                        }
                        else{
                            $result = $this->General_model->add_returnID('productlist_images',$data);
                            $response_text = 'Product Images Added';
            
                        }

                        }  
                    
                    } 

                    $data3 = array(
                    'prod_list_fk '=> $prodlist_fk_id,
                    'prod_list_loc_lat'=> $this->input->post('latitude'),
                    'prod_list_loc_lon'=> $this->input->post('longitude'),
                    'prod_list_loc_status'=> 1,);
                    
                    if($prodlist_id)
                        {
                            $result = $this->General_model->update('productlist_list_location',$data3,'prod_list_fk',$prodlist_id);
                            $response_text = 'Product Location Updated';
                        }
                        else{
                            $result = $this->General_model->add_returnID('productlist_list_location',$data3);
                            $response_text = 'Product Location Added';
            
                        }
                    $data4 = array(
                        'post_user_fk' => $this->input->post('user_id'),
                        'post_sub_fk' => $this->input->post('subscription_id'),
                        'post_product_list_fk' => $prodlist_fk_id,
                    );    

                    if($prodlist_id)
                        {
                            $result = $this->General_model->update('tbl_ads_post',$data4,'post_product_list_fk',$prodlist_id);
                            $response_text = 'Product Location Updated';
                        }
                        else{
                            $result = $this->General_model->add_returnID('tbl_ads_post',$data4);
                            $response_text = 'Product Location Added';
            
                        }
            }
			
        
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Sell/', 'refresh');
        }
    

        public function editSell($id)
        {
            @$user_id = $this->session->userdata('user_id');
            $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
            $data['user_name'] = $this->Home_model->getUsername($user_id);
            $data['menu_cate'] = $this->Home_model->getMenuCategory();
            $data['menu'] = $this->Home_model->getMenuHome();
            $data['location'] = $this->Home_model->getLocationDetails();
            $data['post_ad'] = $this->Sell_model->getCategorypro();
            $data['post_ad_sub'] = $this->Sell_model->getSubCategory();
            $data['locations'] = $this->Sell_model->getlocationlist();
            $data['menu_cat'] =$this->Home_model->getMenuCatTable();
            $data['footer_details'] = $this->Home_model->getFooterDetail();
            $data['logo'] = $this->Home_model->getLogo();
            $data['subscription_id'] = $this->Sell_model->subscriptionTable($user_id);
            $data['paid_subscriber'] = $this->Sell_model->paymentDetails($user_id);
            $data['free_users'] = $this->Sell_model->freeusersTable();
            $data['add_count'] = $this->Sell_model->freeuserpostCount($user_id);
            $data['records'] = $this->Sell_model->ProdlistTable($id);
            $data['records2'] = $this->Sell_model->productMultipleImage($id);
            
            if($data['paid_subscriber'] == 'TRUE')
            
            {
            $data['ads_limit'] = $this->Sell_model->adsTableCount($user_id);
            $total_ad_limit = $data['ads_limit'][0]->subp_ads_no;
            $posted_ad_count = count($data['ads_limit']);
            $data['balance_ad_count'] = $total_ad_limit - $posted_ad_count;
            }
            else
            {
            $total_ad_limit = $data['free_users'][0]->subp_ads_no;
            $posted_ad_count = count($data['add_count']);
            $data['balance_ad_count'] = $total_ad_limit - $posted_ad_count;
            }
            //   var_dump($data['records2']);
            
            $this->load->view('Headers/header_home',$data);
            $this->load->view('Sell/add',$data);
            $this->load->view('Footers/footer_home',$data);
        }
}