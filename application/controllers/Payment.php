<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Payment extends CI_Controller
    {
        public function __Construct()
        {
            parent::__Construct();
            $this->load->library('session');
            if(!$this->session->has_userdata('name') ){
                header('Location: '.base_url('Home'));
                exit;
            }
            $this->load->helper('url');
		    $this->load->model('Home_model');
            $this->load->model('Payment_model');
            $this->load->model('General_model');
        }

        public function getPayment($id)
        {
            $data['menu_cate'] = $this->Home_model->getMenuCategory();
            $data['menu'] = $this->Home_model->getMenuHome();
            $data['submenu'] = $this->Home_model->getSubMenuHome();
            $data['location'] = $this->Home_model->getLocationDetails();
            $data['menu_cat'] =$this->Home_model->getMenuCatTable();
            @$user_id = $this->session->userdata('user_id');
            $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
            $data['user_name'] = $this->Home_model->getUsername($user_id);
            $data['footer_details'] = $this->Home_model->getFooterDetail();
            $data['logo'] =$this->Home_model->getLogo();
            $data['subscription'] = $this->Payment_model->getSubscriptionDetailTable($id);

            // var_dump($data['subscription']);
            $this->load->view('Headers/header_home',$data);
            $this->load->view('Payment',$data);
            $this->load->view('Footers/footer_home',$data);
        }

        public function addPayment()
        {
            $payment_id = $this->input->post('pay_repo');
            $amt = $this->input->post('amt');
            @$user_id = $this->session->userdata('user_id');
            $sub_id = $this->input->post('sub_id');

            $data = array(
                'pay_user_fk' => $user_id,
                'pay_sub_fk' => $sub_id,
                'pay_amt' => $amt,
                'pay_payment_id' => $payment_id,
                'pay_status'=> 1 ,
                'pay_enter_datetime' => date("Y-m-d h:i:s"),
            );

            $result = $this->General_model->add_returnID('tbl_payment',$data);
            $response = "Hello".$result;
            echo json_encode($response);
        }
    }
?>
