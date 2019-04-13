<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reporttemplate_model extends CI_Model {

	private $table = 'lab_report_templates';

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
			->where('id',$id)
			->get()
			->row();
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

	public function getItemsListBySearch($search, $limit= 20)
	{
		$list = array();

		$query = $this->db->select("*")
			->from($this->table)
			->like('name', $search, 'both')
			->limit($limit)
			->order_by('name','asc');

		$result = $query->get()->result();
		if (!empty($result)) {
			foreach ($result as $item) {
				$list[] = array(
					'label' => $item->name,
					'value' => $item->id
				);
			}
		}
		return $list;
	}
	
 }
