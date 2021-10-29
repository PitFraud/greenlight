<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subscription_model extends CI_Model
{

	public function getSubscriptionDetailTable()
	{

    $this->db->select('*');
    $this->db->from('subscription');
    $query = $this->db->get();
    return $query->result();
    }   



}
