<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	private $table = 'lab_reports';
	public $status_pending_sample = 0;
	public $status_pending_sample_data = 2;
	public $status_ready_delivary = 3;
	public $status_delivered = 1;

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		$selects = array(
			'lab_reports.*',
			'lab_report_templates.name as product_name',
			'lab_invoice.invoice_id as invoice_no',
			'patient.firstname',
			'patient.lastname',
			'patient.mobile',
			'patient.sex',
		);

		return $this->db->select(implode(",", $selects))
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_reports.product_id','left')
			->join('patient', 'patient.patient_id = lab_reports.customer_id','left')
			->join('lab_invoice', 'lab_invoice.id = lab_reports.invoice_id','left')
			->order_by('lab_reports.date','desc')
			->get()
			->result();
	} 

	public function read_by_date_range($from, $to)
	{
		$selects = array(
			'lab_reports.*',
			'lab_report_templates.name as product_name',
			'lab_invoice.invoice_id as invoice_no',
			'patient.firstname',
			'patient.lastname',
			'patient.mobile',
			'patient.sex',
		);
		
		return $this->db->select(implode(",", $selects))
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_reports.product_id','left')
			->join('patient', 'patient.patient_id = lab_reports.customer_id','left')
			->join('lab_invoice', 'lab_invoice.id = lab_reports.invoice_id','left')
			->where('lab_reports.date  >=',$from)
			->where('lab_reports.date  <=',$to)
			->order_by('lab_reports.date','desc')
			->get()
			->result();		
	} 

	public function read_by_invoice_no($invoiceId, $singular = false)
	{
		$selects = array(
			'lab_reports.*',
			'lab_report_templates.name as product_name',
			'lab_invoice.invoice_id as invoice_no',
			'patient.firstname',
			'patient.lastname',
			'patient.mobile',
			'patient.sex',
		);
		
		$query =  $this->db->select(implode(",", $selects))
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_reports.product_id','left')
			->join('patient', 'patient.patient_id = lab_reports.customer_id','left')
			->join('lab_invoice', 'lab_invoice.id = lab_reports.invoice_id','left')
			->order_by('lab_reports.date','desc')
			->where('lab_invoice.invoice_id',$invoiceId)
			->get();
		return $singular ? $query->row() : $query->result();
	}
 
	public function read_by_id($id = null)
	{
		$selects = array(
			'lab_reports.*',
			'lab_report_templates.name as product_name',
			'lab_invoice.invoice_id as invoice_no',
			'patient.firstname',
			'patient.lastname',
			'patient.mobile',
			'patient.sex',
		);
		
		return $this->db->select(implode(",", $selects))
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_reports.product_id','left')
			->join('patient', 'patient.patient_id = lab_reports.customer_id','left')
			->join('lab_invoice', 'lab_invoice.id = lab_reports.invoice_id','left')
			->where('lab_reports.id',$id)
			->get()
			->row();
	} 

	public function read_by_invoice_details_id($id = null)
	{
		return $this->db->select("lab_reports.*, lab_report_templates.product_name")
			->from($this->table)
			->join('lab_report_templates', 'lab_report_templates.id = lab_invoice_details.product_id','left')
			->where('lab_invoice_details.invoice_details_id',$id)
			->get()
			->row();
	} 

	public function getInvoiceItems($invoiceID, $isPositive = true, $all = false)
	{
		$query = $this->db->select("lab_reports.*, lab_report_templates.name as product_name")
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
