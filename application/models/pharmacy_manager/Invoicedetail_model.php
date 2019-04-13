<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoicedetail_model extends CI_Model {

	private $table = 'invoice_details';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("invoice_details.*, medicines.product_name")
			->from($this->table)
			->join('medicines', 'medicines.id = invoice_details.product_id','left')
			->order_by('invoice_details.purchase_id','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("invoice_details.*, medicines.product_name, medicine_types.name as product_type")
			->from($this->table)
			->join('medicines', 'medicines.id = invoice_details.product_id','left')
			->join('medicine_types', 'medicine_types.id = medicines.type_id','left')
			->where('invoice_details.id',$id)
			->get()
			->row();
	} 

	public function read_by_invoice_details_id($id = null)
	{
		return $this->db->select("invoice_details.*, medicines.product_name, medicine_types.name as product_type")
			->from($this->table)
			->join('medicines', 'medicines.id = invoice_details.product_id','left')
			->join('medicine_types', 'medicine_types.id = medicines.type_id','left')
			->where('invoice_details.invoice_details_id',$id)
			->get()
			->row();
	} 

	public function getInvoiceItems($invoiceID, $isPositive = true, $all = false)
	{
		$query = $this->db->select("invoice_details.*, medicines.product_name, medicine_types.name as product_type")
			->from($this->table)
			->join('medicines', 'medicines.id = invoice_details.product_id','left')
			->join('medicine_types', 'medicine_types.id = medicines.type_id','left')
			->where('invoice_details.invoice_id', $invoiceID)
			->order_by('invoice_details.id','asc');
			
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
