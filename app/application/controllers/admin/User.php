<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('user_model','userm',TRUE);
		 $this->load->library('common_lib');		
         $this->load->library('pagination');
		 $this->common_lib->is_admin_login();
		  $this->load->helper('csv');
	}
	
	public function adduser($ajax=0,$id=0)
	{
		$data=array();
		if($id){
		$data['result']=$this->userm->get_single_row($id)[0];
		}
		 $views[] = 'admin/adduser';
		   $data['views'] = $views;
		   if($ajax){
			   $data['ajax'] = 1;
			   $this->load->view('admin/adduser',$data);
		 
		   }
		   else
		   {
			        $data['ajax'] = 0;
			     $this->common_lib->page_admin_display($data);
		   }
	}
	
	public function csv()
	{
		 
		 $data = $this->userm->getdata(0,1);         
		 #$data['result'] = $result;
		
		 
		 array_to_csv($data,'userlist'.date('y-m-d h:i:s'));
	}
	public function index($page=0,$ajax=0)
	{
			
		 
		   $result = $this->userm->getdata($page);         
		   $data['paging'] = $this->userm->get_form_paging();         
           $data['result'] = $result;
		
		   $views[] = 'admin/user';
		   $data['views'] = $views;
		   if($ajax){
			   $data['ajax'] = 1;
			   $this->load->view('admin/user',$data);
		 
		   }
		   else
		   {
			        $data['ajax'] = 0;
			     $this->common_lib->page_admin_display($data);
		   }
		   
	}
	
	
}