<?php
Class SubmenuModel extends CI_Model
{
	private $table = 'tbl_sub_menu';
			
	function __construct()
	{  	
		parent::__construct(); 
	}	
	
	function get_paged_list($limit = 8, $offset = 0)
	{
		$this->db->order_by('smid','desc');
               return $this->db->get($this->table, $limit, $offset);
	}
        
        function count_all()
	{
		$this->db->order_by('smid','desc');
                return $this->db->count_all($this->table);
	}
     
	function get_by_id($id)
	{
		$this->db->where('smid', $id);
		return $this->db->get($this->table);
	}	
	function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}			
	function update($id, $data)
	{
                $this->db->where('smid', $id);
		$this->db->update($this->table, $data);
        }		
	function delete($id)
	{
		$this->db->where('smid', $id);
		$this->db->delete($this->table);			
	}
	
	function get_user_role_list()
	{
		$this->db->order_by('id','asc');
		return $this->db->get("tbl_roles");
	}
       function get_menu_list()
	{
		$this->db->order_by('id','desc');	
		return $this->db->get("tbl_menu");
	}	
	
	function get_menu_list_by_id($id)
	{
		$this->db->order_by('id','desc');	
		$this->db->where('id', $id);
		return $this->db->get("tbl_menu");
	}
        function get_submenu_list_by_id($id)
	{
		$this->db->order_by('smid','desc');	
		$this->db->where('smid', $id);
		return $this->db->get($this->table);
	}
	function changestatus($id, $data)
	{
		$this->db->where('smid', $id);
		$this->db->update($this->table, $data);
	}
}
?>