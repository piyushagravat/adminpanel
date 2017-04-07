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
		$this->load->model("siteModel");
		$this->load->model("homeModel");
		 // menu or sub-menu both
		//$menus = $this->siteModel->menus();
		//$data = array('menus' => $menus);
	
		// $data["menu"] = $this->siteModel->get_menu()->result();
		 //$data["android"] = $this->homeModel->get_android_top_apps()->result();
		 //$data["ios"] = $this->homeModel->get_ios_top_apps()->result();
		 //$data["androidrecent"] = $this->homeModel->get_recent_android_apps()->result();
		 //$data["iosrecent"] = $this->homeModel->get_recent_ios_apps()->result();
		 //$data["blackberryrecent"] = $this->homeModel->get_recent_black_apps()->result();
		 //$data["windowsrecent"] = $this->homeModel->get_recent_win_apps()->result();
		 $data["title"] = "Welcome";
		 $data["keywords"] = "Welcome";
		 $data["class"] = "welcome"; 	 
		 
		// $this->load->model("homeModel");
	//	 $banner = $this->homeModel->get_homebanner()->result();
    	// $data["banner"] = $banner;
		 $this->load->view('header',$data);
		// $this->load->view('menu',$data);
		 $this->load->view('welcome_message',$data);
		 $this->load->view('footer',$data);	
		
	}
	
	
	
}