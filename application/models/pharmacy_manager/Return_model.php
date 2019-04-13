<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Return_model extends CI_Model {

	private $table = 'medicine_return';
	public $usablity_customer = 1;
	public $usablity_manufacturer = 2;
	public $usablity_wastage = 3;

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read($usablity = 1, $all = false){

		$query = $this->db->select("medicine_return.*, CONCAT(p.firstname, ' ', p.lastname) AS customer_name, m.manufacturer_name")
			->join('patient p', 'p.patient_id = medicine_return.customer_id','left')
			->join('manufacturer_information m', 'm.manufacturer_id = medicine_return.manufacturer_id','left')
			->from($this->table)
			->order_by('.medicine_return.date_return','desc');

		if( !$all ) $query->where('medicine_return.usablity', $usablity);
		return $query->get()->result();

		// return $this->db->select("invoice.*, CONCAT(patient.firstname, ' ', patient.lastname) AS customer_name")
		// 	->from($this->table)
		// 	->join('patient', 'patient.patient_id = invoice.customer_id','left')
		// 	->order_by('invoice.date','desc')
		// 	->get()
		// 	->result();		
	} 

	public function read_by_date_range($from, $to)
	{
		return $this->db->select("invoice.*, CONCAT(patient.firstname, ' ', patient.lastname) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = invoice.customer_id','left')
			->where('invoice.date  >=',$from)
			->where('invoice.date  <=',$to)
			->order_by('invoice.date','desc')
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

	public function read_by_return_id($invoiceId)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('return_id',$invoiceId)
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
 }
