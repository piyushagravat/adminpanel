<?php
Class PageModel extends CI_Model
{
	private $table = 'tbl_menu';
	private $mobile_app_detail = 'tbl_mobile_apps';
	private $mobile_app_images = 'tbl_app_images';
			
	function __construct()
	{  	
		parent::__construct(); 
	}	
	
	function get_paged_list($limit = 8, $offset = 0)
	{
		$this->db->order_by('id','desc');
               return $this->db->get($this->table, $limit, $offset);
	}
        
    function count_all()
	{
		$this->db->order_by('id','asc');
                return $this->db->count_all($this->table);
	}
     
	function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}
	
	function get_app_by_id($mid)
	{
		$where = $this->db->where('mid', $mid);
		return $this->db->get($this->mobile_app_detail);
	}	
	
	
	function get_app()
	{
		$this->db->order_by('mid','asc');
		return $this->db->get($this->mobile_app_detail);
	}
	
	function get_app_slider_by_id($mid)
	{
		$this->db->where('mid', $mid);
		return $this->db->get($this->mobile_app_images);
	}
      
}
?>