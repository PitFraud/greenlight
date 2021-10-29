<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_model extends CI_Model
{
	public function getCompanyinfoTable($param)
	{
		$arOrder = array('','cmp_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
		$end_date =(isset($param['end_date']))?$param['end_date']:'';
		if($searchValue){
            $this->db->like('cmp_name', $searchValue); 
        }
        $this->db->where("cmp_status",1);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_companyinfo');
		$this->db->order_by('cmp_id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;

	}
	public function get_row($cmp_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_companyinfo');
		$this->db->join('tbl_login','tbl_login.cmp_id = tbl_companyinfo.cmp_id');
		$this->db->where("tbl_companyinfo.cmp_id",$cmp_id);
        $query = $this->db->get();
        
    	return $query->result();
	}

	//fin year
	public function getFinYearTable($param)
	{
		$arOrder = array('','fin_year');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
        if($searchValue){
            $this->db->like('fin_year', $searchValue); 
        }
        $this->db->where("status",1);
		
        if ($param['start'] != 'false' and $param['length'] != 'false') {
        	$this->db->limit($param['length'],$param['start']);
        }
		$this->db->select('*');
		$this->db->from('tbl_finyear');
		$this->db->order_by('finyear_id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        $data['recordsTotal'] = $query->num_rows();
        $data['recordsFiltered'] = $query->num_rows();
        return $data;

	}
}