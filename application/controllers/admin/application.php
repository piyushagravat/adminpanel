<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {
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
		$this->load->model("appsModel");
		$this->load->model("userModel");
		$this->load->model("CategoriesModel");
        $this->load->model("SubcategoriesModel");
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
		$viewdata = $this->appsModel->get_paged_list($this->limit, $offset)->result();
		$data["viewdata"] = $viewdata;
		$data['title'] = 'Application';
		$data['action'] = "All Record";
				
		// generate pagination		
		$this->load->library('pagination');		
		$config['base_url'] = base_url()."application/index/";
		$config['total_rows'] = $this->appsModel->count_all();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['message'] = $this->session->flashdata('message');		
				
		$this->load->view('admin/header',$data);
		$this->load->view('admin/apps/all',$data);
		$this->load->view('admin/footer');
	}
	
        
    public function loadData()
	{
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];

		$this->load->model('appsModel');
		$result=$this->appsModel->getData($loadType,$loadId);
		$HTML="";
		
		if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->id."'>".$list->name."</option>";
			}
		}
		echo $HTML;
	}
	
	 public function loadDataEdit()
	{
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];

		$this->load->model('appsModel');
		$result=$this->appsModel->getData($loadType,$loadId);
		$HTML="";
		
		if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->id."'>".$list->name."</option>";
			}
		}
		echo $HTML;
	}
    
	public function viewimages($aid)
	{ 	   
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data["images"] = $this->appsModel->get_by_id($aid)->row();
                $viewdata = $this->appsModel->get_slider_images_list($aid)->result();
		$data["viewdata"] = $viewdata;
		$data['title'] = 'Slider Images';
		$data['action'] = "All Record";
		$data['message'] = $this->session->flashdata('message');		
				
		$this->load->view('admin/header',$data);
		$this->load->view('admin/apps/allsliderimages',$data);
		$this->load->view('admin/footer');
	}
        
    public function add_images($aid)
	{
                $session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data['title'] = 'Applcation Images';
		$data['action'] = "Add Record";
		$data["images"] = $this->appsModel->get_by_id($aid)->row();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/apps/addappimages',$data);
		$this->load->view('admin/footer');
	}
        
    public function addrecord_images()
	{
		
		$this->load->library('upload');
	
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	
			$this->upload->initialize($this->set_upload_options());
			if($this->upload->do_upload()) { 
				$val = array('upload_data' => $this->upload->data());				
				$file = $val["upload_data"]["orig_name"];
				$data = array('mid' => $this->input->post('mid'), 'img' => $file);   	
			
				$id = $this->appsModel->save_image($data);
                              
				
			}
			
		}	
		$aid = $this->input->post('mid');
               // print_r($_POST);die;
		$this->session->set_flashdata("message", "Images Uploaded Successfully...");
                redirect('admin/application/viewimages/'.$aid,'refresh');		
	}	

	private function set_upload_options()
	{   
		//upload an image options
		$alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';				
		$curenttimestamp = time();
		$code1 = $curenttimestamp."-".substr(str_shuffle($alpha_numeric), 0, 8);
						
		$config = array();
		$config['upload_path'] = './images/slider/';
		$config['allowed_types'] = '*';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		$config['file_name'] = $code1;	
	
		return $config;
	}
        
    public function delete_image($id,$aid)
	{
		$this->appsModel->delete_image($id);		
		$this->session->set_flashdata("message", "Record Deleted Successfully..."); 
		redirect('admin/application/viewimages/'.$aid,'refresh');
	}
    
	public function add()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;
		$data['title'] = 'Application';
		$data['action'] = "Add Application";
		$data['categories'] = $this->CategoriesModel->get_user_role_list()->result();
        $data['subcategories'] = $this->SubcategoriesModel->get_user_role_list()->result();
        $data['ostype'] = $this->CategoriesModel->get_ostype()->result();
        $data['list']=$this->appsModel->getCategories();
	
		$data['apps']=$this->appsModel->get_paged_list($this->limit)->result();        
		
		
        $this->load->view('admin/header',$data);
		$this->load->view('admin/apps/add',$data);
		$this->load->view('admin/footer');
	}
	public function addrecord()
	{
		$this->form_validation->set_rules('txtappname', 'Applcation Name', 'required');		
			
		$this->form_validation->set_rules('txtapplink', 'App Link', 'required');			
				
		    	
		if ($this->form_validation->run() == FALSE)
		{
			$this->add();
		}	
		else
		{	
                    
			$this->load->library('upload');				
                        $file2 = "";
                             
                        $session_data = $this->session->userdata('logged_in');
                        $data['id'] = $session_data['id'];
                        if (!empty($_FILES['userfile2']['name']))
                        {	
                                $alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                                $curenttimestamp = time();
                                $code1 = $curenttimestamp."-".substr(str_shuffle($alpha_numeric), 0, 8);
                                $config1['upload_path'] = "./images/appicon/";
                                $config1['allowed_types'] = '*';
                                $config1['max_size']	= '100000';				
                                $config1['file_name'] = $code1;		
                                $this->upload->initialize($config1);		
                                if (!$this->upload->do_upload('userfile2'))
                                {	
                                        $error = $this->upload->display_errors();
                                        $this->add($error);
                                }
                                else
                                {
                                        $val1 = array('upload_data' => $this->upload->data());				
                                        $file2 = $val1["upload_data"]["orig_name"];
                                }
                        }

                    
                        $data = array(   
							 'app_name' => $this->input->post('txtappname'),
							 'cid' =>  $this->input->post('txtcategories'),						 
							 'scid' => $this->input->post('txtsubcategories'),
							 'osid' => $this->input->post('selostype'),
                             'app_icon' => $file2,
                             'app_details' => $this->input->post('txtdetails'),
                             'app_link' => $this->input->post('txtapplink'),
							 'similer_apps' => implode(",", $_POST['similerapp ']),
                             'isfeatured' => $this->input->post('chkfeaturedapp'),
                             'istop' => $this->input->post('chktopapp'),
							 'status' => "Active",
							 'date' => date('Y-m-d'),
							);   	
			
			$id = $this->appsModel->save($data);	
                
			$this->session->set_flashdata("message", "Record Added Successfully..."); 				
			redirect('admin/application/','refresh');	
		}
	}
	
	public function delete($id)
	{
		$this->appsModel->delete($id);		
		$this->session->set_flashdata("message", "Record Deleted Successfully..."); 			
		redirect('admin/application/','refresh');
	}
	
	public function edit($id)
	{			
		
		$data["editdata"] = $this->appsModel->get_by_id($id)->row();	
		
		$session_data = $this->session->userdata('logged_in');
		$data['email'] = $session_data['email'];
		$data['session_data'] = $session_data;				
		$data['title'] = 'Application';
		$data['action'] = "Edit Record";
		$data['categories'] = $this->CategoriesModel->get_user_role_list()->result();
        $data['subcategories'] = $this->SubcategoriesModel->get_user_role_list()->result();
        $data['ostype'] = $this->CategoriesModel->get_ostype()->result();
        $data['list']=$this->appsModel->getCategories();
		$data['apps']=$this->appsModel->get_paged_list($this->limit)->result();
		//print_r($data['list']);die;	
		$this->load->view('admin/header',$data);
		$this->load->view('admin/apps/edit',$data);
		$this->load->view('admin/footer');
	}
    
	
	public function updaterecord()
	{
		
		$this->form_validation->set_rules('txtappname', 'App Name', 'required');		
		$this->form_validation->set_rules('txtcategories', 'Categories', 'required');		
					
		$this->form_validation->set_rules('txtapplink', 'App Link', 'required');	
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit($this->input->post('id'));
		}	
		else
		{	
                   
			$this->load->library('upload');	
			$file2 = "";
            
            if (!empty($_FILES['userfile1']['name']))
				{	
					$alpha_numeric = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';				
					$curenttimestamp = time();
					$code1 = $curenttimestamp."-".substr(str_shuffle($alpha_numeric), 0, 8);
									
					$config1['upload_path'] = "./images/appicon/";
					$config1['allowed_types'] = '*';
					$config1['max_size']	= '10000';				
					$config1['file_name'] = $code1;		
					
					$this->upload->initialize($config1);	
						
					if (!$this->upload->do_upload('userfile1'))
					{	
						$error = $this->upload->display_errors();
						
						$this->add($error);
					}
					else
					{
						$val2 = array('upload_data' => $this->upload->data());				
						$file2 = $val2["upload_data"]["orig_name"];
											
					}
				}
				else
				{
					$file2 = $this->input->post('userfile1old');
				}
               
					
			   
				   $data = array(                         
                                     'app_name' => $this->input->post('txtappname'),
									 'cid' =>  $this->input->post('txtcategories'),						 
									 'scid' => $this->input->post('txtsubcategories'),
									 'osid' => $this->input->post('selostype'),
									 'app_icon' => $file2,
									 'app_details' => $this->input->post('txtdetails'),
									 'app_link' => $this->input->post('txtapplink'),
									 'similer_apps' => implode(",", $_POST['similerapp']),
									 'isfeatured' => $this->input->post('chkfeaturedapp'),
									 'istop' => $this->input->post('chktopapp'),
                                );  	
				
			$id = $this->input->post('mid');			
			$this->appsModel->update($id,$data);	
			$this->session->set_flashdata("message", "Record Updated Successfully..."); 									
			redirect('admin/application/','refresh');	
		}				
	}
	 function action($id,$stat)
	{
					// save data

					$status = array('status' => $stat);
					$this->appsModel->changestatus($id,$status);
					redirect(base_url().'admin/application','refresh');
	}
}