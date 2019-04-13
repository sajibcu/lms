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
            || ($this->session->userdata('user_role') != 1 && $this->session->userdata('user_role') != 3 && $this->session->userdata('user_role') != 7)
        ) 
        redirect('login'); 
	}
 
	public function index()
	{
		$data['title'] = 'Medicine Invoice';
		$data['from_date'] = date('Y-m-d');
		$data['to_date'] = date('Y-m-d');
		$data['items'] = $this->invoice_model->read();
		$data['content'] = $this->load->view('lab_manager/invoice/list',$data,true);

        if($this->session->userdata('user_role') ==7){
            $this->load->view('dashboard_receptionist/main_wrapper',$data);
        }else if($this->session->userdata('user_role') ==3){
            $this->load->view('dashboard_accountant/main_wrapper',$data);
        }else{$this->load->view('layout/main_wrapper',$data);}

		//$this->load->view('layout/main_wrapper',$data);
    }
    
	public function manage_invoice_date_to_date()
	{
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        
		$data['title'] = 'Medicine Invoice';
		$data['from_date'] = $from_date ? $from_date : date('Y-m-d');
		$data['to_date'] = $to_date ? $to_date : date('Y-m-d');
		$data['items'] = $this->invoice_model->read_by_date_range($from_date, $to_date);
		$data['content'] = $this->load->view('lab_manager/invoice/list',$data,true);
         if($this->session->userdata('user_role') ==7){
            $this->load->view('dashboard_receptionist/main_wrapper',$data);
        }else if($this->session->userdata('user_role') ==3){
            $this->load->view('dashboard_accountant/main_wrapper',$data);
        }else{$this->load->view('layout/main_wrapper',$data);}
		//$this->load->view('layout/main_wrapper',$data);
    }
    
	public function manage_invoice_invoice_id()
	{
        $invoice_no = $this->input->post('invoice_no');
		$data['title'] = 'Medicine Invoice';
		$data['from_date'] = date('Y-m-d');
		$data['to_date'] = date('Y-m-d');
		$data['items'] = $this->invoice_model->read_by_invoice_no($invoice_no);
		$data['content'] = $this->load->view('lab_manager/invoice/list',$data,true);
        if($this->session->userdata('user_role') ==7){
            $this->load->view('dashboard_receptionist/main_wrapper',$data);
        }else if($this->session->userdata('user_role') ==3){
            $this->load->view('dashboard_accountant/main_wrapper',$data);
        }else{$this->load->view('layout/main_wrapper',$data);}
		//$this->load->view('layout/main_wrapper',$data);
	}
 

	public function details($invoice_id = null)
	{  
		// if ($this->session->userdata('isLogIn') == false 
		// 	|| $this->session->userdata('user_role') != 1 
		// ) 
		// redirect('login'); 
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
        //$data['website'] = $this->invoice_model->website();
		$data['content'] = $this->load->view('lab_manager/invoice/details',$data,true);

        if($this->session->userdata('user_role') ==7){
            $this->load->view('dashboard_receptionist/main_wrapper',$data);
        }else if($this->session->userdata('user_role') ==3){
            $this->load->view('dashboard_accountant/main_wrapper',$data);
        }else{$this->load->view('layout/main_wrapper',$data);}
		//$this->load->view('layout/main_wrapper',$data);
	} 

    public function form($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        //$this->form_validation->set_rules('customer_id', 'Customer Name' ,'required|max_length[255]');
        $this->form_validation->set_rules('invoice_date', 'Invoice Date' ,'required|max_length[255]');
        $this->form_validation->set_rules('inva_details', 'Invoice Details','trim');

        /*-------------STORE DATA------------*/
        $product_ids = $this->input->post('product_id');
        $product_names = $this->input->post('product_name');
        $product_quantitys   = $this->input->post('product_quantity');
        $product_rates   = $this->input->post('product_rate');
        $discounts   = $this->input->post('discount');
        $taxs   = $this->input->post('tax');
        $total_prices   = $this->input->post('total_price');

        $discount_type   = $this->input->post('discount_type');

        $data['item'] = (object)$postData = array( 
            'id' => $id,
            'doctor_id' => $this->input->post('doctor_id'),
            'invoice_id' => date('ymd').random_string('numeric', 7),
            'customer_name' => $this->input->post('customer_name'),
            'customer_id' => $this->input->post('customer_id'),
            'invoice_date' => $this->input->post('invoice_date', true) ? $this->input->post('invoice_date', true) :date('Y-m-d'),
            'total_tax' => $this->input->post('total_tax') ? $this->input->post('total_tax') : '0.00',
            'inva_details' => $this->input->post('inva_details'),
            'grand_total_price' => $this->input->post('grand_total_price', true) ? $this->input->post('grand_total_price', true) : '0.00',
            'total_discount' => $this->input->post('total_discount', true) ? $this->input->post('total_discount', true) : '0.00',
            'invdcount' => $this->input->post('invdcount', true) ? $this->input->post('invdcount', true) : '0.00',
            'invtotal' => $this->input->post('invtotal', true) ? $this->input->post('invtotal', true) : '0.00',
            'paid_amount' => $this->input->post('paid_amount', true) ? $this->input->post('paid_amount', true) : '0.00',
            'due_amount' => $this->input->post('due_amount', true) ? $this->input->post('due_amount', true) : '0.00',
            'change' => $this->input->post('change', true) ? $this->input->post('change', true) : '0.00',
            'status' => 0,
        );
        $data['items'] = array();

        if( is_array( $product_ids) && 
            is_array( $product_names) && 
            is_array( $product_quantitys) && 
            is_array( $product_rates) && 
            is_array( $discounts) && 
            is_array( $taxs) && 
            is_array( $total_prices)
        ){
            foreach ($product_ids as $key => $product_id) {
                // $report = $this->reporttemplate_model->read_by_id($product_ids[$key]);

                $data['items'][] = (object) array( 
                    'product_id' => $product_ids[$key],
                    'product_name' => $product_names[$key],
                    'product_quantity' => $product_quantitys[$key],
                    'product_rate' => $product_rates[$key],
                    'discount' => $discounts[$key],
                    'tax' => $taxs[$key],
                    'total_price' => $total_prices[$key],
                );
            }
        }else{
            $data['items'][] = (object) array( 
                'product_id' => '',
                'product_name' => '',
                'product_quantity' => '',
                'product_rate' => '',
                'discount' => '',
                'tax' => '',
                'total_price' => '',
            );
            $data['postData']['grand_total_amount'] = 0;
            $data['item']->grand_total_amount = 0;
        }
        
        $data['doctors'] = $this->doctor_model->doctor_list();
        $data['discount_type'] = $discount_type;
        $data['additional_js'] = array('lab_invoice_list.js', 'lab_invoice.js', 'lab_report.js');

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) {
                if($postData['customer_id'] =='' || $postData['customer_id'] ==null)
                {
                    $patient_full_id =date('ymd').random_string('numeric', 6) ;
                    $patientData = array(
                        'patient_id'     => $patient_full_id,
                        'firstname'      => $this->input->post('customer_name_others'),
                        'address'      => $this->input->post('customer_name_others_address'),
                        'affliate'       => null,
                        'create_date'    => date('Y-m-d'),
                        'created_by'     => $this->session->userdata('user_id')
                    );
                    $this->db->insert('patient',$patientData);
                    $postData['customer_id'] = $patient_full_id;
                    $postData['customer_name'] = $this->input->post('customer_name_others');
                }

                $postData['date'] = $postData['invoice_date'];
                $postData['total_amount'] = $postData['invtotal'];
                $postData['invoice'] = $postData['invoice_id'];
                $postData['invoice_discount'] = $postData['invdcount'];
                $postData['invoice_details'] = $postData['inva_details'];

                if($postData['due_amount'] == 0 && $postData['paid_amount'] > $postData['total_amount']){
                    $postData['paid_amount'] = $postData['total_amount'];
                }
                if($postData['due_amount'] == 0){
                    $postData['status'] = 1;
                }


                unset($postData['customer_name']);
                unset($postData['invoice_date']);
                unset($postData['inva_details']);
                unset($postData['grand_total_price']);
                unset($postData['invdcount']);
                unset($postData['invtotal']);
                unset($postData['change']);
                
                $insertItem = $this->invoice_model->create($postData);
                $invoice_id = $this->db->insert_id();

                if ($insertItem) {
                    foreach ($data['items'] as $key => $subitem) {
                        $itemdata = array(
                            'invoice_details_id' => date('ymd').random_string('numeric', 7),
                            'invoice_id' =>  $invoice_id,
                            'product_id' => $subitem->product_id,
                            'quantity' => $subitem->product_quantity,
                            'rate' => $subitem->product_rate,
                            'total_price' => $subitem->total_price,
                            'discount' => $subitem->discount,
                            'tax' => $subitem->tax,
                            'status' => 1,
                        );

                        $this->invoicedetail_model->create($itemdata);
                        
                        $reportData = array(
                            'report_id' => date('ymd').random_string('numeric', 7),
                            'customer_id' =>  $postData['customer_id'],
                            'doctor_id' =>  $postData['doctor_id'],
                            'date' =>  date('Y-m-d'),
                            'delivary_date' =>  date('Y-m-d'),
                            'invoice_details_id' =>  $this->db->insert_id(),
                            'invoice_id' =>  $invoice_id,
                            'product_id' => $subitem->product_id,
                            'quantity' => $subitem->product_quantity,
                            'rate' => $subitem->product_rate,
                            'total_price' => $subitem->total_price,
                            'discount' => $subitem->discount,
                            'tax' => $subitem->tax,
                            'status' => $this->report_model->status_pending_sample,  
                        );
                        $this->report_model->create($reportData);
                    }
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                if($insertItem){
                    redirect('lab_manager/invoice/details/'.$invoice_id);
                }else{
                    redirect('lab_manager/invoice/form');
                }
            } else {
                $data['title'] = 'Add Lab Report Invoice';
                $data['content'] = $this->load->view('lab_manager/invoice/form',$data, true);
                if($this->session->userdata('user_role') ==7){
                    $this->load->view('dashboard_receptionist/main_wrapper',$data);
                }else if($this->session->userdata('user_role') ==3){
                    $this->load->view('dashboard_accountant/main_wrapper',$data);
                }else{$this->load->view('layout/main_wrapper',$data);}
               // $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                $postData['date'] = $postData['invoice_date'];
                $postData['total_amount'] = $postData['invtotal'];
                $postData['invoice'] = $postData['invoice_id'];
                $postData['invoice_discount'] = $postData['invdcount'];
                $postData['invoice_details'] = $postData['inva_details'];

                if($postData['due_amount'] == 0 && $postData['paid_amount'] > $postData['total_amount']){
                    $postData['paid_amount'] = $postData['total_amount'];
                }
                if($postData['due_amount'] == 0){
                    $postData['status'] = 1;
                }


                unset($postData['customer_name']);
                unset($postData['invoice_date']);
                unset($postData['inva_details']);
                unset($postData['grand_total_price']);
                unset($postData['invdcount']);
                unset($postData['invtotal']);
                unset($postData['change']);

                
                if ($this->invoice_model->update($postData)) {
                    $this->invoicedetail_model->deleteInvoiceItems($id);

                    foreach ($data['items'] as $key => $subitem) {
                        $itemdata = array(
                            'invoice_details_id' => date('ymd').random_string('numeric', 7),
                            'invoice_id' =>  $id,
                            'product_id' => $subitem->product_id,
                            'batch_id' => $subitem->batch_id,
                            'quantity' => $subitem->product_quantity,
                            'rate' => $subitem->product_rate,
                            'manufacturer_rate' => $subitem->manufacturer_rate,
                            'total_price' => $subitem->total_price,
                            'discount' => $subitem->discount,
                            'tax' => $subitem->tax,
                            'status' => 1,
                        );
                        $this->invoicedetail_model->create($itemdata);
                    }
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('lab_manager/invoice/form/'.$postData['id']);
            } else {
                $invoice = $this->invoice_model->read_by_id($id);
                if($invoice){
                    $invoice->customer_name = $invoice->customer_name;
                    $invoice->invoice_date = $invoice->date;
                    $invoice->invtotal = $invoice->total_amount;
                    $invoice->invoice_id = $invoice->invoice;
                    $invoice->invdcount = $invoice->invoice_discount;
                    $invoice->inva_details = $invoice->invoice_details;
                    $invoice->grand_total_price = $invoice->total_amount;
                    $invoice->change = 0;
                }
                
                
                $invItems = $this->invoicedetail_model->getInvoiceItems( $invoice->id );
                $data['items'] = array();
                foreach ($invItems as $key => $pitem) {
                    $data['items'][] = (object) array( 
                        'id' => $pitem->id,
                        'product_name' => $pitem->product_name,
                        'product_id' => $pitem->product_id,
                        'product_quantity' => $pitem->quantity,
                        'product_rate' => $pitem->rate,
                        'discount' => $pitem->discount,
                        'tax' => $pitem->tax,
                        'total_price' => $pitem->total_price,
                    );
                }
                
                $data['title'] = 'Edit Medicine Invoice';
                $data['item'] = $invoice;
                $data['content'] = $this->load->view('lab_manager/invoice/form',$data, true);
                if($this->session->userdata('user_role') ==7){
                    $this->load->view('dashboard_receptionist/main_wrapper',$data);
                }else if($this->session->userdata('user_role') ==3){
                    $this->load->view('dashboard_accountant/main_wrapper',$data);
                }else{$this->load->view('layout/main_wrapper',$data);}
                //$this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->invoice_model->delete($id)) {
            $this->invoicedetail_model->deleteInvoiceItems($id);
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('lab_manager/invoice/index');
    }
  
	
}
