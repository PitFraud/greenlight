<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logo_model extends CI_Model
{
    public function getLogoTable($param)
	{
		$this->db->select('*');
		$this->db->from('logo');
        $query = $this->db->get();
		
		$last_query=$this->db->last_query();
        $data['data'] = $query->result();
        $data['recordsTotal'] = $this->getCount($last_query);
        $data['recordsFiltered'] = $this->getCount($last_query);
        return $data;
	}

    public function getCount($last_query)
	{
		return $this->db->query($last_query)->num_rows();
	}
}    