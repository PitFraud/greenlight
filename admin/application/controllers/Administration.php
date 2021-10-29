<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administration extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		if(! $this->is_logged_in()){
			redirect('/login');
		}

		$this->load->model('General_model');
		$this->load->model('Administration_model');
		$this->load->model('Settings_model');

	}
	public function index(){

	}
	public function Category(){
		$template['body'] = 'Administration/Category/list';
		$template['script'] = 'Administration/Category/script';
		$this->load->view('template',$template);
	}
	public function addCategory(){
		$this->form_validation->set_rules('category', 'category', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Administration/Category/add';
			$template['script'] = 'Administration/Category/script';
			$this->load->view('template', $template);
		}
		else {
			$category_id = $this->input->post('category_id');
			$data  = array(
				'category'=> $this->input->post('category'),
				'category_description' => $this->input->post('description'),
				'category_parent_id' => 0,
				'category_status' => 1
			);
			if($category_id)
			{
				$result = $this->General_model->update('category',$data,'category_id',$category_id);
				$response_text = 'category updated';
			}
			else{
				$result = $this->General_model->add_returnID('category',$data);
				$response_text = 'Category Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Category/', 'refresh');
		}
	}
	public function getCategory(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getCategoryTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function categoryDelete(){
		$category_id = $this->input->post('category_id');
		$updateData = array('category_status' => 0);
		$data = $this->General_model->update('category',$updateData,'category_id',$category_id);
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
	public function categoryEdit($category_id){
		$template['body'] = 'Administration/Category/add';
		$template['script'] = 'Administration/Category/script';
		$where=array('category_id'=>$category_id);
		$template['records'] = $this->General_model->getall('category',$where);
		$this->load->view('template', $template);
	}

	public function Subcategory(){
		$template['body'] = 'Administration/Subcategory/list';
		$template['script'] = 'Administration/Subcategory/script';
		$this->load->view('template',$template);
	}
	public function addSubcategory(){
		$this->form_validation->set_rules('category', 'category', 'required');
		if ($this->form_validation->run() == FALSE) {
			$where=array('category_status'=>1,'category_parent_id'=>0);
			$template['categories'] = $this->General_model->getall('category',$where);
			$template['body'] = 'Administration/Subcategory/add';
			$template['script'] = 'Administration/Subcategory/script';
			$this->load->view('template', $template);
		}
		else {

			$category_id = $this->input->post('category_id');
			$data  = array(
				'category'=> $this->input->post('category'),
				'category_description' => $this->input->post('description'),
				'category_parent_id' => $this->input->post('category_parent'),
				'category_status' => 1
			);
			if($category_id)
			{
				$result = $this->General_model->update('category',$data,'category_id',$category_id);
				$response_text = 'category updated';
			}
			else{
				$result = $this->General_model->add_returnID('category',$data);
				$response_text = 'Category Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Subcategory/', 'refresh');
		}
	}
	public function getSubcategory(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getsubCategoryTable($param);
		$where=array('category_status'=>1,'category_parent_id'=>0);
		$categories = $this->General_model->getall('category',$where);

		for ($i=0; $i < count($data['data']); $i++)
		{
			// echo $data['data'][$i]->category_parent_id;
			for ($k=0; $k < count($categories) ; $k++)
			{
				if ($data['data'][$i]->category_parent_id == $categories[$k]->category_id)
				{
					$main=$categories[$k]->category;
				}
			}
			//error for undefined variable main
			@$data['data'][$i]->main_cat=$main;
		}

		$json_data = json_encode($data);
		echo $json_data;
	}
	public function subcategoryEdit($category_id){
		$where=array('category_status'=>1,'category_parent_id'=>0);
		$template['categories'] = $this->General_model->getall('category',$where);
		$template['body'] = 'Administration/Subcategory/add';
		$template['script'] = 'Administration/Subcategory/script';
		$where=array('category_id'=>$category_id);
		$template['records'] = $this->General_model->getall('category',$where);
		$this->load->view('template', $template);
	}
	public function Designation(){
		$template['body'] = 'Administration/Designation/list';
		$template['script'] = 'Administration/Designation/script';
		$this->load->view('template',$template);
	}
	public function getDesignation(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';



		$data = $this->Administration_model->getDesignationTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addDesignation(){
		$this->form_validation->set_rules('designation', 'designation', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Administration/Designation/add';
			$template['script'] = 'Administration/Designation/script';
			$this->load->view('template', $template);
		}
		else {
			$designation_id = $this->input->post('id');
			$data  = array(
				'designation'=> $this->input->post('designation'),
				'description' => $this->input->post('description'),
				'status' => 1
			);
			if($designation_id)
			{
				$result = $this->General_model->update('emp_designation',$data,'id',$designation_id);
				$response_text = 'Designation updated';
			}
			else{
				$result = $this->General_model->add_returnID('emp_designation',$data);
				$response_text = 'Designation Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Designation/', 'refresh');
		}
	}
	public function designationEdit($id){
		$template['body'] = 'Administration/Designation/add';
		$template['script'] = 'Administration/Designation/script';
		$where=array('id'=>$id);
		$template['records'] = $this->General_model->getall('emp_designation',$where);
		$this->load->view('template', $template);
	}
	public function designationDelete(){
		$designation_id = $this->input->post('id');
		$updateData = array('status' => 0);
		$data = $this->General_model->delete('emp_designation','id',$designation_id);
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
	//Employee CRUD
	public function Employee(){
		$template['body'] = 'Administration/Employee/list';
		$template['script'] = 'Administration/Employee/script';
		$this->load->view('template',$template);
	}
	public function getEmployee(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		//$data = $this->Administration_model->getEmployeeTable($param);
		// $des = $this->General_model->get_all('emp_designation');
		$data = $this->Administration_model->getEmployeeDesc($param);

		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addEmployeeDes(){
		$this->form_validation->set_rules('emp_name', 'emp_name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['hello'] = $this->General_model->get_all('emp_designation');
			$template['body'] = 'Administration/Employee/add';
			$template['script'] = 'Administration/Employee/script';
			$this->load->view('template', $template);
		}
		else {
			$employee_id = $this->input->post('emp_id');
			$data  = array(
				'name'=> $this->input->post('emp_name'),
				'designation' => $this->input->post('designation_idfk'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'status' => 1
			);
			if($employee_id)
			{
				$result = $this->General_model->update('employees',$data,'id',$employee_id);
				$response_text = 'Employee updated';
			}
			else{
				$result = $this->General_model->add_returnID('employees',$data);
				$response_text = 'Employee Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Employee/', 'refresh');
		}
	}
	public function employeeEdit($id){
		$template['body'] = 'Administration/Employee/add';
		$template['script'] = 'Administration/Employee/script';
		$template['hello'] = $this->General_model->get_all('emp_designation');

		$where=array('emp_id'=>$id);
		$template['records'] = $this->General_model->getall('employees',$where);
		$this->load->view('template', $template);
	}
	public function employeeDelete(){
		$employee_id = $this->input->post('emp_id');
		$data = $this->General_model->delete('employees','emp_id',$employee_id);
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







/*Event section*/
public function Events(){
	$template['body'] = 'Administration/Events/list';
	$template['script'] = 'Administration/Events/script';
	$this->load->view('template',$template);
}

public function addEvent(){

	$this->form_validation->set_rules('event_name', 'event_desc', 'required');
	if ($this->form_validation->run() == FALSE) {
		$template['hello']=$this->General_model->get_all('tbl_events');
		$template['body']='Administration/Events/add';
		$template['script']='Administration/Events/script';
		$this->load->view('template', $template);
	}
	else {
			// var_dump($this->input->post()); die;
		$event_id=$this->input->post('event_id');
		$event_image = $_FILES['event_image']['name'];
		$file_name = rand(1000,100000).'.png';
		if($event_image != NULL){
			$config['upload_path']          = './assets/uploads/events';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']			=	$file_name;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('event_image')){
				$error = array('error' => $this->upload->display_errors());
				// $template['prod_cat'] = $this->General_model->get_all('product_category');
				// $template['act'] = $this->General_model->get_all('tbl_events');
				$template['body'] = 'Administration/Events/add';
				$template['script'] = 'Administration/Events/script';
				$this->load->view('template', $template);
			}
			else{
				$data = array('upload_data' => $this->upload->data());
			}
		}
		$data=array(
			'event_name'=>$this->input->post('event_name'),
			'event_desc'=>$this->input->post('event_desc'),
			'event_image'=>$file_name,
			'created_at'=>Date('Y:m:d H:i:s'),
		);
		if($event_id){
			$result=$this->General_model->update('tbl_events',$data,'event_id',$event_id);
			$response_text='Event updated';
		}
		else{
			$result=$this->General_model->add_returnID('tbl_events',$data);
			$response_text='Event added successfully';
		}
		if($result){
			$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
		}
		else{
			$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
		}
		redirect('/Events/','refresh');
	}
}

public function getEvent(){
	$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
	$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
	$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
	$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
	$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
	$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
	$data = $this->Administration_model->getEventDetails($param);
	$json_data = json_encode($data);
	echo $json_data;
}

public function editEvent($id){
	$template['body'] = 'Administration/Events/add';
	$template['script'] = 'Administration/Events/script';
	$where=array('event_id'=>$id);
	$template['records'] = $this->General_model->getall('tbl_events',$where);
	$this->load->view('template', $template);
}

public function deleteEvent(){
	$event_id = $this->input->post('event_id');
	$data = $this->General_model->delete('tbl_events','event_id',$event_id);
	if($data){
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









	//Offers CRUD
	public function Offers(){
		$template['body'] = 'Administration/Offers/list';
		$template['script'] = 'Administration/Offers/script';
		$this->load->view('template',$template);
	}
	public function getOffers(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getOffersTable($param);
		for($i=0;$i < count($data['data']);$i++){
			$offer = $data['data'][$i]->status;
			if($offer == 1){
				$a = "Active";
			}
			else{
				$a="InActive";
			}
			$data['data'][$i]->status = $a;
		}

		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addOffer(){
		$this->form_validation->set_rules('off_name', 'off_name', 'required');
		$this->form_validation->set_rules('off_per', 'off_per', 'required');
		// $this->form_validation->set_rules('status', 'status', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['act'] = $this->General_model->get_all('offers');
			$template['body'] = 'Administration/Offers/add';
			$template['script'] = 'Administration/Offers/script';
			$this->load->view('template', $template);
		}
		else {
			$offer_id = $this->input->post('off_id');
			$offer_img = $_FILES['off_img']['name'];
			$file_name = rand(1000,100000).'.png';

			if($offer_img != NULL){
				$config['upload_path']          = './assets/uploads/offers';
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;
				// $config['max_size']             = 100;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('off_img'))
				{
					$error = array('error' => $this->upload->display_errors());

					$template['act'] = $this->General_model->get_all('offers');
					$template['body'] = 'Administration/Offers/add';
					$template['script'] = 'Administration/Offers/script';
					$this->load->view('template', $template);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					// $this->load->view('upload_success', $data);
				}
			}

			$data  = array(
				'off_name'=> $this->input->post('off_name'),
				'off_img'=> $file_name,
				'off_percentage'=> $this->input->post('off_per'),
				'off_strt_date' => $this->input->post('Str_date'),
				'off_end_date' => $this->input->post('end_date'),
				'status' => $this->input->post('status'),
			);
			if($offer_id)
			{
				$result = $this->General_model->update('offers',$data,'off_id',$offer_id);
				$response_text = 'Offer updated';
			}
			else{
				$result = $this->General_model->add_returnID('offers',$data);
				$response_text = 'Offer Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Offers/', 'refresh');
		}
	}
	public function offerEdit($off_id){
		$template['body'] = 'Administration/Offers/add';
		$template['script'] = 'Administration/Offers/script';
		$where=array('off_id'=>$off_id);
		$template['records'] = $this->General_model->getall('offers',$where);
		$this->load->view('template', $template);
	}
	public function offerDelete(){
		$employee_id = $this->input->post('off_id');
		$data = $this->General_model->delete('offers','off_id',$employee_id);
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
	public function prodOffer(){
		$template['body'] = 'Administration/Offers/offer_product';
		$template['script'] = 'Administration/Offers/script';
		$this->load->view('template',$template);
	}
	//Location CRUD
	public function Locations(){
		$template['body'] = 'Administration/Locations/list';
		$template['script'] = 'Administration/Locations/script';
		$this->load->view('template',$template);
	}
	public function getLocation(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getLocationsTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addLocation(){
		$this->form_validation->set_rules('city_name', 'city_name', 'required');
		$this->form_validation->set_rules('state_name', 'state_name', 'required');
		// $this->form_validation->set_rules('status', 'status', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['act'] = $this->General_model->get_all('locations');
			$template['body'] = 'Administration/Locations/add';
			$template['script'] = 'Administration/Locations/script';
			$this->load->view('template', $template);
		}
		else {
			$loc_id = $this->input->post('loc_id');
			$data  = array(
				'loc_city_name'=> $this->input->post('city_name'),
				'loc_dist_name'=> $this->input->post('dis_name'),
				'loc_state_name' => $this->input->post('state_name'),
				'loc_post_code' => $this->input->post('post_code'),
				'loc_created_date' => $this->input->post('enter_date'),
			);
			if($loc_id)
			{
				$result = $this->General_model->update('locations',$data,'loc_id',$loc_id);
				$response_text = 'Location updated';
			}
			else{
				$result = $this->General_model->add_returnID('locations',$data);
				$response_text = 'Location Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Locations/', 'refresh');
		}
	}
	public function locationEdit($loc_id){
		$template['body'] = 'Administration/Locations/add';
		$template['script'] = 'Administration/Locations/script';
		$where=array('loc_id'=>$loc_id);
		$template['records'] = $this->General_model->getall('locations',$where);
		$this->load->view('template', $template);
	}
	public function locationDelete(){
		$loc_id = $this->input->post('loc_id');
		$data = $this->General_model->delete('locations','loc_id',$loc_id);
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
	//Seller CRUD
	public function Seller(){
		$template['body'] = 'Administration/Seller/list';
		$template['script'] = 'Administration/Seller/script';
		$this->load->view('template',$template);
	}
	public function getSeller(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getSellersTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addSeller(){
		$this->form_validation->set_rules('seller_name', 'seller_name', 'required');
		$this->form_validation->set_rules('sell_address', 'sell_address', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['seller'] = $this->General_model->get_all('tbl_seller');
			$template['body'] = 'Administration/Seller/add';
			$template['script'] = 'Administration/Seller/script';
			$this->load->view('template', $template);
		}
		else {
			$seller_id = $this->input->post('sell_id');

			$offer_img = $_FILES['sell_image']['name'];
			$file_name = rand(1000,100000).'.png';

			if($offer_img != NULL){
				$config['upload_path']          = './assets/uploads/seller';
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;
				// $config['max_size']             = 100;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('sell_image'))
				{
					$error = array('error' => $this->upload->display_errors());

					$template['act'] = $this->General_model->get_all('offers');
					$template['body'] = 'Administration/Seller/add';
					$template['script'] = 'Administration/Seller/script';
					$this->load->view('template', $template);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());

				}
			}

			$data  = array(
				'sell_name'=> $this->input->post('seller_name'),
				'sell_comp_name' => $this->input->post('sell_comp_name'),
				'sell_address' => $this->input->post('sell_address'),
				'sell_phone_no' => $this->input->post('sell_phone'),
				'sell_img' => $file_name,
				'sell_status' => $this->input->post('buy_status')
			);
			if($seller_id)
			{
				$result = $this->General_model->update('tbl_seller',$data,'sell_id',$seller_id);
				$response_text = 'Seller updated';
			}
			else{
				$result = $this->General_model->add_returnID('tbl_seller',$data);
				$response_text = 'Seller Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Seller/', 'refresh');
		}

	}
	public function sellerEdit($sell_id){
		$template['body'] = 'Administration/Seller/add';
		$template['script'] = 'Administration/Seller/script';
		$template['seller'] = $this->General_model->get_all('tbl_seller');
		$where=array('sell_id'=>$sell_id);
		$template['records'] = $this->General_model->getall('tbl_seller',$where);
		$this->load->view('template', $template);
	}
	//Buyer CRUD
	public function Buyer(){
		$template['body'] = 'Administration/Buyer/list';
		$template['script'] = 'Administration/Buyer/script';
		$this->load->view('template',$template);
	}
	public function getBuyer(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getBuyersTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	//Product_Category CRUD
	public function ProductCat(){
		$template['body'] = 'Administration/Product_cat/list';
		$template['script'] = 'Administration/Product_cat/script';
		$this->load->view('template',$template);
	}
	public function getProductCat(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getProductCatTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addProductCat(){
		$this->form_validation->set_rules('pro_cat_name', 'pro_cat_name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Administration/Product_cat/add';
			$template['script'] = 'Administration/Product_cat/script';
			$this->load->view('template', $template);
		}
		else {
			$prod_cat_id = $this->input->post('prod_cat_id');
			$data  = array(
				'prod_cat_name'=> $this->input->post('pro_cat_name'),
				'prod_cat_display_order'=> $this->input->post('pro_cat_dsp_seq'),
				'prod_cat_status' => 1,
			);
			if($prod_cat_id)
			{
				$result = $this->General_model->update('product_category',$data,'pro_cat_id',$prod_cat_id);
				$response_text = 'Product Category updated';
			}
			else{
				$result = $this->General_model->add_returnID('product_category',$data);
				$response_text = 'Product Category Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/ProductCat/', 'refresh');
		}

	}
	public function ProductCatEdit($pro_cat_id){
		$template['body'] = 'Administration/Product_cat/add';
		$template['script'] = 'Administration/Product_cat/script';
		$where=array('pro_cat_id'=>$pro_cat_id);
		$template['records'] = $this->General_model->getall('product_category',$where);
		$this->load->view('template', $template);
	}
	public function ProductCatDelete(){
		$pro_cat_id = $this->input->post('pro_cat_id');
		$data = $this->General_model->delete('product_category','pro_cat_id',$pro_cat_id);
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
	//Product_Category CRUD
	public function ProductSubCat(){
		$template['body'] = 'Administration/Product_sub_cat/list';
		$template['script'] = 'Administration/Product_sub_cat/script';
		$this->load->view('template',$template);
	}
	public function getProductSubCat(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getProductSubCatTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addProductSubCat(){
		$this->form_validation->set_rules('pro_cat_id_fk', 'pro_cat_id_fk', 'required');
		$this->form_validation->set_rules('pro_sub_cat_name', 'pro_sub_cat_name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['prod_cat'] = $this->General_model->get_all('product_category');
			$template['body'] = 'Administration/Product_sub_cat/add';
			$template['script'] = 'Administration/Product_sub_cat/script';
			$this->load->view('template', $template);
		}
		else {
			$pro_sub_cat_id = $this->input->post('pro_sub_cat_id');
			$offer_img = $_FILES['pro_sub_cat_img']['name'];
			$file_name = rand(1000,100000).'.png';
			if($offer_img != NULL){
				$config['upload_path']='./assets/uploads/prodsubcat';
				$config['allowed_types']='gif|jpg|jpeg|png';
				$config['file_name']=	$file_name;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('pro_sub_cat_img')){
					$error = array('error' => $this->upload->display_errors());
					$template['prod_cat'] = $this->General_model->get_all('product_category');
					$template['act'] = $this->General_model->get_all('offers');
					$template['body'] = 'Administration/Product_sub_cat/add';
					$template['script'] = 'Administration/Product_sub_cat/script';
					$this->load->view('template', $template);
				}
				else{
					$data = array('upload_data' => $this->upload->data());
				}
			}
			$data  = array(
				'pro_sub_cat_name'=> $this->input->post('pro_sub_cat_name'),
				'pro_cat_id_fk'=> $this->input->post('pro_cat_id_fk'),
				'pro_sub_cat_img' => $file_name,
				'pro_sub_cat_status' => 1,
			);
			if($pro_sub_cat_id){
				$result = $this->General_model->update('product_sub_category',$data,'pro_sub_cat_id',$pro_sub_cat_id);
				$response_text = 'Product Sub Category updated';
			}
			else{
				$result = $this->General_model->add_returnID('product_sub_category',$data);
				// var_dump($result); die;
				$response_text = 'Product Sub Category Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/ProductSubCat/', 'refresh');
		}

	}
	public function ProductSubCatEdit($pro_sub_cat_id){
		$template['prod_cat'] = $this->General_model->get_all('product_category');
		$template['body'] = 'Administration/Product_sub_cat/add';
		$template['script'] = 'Administration/Product_sub_cat/script';
		$where=array('pro_sub_cat_id'=>$pro_sub_cat_id);
		$template['records'] = $this->General_model->getall('product_sub_category',$where);
		$this->load->view('template', $template);
	}
	public function ProductSubCatDelete(){
		$pro_sub_cat_id = $this->input->post('pro_sub_cat_id');
		$data = $this->General_model->delete('product_sub_category','pro_sub_cat_id',$pro_sub_cat_id);
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
	//Product_list CRUD
	public function ProductListCat(){
		$template['body'] = 'Administration/Product_list/list';
		$template['script'] = 'Administration/Product_list/script';
		$this->load->view('template',$template);
	}
	public function getProductListCat(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getProductListCatTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addProductListCat(){
		$this->form_validation->set_rules('product_name', 'product_name', 'required');
		$this->form_validation->set_rules('product_details', 'product_details', 'required');
		$this->form_validation->set_rules('product_original_price', 'product_original_price', 'required');
		$this->form_validation->set_rules('product_discount_price', 'product_discount_price', 'required');
		$this->form_validation->set_rules('product_stock', 'product_stock', 'required');
		$this->form_validation->set_rules('product_enter_date', 'product_enter_date', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['prod_sub_cat'] = $this->General_model->get_all('product_sub_category');
			$template['body'] = 'Administration/Product_list/add';
			$template['script'] = 'Administration/Product_list/script';
			$this->load->view('template', $template);
		}
		else {
			$product_id = $this->input->post('product_id');

			$offer_img = $_FILES['product_image']['name'];
			$file_name = rand(1000,100000).'.png';

			if($offer_img != NULL){
				$config['upload_path']          = './assets/uploads/productlist';
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['file_name']			=	$file_name;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('product_image'))
				{
					$error = array('error' => $this->upload->display_errors());
					$template['prod_cat'] = $this->General_model->get_all('product_category');
					$template['act'] = $this->General_model->get_all('offers');
					$template['body'] = 'Administration/Product_list/add';
					$template['script'] = 'Administration/Product_list/script';
					$this->load->view('template', $template);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());

				}
			}

			$data  = array(
				'pro_sub_cat_id'=> $this->input->post('pro_sub_cat_id_fk'),
				'pro_list_name'=> $this->input->post('product_name'),
				'user_id'=> $this->input->post('user_id'),
				'pro_list_details'=> $this->input->post('product_details'),
				'prod_list_price_original'=> $this->input->post('product_original_price'),
				'pro_list_dicount_price'=> $this->input->post('product_discount_price'),
				'pro_list_stock'=> $this->input->post('product_stock'),
				'pro_list_enter_date'=> $this->input->post('product_enter_date'),
				'pro_list_img'=> $file_name,
				'pro_list_status' => 1,
			);
			if($product_id)
			{
				$result = $this->General_model->update('product_list',$data,'pro_list_id',$product_id);
				$response_text = 'Product List updated';
			}
			else{
				$result = $this->General_model->add_returnID('product_list',$data);
				$response_text = 'Product List Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/ProductListCat/', 'refresh');
		}

	}
	public function ProductListCatEdit($pro_list_id){
		$template['prod_sub_cat'] = $this->General_model->get_all('product_sub_category');
		$template['body'] = 'Administration/Product_list/add';
		$template['script'] = 'Administration/Product_list/script';
		$where=array('pro_list_id'=>$pro_list_id);
		$template['records'] = $this->General_model->getall('product_list',$where);
		$this->load->view('template', $template);
	}
	public function ProductListCatDelete(){
		$pro_list_id = $this->input->post('pro_list_id');
		$data = $this->General_model->delete('product_list','pro_list_id',$pro_list_id);
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
	//Subscription Charges
	public function SubscriptionCharges(){
		$template['body'] = 'Administration/Subscription_charges/list';
		$template['script'] = 'Administration/Subscription_charges/script';
		$this->load->view('template',$template);
	}
	public function getSubscriptionCharges(){
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
		$param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10';
		$param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
		$param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
		$param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';

		$data = $this->Administration_model->getSubscriptionChargesTable($param);
		$json_data = json_encode($data);
		echo $json_data;
	}
	public function addSubscriptionCharges(){
		$this->form_validation->set_rules('subp_name', 'subp_name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['body'] = 'Administration/Subscription_charges/add';
			$template['script'] = 'Administration/Subscription_charges/script';
			$this->load->view('template', $template);
		}
		else {
			$subp_id = $this->input->post('subp_id');
			$data  = array(
				'subp_name'=> $this->input->post('subp_name'),
				'subp_price'=> $this->input->post('subp_price'),
				'subp_val'=> $this->input->post('subp_val'),
				'subp_ads_no'=> $this->input->post('subp_ads'),
				'subp_entered_date'=> $this->input->post('subp_date'),
				'subp_status' => 1,
			);
			if($subp_id)
			{
				$result = $this->General_model->update('subscription',$data,'subp_id',$subp_id);
				$response_text = 'Subscription Charges updated';
			}
			else{
				$result = $this->General_model->add_returnID('subscription',$data);
				$response_text = 'Subscription Charges Added';
			}
			if($result){
				$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
				$this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/SubscriptionCharges/', 'refresh');
		}

	}
	public function SubscriptionChargesEdit($subp_id){
		$template['body'] = 'Administration/Subscription_charges/add';
		$template['script'] = 'Administration/Subscription_charges/script';
		$where=array('subp_id'=>$subp_id);
		$template['records'] = $this->General_model->getall('subscription',$where);
		$this->load->view('template', $template);
	}
	public function SubscriptionChargesDelete(){
		$subp_id = $this->input->post('subp_id');
		$data = $this->General_model->delete('subscription','subp_id',$subp_id);
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
