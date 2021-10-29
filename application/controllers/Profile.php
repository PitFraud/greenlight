<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
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
        $this->load->model('General_model');
        $this->load->model('Profile_model');
    }
	public function index()
	{
        //getting User Id from session data
        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $user_id = $this->session->userdata('user_id');
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['user_info'] = $this->Profile_model->getUserTableDetails($user_id);
        $data['user_image'] = $this->Profile_model->getUserImageTableDetails($user_id);
        $data['user_name'] = $this->Home_model->getUsername($user_id);
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();
        // var_dump($data['user_image']);die;
         $this->load->view('Headers/header_home',$data);
		 $this->load->view('Profile',$data);
         $this->load->view('Footers/footer_home',$data);
        
        //   var_dump($data['user_image']);
    }

    public function insertUserProfile()
    {   
            //user id from database
            @$img_id = $this->input->post('image_id');
            @$user_id = $this->input->post('user_id');
			@$profile_img = $_FILES['profile_img']['name'];
			
			$data  = array(
				'first_name '=> $this->input->post('f_name'),
				'last_name '=> $this->input->post('l_name'),
                'phone_no '=> $this->input->post('p_number'),
                'email '=> $this->input->post('email'),
				
			);
			if($user_id)
			{

				@$result = $this->General_model->update('users',$data,'id',$user_id);

                //profile image upload
                $file_name = rand(10000,100000000).'.png';
                if($profile_img != NULL){
                $config['upload_path']          =  './admin/assets/uploads/user_profile';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('profile_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);
                        exit;
                        //redirect('/Sell/', 'refresh');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                }
                $data1 = array(
                    'user_pimage_name' => $file_name,
                );
                if($img_id){
                $result1 = $this->General_model->update('user_profile_img',$data1,'user_id_fk',$user_id);

                }
                else{
                    $data2 = array(
                        'user_pimage_name' => $file_name,
                        'user_id_fk' =>$user_id,
                    );
                $result1 = $this->General_model->add_returnID('user_profile_img',$data2);
                    
                }

            }
				$response_text = 'User Profile updated';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Profile/', 'refresh');
        }
    
}