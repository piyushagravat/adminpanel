<?php
Class DropdownModel extends CI_Model
{
	//private $table = 'tbl_product';
			
	function __construct()
	{  	
		parent::__construct(); 
	}	
	
	function get_categories_list()
	{
		$this->db->order_by('cid','desc');	
		return $this->db->get("tbl_categories");
	}
	function get_subcategories_list()
	{
		$this->db->order_by('subcat_id','desc');	
		return $this->db->get("tbl_subcategories");
	}
	
	function getCategories(){
		$this->db->select('cid,cname');
		$this->db->from('tbl_categories');
		$this->db->order_by('cname', 'asc'); 
		$query=$this->db->get();
		return $query; 
	}
	
	function getData($loadType,$loadId){
		if($loadType=="state"){
			$fieldList='subcat_id as id,subcat_name as name';
			$table='tbl_subcategories';
			$fieldName='cid';
			$orderByField='subcat_name';						
		}else{
			$fieldList='sscat_id as id,ssname as name';
			$table='tbl_sub_subcategories';
			$fieldName='subcat_id';
			$orderByField='ssname';	
		}
		
		$this->db->select($fieldList);
		$this->db->from($table);
		$this->db->where($fieldName, $loadId);
		$this->db->order_by($orderByField, 'asc');
		$query=$this->db->get();
		return $query; 
	}
	
	
	
   
        
    
}
?>