<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class  User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        #$this->load->library('pagination');
    }
	 function get_heading()
    {
		$data[] =  'S.No.';
		$data[] =  'Name';
		$data[] =  'Email';
		$data[] =  'Username';
		$data[] =  'Source';
		$data[] =  'Phone';
		$data[]=   'Address';
        $data[] =  'Date Time';
		 return $data;
	}
	function getdata($page=0,$csv=FALSE)
	{
		$result = array();        
        $this->set_search();        
        if($csv === FALSE)
        {
            $this->db->limit(1,$page);
			 
        }	
		$query = $this->db->get('users'); 
		#echo $this->db->last_query();
		 if($csv === FALSE)
        {
			return $results = $query->result_array();
		}else
		{   $c = 0;
			$results[]=$this->get_heading();
			 foreach($query->result() as $row)
			{
				$c++;
				$data = null;
				 $data[] = $c;
				 $data[] = $row->email;
				 $data[] = $row->curdate;
				 $data[] = $row->created;
				$results[]=$data;
			}
			return $results;
		}
       
	}
	
	function get_single_row($id)
	{
		$this->db->where('id',$id);
		 $query = $this->db->get('users');
		return $results = $query->result_array();
	}
	
    function get_form_paging()
    {
        $this->set_search();
      
        $query = $this->db->get('users');
        $count = $query->num_rows();
        
        $config['base_url'] = base_url('admin/user/index');
        $config['total_rows'] = $count;
        $config['per_page'] = 1;
        
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['uri_segment'] = 4;
       $config['cur_tag_open'] = '<li class="disabled"><a href="#" class="checked">';
        $config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "";
		$config['prev_tagl_close'] = "";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        
        return $this->pagination->create_links();
    }
	
	 function set_search()
    {
		
		$this->db->where('type',0);
       if($this->input->post('search'))
       {
           $this->session->set_userdata('user_search',$_POST);
       } 
    
       if($this->session->userdata('user_search'))
       {
           $data = $this->session->userdata('user_search');
		   
           
		   if(!empty($data['email'])){
               $this->db->like('email',$data['email']);
		   }
		   if(!empty($data['start']) && !empty($data['end'])){
            $this->db->where('curdate >=', date('Y-m-d',strtotime($data['start'])));
			
			$this->db->where('curdate <=',  date('Y-m-d',strtotime($data['end'])));
			}
			elseif(!empty($data['start']) && empty($data['end'])){
				 $this->db->where('curdate >=',  date('Y-m-d',strtotime($data['start'])));
			}
			elseif(empty($data['start']) && !empty($data['end'])){
				 $this->db->where('curdate <=',  date('Y-m-d',strtotime($data['end'])));
			}
           if(isset($data['sort_by']) && $data['sort_by'] == 'email')
            $this->db->order_by('email',$data['email']);
           elseif(isset($data['sort_by']) &&  $data['sort_by'] == 'date')
             $this->db->order_by('curdate',$data['curdate']);
          
           
       } 
	   else
		   $this->db->order_by('id','desc');
	 # die;
    }
	
	
}