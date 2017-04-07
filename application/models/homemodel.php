<?php
	class HomeModel extends CI_Model
	{
	
		//private $tbl_home = 'homebanner';
		private $tbl_mobile_apps = 'tbl_mobile_apps';
			
		function Home()
		{  
			// Call the Model constructor  
			parent::CI_Model();  
		}	
		function get_homebanner()
		{	
			$this->db->order_by('no','asc');
			$res = $this->db->get('homebanner');
			return $res;			
		}
		
		function get_android_apps()
		{
			$this->db->where('osid', '1');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps);
		}
		function get_ios_apps($limit = 4,$offset = 0)
		{
			$this->db->where('osid', '2');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		function get_windows_apps($limit = 4,$offset = 0)
		{
			$this->db->where('osid', '3');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		function get_blackberry_apps($limit = 4,$offset = 0)
		{
			$this->db->where('osid', '4');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		
		function get_android_top_apps($limit = 4, $offset = 0)
		{
			$this->db->where('osid', '1');
			$this->db->where('istop', '1');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		
		function get_ios_top_apps($limit = 4,$offset = 0)
		{
			$this->db->where('osid', '2');
			$this->db->where('istop', '1');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		function get_windows_top_apps($limit = 4,$offset = 0)
		{
			$this->db->where('osid', '3');
			$this->db->where('istop', '1');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		function get_blackberry_top_apps($limit = 4,$offset = 0)
		{
			$this->db->where('osid', '4');
			$this->db->where('istop', '1');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		
		
		function get_recent_android_apps($limit = 3,$offset = 0)
		{
			$this->db->order_by('mid','desc');
			$this->db->where('osid', '1');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		function get_recent_ios_apps($limit = 3,$offset = 0)
		{
			$this->db->order_by('mid','desc');
			$this->db->where('osid', '2');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		function get_recent_black_apps($limit = 3,$offset = 0)
		{
			$this->db->order_by('mid','desc');
			$this->db->where('osid', '4');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		
		function get_featured_apps($limit = 3,$offset = 0)
		{
			$this->db->order_by('mid','desc');
			$this->db->where('isfeatured', '1');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		
		
		function get_recent_win_apps($limit = 3,$offset = 0)
		{
			$this->db->order_by('mid','desc');
			$this->db->where('osid', '3');
			$this->db->where('status', 'Active');
			return $this->db->get($this->tbl_mobile_apps, $limit, $offset);
		}
		
		
		function count_all()
		{
			return $this->db->count_all($this->tbl_home);
		}
		function get_by_id($id)
		{
			$this->db->where('hid', $id);
			return $this->db->get($this->tbl_home);
		}	
		
		

	}
?>