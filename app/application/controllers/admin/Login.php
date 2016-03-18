<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('user_model','userm',TRUE);
		 $this->load->library('common_lib');
		 //$this->common_lib->is_admin_login();
	}
	
	public function index()
	{
		 $views[] = 'admin/login';
         $data['views'] = $views;
		  if($this->common_lib->checkadminlogin()){
			  redirect(base_url('admin/dashboard'));
		 }
         $this->common_lib->page_admin_display($data);
	}
	public function auth($data=array())
	{
		 if($this->common_lib->checkadminlogin()){
			  redirect(base_url('admin/dashboard'));
		 }
		$this->db->where('username',$this->input->post('username'));
        $this->db->where('password',md5($this->input->post('password')));
        $this->db->where('type','1');
        $this->db->limit(1);
        $query = $this->db->get('users');
		if(!empty($query->result())){
        foreach($query->result() as $row)
        {
            $this->session->set_userdata('username',$row->username);
            $this->session->set_userdata('name',$row->name);
            $this->session->set_userdata('isAdmin','yes');
          
        }
		  redirect(base_url('admin/dashbaord'));
            exit();
		}
		
	}
	
}
