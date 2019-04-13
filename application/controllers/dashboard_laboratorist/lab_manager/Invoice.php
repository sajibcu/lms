<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'patient_model',
            'doctor_model',
			'lab_manager/reporttemplate_model',
            'pharmacy_manager/manufacturer_model',
			'lab_manager/invoice_model',
			'lab_manager/invoicedetail_model',
			'lab_manager/report_model',
			'pharmacy_manager/purchasedetail_model',
            'pharmacy_manager/medicinestock_model',
            'setting_model',
        ));
        
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 4
        ) 
        redirect('login'); 
	}
 
	public function index()
	{
		$data['title'] = 'Lab Report Invoice';
		$data['from_date'] = date('Y-m-d');
		$data['to_date'] = date('Y-m-d');
		$data['items'] = $this->invoice_model->read();
		$data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/invoice/list',$data,true);
		$this->load->view('dashboard_laboratorist/main_wrapper',$data);
    }
    
	public function manage_invoice_date_to_date()
	{
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        
		$data['title'] = 'Lab Report Invoice';
		$data['from_date'] = $from_date ? $from_date : date('Y-m-d');
		$data['to_date'] = $to_date ? $to_date : date('Y-m-d');
		$data['items'] = $this->invoice_model->read_by_date_range($from_date, $to_date);
		$data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/invoice/list',$data,true);
		$this->load->view('dashboard_laboratorist/main_wrapper',$data);
    }
    
	public function manage_invoice_invoice_id()
	{
        $invoice_no = $this->input->post('invoice_no');
		$data['title'] = 'Lab Report Invoice';
		$data['from_date'] = date('Y-m-d');
		$data['to_date'] = date('Y-m-d');
		$data['items'] = $this->invoice_model->read_by_invoice_no($invoice_no);
		$data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/invoice/list',$data,true);
		$this->load->view('dashboard_laboratorist/main_wrapper',$data);
	}
 

	public function details($invoice_id = null)
	{  
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 4 
		) 
		redirect('login'); 
        $data['title'] = 'Invoice Details';
        $data['setting'] = $this->setting_model->read();
        $data['currency'] = "BDT";
        $data['currency_position'] = "left";
		#-------------------------------#
        $data['item'] = $this->invoice_model->read_by_id($invoice_id);
        if( $data['item'] ){
            $items = $this->invoicedetail_model->getInvoiceItems( $data['item']->id );
            $data['patient'] = $this->patient_model->read_by_patient_id($data['item']->customer_id);
            $data['items'] = $items;
        }
		$data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/invoice/details',$data,true);
		$this->load->view('dashboard_laboratorist/main_wrapper',$data);
	} 
}
