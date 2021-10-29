<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ourteam_model extends CI_Model
{
	public function getOurTeamTable($param)
	{
		$this->db->select('*');
		$this->db->from('frnt_our_team');
        $this->db->where('our_team_status',1);
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
