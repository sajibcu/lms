<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

	private $table = 'invoice';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("invoice.*, CONCAT(patient.firstname, ' ', patient.lastname) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = invoice.customer_id','left')
			->order_by('invoice.date','desc')
			->get()
			->result();		
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
		return $this->db->select("invoice.*, CONCAT(patient.firstname, ' ', patient.lastname) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = invoice.customer_id','left')
			->where('invoice.id',$id)
			->get()
			->row();
	}

	public function read_by_invoice_no($invoiceId, $singular = false)
	{
		$query =  $this->db->select("invoice.*, CONCAT(patient.firstname, ' ', patient.lastname) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = invoice.customer_id','left')
			->where('invoice.invoice',$invoiceId)
			->get();
		return $singular ? $query->row() : $query->result();
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
