<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = "user";
 
	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("u.*
			, CONCAT_WS(' ', u.firstname, u.lastname) AS fullname
			,r.name user_role_name 
			")
			->from($this->table." AS u")
			->join("user_role AS r","r.id = u.user_role","left") 
			->where('u.status', '1')
			->order_by('u.user_id','desc')
			->get()
			->result();
	} 
 
	public function read_by_id($user_id = null)
	{
		return $this->db->select("u.*
			, CONCAT_WS(' ', u.firstname, u.lastname) AS fullname
			,r.name user_role_name 
			")
			->from($this->table." AS u")
			->join("user_role AS r","r.id = u.user_role","left") 
			->where('u.user_id', $user_id) 
			->get()
			->row();
	} 
 
	public function update($data = [])
	{
		return $this->db->where('user_id',$data['user_id']) 
			->update($this->table,$data); 
	} 
 
	public function delete($user_id = null, $user_role = null)
	{
		// $this->db->where('user_id',$user_id) 			
		// 	->where('user_role', $user_role)
		// 	->where_not_in('user_role', 1)
		// 	->where_not_in('user_role', 2)
		// 	->delete($this->table);
		$data = array(
			'user_id'=>$user_id,
			'user_role'=>$user_role,
			'status'=>0
		);
		$this->db->where('user_id',$data['user_id'])
			->where('user_role',$data['user_role']) 
			->where_not_in('user_role', 1)
			->update($this->table,$data); 

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
	public function user_roles()
	{
		return $this->db->select("*")
			->from("user_role")
			->where('sts', "1") 
			->get()
			->result();
	}
	public function getSyslink()
	{
		return $this->db->query("SELECT j1.id AS sys_link_id
						,j1.name link_name
						,j2.id AS  cat_id
						,j2.name AS cat_name
						,j3.id AS group_id
						,j3.name AS group_name

						FROM 
						(
							SELECT * FROM sys_link WHERE sts=1
						) j1
						INNER JOIN sys_cat j2 ON j2.sts=1 AND j1.cat_id=j2.id
						INNER JOIN sys_group j3 ON j3.sts=1 AND j2.group_id=j3.id
						ORDER BY j3.id,j2.id")->result();
	} 
	function categoryRightsInformation($cat_id=0)
	{
		$data = $this->db->query("SELECT 
								j1.*
								FROM
								(
									SELECT * FROM user_right WHERE user_id = ".$this->session->userdata('user_id')."
								) s
								INNER JOIN sys_link j1 ON j1.id = s.link_id 
								WHERE j1.cat_id = ".$cat_id)->result();
		$VIEW		= 0;
		$ADD 		= 0;
		$EDIT 		= 0;
		$DELETED 	= 0;
		$PERMISION 	= 0;

		foreach($data as $row)
		{
			if($row->operation == 'View') $VIEW =1;
			if($row->operation == 'Add') $ADD =1;
			if($row->operation == 'Edit') $EDIT =1;
			if($row->operation == 'Delete') $DELETED =1;
			if($row->operation == 'Permision') $PERMISION =1;
		}

		$rights = array(
			'VIEW'=>$VIEW,
			'ADD'=>$ADD,
			'EDIT'=>$EDIT,
			'DELETED'=>$DELETED,
			'PERMISION'=>$PERMISION,
		);

		return $rights;
	}
  
}
