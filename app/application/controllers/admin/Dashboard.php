<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('user_model','userm',TRUE);
		 $this->load->library('common_lib');
		 $this->common_lib->is_admin_login();
	}
	
	public function index()
	{
		 $views[] = 'admin/dashboard';
         $data['views'] = $views;		 
         $this->common_lib->page_admin_display($data);
	}
}