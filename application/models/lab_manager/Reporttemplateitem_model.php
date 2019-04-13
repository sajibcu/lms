<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reporttemplateitem_model extends CI_Model {

	private $table = 'lab_report_template_items';

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
			->get()
			->row();
	}

	public function getTemplateItems($template_id)
	{
		$query = $this->db->select("lab_report_template_items.*, lab_report_template_units.name as unit")
			->join('lab_report_template_units', 'lab_report_template_units.id = lab_report_template_items.unit_id', 'left')
			->from($this->table)
			->where('template_id', $template_id)
			->order_by('sorting_order','asc');
		return $query->get()->result();
	}

	public function deleteTemplateItems($template_id)
	{
		$query = $this->db->where('template_id',$template_id);
		$query->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
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
