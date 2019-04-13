<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoicedetail_model extends CI_Model {

	private $table = 'lab_invoice_details';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("lab_invoice_details.*, lab_report_templates.name as product_name")
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_invoice_details.product_id','left')
			->order_by('lab_invoice_details.purchase_id','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("lab_invoice_details.*, lab_report_templates.name as product_name")
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_invoice_details.product_id','left')
			->where('lab_invoice_details.id',$id)
			->get()
			->row();
	} 

	public function read_by_invoice_details_id($id = null)
	{
		return $this->db->select("lab_invoice_details.*, lab_report_templates.product_name")
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_invoice_details.product_id','left')
			->where('lab_invoice_details.invoice_details_id',$id)
			->get()
			->row();
	} 

	public function getInvoiceItems($invoiceID, $isPositive = true, $all = false)
	{
		$query = $this->db->select("lab_invoice_details.*, lab_report_templates.name as product_name")
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_invoice_details.product_id','left')
			->where('lab_invoice_details.invoice_id', $invoiceID)
			->order_by('lab_invoice_details.id','asc');
			
		if ( $isPositive && !$all ) $query->where('quantity >', 0);
		if ( !$isPositive && !$all ) $query->where('quantity <', 0);
		return $query->get()->result();
	}

	public function deleteInvoiceItems($invoiceID, $isPositive = true, $all = false)
	{
		$query = $this->db->where('invoice_id',$invoiceID);
		if ( $isPositive && !$all ) $query->where('quantity >', 0);
		if ( !$isPositive && !$all ) $query->where('quantity <', 0);
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
