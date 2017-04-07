<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	private $limit = 20;
	function __construct()
	{
		parent::__construct();	
	    if($this->session->userdata('logged_in'))
		   {
			 $session_data = $this->session->userdata('logged_in');
			 $data['email'] = $session_data['email'];
			 $data['session_data'] = $session_data;
		   }
		else
		   {
				 redirect(base_url().'login', 'refresh');
		   }		
		$this->load->model("userModel");	
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
		
	}
	public function index()
	{ 	   
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
		
		// load data		
		$viewdata = $this->userModel->get_paged_list($this->limit, $offset)->result();
		$data["viewdata"] = $viewdata;
		$data['title'] = 'Employees';
		$data['action'] = "All Record";
				
		// generate pagination		
		$this->load->library('pagination');		
		$config['base_url'] = base_url()."users/index/";
		$config['total_rows'] = $this->userModel->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['message'] = $this->session->flashdata('message');		
				
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/all',$data);
		$this->load->view('admin/footer');
	}
	public function add()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data['title'] = 'Employees';
		$data['action'] = "Add Record";
		$data['roles'] = $this->userModel->get_user_role_list()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/add',$data);
		$this->load->view('admin/footer');
	}
	public function addrecord()
	{
		$this->form_validation->set_rules('txtrole', 'Role', 'required');		
		$this->form_validation->set_rules('txtemail', 'Email', 'required|valid_email');		
		$this->form_validation->set_rules('txtpassword', 'Password', 'required');			
		$this->form_validation->set_rules('txtfname', 'First Name', 'required');	
		$this->form_validation->set_rules('txtlname', 'Last Name', 'required');		
		$this->form_validation->set_rules('txtstartdate', 'Start Date', 'required');		
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}	
		else
		{				
			$data = array(   'role' => $this->input->post('txtrole'),
							 'email' => $this->input->post('txtemail'),
							 'password' =>  md5($this->input->post('txtpassword')),						 
							 'first_name' => $this->input->post('txtfname'),
							 'last_name' => $this->input->post('txtlname'),
							 'created_date' => date('Y-m-d'),
							);   	
			
			$id = $this->userModel->save($data);	
			$this->session->set_flashdata("message", "Record Added Successfully..."); 				
			redirect('admin/users/','refresh');	
		}
	}
	
	public function delete($id)
	{
		$this->userModel->delete($id);		
		$this->session->set_flashdata("message", "Record Deleted Successfully..."); 			
		redirect('admin/users/','refresh');
	}
	
	public function edit($id)
	{			
		$data["editdata"] = $this->userModel->get_by_id($id)->row();	
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;				
		$data['title'] = 'Employees';
		$data['action'] = "Edit Record";
		$data['roles'] = $this->userModel->get_user_role_list()->result();
			
		$this->load->view('admin/header',$data);
		$this->load->view('admin/users/edit',$data);
		$this->load->view('admin/footer');
	}
	public function updaterecord()
	{
		$this->form_validation->set_rules('txtrole', 'Role', 'required');		
		$this->form_validation->set_rules('txtemail', 'Email', 'required|valid_email');		
		$this->form_validation->set_rules('txtpassword', 'Password', 'required');			
		$this->form_validation->set_rules('txtfname', 'First Name', 'required');	
		$this->form_validation->set_rules('txtlname', 'Last Name', 'required');		
		$this->form_validation->set_rules('txtstartdate', 'Start Date', 'required');		
		
		if($this->input->post('txtpassword') == $this->input->post('txthiddenpassword')) {
			$pass = $this->input->post('txtpassword');
		}
		else { $pass = md5($this->input->post('txtpassword')); }
					
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit($this->input->post('id'));
		}	
		else
		{	
                    $data = array(                         
                                    'role' => $this->input->post('txtrole'),
                                    'email' => $this->input->post('txtemail'),
                                    'password' => $pass,							 
                                    'first_name' => $this->input->post('txtfname'),
                                    'last_name' => $this->input->post('txtlname'),
                                );  	

			$id = $this->input->post('id');			
			$this->userModel->update($id,$data);	
			$this->session->set_flashdata("message", "Record Updated Successfully..."); 									
			redirect('admin/users/','refresh');	
		}				
	}
}