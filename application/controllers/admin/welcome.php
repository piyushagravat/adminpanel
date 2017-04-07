<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	private $limit = 20;
	function __construct()
	{
		parent::__construct();
			
			$this->load->model('user','',TRUE);
				
			
	}
	
	public function index()
	{ 
		if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['email'] = $session_data['email'];
		 $data['session_data'] = $session_data;
		 if($session_data["role"] == "Super Admin") { 
			 
		 } 
		 else if($session_data["role"] == "Admin") { 
				 
		 }
		 
		 $this->load->view('admin/header',$data);
		 $this->load->view('admin/welcome_message',$data);
		 $this->load->view('admin/footer');
	   }
	   else
	   {
			 redirect(base_url().'admin/login', 'refresh');
	   }
	
		
	}
	
	function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   redirect(base_url().'admin/login', 'refresh');
	 }
	 
	 function settings(){
		 
		 $this->load->helper(array('form', 'url'));
		 
		 $session_data = $this->session->userdata('logged_in');
		 $data['username'] = $session_data['username'];
		 $data['password'] = $session_data['password'];
		 
		 $data['title'] = 'Settings';
		 $data['action'] = site_url('welcome/check');
		 $this->load->view('admin/header',$data);
		 $this->load->view('admin/welcome/sidebar',$data);
		 $this->load->view('admin/settings',$data);
		 $this->load->view('admin/footer'); 
	 }
	 
	 function check(){
	 
	 	 $this->load->library('form_validation');

	     $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_pass');
		 $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|xss_clean');
		 
		 if($this->form_validation->run() == FALSE)
	     {
		 	$this->settings();
	     }
	     else
	     {
		 	
				$session_data = $this->session->userdata('logged_in');
		        $id = $session_data['id'];
				$pass = array('password' => md5($this->input->post('newpassword')));
				$this->load->model("homeModel");
				$this->homeModel->updatepass($id,$pass);
				redirect('admin/welcome', 'refresh');
	     }
		  		 
	 }
	 
	 function check_pass($password)
 	 {
	 	$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
	    $result = $this->user->login($username, $password);
	 
	    if($result) {		 
		 	return TRUE;
	   	}
	    else
	    {
		 	$this->form_validation->set_message('check_pass', 'Invalid password, Please enter correct password');
		 	return false;
	    }
 	 }
	 
	 function action($id,$stat)
		{
				// save data
				
				$status = array('status' => $stat);
				$this->leavesModel->changestatus($id,$status);
			
				redirect(base_url().'welcome','refresh');
		}
		
		
		
	public function category()
	{
		
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
			$this->load->model('DropdownModel');
			
        $data["categories"] = $this->DropdownModel->get_categories_list()->result();
	
        $data["subcategories"] = $this->DropdownModel->get_subcategories_list()->result();

		$data['list']=$this->DropdownModel->getCategories();
     
		
		 $this->load->view('admin/header',$data);
		$this->load->view('admin/dropdown/list',$data);
		$this->load->view('admin/footer');
		
	}
	
	public function loadData()
	{
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];

		$this->load->model('DropdownModel');
		$result=$this->DropdownModel->getData($loadType,$loadId);
		$HTML="";
		
		if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->id."'>".$list->name."</option>";
			}
		}
		echo $HTML;
	}
    
	
	
}