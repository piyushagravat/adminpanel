<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
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
		$this->load->model("MenuModel");	
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
		
	}
	public function index()
	{ 	   
                
                $session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		if($session_data["role"] == "Super Admin" || $session_data["role"] == "Admin"){ 
		$uri_segment = 4;
		$offset = $this->uri->segment($uri_segment);
                   
                // load data		
		$viewdata = $this->MenuModel->get_paged_list($this->limit, $offset)->result();
		$data["viewdata"] = $viewdata;
		$data['title'] = 'Menu Details';
		$data['action'] = "All Categories";
				
		// generate pagination		
		$this->load->library('pagination');		
		$config['base_url'] = base_url()."menu/index/";
		$config['total_rows'] = $this->MenuModel->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['message'] = $this->session->flashdata('message');		
				
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu/all',$data);
		$this->load->view('admin/footer');
		} else {
		redirect(base_url().'menu', 'refresh');
		}
	}
	public function add()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data['title'] = 'Categories Add';
		$data['action'] = "Add Categorie";
		$data['menu'] = $this->MenuModel->get_user_role_list()->result();
                
              
                $this->load->view('admin/header',$data);
		$this->load->view('admin/menu/add',$data);
		$this->load->view('admin/footer');
	}
	public function addrecord()
	{
                
                $this->form_validation->set_rules('txtmenuname', 'Menu Name', 'required');
                $this->form_validation->set_rules('txtlink', 'Menu Link', 'required');
              
                
               
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}	
		else
		{				
		    
                      $data = array(        'name' => $this->input->post('txtmenuname'),
                                            'link' => $this->input->post('txtlink'),
                                            'status' => "Enable",
                                    );   	
			$id = $this->MenuModel->save($data);	
                        $this->session->set_flashdata("message", "Record Added Successfully..."); 				
			redirect('admin/menu/','refresh');	
		}
            
	}
	
	public function delete($id)
	{
		$this->MenuModel->delete($id);		
		$this->session->set_flashdata("message", "Record Deleted Successfully..."); 			
		redirect('admin/menu/','refresh');
	}
	
	public function edit($id)
	{			
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		
		$data["editdata"] = $this->MenuModel->get_by_id($id)->row();
									
		$data['title'] = 'Menu';
		$data['action'] = "Edit Menu";
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu/edit',$data);
		$this->load->view('admin/footer');
	}
	public function updaterecord()
	{
		$this->form_validation->set_rules('txtmenuname', 'Menu Name', 'required');
                $this->form_validation->set_rules('txtlink', 'Menu Link', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit($this->input->post('id'));
		}	
		else
		{	
                        $data = array(
                                            'name' => $this->input->post('txtmenuname'),
                                            'link' => $this->input->post('txtlink'),
                                     );   	
			
			$id = $this->input->post('id');			
			$this->MenuModel->update($id,$data);
                        $this->session->set_flashdata("message", "Menu Updated Successfully..."); 									
			redirect('admin/menu/','refresh');	
		}				
	}
	
	function action($id,$stat)
        {
                        // save data

                        $status = array('status' => $stat);
						
						$this->MenuModel->changestatus($id,$status);
	                    redirect(base_url().'admin/menu','refresh');
        }
	
}