<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile_model extends CI_Model
{

	public function getUserTableDetails($user_id)
	{

    // $this->db->select('users.id, users.first_name, users.last_name, users.phone_no, users.email, user_profile_img.user_pimage_name')
    // ->join('user_profile_img','user_profile_img.user_id_fk = users.id');
    // $this->db->from('users');
    // $this->db->where('id',$user_id);
    // $query = $this->db->get();
    // return $query->result();
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id',$user_id);
    $query = $this->db->get();
    return $query->result();
	}


    public function getUserImageTableDetails($user_id)
	{

    $this->db->select('*');
    $this->db->from('user_profile_img');
    $this->db->where('user_id_fk',$user_id);
    $query = $this->db->get();
    return $query->result();
	}

}
