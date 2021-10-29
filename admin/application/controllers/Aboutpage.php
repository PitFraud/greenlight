<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutpage extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
		$this->load->model('Settings_model');    
        $this->load->model('Aboutpage_model');    
    }

    public function Aboutpagedetail()
    {
        $template['body'] = 'About_page/list';
		$template['script'] = 'About_page/script';
		$this->load->view('template',$template);
    }

    public function getAboutpageTable()
	{
	  $param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Aboutpage_model->getAboutPageDetails($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

    public function addAboutpage()
	{
		$this->form_validation->set_rules('about_title', 'about_title', 'required');
        $this->form_validation->set_rules('about_desc', 'about_desc', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'About_page/add';
			$template['script'] = 'About_page/script';
			$this->load->view('template', $template);
		}
		else {
			$about_us_id = $this->input->post('about_us_id');
			$data  = array(
				'about_us_title'=> $this->input->post('about_title'),
				'about_us_descp' => $this->input->post('about_desc'),
				'about_us_img_status' => 1
			);
			if($about_us_id)
			{
				$result = $this->General_model->update('frnt_about_us',$data,'about_us_id',$about_us_id);
				$response_text = 'About Us updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_about_us',$data);
				$response_text = 'About Us Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Aboutpage/', 'refresh');
		}
	}

    public function aboutusEdit($about_us_id)
	{
		$template['body'] = 'About_page/add';
		$template['script'] = 'About_page/script';
		$where=array('about_us_id'=>$about_us_id);
		$template['records'] = $this->General_model->getall('frnt_about_us',$where);
		$this->load->view('template', $template);
	}

    public function aboutusDelete()
	{
    $about_us_id = $this->input->post('about_us_id');
    $updateData = array('about_us_img_status' => 0);
    $data = $this->General_model->update('frnt_about_us',$updateData,'about_us_id',$about_us_id);  		
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

}

?>