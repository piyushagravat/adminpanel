<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submenu extends CI_Controller {
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
		$this->load->model("SubmenuModel");
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
		$viewdata = $this->SubmenuModel->get_paged_list($this->limit, $offset)->result();
		$data["viewdata"] = $viewdata;
		$data['title'] = 'Submenu Details';
		$data['action'] = "All Subcategories";
				
		// generate pagination		
		$this->load->library('pagination');		
		$config['base_url'] = base_url()."submenu/index/";
		$config['total_rows'] = $this->SubmenuModel->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['message'] = $this->session->flashdata('message');		
				
		$this->load->view('admin/header',$data);
		$this->load->view('admin/submenu/all',$data);
		$this->load->view('admin/footer');
		} else {
		redirect(base_url().'admin/submenu', 'refresh');
		}
	}
	
	
	
	public function add()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data['title'] = 'Add Subcategories ';
		$data['action'] = "Add Subcategorie";
		$data['submenu'] = $this->SubmenuModel->get_user_role_list()->result();
                $data["menu"] = $this->SubmenuModel->get_menu_list()->result();
                
                $this->load->view('admin/header',$data);
		$this->load->view('admin/submenu/add',$data);
		$this->load->view('admin/footer');
	}
	public function addrecord()
	{
                $this->form_validation->set_rules('txtsubmenuname', 'Sub Menu Name', 'required');
                 
                 $this->form_validation->set_rules('selmenu','Select Options','required|greater_than[0]');
                $this->form_validation->set_rules('txtlink', 'URL Link', 'required');
           
                
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}	
		else
		{				
                    
                    $data = array(          
                                        'name' => $this->input->post('txtsubmenuname'),
                                        'id' => $this->input->post('selmenu'),
					'link' => $this->input->post('txtlink'),
                                        'status' => "Enable"
                                 );   	
			$id = $this->SubmenuModel->save($data);	
                        
			$this->session->set_flashdata("message", "Record Added Successfully..."); 				
			redirect('admin/submenu/','refresh');	
		}
            
	}
	
	public function delete($id)
	{
		$this->SubmenuModel->delete($id);		
		$this->session->set_flashdata("message", "Record Deleted Successfully..."); 			
		redirect('admin/submenu/','refresh');
	}
	
	public function edit($id)
	{			
		$data["editdata"] = $this->SubmenuModel->get_by_id($id)->row();	
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;				
		$data['title'] = 'Sub-Categories';
		$data['action'] = "Edit Subcategories";
		$data['roles'] = $this->SubmenuModel->get_user_role_list()->result();
                $data["menu"] = $this->SubmenuModel->get_menu_list()->result();
		$data['submenu'] = $this->SubmenuModel->get_user_role_list()->result();	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/submenu/edit',$data);
		$this->load->view('admin/footer');
            
	}
	public function updaterecord()
	{
		$this->form_validation->set_rules('txtsubmenuname', 'Sub Menu Name', 'required');
                $this->form_validation->set_rules('selmenu', 'Select Menu', 'required');
                $this->form_validation->set_rules('txtlink', 'URL Link', 'required');
                
                
                if ($this->form_validation->run() == FALSE)
		{
			$this->edit($this->input->post('smid'));
		}	
			
		else
		{
                        $data = array(      
                                        'name' => $this->input->post('txtsubmenuname'),
                                        'id' => $this->input->post('selmenu'),
					'link' => $this->input->post('txtlink'),
                                     );  	
                                     
			$id = $this->input->post('smid');
                        $this->SubmenuModel->update($id,$data);	
			$this->session->set_flashdata("message", "Record Updated Successfully..."); 									
			redirect('admin/submenu/','refresh');
                }
        }
        
        
	function action($id,$stat)
        {
                        // save data

                        $status = array('status' => $stat);
                        $this->SubmenuModel->changestatus($id,$status);
                        redirect(base_url().'admin/submenu','refresh');
        }
		
	
}