<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ourteam extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
		$this->load->model('Settings_model');    
        $this->load->model('Ourteam_model');    
    }

    public function Ourteamdetails()
    {
        $template['body'] = 'Ourteam/list';
		$template['script'] = 'Ourteam/script';
		$this->load->view('template',$template);
    }

    public function getOurTeamTable()
	{
	  $param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
      $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
      $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
      $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
      $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
      $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

      $data = $this->Ourteam_model->getOurTeamTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

    public function addOurteam()
	{
		$this->form_validation->set_rules('ourteam_name', 'ourteam_name', 'required');
        $this->form_validation->set_rules('ourteam_desig', 'ourteam_desig', 'required');
        $this->form_validation->set_rules('ourteam_disp_ord', 'ourteam_disp_ord', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Ourteam/add';
			$template['script'] = 'Ourteam/script';
			$this->load->view('template', $template);
		}
		else {
			
			$our_team = $_FILES['ourteam_name_image']['name'];
			$file_name = rand(1000,1000000000).'.png';
			
			if($our_team != NULL){
				$config['upload_path']          = './assets/uploads/ourteam';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('ourteam_name_image'))
                {
                        $error = array('error' => $this->upload->display_errors());
						redirect('/Ourteam/', 'refresh');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                }
			}
			

			$our_team_id = $this->input->post('our_team_id');
			$data  = array(
				'our_team_name'=> $this->input->post('ourteam_name'),
				'our_team_desig' => $this->input->post('ourteam_desig'),
				'our_team_twitter_link' => $this->input->post('twitter'),
				'our_team_pintrest_link' => $this->input->post('pintrest'),
				'our_team_instagram_link' => $this->input->post('instagram'),
				'our_team_vimeo_link' => $this->input->post('vimeo'),
				'our_team_dip_order' => $this->input->post('ourteam_disp_ord'),
				'our_team_img' => $file_name,
				'our_team_status' => 1
			);
			if($our_team_id)
			{
				$result = $this->General_model->update('frnt_our_team',$data,'our_team_id',$our_team_id);
				$response_text = 'Our Team updated';
			}
			else{
				$result = $this->General_model->add_returnID('frnt_our_team',$data);
				$response_text = 'Our Team Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Ourteam/', 'refresh');
		}
	}

    public function ourteamEdit($our_team_id)
	{
		$template['body'] = 'Ourteam/add';
		$template['script'] = 'Ourteam/script';
		$where=array('our_team_id'=>$our_team_id);
		$template['records'] = $this->General_model->getall('frnt_our_team',$where);
		$this->load->view('template', $template);
	}

    public function ourteamDelete()
	{
    $our_team_id = $this->input->post('our_team_id');
    $updateData = array('our_team_status' => 0);
    $data = $this->General_model->update('frnt_our_team',$updateData,'our_team_id',$our_team_id);  		
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