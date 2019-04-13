<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_model extends CI_Model {

	private $table = "patient";
 
	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->order_by('id','desc')
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

	public function read_by_patient_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('patient_id',$id)
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
			->like('firstname', $search, 'both')
			->or_like('lastname', $search, 'both')
			->group_by('patient_id')
			->limit($limit)
			->order_by('firstname','asc');

		$result = $query->get()->result();
		if (!empty($result)) {
			foreach ($result as $item) {
				$list[] = array(
					'label' => $item->firstname.' '.$item->lastname,
					'value' => $item->patient_id
				);
			}
		}
		return $list;
	}

	public function patientInfoByAid($id = null)
	{
		return $this->db->select("p.patient_id,concat(p.firstname,' ',p.lastname) name")
			->from('bill_admission as b')
			->where('admission_id',$id)
			->join("patient as p","p.patient_id=b.patient_id","left")
			->get()
			->row();
	} 
  
}
