<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategories extends CI_Controller {
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
		$this->load->model("SubcategoriesModel");
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
		$viewdata = $this->SubcategoriesModel->get_paged_list($this->limit, $offset)->result();
		$data["viewdata"] = $viewdata;
		$data['title'] = 'Subcategories Details';
		$data['action'] = "All Subcategories";
				
		// generate pagination		
		$this->load->library('pagination');		
		$config['base_url'] = base_url()."subcategories/index/";
		$config['total_rows'] = $this->SubcategoriesModel->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['message'] = $this->session->flashdata('message');		
				
		$this->load->view('admin/header',$data);
		$this->load->view('admin/subcategories/all',$data);
		$this->load->view('admin/footer');
		} else {
		redirect(base_url().'admin/subcategories', 'refresh');
		}
	}
	
	
	
	public function add()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data['title'] = 'Add Subcategories ';
		$data['action'] = "Add Subcategorie";
		$data['subcategories'] = $this->SubcategoriesModel->get_user_role_list()->result();
		$data["categories"] = $this->SubcategoriesModel->get_categories_list()->result();
		$data['ostype'] = $this->CategoriesModel->get_ostype_by_id()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/subcategories/add',$data);
		$this->load->view('admin/footer');
	}
	public function addrecord()
	{
                $this->form_validation->set_rules('txtsubcatname', 'Sub Categories Name', 'required');
                $this->form_validation->set_rules('txtdescription', 'Description', 'required');
                $this->form_validation->set_rules('txtkeyword', 'KeyWord Name', 'required');
                $this->form_validation->set_rules('txtseotitle', 'SEO Title', 'required');
                
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}	
		else
		{				
                    
                    $data = array(          
									'scname' => $this->input->post('txtsubcatname'),
									'cid' => $this->input->post('selcategories'),
									'osid' => $this->input->post('selostype'),
									'desc' => $this->input->post('txtdescription'),
									'keywords' => $this->input->post('txtkeyword'),
									'seotitle' => $this->input->post('txtseotitle'),
									'status' => "Enable"
                                 );   	
			$id = $this->SubcategoriesModel->save($data);	
                        
			$this->session->set_flashdata("message", "Record Added Successfully..."); 				
			redirect('admin/subcategories/','refresh');	
		}
            
	}
	
	public function delete($id)
	{
		$this->SubcategoriesModel->delete($id);		
		$this->session->set_flashdata("message", "Record Deleted Successfully..."); 			
		redirect('admin/subcategories/','refresh');
	}
	
	public function edit($id)
	{			
		$data["editdata"] = $this->SubcategoriesModel->get_by_id($id)->row();	
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;				
		$data['title'] = 'Sub-Categories';
		$data['action'] = "Edit Subcategories";
		$data['roles'] = $this->SubcategoriesModel->get_user_role_list()->result();
		$data['ostype'] = $this->CategoriesModel->get_ostype_by_id()->result();
		$data["categories"] = $this->SubcategoriesModel->get_categories_list()->result();
		$data['subcategories'] = $this->SubcategoriesModel->get_user_role_list()->result();	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/subcategories/edit',$data);
		$this->load->view('admin/footer');
            
	}
	public function updaterecord()
	{
		$this->form_validation->set_rules('txtsubcatname', 'Sub Categories Name', 'required');
		$this->form_validation->set_rules('txtdescription', 'Description', 'required');
		$this->form_validation->set_rules('txtkeyword', 'KeyWord Name', 'required');
		$this->form_validation->set_rules('txtseotitle', 'SEO Title', 'required');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit($this->input->post('subcat_id'));
		}	
			
		else
		{
			$data = array(      
							'scname' => $this->input->post('txtsubcatname'),
							'cid' => $this->input->post('selcategories'),
							'osid' => $this->input->post('selostype'),
							'desc' => $this->input->post('txtdescription'),
							'keywords' => $this->input->post('txtkeyword'),
							'seotitle' => $this->input->post('txtseotitle'),
						 );  	
                                     
			$id = $this->input->post('scid');
            $this->SubcategoriesModel->update($id,$data);	
			$this->session->set_flashdata("message", "Record Updated Successfully..."); 									
			redirect('admin/subcategories/','refresh');
                }
        }
        
        
	function action($id,$stat)
		{
				// save data
				
			$status = array('status' => $stat);
			$this->SubcategoriesModel->changestatus($id,$status);
			redirect(base_url().'admin/subcategories','refresh');
		}
		
	
}