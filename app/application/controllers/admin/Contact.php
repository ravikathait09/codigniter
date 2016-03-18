<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('contact_model','conm',TRUE);
		 $this->load->library('common_lib');		
         $this->load->library('pagination');
		 $this->common_lib->is_admin_login();
		  $this->load->helper('csv');
	}
	
	
	
	public function csv()
	{
		 
		 $data = $this->conm->getdata(0,1);         
		 #$data['result'] = $result;
		
		 
		 array_to_csv($data,'userlist'.date('y-m-d h:i:s'));
	}
	public function viewcontact($ajax=0,$id=1)
	{
		$data=array();
		if($id){
		$data['result']=$this->conm->get_single_row($id)[0];
		}
		 $views[] = 'admin/viewcontact';
		   $data['views'] = $views;
		   if($ajax){
			   $data['ajax'] = 1;
			   $this->load->view('admin/viewcontact',$data);
		 
		   }
		   else
		   {
			        $data['ajax'] = 0;
			     $this->common_lib->page_admin_display($data);
		   }
		
	}
	public function index($page=0,$ajax=0)
	{
			
		 
		   $result = $this->conm->getdata($page);         
		   $data['paging'] = $this->conm->get_form_paging();         
           $data['result'] = $result;
		
		   $views[] = 'admin/contact';
		   $data['views'] = $views;
		   if($ajax){
			   $data['ajax'] = 1;
			   $this->load->view('admin/contact',$data);
		 
		   }
		   else
		   {
			        $data['ajax'] = 0;
			     $this->common_lib->page_admin_display($data);
		   }
		   
	}
	
	
}