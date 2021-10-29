<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aboutpage_model extends CI_Model
{
	public function getAboutPageDetails($param)
	{
		$this->db->select('*');
		$this->db->from('frnt_about_us');
        $this->db->where('about_us_img_status',1);
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
