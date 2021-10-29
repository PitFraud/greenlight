<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reports_model extends CI_Model
{
	public function getUserReportsTable($param){
		$arOrder = array('','searchValue','start_date','end_date','cust_name');
		$searchValue =($param['searchValue'])?$param['searchValue']:'';
		$start_date =(isset($param['start_date']))?$param['start_date']:'';
		$end_date =(isset($param['end_date']))?$param['end_date']:'';
		$user_name =(isset($param['user_name']))?$param['user_name']:'';
		if($searchValue){
            $this->db->like('first_name', $searchValue);
        }
		if($user_name){
            $this->db->like('first_name', $user_name);
			$this->db->or_like('last_name', $user_name);
        }
		if($start_date){
            $this->db->where('created_date >=', $start_date); 
        }
		if($end_date){
            $this->db->where('updated_date <=', $end_date); 
        }
        $this->db->where("status",1);
		$this->db->where("user_type","U");
		$this->db->select('*');
		$this->db->from('users');
	//  $this->db->join('tbl_login','id = userid_fk');
	//	$this->db->join('tbl_user','userid = userid_fk');
	//	$this->db->join('tbl_user1','userid = userid_fk');
		$this->db->order_by('id', 'DESC');
        $query = $this->db->get();
		
        $data['data'] = $query->result();
        return $data;

	}
}
