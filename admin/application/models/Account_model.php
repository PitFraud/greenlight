<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account_model extends CI_Model
{
	public function getCount($last_query)
	{
		return $this->db->query($last_query)->num_rows();
	}
	public function getVoucherheads($param)
	{
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
         if($searchValue){
            $this->db->like('vouch_head', $searchValue); 
        }
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_vouchhead');
		$this->db->where("vouch_status",1);
		$this->db->order_by('vouch_id', 'ASC');
        $query = $this->db->get();

		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}
	public function getReceiptheads($param)
	{
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
         if($searchValue){
            $this->db->like('tbl_receipthead', $searchValue); 
        }
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_receipthead');
		$this->db->where("receipt_status",1);
		$this->db->order_by('receip_id', 'ASC');
        $query = $this->db->get();

		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}


	public function getSupplierTable($param){
		$arOrder = array('','class');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        	if($searchValue){
            $this->db->like('vouch_head', $searchValue); 
        }
        $this->db->where("vouch_status",1);
        
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,DATE_FORMAT(voucher_date,\'%d/%m/%Y\')as voucher_date');
		$this->db->from('tbl_voucher');
		$this->db->join('tbl_vouchhead','vouch_id = vouch_id_fk');
		$this->db->order_by('voucher_id', 'ASC');
		$this->db->where("voucher_status",1);
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getSupplierTotalCount($param);
        $data['recordsFiltered'] = $this->getSupplierTotalCount($param);
        return $data;

	}


	public function getSupplierTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('vouch_head', $searchValue); 
        }
	
		$this->db->select('*');
		$this->db->from('tbl_voucher');
		$this->db->join('tbl_vouchhead','vouch_id = vouch_id_fk');
		$this->db->order_by('voucher_id', 'ASC');
		$this->db->where("voucher_status",1);
        $query = $this->db->get();
    	return $query->num_rows();
    }


	public function get_vouchhead($vouch_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_vouchhead');
		$this->db->where("vouch_id",$vouch_id);
        $query = $this->db->get();
    	return $query->result();
	}
	public function head($h_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_vouchhead');
		$this->db->where("vouch_id",$h_id);
        $query = $this->db->get();
    	return $query->result();
	}

	public function view_by()
	{
		$status=1;
		$this->db->select('*');
		$this->db->from('tbl_vouchhead');
		$this->db->where('vouch_status', $status);
		$query = $this->db->get();
		
		$vouchnames = array();
		if ($query -> result()) {
		foreach ($query->result() as $vouch_name) {
		$vouchnames[$vouch_name-> vouch_id] = $vouch_name -> vouch_head;
			}
		return $vouchnames;
		}		else {
		return FALSE;
		}
	}


	//Receipt Entry
	public function getSupplierReceptTable($param){
		$arOrder = array('','class');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
         if($searchValue){
            $this->db->like('receipt_head', $searchValue); 
        }
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*,DATE_FORMAT(rept_date,\'%d/%m/%Y\')as rept_date');
		$this->db->from('tbl_receipt');
		$this->db->join('tbl_receipthead','tbl_receipthead.receip_id = receip_id_fk');
		$this->db->order_by('tbl_receipt.receipt_id', 'ASC');
		$this->db->where("tbl_receipt.receipt_status",1);
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getSupplierTotalCount1($param);
        $data['recordsFiltered'] = $this->getSupplierTotalCount1($param);
        return $data;

	}


	public function getSupplierTotalCount1($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
       if($searchValue){
            $this->db->like('receipt_head', $searchValue); 
        }
		$this->db->select('*,DATE_FORMAT(rept_date,\'%d/%m/%Y\')as rept_date');
		$this->db->from('tbl_receipt');
		$this->db->join('tbl_receipthead','tbl_receipthead.receip_id = receip_id_fk');
		$this->db->order_by('tbl_receipt.receipt_id', 'ASC');
		$this->db->where("tbl_receipt.receipt_status",1);
        $query = $this->db->get();
    	return $query->num_rows();
    }


	public function get_receipthead($receip_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_receipthead');
		$this->db->where("receip_id",$receip_id);
        $query = $this->db->get();
    	return $query->result();
	}
	public function head1($h_id)
	{
		$this->db->select('receipt_head');
		$this->db->from('tbl_receipthead');
		$this->db->where("receip_id",$h_id);
        $query = $this->db->get();
    	return $query->result();
	}

	public function view_by1()
	{
		$status=1;
		$this->db->select('*');
		$this->db->from('tbl_receipthead');
		$this->db->where('receipt_status', $status);
		$query = $this->db->get();
		
		$vouchnames = array();
		if ($query -> result()) {
		foreach ($query->result() as $vouch_name) {
		$vouchnames[$vouch_name-> receip_id] = $vouch_name -> receipt_head;
			}
		return $vouchnames;
		}		else {
		return FALSE;
		}
	}


	//Daybook
	public function Daybookopening()
	{
		$date = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('tbl_daybuk');
		$this->db->order_by('daybuk_id',"desc");
		$this->db->limit(1);
		$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
		$d = date('Y-m-d', strtotime($date .' -1 day'));
		$this->db->where('date', $d);
		$query = $this->db->get();
		//print_r($query->row());
		//exit();
		return $query->row();
		
	}

	public function get_sumDayBook()
	{
		$this->db->select('SUM(credit) as credit_sum,SUM(debit) as debit_sum');
		$this->db->from('tbl_daybuk');
		$this->db->where("status",1);
		$this->db->where("date",date('Y-m-d'));
		$query = $this->db->get();
    	return $query->result();
		
	}public function get_sum_DayBook($date)
	{
		$this->db->select('SUM(credit) as credit_sum,SUM(debit) as debit_sum');
		$this->db->from('tbl_daybuk');
		$this->db->where("status",1);
		$this->db->where("date",$date);
		$query = $this->db->get();
    	return $query->result();
		
	}

	public function get_opening_DayBook($date)
	{
		$this->db->select('*');
		$this->db->from('tbl_daybuk');
		$this->db->order_by('daybuk_id',"desc");
		$this->db->limit(1);
		$d = date('Y-m-d', strtotime($date .' -1 day'));
		$this->db->where('date', $d);
		$query = $this->db->get();
		//print_r($query->row());
		//exit();
		return $query->row();
		
	}


	public function getDaybookTable($param){
		$arOrder = array('','enq_custname_fk');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$date =(isset($param['date']))?$param['date']:'';
        if($searchValue){
            $this->db->like('ledger_name', $searchValue); 
        }
		if($date){
            $this->db->where('date', $date); 
        }
		else{
			 $this->db->where('date', date('Y-m-d')); 
		}
        $this->db->where("status",1);
		
		$this->db->select('*,DATE_FORMAT(date,\'%d/%m/%Y\') as date ');
		$this->db->from('tbl_daybuk');
		// $this->db->join('tbl_receipthead','tbl_receipthead.receipt_id = ledger_name');
		// $this->db->join('tbl_voucherhead','tbl_voucherhead.voucher_id = ledger_name');
		//$this->db->where("date",date('Y-m-d'));
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getDaybookTotalCount($param);
        $data['recordsFiltered'] = $this->getDaybookTotalCount($param);
        return $data;

	}
	public function getDaybookTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$date =(isset($param['date']))?$param['date']:'';
        if($searchValue){
            $this->db->like('ledger_name', $searchValue); 
        }
		if($date){
            $this->db->where('date', $date); 
        }
		else{
			 $this->db->where('date',date('Y-m-d')); 
		}
		$this->db->select('*,DATE_FORMAT(date,\'%d/%m/%Y\') as date');
		$this->db->from('tbl_daybuk');
		$this->db->where("status",1);
		//$this->db->where("date",date('Y-m-d'));
        $query = $this->db->get();
    	return $query->num_rows();
    }



	//Ledger
	public function getLedgerTable($param){
		$arOrder = array('','enq_custname_fk');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$ledgerbuk_head =(isset($param['ledgerbuk_head']))?$param['ledgerbuk_head']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
        $end_date =(isset($param['end_date']))?$param['end_date']:'';
		
		
        if($searchValue){
            $this->db->like('ledgerbuk_head', $searchValue); 
        }
		if($ledgerbuk_head){
              $this->db->like('ledgerbuk_head', $ledgerbuk_head); 
         }
		if($start_date){
            $this->db->where('date >=', $start_date);
        }
        if($end_date){
            $this->db->where('date <=', $end_date); 
        }
		else{
			 $this->db->where('date', date('Y-m-d'));
		}
		
        $this->db->where("ledgerbuk_status",1);
		
		$this->db->select('*,DATE_FORMAT(date,\'%d/%m/%Y\') as date,sum(credit) as credit,sum(debit) as debit');
		$this->db->from('tbl_ledgerbuk');
		// $this->db->where('date', date('Y-m-d'));
		$this->db->group_by('ledgerbuk_head');
		$query = $this->db->get();
		$data['data'] = $query->result();
        //$data['recordsTotal'] = $this->getDaybookTotalCount($param);
        //$data['recordsFiltered'] = $this->getDaybookTotalCount($param);
        return $data;

	}
	public function getLedgerTotalCount($param = NULL){

		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$date =(isset($param['date']))?$param['date']:'';
        if($searchValue){
            $this->db->like('ledger_name', $searchValue); 
        }
		if($date){
            $this->db->where('date', $date); 
        }
		else{
			 $this->db->where('date',date('Y-m-d')); 
		}
		$this->db->select('*,DATE_FORMAT(date,\'%d/%m/%Y\') as date');
		$this->db->from('tbl_ledgerbuk');
		$this->db->where("ledgerbuk_status",1);
		//$this->db->where("date",date('Y-m-d'));
        $query = $this->db->get();
    	return $query->num_rows();
    }

	
	public function get_sumLedger()
	{
		$this->db->select('SUM(credit) as credit_sum,SUM(debit) as debit_sum');
		$this->db->from('tbl_ledgerbuk');
		$this->db->where("ledgerbuk_status",1);
		$this->db->where("date",date('Y-m-d'));
		$query = $this->db->get();
    	return $query->result();
		
	}
	public function get_sum_Ledger($date)
	{
		$this->db->select('SUM(credit) as credit_sum,SUM(debit) as debit_sum');
		$this->db->from('tbl_ledgerbuk');
		$this->db->where("ledgerbuk_status",1);
		$this->db->where("date",$date);
		$query = $this->db->get();
    	return $query->result();
		
	}


	public function get_opening_Ledger($date)
	{
		$this->db->select('*');
		$this->db->from('tbl_ledgerbuk');
		$this->db->order_by('ledgerbuk_id',"desc");
		$this->db->limit(1);
		$d = date('Y-m-d', strtotime($date .' -1 day'));
		$this->db->where('date', $d);
		$query = $this->db->get();
		//print_r($query->row());
		//exit();
		return $query->row();
		
	}
	
}