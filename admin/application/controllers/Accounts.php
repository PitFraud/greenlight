<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Accounts extends MY_Controller {
	public $table = 'tbl_voucher';
	public $table1 = 'tbl_receipt';
	public $table2 = 'tbl_daybook';
	public $table3 = 'tbl_ledgerbuk';
	public $tbl_daybuk = 'tbl_daybuk';
	public $tbl_ledgerbuk = 'tbl_ledgerbuk';
	public $page  = 'Voucher';
	public $page1  = 'Receipt';
	public function __construct() {
		parent::__construct();
		if(! $this->is_logged_in()){
			redirect('/login');

		}

		$this->load->model('General_model');
		$this->load->model('Administration_model');
		$this->load->model('Account_model');
		$this->load->model('Settings_model');

	}
	public function Voucherhead()
	{
		$template['body'] = 'Accounts/Voucherhead/list';
		$template['script'] = 'Accounts/Voucherhead/script';
		$this->load->view('template', $template);
	}
	public function addVoucherhead()
	{
		$this->form_validation->set_rules('vouch_head', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$template['body'] = 'Accounts/Voucherhead/add';
			$template['script'] = 'Accounts/Voucherhead/script';
			$this->load->view('template', $template);
		}
		else 
		{
			$vouch_id = $this->input->post('vouch_id');
						
			$data = array(
						'vouch_head' =>strtoupper($this->input->post('vouch_head')),
						'vouch_desc' =>strtoupper($this->input->post('vouch_desc')),
						'vouch_status'=>1
						);
			if($vouch_id){
				 
                 $result = $this->General_model->update('tbl_vouchhead',$data,'vouch_id',$vouch_id);
                 $response_text = 'Voucher Head  updated successfully';
            }
			else{
                 $result = $this->General_model->add('tbl_vouchhead',$data);
                 $response_text = 'Voucher Head added  successfully';
            }
			if($result){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Voucherhead/');
		}
	}
	public function getVoucherhead()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
		$data = $this->Account_model->getVoucherheads($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}

	

	public function editVoucherhead($vouch_id)
	{
		$template['body'] = 'Accounts/Voucherhead/add';
		$template['script'] = 'Accounts/Voucherhead/script';
		$where=array('vouch_id'=>$vouch_id);
		$template['records'] = $this->General_model->getall('tbl_vouchhead',$where);
		// print_r($template['records']);die();
		$this->load->view('template', $template);
	}


	public function deleteVoucherhead()
	{
		$vouch_id = $this->input->post('vouch_id');
	    $updateData = array('vouch_status' => 0);
	    $data = $this->General_model->update('tbl_vouchhead',$updateData,'vouch_id',$vouch_id);  		
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


	public function Receipthead()
	{
		$template['body'] = 'Accounts/Receipthead/list';
		$template['script'] = 'Accounts/Receipthead/script';
		$this->load->view('template', $template);
	}
	public function addReceipthead()
	{
		$this->form_validation->set_rules('receipt_head', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$template['body'] = 'Accounts/Receipthead/add';
			$template['script'] = 'Accounts/Receipthead/script';
			$this->load->view('template', $template);
		}
		else 
		{
			$receip_id = $this->input->post('receip_id');
						
			$data = array(
						'receipt_head' =>strtoupper($this->input->post('receipt_head')),
						'receipt_desc' =>strtoupper($this->input->post('receipt_desc')),
						'receipt_status'=>1
						);
			if($receip_id){
				 
                 $result = $this->General_model->update('tbl_receipthead',$data,'receip_id',$receip_id);
                 $response_text = 'Reciept Head  updated successfully';
            }
			else{
                 $result = $this->General_model->add('tbl_receipthead',$data);
                 $response_text = 'Reciept Head added  successfully';
            }
			if($result){
            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			}
			else{
            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
			}
			redirect('/Receipthead/');
		}
	}
	public function getReceipthead()
	{
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
		$data = $this->Account_model->getReceiptheads($param);
    	$json_data = json_encode($data);
    	echo $json_data;
	}
	public function editReceipthead($receip_id)
	{
		$template['body'] = 'Accounts/Receipthead/add';
		$template['script'] = 'Accounts/Receipthead/script';
		$where=array('receip_id'=>$receip_id);
		$template['records'] = $this->General_model->getall('tbl_receipthead',$where);
		// print_r($template['records']);die();
		$this->load->view('template', $template);
	}
	public function deleteReceipthead()
	{
		$receip_id = $this->input->post('receip_id');
	    $updateData = array('receipt_status' => 0);
	    $data = $this->General_model->update('tbl_receipthead',$updateData,'receip_id',$receip_id);  		
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


	public function VoucherEntry()
	{
		$template['body'] = 'Accounts/Voucher/list';
		$template['script'] = 'Accounts/Voucher/script';
		$this->load->view('template', $template);
	}


	public function getVoucherEntry(){
		
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
		$data = $this->Account_model->getSupplierTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }

	public function addVoucherEntry(){
		$this->form_validation->set_rules('vouch_id', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['vouchnames'] = $this->Account_model->view_by();
			$template['body'] = 'Accounts/Voucher/add';
			$template['script'] = 'Accounts/Voucher/script';
			$this->load->view('template', $template);
		}
		else {
			$voucher_id = $this->input->post('voucher_id');
			// $fin_year = $this->Student_model->get_finyear();
			// if(isset($fin_year->finyear_id)){$fyear = $fin_year->finyear_id;}else{$fyear =0;}
			
			$voucher_date = str_replace('/', '-', $this->input->post('voucher_date'));
			$voucher_date = date("Y-m-d",strtotime($voucher_date));
			
			$data = array(
			           // 'finyear_id_fk' =>$fyear,
						'vouch_id_fk' =>$this->input->post('vouch_id'),	
						'voucher_amount' =>$this->input->post('voucher_amount'),						
						'paid_to' =>strtoupper($this->input->post('paid_to')),
						'voucher_date' =>$voucher_date,	
						'narration' =>strtoupper($this->input->post('narration')),
						'voucher_status' => 1
						);
				if($voucher_id){
					 
                     $data['voucher_id'] = $voucher_id;
                     $result = $this->General_model->update($this->table,$data,'voucher_id',$voucher_id);
                     $response_text = 'Voucher updated successfully';
                }
				else{
				     $this->General_model->add($this->table,$data);
				     $id = $this->db->insert_id();
					 $h_id=$this->input->post('vouch_id');	
					$data = $this->Account_model->head($h_id);
					 $Udata  = array(	
						'date'=> $voucher_date,	
						'ledger_name'=> $data[0]->vouch_head,
						'credit'=> 0,
						'debit'=> $this->input->post('voucher_amount'),
						'status'=> 1
						);
                     $result = $this->General_model->add($this->tbl_daybuk,$Udata);
					 $data1  = array(	
						'date'=> $voucher_date,	
						'ledgerbuk_head'=> $data[0]->vouch_head,
						'credit'=> 0,
						'debit'=> $this->input->post('voucher_amount'),
						'ledgerbuk_status'=> 1
						);
                     $result = $this->General_model->add($this->tbl_ledgerbuk,$data1);
                     
                     $response_text = 'Voucher added  successfully';
					 
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				redirect('/VoucherEntry/');
		}
	}


	public function editVoucherEntry($voucher_id){
		$template['body'] = 'Accounts/Voucher/add';
		$template['script'] = 'Accounts/Voucher/script';
		$template['vouchnames'] = $this->Account_model->view_by();
		$template['records'] = $this->General_model->get_row($this->table,'voucher_id',$voucher_id);
    	$this->load->view('template', $template);
	}

	public function deleteVoucherEntry(){
        $voucher_id = $this->input->post('voucher_id');
        $updateData = array('voucher_status' => 0);
        $data = $this->General_model->update($this->table,$updateData,'voucher_id',$voucher_id);
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

	public function get_vouchhead()
	{
		 $vouch_id = $this->input->post('vouch_id');
		 $result = $this->Account_model->get_vouchhead($vouch_id);
		 $data_json = json_encode($result);
		 echo $data_json;
	}


	public function ReceiptEntry()
	{
		$template['body'] = 'Accounts/Receipt/list';
		$template['script'] = 'Accounts/Receipt/script';
		$this->load->view('template', $template);
	}


	public function getReceiptEntry(){
		
		$param['draw'] = (isset($_REQUEST['draw']))?$_REQUEST['draw']:'';
        $param['length'] =(isset($_REQUEST['length']))?$_REQUEST['length']:'10'; 
        $param['start'] = (isset($_REQUEST['start']))?$_REQUEST['start']:'0';
        $param['order'] = (isset($_REQUEST['order'][0]['column']))?$_REQUEST['order'][0]['column']:'';
        $param['dir'] = (isset($_REQUEST['order'][0]['dir']))?$_REQUEST['order'][0]['dir']:'';
        $param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
        
		$data = $this->Account_model->getSupplierReceptTable($param);
    	$json_data = json_encode($data);
    	echo $json_data;
    }


	public function addReceiptEntry(){
		$this->form_validation->set_rules('receip_id', 'Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$template['receiptnames'] = $this->Account_model->view_by1();
			$template['body'] = 'Accounts/Receipt/add';
			$template['script'] = 'Accounts/Receipt/script';
			$this->load->view('template', $template);
		}
		else {
			$receipt_id = $this->input->post('rece_id');
			// $fin_year = $this->Student_model->get_finyear();
			// if(isset($fin_year->finyear_id)){$fyear = $fin_year->finyear_id;}else{$fyear =0;}
			
			$rept_date = str_replace('/', '-', $this->input->post('rept_date'));
			$rept_date = date("Y-m-d",strtotime($rept_date));
			 
			$data = array(
			           // 'finyear_id_fk' =>$fyear,	
						'receip_id_fk' =>$this->input->post('receip_id'),	
						'rept_date' =>$rept_date,
						'receipt_amount' =>$this->input->post('receipt_amount'),						
						'paid_to' =>strtoupper($this->input->post('paid_to')),
						'narration' =>strtoupper($this->input->post('narration')),
						'receipt_status' => 1
						);
						
				if($receipt_id){
					 
                     $data['receipt_id'] = $receipt_id;
                     $result = $this->General_model->update($this->table1,$data,'receipt_id',$receipt_id);
                     $response_text = 'Receipt updated successfully';
                }
				else{
				     $this->General_model->add($this->table1,$data);
					 $id = $this->db->insert_id();
					 $h_id=$this->input->post('receip_id');	
					$data = $this->Account_model->head1($h_id);
					//print_r($data);
					//exit();
					 $Udata  = array(	
						'date'=> $rept_date,
						// 'ledger_name'=> $this->input->post('receipt_id'),
						'ledger_name'=> $data[0]->receipt_head,
						
						'credit'=> $this->input->post('receipt_amount'),
						'debit'=> 0,
						'status'=> 1
						);
					$result = $this->General_model->add($this->tbl_daybuk,$Udata);
                     
					  $data1  = array(	
						'date'=> $rept_date,
						'ledgerbuk_head'=> $data[0]->receipt_head,
						'credit'=> $this->input->post('receipt_amount'),
						'debit'=> 0,
						'ledgerbuk_status'=> 1
						);
					$result = $this->General_model->add($this->tbl_ledgerbuk,$data1);
					$response_text = 'Receipt added  successfully';
                }
				if($result){
	            $this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
				}
				else{
	            $this->session->set_flashdata('response', '{&quot;text&quot;:&quot;Something went wrong,please try again later&quot;,&quot;layout&quot;:&quot;bottomRight&quot;,&quot;type&quot;:&quot;error&quot;}');
				}
				redirect('/ReceiptEntry/');
		}
	}


	public function editReceiptEntry($receipt_id){
		$template['body'] = 'Accounts/Receipt/add';
		$template['script'] = 'Accounts/Receipt/script';
		$template['receiptnames'] = $this->Account_model->view_by1();
		$template['records'] = $this->General_model->get_row($this->table1,'receipt_id',$receipt_id);
    	$this->load->view('template', $template);
	}


	public function deleteReceiptEntry(){
        $receipt_id = $this->input->post('receipt_id');
        $updateData = array('receipt_status' => 0);
        $data = $this->General_model->update($this->table1,$updateData,'receipt_id',$receipt_id);
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


	public function get_receipthead_receipt_entry()
	{
		 $receip_id = $this->input->post('receip_id');
		 $result = $this->Account_model->get_receipthead($receip_id);
		 $data_json = json_encode($result);
		 echo $data_json;
	}


	//Daybook

	public function DayBook()
	{
		
		$template['body'] = 'Accounts/Daybook/list';
		$template['script'] = 'Accounts/Daybook/script';
		$template['opening'] = $this->Account_model->Daybookopening();
		// print_r($template['opening']);
		// exit();
		$this->load->view('template', $template);
	}


	

	public function get_sumDayBook()
	{
		$data = $this->Account_model->get_sumDayBook();
		$json_data = json_encode($data);
		echo $json_data;
	}


	public function get_sum_DayBook()
	{
		//$date = str_replace('/', '-', $this->input->post('date'));
		$date = str_replace('/', '-', $this->input->post('daybuk_date'));
		$date =  date("Y-m-d",strtotime($date));
		$data = $this->Account_model->get_sum_DayBook($date);
		$json_data = json_encode($data);
		echo $json_data;
	}


	public function get_opening_DayBook()
	{
		//$date = str_replace('/', '-', $this->input->post('date'));
		$date = str_replace('/', '-', $this->input->post('daybuk_date'));
		$date =  date("Y-m-d",strtotime($date));
		
		$data = $this->Account_model->get_opening_DayBook($date);
		//$data1 = $this->Daybook_model->get_closing1($date);
		// print_r($data);
		// exit();
		$json_data = json_encode($data);
		echo $json_data;
		
	}


	public function getDayBook(){
		
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		//$date =(isset($_REQUEST['date']))?$_REQUEST['date']:'';
		$date =(isset($_REQUEST['daybuk_date']))?$_REQUEST['daybuk_date']:'';
		   
		   if($date){
			$date = str_replace('/', '-', $date);
			$param['date'] =  date("Y-m-d",strtotime($date));
			$data = $this->Account_model->getDaybookTable($param);
			}
			else
			{
				$data = $this->Account_model->getDaybookTable($param);
			}
			
		
		$json_data = json_encode($data);
		echo $json_data;
   }


   public function updateDayBook(){
		
	$Outs = $this->input->post('Outs');
	$Outs1 = $this->input->post('Outs1');
	// print_r($Outs);
	// exit();
	$date = date("Y-m-d");
	// print_r($date);
	// exit();
	if($Outs!=0){
	$updateData = array('date'=>$date,
						'closing_amount'=>$Outs,
						'status'=>1 );
	$data = $this->General_model->add($this->table2,$updateData);
	}
	else{
		$updateData = array('date'=>$date,
						'closing_amount'=>$Outs1,
						'status'=>1 );
	$data = $this->General_model->add($this->table2,$updateData);
	}
	if($data) {
		$response_text = 'Saved successfully';
		$response['type'] = 'success';
		$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			
	}
	else{
		$response['text'] = 'Something went wrong';
		$response['type'] = 'error';
	}
	$response['layout'] = 'topRight';
	$data_json = json_encode($response);
	echo $data_json;
}

//Ledger

public function Ledger()
	{
		$template['body'] = 'Accounts/Ledger/list';
		$template['script'] = 'Accounts/Ledger/script';
		//$template['opening'] = $this->Ledger_model->opening();
		// print_r($template['opening']);
		// exit();
		$this->load->view('template', $template);
	}


	public function get_sumLedger()
	{
		$data = $this->Account_model->get_sumLedger();
		$json_data = json_encode($data);
		echo $json_data;
	}


	public function get_sum_Ledger()
	{
		//$date = str_replace('/', '-', $this->input->post('date'));
		$date = str_replace('/', '-', $this->input->post('start_date'));
		$date =  date("Y-m-d",strtotime($date));
		$data = $this->Account_model->get_sum_Ledger($date);
		$json_data = json_encode($data);
		echo $json_data;
	}

	public function get_opening_Ledger()
	{
		//$date = str_replace('/', '-', $this->input->post('date'));
		$date = str_replace('/', '-', $this->input->post('start_date'));
		$date =  date("Y-m-d",strtotime($date));
		$data = $this->Account_model->get_opening_Ledger($date);
		//$data1 = $this->Ledger_model->get_closing1($date);
		// print_r($data);
		// exit();
		$json_data = json_encode($data);
		echo $json_data;
		
	}


	public function get_Ledger(){
		
		$param['searchValue'] =(isset($_REQUEST['search']['value']))?$_REQUEST['search']['value']:'';
		$param['ledgerbuk_head'] = (isset($_REQUEST['ledgerbuk_head']))?$_REQUEST['ledgerbuk_head']:'';
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
	   
		   
		   
			$data = $this->Account_model->getLedgerTable($param);
			
			/*else
			{
				$data = $this->Ledger_model->getDaybookTable($param);
			}
			*/
		
		$json_data = json_encode($data);
		echo $json_data;
   }


   public function updateLedger(){
		
	$Outs = $this->input->post('Outs');
	// print_r($Outs);
	// exit();
	$date = date("Y-m-d");
	// print_r($date);
	// exit();
	$updateData = array('date'=>$date,
						'closing_amount'=>$Outs,
						'ledgerbuk_status'=>1 );
	$data = $this->General_model->add($this->table3,$updateData);
	if($data) {
		$response_text = 'Saved successfully';
		$response['type'] = 'success';
		$this->session->set_flashdata('response', "{&quot;text&quot;:&quot;$response_text&quot;,&quot;layout&quot;:&quot;topRight&quot;,&quot;type&quot;:&quot;success&quot;}");
			
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