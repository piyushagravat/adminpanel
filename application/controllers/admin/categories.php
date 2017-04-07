<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
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
		$this->load->model("CategoriesModel");	
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
		$viewdata = $this->CategoriesModel->get_paged_list($this->limit, $offset)->result();
		$data["viewdata"] = $viewdata;
		$data['title'] = 'Categories Details';
		$data['action'] = "All Categories";
				
		// generate pagination		
		$this->load->library('pagination');		
		$config['base_url'] = base_url()."categories/index/";
		$config['total_rows'] = $this->CategoriesModel->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['message'] = $this->session->flashdata('message');		
				
		$this->load->view('admin/header',$data);
		$this->load->view('admin/categories/all',$data);
		$this->load->view('admin/footer');
		} else {
		redirect(base_url().'admin/categories', 'refresh');
		}
	}
	public function add()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data['title'] = 'Categories Add';
		$data['action'] = "Add Categorie";
		$data['categories'] = $this->CategoriesModel->get_user_role_list()->result();
                $data['ostype'] = $this->CategoriesModel->get_ostype_by_id()->result();
              
                $this->load->view('admin/header',$data);
		$this->load->view('admin/categories/add',$data);
		$this->load->view('admin/footer');
	}
	public function addrecord()
	{
                
                $this->form_validation->set_rules('txtcatname', 'Categories Name', 'required');
                $this->form_validation->set_rules('txtdescription', 'Description', 'required');
                $this->form_validation->set_rules('txtkeyword', 'Enter Keyword', 'required');
                $this->form_validation->set_rules('txtseotitle', 'SEO Title ', 'required');
                
               
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}	
		else
		{				
		    
                      $data = array(        'cname' => $this->input->post('txtcatname'),
                                            'osid' => $this->input->post('selostype'),
                                            'desc' => $this->input->post('txtdescription'),
                                            'keywords' => $this->input->post('txtkeyword'),
                                            'seotitle' => $this->input->post('txtseotitle'),
                                            'status' => "Enable"
                                    );   	
			$id = $this->CategoriesModel->save($data);	
                        $this->session->set_flashdata("message", "Record Added Successfully..."); 				
			redirect('admin/categories/','refresh');	
		}
            
	}
	
	public function delete($id)
	{
		$this->CategoriesModel->delete($id);		
		$this->session->set_flashdata("message", "Record Deleted Successfully..."); 			
		redirect('admin/categories/','refresh');
	}
	
	public function edit($id)
	{			
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		
		$data["editdata"] = $this->CategoriesModel->get_by_id($id)->row();
									
		$data['title'] = 'Categories';
		$data['action'] = "Edit Categories";
		$data['ostype'] = $this->CategoriesModel->get_ostype_by_id()->result();	
                $this->load->view('admin/header',$data);
		$this->load->view('admin/categories/edit',$data);
		$this->load->view('admin/footer');
	}
	public function updaterecord()
	{
		$this->form_validation->set_rules('txtcatname', 'Categories Name', 'required');
                $this->form_validation->set_rules('txtcatname', 'Categories Name', 'required');
                $this->form_validation->set_rules('txtdescription', 'Description', 'required');
                $this->form_validation->set_rules('txtkeyword', 'Categories Name', 'required');
                $this->form_validation->set_rules('txtseotitle', 'Categories Name', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit($this->input->post('cid'));
		}	
		else
		{	
                        $data = array(
                                        'cname' => $this->input->post('txtcatname'),
                                        'osid' => $this->input->post('selostype'),
                                        'desc' => $this->input->post('txtdescription'),
                                        'keywords' => $this->input->post('txtkeyword'),
                                        'seotitle' => $this->input->post('txtseotitle'),
                                     );   	
			
			$id = $this->input->post('cid');			
			$this->CategoriesModel->update($id,$data);
                        $this->session->set_flashdata("message", "Record Updated Successfully..."); 									
			redirect('admin/categories/','refresh');	
		}				
	}
	
	function action($id,$stat)
        {
                        // save data

                        $status = array('status' => $stat);
                        $this->CategoriesModel->changestatus($id,$status);

                        redirect(base_url().'admin/categories','refresh');
        }
	
}