<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {
    
    public function __construct()
    {
         parent::__construct();
		 	 $this->load->library('common_lib');	
         $this->load->model('form_model','fm',TRUE);
		  $this->common_lib->is_admin_login();
         //$this->config->load('form_config');
    }
	
	public function deleteuser($id=0)
	{
		
		$this->fm->deleterow('users',$id);
		
	}
	public function deletecontact($id=0)
	{
		
		$this->fm->deleterow('contact',$id);
		
	}
	public function deletecarrier($id=0)
	{
		
		$this->fm->deleterow('users',$id);
		
	}
	public function deletenewsletter($id=0)
	{
		
		$this->fm->deleterow('subscribeduser',$id);
		
	}
    
}