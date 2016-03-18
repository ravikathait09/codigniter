<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		// $this->load->model('user_model','userm',TRUE);
		 $this->load->library('common_lib');		
         $this->load->library('pagination');
		 $this->common_lib->is_admin_login();
		 $this->load->model('newsletter_model','nwl');
		
		  $this->load->helper('csv');
	}
	
	public function csv()
	{
		 
		 $data = $this->nwl->getdata(0,1);         
		 #$data['result'] = $result;
		
		 
		 array_to_csv($data,'newsletter_subscribe'.date('y-m-d h:i:s'));
	}
	public function index($page=0,$ajax=0)
	{
			
		 
		   $result = $this->nwl->getdata($page);         
		   $data['paging'] = $this->nwl->get_form_paging();         
           $data['result'] = $result;
		
		   $views[] = 'admin/newsletter';
		   $data['views'] = $views;
		   if($ajax){
			   $data['ajax'] = 1;
			   $this->load->view('admin/newsletter',$data);
		 
		   }
		   else
		   {
			        $data['ajax'] = 0;
			     $this->common_lib->page_admin_display($data);
		   }
		   
	}
}