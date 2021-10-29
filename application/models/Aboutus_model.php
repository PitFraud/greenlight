<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aboutus_model extends CI_Model
{

	public function getAboutDetailTable()
	{

    $this->db->select('*');
    $this->db->from('frnt_about_us');
    $this->db->where('about_us_img_status',1);
    $query = $this->db->get();
    return $query->result();
    }   


    public function getOurTeamTable()
    {
        $this->db->select('*');
        $this->db->from('frnt_our_team');
        $this->db->where('our_team_status',1);
        $query = $this->db->get();
        return $query->result();
    }

}
