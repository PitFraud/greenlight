<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct() {
        parent::__construct();
        $this->load->model('Loginmodel');
        $this->load->helper('url');
    }
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) 
        {
         	$this->load->view('Login/index');
        } else 
        { 	
            $data = array('user_name' => $this->input->post('username'),
                          'password' => $this->input->post('password'),
                          'status' => 1
                          );
            $result = $this->Loginmodel->checkUserLogin($data);
            if($result){
                redirect('dashboard');
            }
            else{
                $error['message'] = "Invalid Login Details";
				$this->load->view('Login/index',$error);
            }
        }
	}
    public function logout(){
        $this->session->sess_destroy();
        redirect('/login/');
    }
}