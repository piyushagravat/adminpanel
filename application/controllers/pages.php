<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
		parent::__construct();			
	
	$this->load->model("siteModel");
		$this->load->model("homeModel");
		$this->load->model("pageModel");
	
	}
	
	public function index(){	
			
         echo "<h1>Page not found</h1>";exit;
		
	}
	
	public function android()
	{ 
		
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["android"] = $this->homeModel->get_android_apps()->result();
		$data['title'] = 'Android';
		$data["keywords"] = "";
		
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('android', $data);
		$this->load->view('footer');	
	}
	
	public function ios()
	{ 
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["ios"] = $this->homeModel->get_ios_apps()->result();
		$data['title'] = 'iphone';
		$data["keywords"] = "";
		
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('ios', $data);
		$this->load->view('footer');	
	}
	public function windows()
	{ 
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["windows"] = $this->homeModel->get_windows_apps()->result();
		$data['title'] = 'Windows';
		$data["keywords"] = "";
		
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('windows', $data);
		$this->load->view('footer');	
	}
	
	public function blackberry()
	{ 
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["blackberry"] = $this->homeModel->get_blackberry_apps()->result();
		$data['title'] = 'Blackberry';
		$data["keywords"] = "";
		
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('blackberry', $data);
		$this->load->view('footer');	
	}
	public function topapps()
	{ 
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["android"] = $this->homeModel->get_android_top_apps()->result();
		$data["ios"] = $this->homeModel->get_ios_top_apps()->result();
		$data["windows"] = $this->homeModel->get_windows_top_apps()->result();
		$data["blackberry"] = $this->homeModel->get_blackberry_top_apps()->result();
		$data['title'] = 'Top Apps';
		$data["keywords"] = "";
		
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('topapps', $data);
		$this->load->view('footer');	
	}
	public function featuredapp()
	{ 
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["featured"] = $this->homeModel->get_featured_apps()->result();
		$data["keywords"] = "";
		
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('featured', $data);
		$this->load->view('footer');	
	}
	
	public function appdetail($mid)
	{ 
		
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["appsdetail"] = $this->pageModel->get_app_by_id($mid)->result();
		
		$data["apps"] = $this->pageModel->get_app()->result();
		
		$data["appslider"] = $this->pageModel->get_app_slider_by_id($mid)->result();
		
		$data["keywords"] = "";
		
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('appdetail',$data);
		$this->load->view('footer');	
	}
	public function contactus($success="")
	{ 
		$data["menu"] = $this->siteModel->get_menu()->result();
		$data["keywords"] = "";
		$data['success'] =$success;
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('contactus', $data);
		$this->load->view('footer');	
	}
	
	public function send()
	{ 
		 /* $this->load->library('form_validation');
			field name, error message, validation rules
			$this->form_validation->set_rules('txtname', 'Name', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('txtemail', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('txtmessage', 'Message', 'trim|required');
		  
			  if($this->form_validation->run() == FALSE)
			  {
			   $this->contactus($success="");
			  }
			  else
			  {  */
				  $this->load->library('email');
				  
				  $name = $this->input->post("txtname");
				  $email = $this->input->post("txtemail");
				  $txtphone = ($this->input->post("txtphone") == "") ? '....' : $this->input->post("txtphone");
				  $txtmessage = $this->input->post("txtmessage");			  
				  
				  $this->email->from($email, $name);
			$this->email->to('piyush_agravat@yahoo.com');
			$this->email->cc('piyush@arniontechnologies.com');
			//$this->email->bcc('piyush@arniontechnologies.com);			
			$html = "<p><strong>GL Apps Team</strong>,<br>You have an inquiry. Please find the details below.</p>
			<table width='550px' cellspacing='3' cellpadding='5' style='font-family:Arial, Helvetica, sans-serif;color:#666;font-size:13px;text-shadow: 1px 1px 0px #E2E1E1;background:#eaebec;margin:10px;border:#ccc 1px solid;	-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;-moz-box-shadow: 0 1px 2px #d1d1d1;-webkit-box-shadow: 0 1px 2px #d1d1d1;box-shadow: 0 1px 2px #d1d1d1;'>
					</tr>
					<tr>
					 <td valign='top'>
					  <label for='name' style='font-weight:bold'>Name : </label>
					 </td>
					 <td valign='top'>
					  $name
					 </td>
					</tr>	
					<tr>
					 <td valign='top'>
					  <label for='email' style='font-weight:bold'>Email Address : </label>
					 </td>
					 <td valign='top'>
					  $email
					 </td>
					</tr>
					<tr>
					 <td valign='top'>
					  <label for='Interest' style='font-weight:bold'>Phone : </label>
					 </td>
					 <td valign='top'>
					  $txtphone
					 </td>
					</tr>									
					<tr>
					 <td valign='top'>
					  <label for='Contact' style='font-weight:bold'>Message : </label>
					 </td>
					 <td valign='top'>
					 $txtmessage
					 </td>
					</tr>
										
					</table>";
			
			$this->email->subject('Contact Request from - '. $name);
			$this->email->message($html);	
			$this->email->send();
			redirect('pages/success', 'refresh');
		//	}

	}
	
	public function success()
	{ 
		 $data["menu"] = $this->siteModel->get_menu()->result();
    	 		  		 
		 $data["class"] = "welcome"; 		 
		 $data["title"] = "Thank you - GL Apps";
		 $data["keywords"] = "GL Apps";
		 $data["desc"] = "GL Apps";   
		 $this->load->view('header',$data);
		 $this->load->view('menu',$data);
		 $this->load->view('success', $data);
		 $this->load->view('footer');	
	}
	
	
}


