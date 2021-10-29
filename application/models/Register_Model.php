<?php
class Register_Model extends CI_Model{
    function __construct() { 
        parent::__construct();
        
         $this->load->database();
     }

   public function insert_user($data) { 
   	if ($this->db->insert("users", $data)) { 
   		return true; 
   	} 
   }

   	public function check_email($email){

	$this->db->select('id');
	$this->db->from('users');
	$this->db->where('email',$email);
	$query = $this->db->get();
	
// $str = $this->db->last_query();
// echo $str;

	if($query->num_rows()==1){

	return TRUE;
	}
	else{

	return FALSE;

	}
	}

	public function CheckUser($username)
	{
		$result=$this->db->query("SELECT * from users WHERE email='$username'");
		// $str = $this->db->last_query();
		// echo $str;
		
		if ($result->num_rows()>0) 
		{
			return $result;
		}
		else
		{
			return false;
		}
	}

	public function get_forgot($email){

		$this->db->select('id,first_name');
		$this->db->from('users');
		$this->db->where('email',$email);

		$query = $this->db->get();

		return $query->result();
	}

	public function update_user_pass($data,$id) { 
		$this->db->set($data); 
		$this->db->where("id", $id); 
		$this->db->update("users", $data);

	}














 }
 ?>

