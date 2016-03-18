<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {
    
    public function __construct()
    {
         parent::__construct();
		 	 $this->load->library('common_lib');	
         $this->load->model('form_model','fm',TRUE);
		  $this->common_lib->is_admin_login();
         //$this->config->load('form_config');
    }
	
	public function adduser($id=0)
	{
		if($data = $this->fm->get_user_form_param())
		{
			if($id){
				$this->fm->update_data('users', $data,$id);
			}else{
			$this->fm->insert_data('users', $data);
			}
		}
		else
		{
			show_error('Invalid data');
		}
	}
    
	
}