<?php 
defined('BASEPATH') or exit('No Direct script access allowed');

class Footer_details extends MY_Controller
{
    public function __construct()
    {
        parent::__Construct();
        if(! $this->is_logged_in()){
			redirect('/login');
        }
        $this->load->model('Footerdetail_model');
		$this->load->model('General_model');
    }


    public function getFooterDetails()
    {
        $template['body'] = 'Footer_detail/list';
		$template['script'] = 'Footer_detail/script';
		$this->load->view('template',$template);
    }


    public function getFooterDetailTable()
	{
	  $param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Footerdetail_model->getFooterDetails($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

    public function addFooterDetail()
	{
		$this->form_validation->set_rules('about_footer', 'about_footer', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('contact_1', 'contact_1', 'required');
		$this->form_validation->set_rules('contact_2', 'contact_2', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Footer_detail/add';
			$template['script'] = 'Footer_detail/script';
			$this->load->view('template', $template);
		}
		else {
			$footer_detail_id = $this->input->post('footer_detail_id');
			$data  = array(
				'footer_detail_about'=> $this->input->post('about_footer'),
				'footer_detail_email' => $this->input->post('email'),
				'footer_detail_contact_1' => $this->input->post('contact_1'),
				'footer_detail_contact_2' => $this->input->post('contact_2'),
				'footer_detail_status' => 1
			);
			if($footer_detail_id)
			{
				$result = $this->General_model->update('frnt_footer_details',$data,'footer_detail_id',$footer_detail_id);
				$response_text = 'Footer Details Updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_footer_details',$data);
				$response_text = 'Footer Details Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Footer/', 'refresh');
		}
	}

    public function footerdetailEdit($footer_detail_id)
	{
		$template['body'] = 'Footer_detail/add';
		$template['script'] = 'Footer_detail/script';
		$where=array('footer_detail_id'=>$footer_detail_id);
		$template['records'] = $this->General_model->getall('frnt_footer_details',$where);
		$this->load->view('template', $template);
	}

    public function footerdetailDelete()
	{
    $footer_detail_id = $this->input->post('footer_detail_id');
    $updateData = array('footer_detail_status' => 0);
    $data = $this->General_model->update('frnt_footer_details',$updateData,'footer_detail_id',$footer_detail_id);  		
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