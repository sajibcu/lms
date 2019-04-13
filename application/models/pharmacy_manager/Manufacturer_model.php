<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manufacturer_model extends CI_Model {

	private $table = 'manufacturer_information';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('manufacturer_name','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('manufacturer_id',$id)
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

	public function manufacturer_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = 'Select Manufacturer';
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->manufacturer_id] = $value->manufacturer_name; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function getItemsListBySearch($search, $limit= 20)
	{
		$list = array();

		$query = $this->db->select("*")
			->from($this->table)
			->like('manufacturer_name', $search, 'both')
			->group_by('manufacturer_id')
			->limit($limit)
			->order_by('manufacturer_name','asc');

		$result = $query->get()->result();
		if (!empty($result)) {
			foreach ($result as $item) {
				$list[] = array(
					'label' => $item->manufacturer_name,
					'value' => $item->manufacturer_id
				);
			}
		}
		return $list;
	}
	
 }
