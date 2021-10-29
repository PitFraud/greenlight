<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		if(! $this->is_logged_in()){
			redirect('/login');
			

		}

		$this->load->model('General_model');
		$this->load->model('Reports_model');
		$this->load->model('Settings_model');

	}
	

    public function UserReports()
    {
        $template['body'] = 'Reports/User_report/list';
        $template['script'] = 'Reports/User_report/script';
        $this->load->view('template',$template);
    }



    public function getUserReports(){
		
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$user_name =(isset($_REQUEST['user_name']))?$_REQUEST['user_name']:'';
		$start_date =(isset($_REQUEST['start_date']))?$_REQUEST['start_date']:'';
        $end_date =(isset($_REQUEST['end_date']))?$_REQUEST['end_date']:'';
	
        if($user_name){
            $param['user_name'] =  $user_name;
        }

		if($start_date){
            $start_date = str_replace('/', '-', $start_date);
            $param['start_date'] =  date("Y-m-d",strtotime($start_date));
        }
       
        if($end_date){
            $end_date = str_replace('/', '-', $end_date);
            $param['end_date'] =  date("Y-m-d",strtotime($end_date));
        }
        $data = $this->Reports_model->getUserReportsTable($param);
      
    	$json_data = json_encode($data);
    	echo $json_data;
    }
	
}