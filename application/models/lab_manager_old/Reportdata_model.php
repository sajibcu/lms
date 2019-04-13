<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reportdata_model extends CI_Model {

	private $table = 'lab_report_data';

	public function create($data = []) {	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read() {
		return $this->db->select("*")
			->from($this->table)
			->get()
			->result();
	}

	public function getReportEntries($report_id) {
		$results = array();

		$items = $this->db->select("*")
			->from($this->table)
			->where('report_id', $report_id)
			->get()
			->result();
		if(count($items)){
			foreach ($items as $item ) {
				$results[$item->attribute_id] = $item;
			}
		}
		return $results;
	}
 
	public function read_by_id($id = null) {
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->get()
			->row();
	}
	
 
	public function update($data = []) {
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null) {
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
}
