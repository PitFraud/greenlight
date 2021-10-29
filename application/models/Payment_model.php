<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_model extends CI_Model
{

	public function getSubscriptionDetailTable($id)
	{

    $this->db->select('*');
    $this->db->from('subscription');
    $this->db->where('subp_id',$id);
    $query = $this->db->get();
    return $query->result();
    }   



}
