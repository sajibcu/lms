<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model {

	private $table = 'medicine_purchase';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->get()
			->result();
	}
 
	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('purchase_id',$id)
			->get()
			->row();
	}
	
	public function read_by_manufacturer($manufacturer_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('manufacturer_id',$manufacturer_id)
			->get()
			->result();
	}
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 
	
 }
