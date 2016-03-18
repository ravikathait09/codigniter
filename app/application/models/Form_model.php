<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class  Form_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
        #$this->load->library('pagination');
    }
	public function get_user_form_param()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$param=array();
		//if($this->form_validation->run() == True){
			$param['name'] = $this->input->post('name');
			$param['phone'] = $this->input->post('phone');
			$param['email'] = $this->input->post('email');
			$param['address'] = $this->input->post('address');
			$param['username'] = $this->input->post('username');
			$param['password']= md5(generateRandomString(8));
			return $param;
		/*}else
		{
			return false;
		}*/
	}
	
	function insert_data($table = '',$data)
    {
		
        return $this->db->insert($table,$data);
    }
	
	function update_data($table = '',$data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('users', $data);
		
	}
	
	function deleterow($table='',$id=0)
	{
		$this->db->where('id',$id);
			$this->db->delete($table);
		
	}
}