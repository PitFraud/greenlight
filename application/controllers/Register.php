<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
	function __construct() {
        parent::__construct();
        $this->load->model('Register_Model');
        $this->load->helper('url');
        $this->load->model('Home_model');
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
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();

        $this->load->view('Headers/header_home',$data);
        $this->load->view('Register',$data);
        $this->load->view('Footers/footer_home',$data);
    }
    public function reg()
    {

        $data = array(
            'first_name' => $this->input->post('first'),
            'last_name' => $this->input->post('last'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'user_type' => 'U',
            'status' => '1',
            'created_date' => date('y-m-d'),
            // 'password' => password_hash($password,PASSWORD_DEFAULT)
        );

        $this->Register_Model->insert_user($data);
        $id = $this->db->insert_id();
        // $this->load->view('Headers/header_home');
        // $this->load->view('Home');
        // $this->load->view('Footers/footer_home');
        redirect('/Home/', 'refresh');
    }

    public function check_email(){
        $email = $this->input->post('email');
        if($this->Register_Model->check_email($email)==TRUE){
            echo 0;
        }
        else{

            echo 1;
        }
    }
    public function LoginCheck()
    {
        // if( $this->session->userdata('name'))
        // {

        //  $this->load->view('admin/header');
        //  $this->load->view('admin/index.html');
        //  $this->load->view('admin/footer');
        // }
        // else
        // {

            $data=array();
            $username = $this->input->get_post('email');
            $password=$this->input->get_post('pass');

            $this->load->model('Register_Model');
            $login['log']=$this->Register_Model->CheckUser($username);

            if($login['log'])
            {
                foreach ($login['log']->result() as $key) {
                    if($password == $key->password)
                    {

                        $name=   $key->first_name;
                        $user_id=   $key->id;
                        // $branch=$key->branch;
                        // $role =$key->role;
                        $this->session->set_userdata('user_id', $user_id);
                        $this->session->set_userdata('name', $name);
                        // $this->session->set_userdata('branch', $branch);
                        // $this->session->set_userdata('role', $role);
                        ?> <script type="text/javascript">
                            alert('Login Successfully');
                            </script> <?php
                            redirect('/Home', 'refresh');
                    }
                    else
                    {
                        ?> <script type="text/javascript">
                            alert('Incorrect Username or Password');
                            </script> <?php
                           redirect('Register/login', 'refresh');
                        }

                    }

                }else
                {
                    ?> <script type="text/javascript">
                        alert('Incorrect Username');
                        </script> <?php
                        $this->index();
                    }
    }

    public function logout()
    {
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('name');

      redirect('Home', 'refresh');

  }

    public function login()
    {
        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();

        $this->load->view('Headers/header_home',$data);
        $this->load->view('login',$data);
        $this->load->view('Footers/footer_home',$data);
    }
    public function reset_pass()
    {
        @$user_id = $this->session->userdata('user_id');
        $data['user_image_header'] = $this->Home_model->getUserImage($user_id);
        $data['menu_cate'] = $this->Home_model->getMenuCategory();
        $data['menu'] = $this->Home_model->getMenuHome();
        $data['submenu'] = $this->Home_model->getSubMenuHome();
        $data['location'] = $this->Home_model->getLocationDetails();
        $data['menu_cat'] =$this->Home_model->getMenuCatTable();
        $data['footer_details'] = $this->Home_model->getFooterDetail();
        $data['logo'] =$this->Home_model->getLogo();

        $this->load->view('Headers/header_home',$data);
        $this->load->view('reset_pass',$data);
        $this->load->view('Footers/footer_home',$data);
    }

    public function forgot_pass(){

        $email = $this->input->post('email');

        $d = $this->Register_Model->get_forgot($email);
        if(!$d==NULL){

            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            $re_pass = implode($pass);

            $id = $d[0]->id;
            $data = array(
              "password" =>$re_pass
            );

            // $name = strtoupper($d[0]->first_name);
            // $message="Dear ".$name."
            // Welcome To Green Light,
            // Here Is Your Reset Password
            // Password : ".$re_pass;

            // $this->email->from('user13.wahylab@gmail.com');
            // $this->email->to($this->input->post('email'));
            // $this->email->subject('Forgot Password');
            // $this->email->message($message);
            // if($this->email->send())
            // {
                echo "Check Your Email For Password ";
                echo $re_pass;

                $this->Register_Model->update_user_pass($data,$id);

                redirect('Register/login', 'refresh');
            // }
            // else
            // {
            //     show_error($this->email->print_debugger());
            // }
            }else{
                ?> <script type="text/javascript">
                alert('Incorrect Email Id');
                </script> <?php
               redirect('Register/login', 'refresh');
            }
    }













}
