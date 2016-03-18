<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_lib
{
    var $ci = NULL;
    function __construct()
    {
        $this->ci =& get_instance();
    }
        
    
    function page_admin_display($data = array())
    {
		if($this->checkadminlogin())
		{
			 $this->ci->load->view('admin/include/header');
			  $this->ci->load->view('admin/include/sidebar');
		}else{
			 $this->ci->load->view('admin/include/headerlogin');
		}
       
        foreach($data['views'] as $r)
        {
            $this->ci->load->view($r,$data);   
        }
		if($this->checkadminlogin())
		{
			 $this->ci->load->view('admin/include/footer');
		}else{
			 $this->ci->load->view('admin/include/footerlogin');
		}
       
    } 
    
    function is_admin_login()
    {
        if($this->ci->session->userdata('isAdmin') != 'yes')
            redirect(base_url('admin/login'));
    } 
	
	function checkadminlogin()
	{
		  if($this->ci->session->userdata('isAdmin') != 'yes')
			  return false;
		  else 
			  return true;
		
	}
	
    
 


    
    
   
    
}
 function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
?>