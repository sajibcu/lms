<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model {

	private $table = 'lab_invoice';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("lab_invoice.*, CONCAT(patient.firstname, ' ', IF(patient.lastname IS NULL,'',patient.lastname) ) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = lab_invoice.customer_id','left')
			->order_by('lab_invoice.date','desc')
			->get()
			->result();		
	} 

	public function read_by_date_range($from, $to)
	{
		return $this->db->select("lab_invoice.*
			, CONCAT(patient.firstname, ' ', IF(patient.lastname IS NULL,'',patient.lastname) ) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = lab_invoice.customer_id','left')
			->where('lab_invoice.date  >=',$from)
			->where('lab_invoice.date  <=',$to)
			->order_by('lab_invoice.date','desc')
			->get()
			->result();		
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("lab_invoice.*, CONCAT(patient.firstname, ' ', patient.lastname) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = lab_invoice.customer_id','left')
			->where('lab_invoice.id',$id)
			->get()
			->row();
	}

	public function read_by_invoice_no($invoiceId, $singular = false)
	{
		$query =  $this->db->select("lab_invoice.*, CONCAT(patient.firstname, ' ', patient.lastname) AS customer_name")
			->from($this->table)
			->join('patient', 'patient.patient_id = lab_invoice.customer_id','left')
			->where('lab_invoice.invoice',$invoiceId)
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
