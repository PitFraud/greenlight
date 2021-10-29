<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller 
{
	public function __construct() 
	{
		parent::__construct();
        if(! $this->is_logged_in()){
          redirect('/login');
		
        }
    }
    public function index()
	{
		$template['body'] = 'Dashboard/list';
		$template['script'] = 'Dashboard/script';
		$this->load->view('template',$template);
	}
}