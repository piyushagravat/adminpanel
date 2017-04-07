<?php
Class AppsModel extends CI_Model
{
	
	private $table = 'tbl_mobile_apps';
			
	function __construct()
	{  	
		parent::__construct(); 
	}	
	
	function get_paged_list($limit = 8, $offset = 0)
	{
		$this->db->order_by('mid','asc');
		return $this->db->get($this->table, $limit, $offset);
	}
	function count_all()
	{
		$this->db->order_by('mid','desc');
		return $this->db->count_all($this->table);
	}
	function get_by_id($id)
	{
		$this->db->where('mid', $id);
		return $this->db->get($this->table);
	}	
	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}			
	function update($id, $data)
	{
		$this->db->where('mid', $id);
		$this->db->update($this->table, $data);
	}		
	function delete($id)
	{
		$this->db->where('mid', $id);
		$this->db->delete($this->table);			
	}
    function getCategories(){
		$this->db->select('cid,cname');
		$this->db->from('tbl_category');
		$this->db->order_by('cname', 'asc'); 
		$query=$this->db->get();
                return $query; 
	}
    
	function get_subcat_by_cid($id)
	{
		$this->db->where('cid', $id);	
		return $this->db->get("tbl_subcategory");
	}
	
	function get_os_by_id($id)
	{
		$this->db->where('osid', $id);
		return $this->db->get($this->table);
	}
     
    
        function getData($loadType,$loadId){
		if($loadType=="state"){
			$fieldList='scid as id,scname as name';
			$table='tbl_subcategory';
			$fieldName='cid';
			$orderByField='scname';						
		}else{
			$fieldList='sscat_id as id,ssname as name';
			$table='tbl_sub_subcategories';
			$fieldName='scid';
			$orderByField='ssname';	
		}
		
		$this->db->select($fieldList);
		$this->db->from($table);
		$this->db->where($fieldName, $loadId);
		$this->db->order_by($orderByField, 'asc');
		$query=$this->db->get();
		return $query; 
	}
        function get_slider_images_list($aid)
	{
		$this->db->order_by('aid','asc');
		$this->db->where('mid', $aid);
		return $this->db->get('tbl_app_images');
	}
        function save_image($data)
	{
		$this->db->insert('tbl_app_images', $data);
		return $this->db->insert_id();
	}
    function delete_image($id)
	{
		$this->db->where('aid', $id);
		$this->db->delete('tbl_app_images');
		
	}
        function changestatus($id, $data)
	{
		$this->db->where('mid', $id);
		$this->db->update($this->table, $data);
	}
    }
?>