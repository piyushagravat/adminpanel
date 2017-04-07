<?php
	class SiteModel extends CI_Model
	{
	
		private $tbl_menu = 'tbl_menu';
		private $tbl_submenu = 'tbl_sub_menu';
		
	
		function Site()
		{  
			// Call the Model constructor  
			parent::CI_Model();  
		}
						
		function get_menu()
		{   $this->db->order_by('id','asc');
			$this->db->where('status', "Enable");
			$res = $this->db->get('tbl_menu');
			return $res;			
		}
		
		
		
		function get_banner()
		{	$this->db->order_by('hid','desc');
			$res = $this->db->get('homebanner');
			return $res;			
		}
		function get_page($pname)
		{
			$this->db->where('pname', $pname);
			return $this->db->get($this->tbl_page);
		}

		function get_category_by_id($id)
		{
			$this->db->where('cid', $id);
			return $this->db->get($this->tbl_category);
		}

		function get_subcategory_detail($id)
		{
			$this->db->where('scid', $id);
			return $this->db->get($this->tbl_subcategory);
		}	
	
		function get_subcategory_by_id($id)
		{	$this->db->order_by('no','asc');
			$this->db->where('status', "active");
			$this->db->where('cid', $id);
			return $this->db->get($this->tbl_subcategory);
		}
		function get_subcategory()
		{   $this->db->order_by('no','asc');
			$this->db->where('status', "active");
			$res = $this->db->get('tbl_subcategory');
			return $res;			
		}
		
		
		function menus() {
			$this->db->select("*");
			$this->db->from("tbl_menu");
			$this->db->where('status', "Enable");
			$q = $this->db->get();

			$final = array();
			if ($q->num_rows() > 0) {
				foreach ($q->result() as $row) {

					$this->db->select("*");
					$this->db->from("tbl_sub_menu");
					$this->db->where("smid", $row->id);
					$this->db->where('status', "Enable");
					$q = $this->db->get();
					if ($q->num_rows() > 0) {
						$row->children = $q->result();
					}
					array_push($final, $row);
				}
			}
			return $final;
		}
		
		
	}
?>