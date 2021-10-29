<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MY_Controller {
	public function __construct() {
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
        
        $this->load->model('General_model');
		// $this->load->model('Dashboard_model');
		$this->load->model('Settings_model');
        $this->load->model('Logo_model');
	}
	public function index()
	{

	}
	public function Company()
	{
		$template['body'] = 'Setting/Company/list';
		$template['script'] = 'Setting/Company/script';
		$this->load->view('template',$template);
	}
	public function addCompany()
	{
		$this->form_validation->set_rules('company', 'company', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Setting/Company/add';
			$template['script'] = 'Setting/Company/script';
			$this->load->view('template', $template);
		}
		else {
			$company = $this->input->post('cmp_id');
			$data  = array(
						'cmp_name'=> $this->input->post('company'),
						'cmp_adress' => $this->input->post('cmp_address'),
						'cmp_phone' => $this->input->post('cmp_phone'),
						'cmp_email' => $this->input->post('cmp_email'),
						'cmp_gst' => $this->input->post('cmp_gst'),
						'cmp_status' => 1
						);
			if($company){
				 $result = $this->General_model->update('tbl_companyinfo',$data,'cmp_id',$company);
				 $log = array(
							'user_name'=>$this->input->post('username'),
							'email'=>$this->input->post('cmp_email'),
							'password'=>$this->input->post('password'),
							'updated_date'=>date('Y-m-d'),
						);
				 $this->General_model->update('tbl_login',$log,'cmp_id',$company);
				 $response_text = 'Company Details updated';
			}
			else{
				$result = $this->General_model->add_returnID('tbl_companyinfo',$data);

				$log = array(
							'user_name'=>$this->input->post('username'),
							'email'=>$this->input->post('cmp_email'),
							'password'=>$this->input->post('password'),
							'user_type'=> 'C',
							'cmp_id'=>$result,
							'created_date'=>date('Y-m-d'),
							'status'=>1
						);
				$result = $this->General_model->add('tbl_login',$log);
				$response_text = 'Company Details Added';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/Company/', 'refresh');
		}
	}
	public function getCompany()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
		$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
        $end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
		if($start_date){
            $start_date = str_replace('/', '-', $start_date);
            $param['start_date'] =  date("Y-m-d",strtotime($start_date));
        }
       
        if($end_date){
            $end_date = str_replace('/', '-', $end_date);
            $param['end_date'] =  date("Y-m-d",strtotime($end_date));
        }
		
		$data = $this->Settings_model->getCompanyinfoTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function deleteCompany()
	{
       
        $cmp_id = $this->input->post('cmp_id');
        $updateData = array('cmp_status' => 0);
        $logData = array('status' => 0);
        $data = $this->General_model->update('tbl_companyinfo',$updateData,'cmp_id',$cmp_id);
        $this->General_model->update('tbl_login',$logData,'cmp_id',$cmp_id);   		
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
	public function CompanyinfoEdit($cmp_id)
	{
		$template['body'] = 'Setting/Company/add';
		$template['script'] = 'Setting/Company/script';
		$template['records'] = $this->Settings_model->get_row($cmp_id);
		$this->load->view('template', $template);
	}

	//fin year
	public function FinYear()
	{
		$template['body'] = 'Setting/Finyear/list';
		$template['script'] = 'Setting/Finyear/script';
		$this->load->view('template', $template);
	}
	public function Finyearget()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Settings_model->getFinYearTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function addFinYear()
	{
		$this->form_validation->set_rules('fin_year', 'Year', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Setting/Finyear/add';
			$template['script'] = 'Setting/Finyear/script';
			$this->load->view('template', $template);
		}
		else {
			$start_date = str_replace('/', '-', $this->input->post('start_date'));
			$start_date =  date("Y-m-d",strtotime($start_date));
			$end_date = str_replace('/', '-', $this->input->post('end_date'));
			$end_date =  date("Y-m-d",strtotime($end_date));
			$currentfn = $this->input->post('currentfn');
			if($currentfn==1)
			 {
				 $fnst = 1; 
				 $data = array('fin_status' => 0 );
				 $this->General_model->updatefin('tbl_finyear',$data);
			 }
			 else
			 {
					 $fnst = 0;
			 }
			$datas = array(
						'fin_year' => $this->input->post('fin_year'),
						'fin_startdate' => $start_date,
						'fin_enddate' => $end_date,
						'fin_status' => $fnst,
						'status'=> 1
						);
			$finyear_id = $this->input->post('finyear_id');
			if($finyear_id){
				 $data['finyear_id'] = $finyear_id;
				 $result = $this->General_model->update('tbl_finyear',$datas,'finyear_id',$finyear_id);
				 $response_text = 'Financial Year  updated';
			}
			else{
				$result = $this->General_model->add('tbl_finyear',$datas);
				$response_text = 'Financial Year Inserted';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/FinYear/', 'refresh');
		}
	}
	public function FinyearEdit($id)
	{
		$template['body'] = 'Setting/Finyear/add';
		$template['script'] = 'Setting/Finyear/script';
		$template['records'] = $this->General_model->get_row('tbl_finyear','finyear_id',$id);
    	$this->load->view('template', $template);
	}
	public function FinyearDelete()
	{
		$finyear_id = $this->input->post('finyear_id');
        $updateData = array('status' => 0);
        $data = $this->General_model->update('tbl_finyear',$updateData,'finyear_id',$finyear_id);                       
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
	public function ChangePassword()
	{
		$id = $this->session->userdata['id'];
		$template['body'] = 'Setting/Changepassword/index';
		$template['script'] = 'Setting/Changepassword/script';
		$template['records'] = $this->General_model->get_row('users','id',$id);
		$this->load->view('template', $template);
	}
	public function resetPassword()
	{
		$id = $this->input->post('id');
		$data = array(
					'user_name' => $this->input->post('username'),
					'password' => $this->input->post('password'));
		$res = $this->General_model->update('users',$data,'id',$id);
		if ($res) 
		{
			$response_text='Password has been changed.';
		}
		else
		{
			$response_text='Something went wrong !!!';
		}
		$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
		redirect('dashboard');	
 	}

	 public function ChangeLogo()
	 {
		$template['body'] = 'Setting/ChangeLogo/list';
		$template['script'] = 'Setting/ChangeLogo/script';
		$this->load->view('template', $template);
	 }


	 public function getLogo()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
    	$data = $this->Logo_model->getLogoTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	public function addLogo()
	{
		$this->form_validation->set_rules('logo_name', 'logo_name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Setting/ChangeLogo/add';
			$template['script'] = 'Setting/ChangeLogo/script';
			$this->load->view('template', $template);
		}
		else {
			$logo_id = $this->input->post('logo_id');
			$logo_img = $_FILES['logo_img']['name'];
			$file_name = rand(1000,10000000).'.png';
			if($logo_img != NULL){
				$config1['upload_path']          = './assets/uploads/logo';
                $config1['allowed_types']        = 'gif|jpg|jpeg|png';
				$config1['file_name']			=	$file_name;
				
                $this->load->library('upload', $config1);
				$this->upload->initialize($config1);
                if ( ! $this->upload->do_upload('logo_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
						redirect('/ChangeLogo/');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                }
			}

			
			$data = array(
			'Logo_name' => $this->input->post('logo_name'),
			'Logo_img' => $file_name,
			'Logo_status' => 1,
						);
			
			if($logo_id){
				 $result = $this->General_model->update('logo',$data,'Logo_id',$logo_id);
				 $response_text = 'Logo  updated';
			}
			else{
				$result = $this->General_model->add('logo',$data);
				$response_text = 'Logo Inserted';
			}
			if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
	        redirect('/ChangeLogo/', 'refresh');
		}
	}

	public function editLogo($Logo_id)
	{
		$template['body'] = 'Setting/ChangeLogo/add';
		$template['script'] = 'Setting/ChangeLogo/script';
		$where=array('Logo_id'=>$Logo_id);
		$template['records'] = $this->General_model->getall('logo',$where);
		$this->load->view('template', $template);
	}

	public function LogoDelete()
	{
	$Logo_id = $this->input->post('Logo_id');
    $data = $this->General_model->delete('logo','Logo_id',$Logo_id);  		
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


	public function ajaxLogo()
	{
		$logos = $this->General_model->get_all('logo');
		$response = json_encode($logos);
		echo $response;
	}
}
