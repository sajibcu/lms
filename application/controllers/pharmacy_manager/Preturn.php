<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preturn extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'patient_model',
            'pharmacy_manager/return_model',
            'pharmacy_manager/manufacturer_model',
			'pharmacy_manager/purchase_model',
            'pharmacy_manager/purchasedetail_model',
            'pharmacy_manager/medicine_model',
			'pharmacy_manager/invoice_model',
			'pharmacy_manager/invoicedetail_model',
            'pharmacy_manager/medicinestock_model',
            'setting_model',
        ));
        
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1
        ) 
        redirect('login'); 
	}
 
	public function index()
	{
		$data['title'] = 'Return Form';
        $data['additional_js'] = array('manufacturer.js');
        $data['content'] = $this->load->view('pharmacy_manager/return/index',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }

    public function list_invoces(){
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $data['from_date'] = $from_date ? $from_date : date('Y-m-d');
		$data['to_date'] = $to_date ? $to_date : date('Y-m-d');
        
        $data['title'] = 'Return List';
        $data['items'] = $this->return_model->read();
		$data['content'] = $this->load->view('pharmacy_manager/return/list_invoices',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }

    public function datewise_invoic_return_list(){
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $data['from_date'] = $from_date ? $from_date : date('Y-m-d');
		$data['to_date'] = $to_date ? $to_date : date('Y-m-d');
        
        $data['title'] = 'Return List';
        $data['items'] = $this->return_model->read();
		$data['content'] = $this->load->view('pharmacy_manager/return/list_invoices',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }

    
	public function invoice_return_form( $invoice_id = null )
	{
        $invoice_no = $this->input->post('invoice_no', true);
        if(!$invoice_no && $invoice_id) $invoice_no = $invoice_id;
        $invoice = $this->invoice_model->read_by_invoice_no($invoice_no, true);
        
        if(!$invoice){
            $invoice = (Object) array(
                'id' => '',
                'customer_name' => '',
                'date' => '',
                'invoice_id' => '',
            );
        }
        
		$data['item'] = $invoice;
        $data['items'] = $invoice ? $this->invoicedetail_model->getInvoiceItems( $invoice->id ) : array();
		$data['discount_type'] = 2;
        

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit(0);
        
        $data['additional_js'] = array('medicine_invoice_list.js', 'medicine_invoice.js', 'invoice_update.js');
        
		$data['title'] = 'Return Invoice';
		$data['content'] = $this->load->view('pharmacy_manager/return/invoice_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }
    
	public function return_invoice()
	{
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('invoice_id', 'Invoice No' ,'required|max_length[255]');

        $invoice_id = $this->input->post('invoice_id', true);
        $invoice = $this->invoice_model->read_by_invoice_no($invoice_id, true);
        $items = array();
        $ret_items = array();

        
        $customer_id = $this->input->post('customer_id', true);
        $customer_name = $this->input->post('customer_name', true);
        $invoice_date = $this->input->post('invoice_date', true);
        $discount_type = $this->input->post('discount_type', true);
        $grand_total_price = $this->input->post('grand_total_price', true);
        $total_tax = $this->input->post('total_tax', true);
        $total_discount = $this->input->post('total_discount', true);
        $reason = $this->input->post('details', true);
        
        // Array inputs
        $invoice_details_ids = $this->input->post('invoice_details_id', true);
        $product_names = $this->input->post('product_name', true);
        $product_ids = $this->input->post('product_id', true);
        $batch_ids = $this->input->post('batch_id', true);
        $sold_qtys = $this->input->post('sold_qty', true);
        $product_quantitys = $this->input->post('product_quantity', true);      //return qty
        $product_rates = $this->input->post('product_rate', true);      //return qty
        $discounts = $this->input->post('discount', true);      //Deducion per/piece
        $total_prices = $this->input->post('total_price', true);
        $taxs = $this->input->post('tax', true);
        $rtns = $this->input->post('rtn', true);

        $global_byy_qty = 0;
        $global_ret_qty = 0;
        $global_total_deduct = 0;
        $global_total_tax = 0;
        $global_total_ret_amount = 0;
        $global_net_total_amount = 0;


        if( $invoice && is_array($invoice_details_ids) ){
            foreach ($invoice_details_ids as $index => $detail_id) {
                $subitem = $this->invoicedetail_model->read_by_invoice_details_id($detail_id);
                if(!$subitem) continue;
                $qty = $product_quantitys[$index];
                if(!$qty) continue;
                
                $discount = $discounts[$index] ? $discounts[$index] : 0;
                $total_discount = $discount*$qty;
                $total_tax = $taxs[$index];

                $total_price = $qty * $subitem->rate;
                $net_total_price = $total_price + $total_tax - $total_discount;

                $global_byy_qty += $subitem->quantity;
                $global_ret_qty += $qty;
                $global_total_deduct += $total_discount;
                $global_total_ret_amount += $total_price;
                $global_total_tax += $total_tax;
                $global_net_total_amount += $net_total_price;
                
                $items[] = array(
                    'invoice_details_id' => date('ymd').random_string('numeric', 7),
                    'invoice_id' =>  $subitem->invoice_id,
                    'product_id' => $subitem->product_id,
                    'batch_id' => $subitem->batch_id,
                    'quantity' => -$qty,
                    'rate' => $subitem->rate,
                    'manufacturer_rate' => null,
                    'total_price' => -$total_price,
                    'discount' => -$total_discount,
                    'tax' => -$total_tax,
                    'status' => 1,
                );

                $ret_items[] = array( 
                    "return_id" => date('ymd').random_string('numeric', 7),
                    "product_id" => $subitem->product_id,
                    "invoice_id" => $invoice->invoice_id,
                    "purchase_id" => null,
                    "date_purchase" => $invoice->date,
                    "date_return" => date('Y-m-d'),
                    "byy_qty" => $subitem->quantity,
                    "ret_qty" => $qty,
                    "customer_id" => $invoice->customer_id,
                    "manufacturer_id" => '',
                    "product_rate" => $subitem->rate,
                    "deduction" => $discount,
                    "total_deduct" => $total_discount,
                    "total_tax" => $total_tax,
                    "total_ret_amount" => $total_price,
                    "net_total_amount" => $net_total_price,
                    "reason" => $this->input->post('details'),
                    "usablity" => $this->return_model->usablity_customer,
                );
            }
        }

        $ritem = count($ret_items)>0 ? $ret_items[0] : array();
        $ritem['byy_qty'] = $global_byy_qty;
        $ritem['ret_qty'] = $global_ret_qty;
        $ritem['total_deduct'] = $global_total_deduct;
        $ritem['total_ret_amount'] = $global_total_ret_amount;
        $ritem['total_tax'] = $global_total_tax;
        $ritem['net_total_amount'] = $global_net_total_amount;

        if ($this->form_validation->run() === true) {
            $this->invoicedetail_model->deleteInvoiceItems($invoice->id, false);
            if( count($ret_items)>0 ){
                $insertItem = $this->return_model->create($ritem);
                if($insertItem){
                    $this->invoicedetail_model->deleteInvoiceItems($invoice->id, false);
                    foreach ($items as $key => $subitem) {
                        $this->invoicedetail_model->create($subitem);
                    }
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));

                    redirect('pharmacy_manager/preturn/invoice_detail/'.$ritem['return_id']);
                }else{
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
            }else{
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
                $this->invoice_return_form($invoice_id);
            }
        }else{
            $this->invoice_return_form($invoice_id);
        }
	}
 
	public function invoice_detail($return_id = null){
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1 )  redirect('login');

        $data['title'] = 'Return Details';
        $data['setting'] = $this->setting_model->read();
        $data['currency'] = "BDT";
        $data['currency_position'] = "left";
        #-------------------------------#
        $ritem = $this->return_model->read_by_return_id($return_id);

        if( $ritem ){
            $invoice = $this->invoice_model->read_by_invoice_no($ritem->invoice_id, true);
            $data['ritem'] = $ritem;
            $data['item'] = $invoice;
            $items = $this->invoicedetail_model->getInvoiceItems( $invoice->id, false );
            $data['patient'] = $this->patient_model->read_by_patient_id($invoice->customer_id);
            $data['items'] = $items;

        }
		$data['content'] = $this->load->view('pharmacy_manager/return/invoice_details',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }


    // Manufacturer methods
    public function list_purchases(){
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $data['from_date'] = $from_date ? $from_date : date('Y-m-d');
		$data['to_date'] = $to_date ? $to_date : date('Y-m-d');
        
        $data['title'] = 'Manufacturer Return List';
        $data['items'] = $this->return_model->read($this->return_model->usablity_manufacturer);
		$data['content'] = $this->load->view('pharmacy_manager/return/list_purchases',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }
    
	public function search_manufacturer()
	{  
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1 )  redirect('login'); 

        $manufacturer_name = $this->input->post('manufacturer_name');
        $manufacturer_id = $this->input->post('manufacturer_id');
        
        $data['title'] = 'Return Manufacturers';
        $data['manufacturer_name'] = $manufacturer_name;
        $data['items'] = $this->purchase_model->read_by_manufacturer($manufacturer_id);
		$data['content'] = $this->load->view('pharmacy_manager/return/list_purchases_manufacturer.php',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }

    public function manufacturer_return_form($manufacturer_id){
        $purchase = $this->purchase_model->read_by_id($manufacturer_id);
        $data['item'] = $purchase;
        
        if($purchase){
            $data['items'] = $this->purchasedetail_model->getPurchaseItems( $purchase->id );
            $data['manufacturer'] = $this->manufacturer_model->read_by_id( $purchase->manufacturer_id );
        }
        
		$data['discount_type'] = 2;
        $data['additional_js'] = array('medicine_invoice_list.js', 'medicine_invoice.js', 'invoice_update.js');
        
		$data['title'] = 'Return Manufacturers';
		$data['content'] = $this->load->view('pharmacy_manager/return/purchase_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }

    public function return_purchase(){
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('purchase_id', 'Invoice No' ,'required|max_length[255]');
        $this->form_validation->set_rules('manufacturer_id', 'Manufacturer Name' ,'required|max_length[255]');

        $purchase_id = $this->input->post('purchase_id', true);
        $purchase = $this->purchase_model->read_by_id($purchase_id);
        $items = array();
        $ret_items = array();

        
        $customer_id = $this->input->post('customer_id', true);
        $customer_name = $this->input->post('customer_name', true);
        $invoice_date = $this->input->post('invoice_date', true);
        $discount_type = $this->input->post('discount_type', true);
        $grand_total_price = $this->input->post('grand_total_price', true);
        $total_tax = $this->input->post('total_tax', true);
        $total_discount = $this->input->post('total_discount', true);
        $reason = $this->input->post('details', true);
        $usablity = $this->input->post('radio', true);
        
        // Array inputs
        $purchase_detail_ids = $this->input->post('purchase_detail_id', true);
        $product_names = $this->input->post('product_name', true);
        $product_ids = $this->input->post('product_id', true);
        $batch_ids = $this->input->post('batch_id', true);
        $sold_qtys = $this->input->post('sold_qty', true);
        $product_quantitys = $this->input->post('product_quantity', true);      //return qty
        $product_rates = $this->input->post('product_rate', true);      //return qty
        $discounts = $this->input->post('discount', true);      //Deducion per/piece
        $total_prices = $this->input->post('total_price', true);
        $rtns = $this->input->post('rtn', true);
        

        $global_byy_qty = 0;
        $global_ret_qty = 0;
        $global_total_deduct = 0;
        $global_total_ret_amount = 0;
        $global_net_total_amount = 0;


        if( $purchase && is_array($purchase_detail_ids) ){
            foreach ($purchase_detail_ids as $index => $detail_id) {
                $subitem = $this->purchasedetail_model->read_by_purchase_detail_id($detail_id);
                if(!$subitem) continue;
                
                $qty = $product_quantitys[$index];
                $discount = $discounts[$index] ? $discounts[$index] : 0;
                $total_discount = $discount*$qty;

                $total_price = $qty * $subitem->rate;
                $net_total_price = $total_price - $total_discount;

                $global_byy_qty += $subitem->quantity;
                $global_ret_qty += $qty;
                $global_total_deduct += $total_discount;
                $global_total_ret_amount += $total_price;
                $global_net_total_amount += $net_total_price;
                
                $items[] = array(
                    'purchase_detail_id' => date('ymd').random_string('numeric', 7),
                    'purchase_id' =>  $subitem->purchase_id,
                    'product_id' => $subitem->product_id,
                    'batch_id' => $subitem->batch_id,
                    'quantity' => -$qty,
                    'rate' => $subitem->rate,
                    'total_amount' => -$total_price,
                    'discount' => -$total_discount,
                    'status' => 1,
                );

                $ret_items[] = array( 
                    "return_id" => date('ymd').random_string('numeric', 7),
                    "product_id" => $subitem->product_id,
                    "invoice_id" => '',
                    "purchase_id" => $purchase->purchase_id,
                    "date_purchase" => $purchase->purchase_date,
                    "date_return" => date('Y-m-d'),
                    "byy_qty" => $subitem->quantity,
                    "ret_qty" => $qty,
                    "customer_id" => '',
                    "manufacturer_id" => $purchase->manufacturer_id,
                    "product_rate" => $subitem->rate,
                    "deduction" => $discount,
                    "total_deduct" => $total_discount,
                    "total_tax" => 0,
                    "total_ret_amount" => $total_price,
                    "net_total_amount" => $net_total_price,
                    "reason" => $this->input->post('details'),
                    "usablity" => $usablity,
                );
            }
        }

        $ritem = count($ret_items)>0 ? $ret_items[0] : array();
        $ritem['byy_qty'] = $global_byy_qty;
        $ritem['ret_qty'] = $global_ret_qty;
        $ritem['total_deduct'] = $global_total_deduct;
        $ritem['total_ret_amount'] = $global_total_ret_amount;
        $ritem['net_total_amount'] = $global_net_total_amount;

        $data = array();
        $data['items'] = $items;
        $data['ret_items'] = $ret_items;
        $data['ritem'] = $ritem;
        $data['post'] = $_POST;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        if ($this->form_validation->run() === true) {
            if( count($ret_items)>0 ){
                $insertItem = $this->return_model->create($ritem);
                if($insertItem){
                    $this->purchasedetail_model->deletePurchaseItems($purchase->purchase_id, false);
                    foreach ($items as $key => $subitem) {
                        $this->purchasedetail_model->create($subitem);
                    }
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                    redirect('pharmacy_manager/preturn/purchase_detail/'.$ritem['return_id']);
                }else{
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
            }else{
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
                $this->manufacturer_return_form($purchase_id);
            }
        }else{
            $this->manufacturer_return_form($purchase_id);
        }
    }

    public function purchase_detail($return_id = null){
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1 )  redirect('login');

        $data['title'] = 'Return Details';
        $data['setting'] = $this->setting_model->read();
        $data['currency'] = "BDT";
        $data['currency_position'] = "left";
        #-------------------------------#
        $ritem = $this->return_model->read_by_return_id($return_id);

        if( $ritem ){
            $purchase = $this->purchase_model->read_by_id($ritem->purchase_id);
            $data['ritem'] = $ritem;
            $data['item'] = $purchase;
            $items = $this->purchasedetail_model->getPurchaseItems( $purchase->id, false );
            $data['manufacturer'] = $this->manufacturer_model->read_by_id( $purchase->manufacturer_id );
            $data['items'] = $items;

        }
		$data['content'] = $this->load->view('pharmacy_manager/return/purchase_details',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }

    // Wastage methods
    public function list_wastages(){
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');

        $data['from_date'] = $from_date ? $from_date : date('Y-m-d');
		$data['to_date'] = $to_date ? $to_date : date('Y-m-d');
        
        $data['title'] = 'Wastage Return List';
        $data['items'] = $this->return_model->read($this->return_model->usablity_wastage);
		$data['content'] = $this->load->view('pharmacy_manager/return/list_wastages',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }

    public function delete($id = null) 
    {
        $item = $this->return_model->read_by_id($id);
        if ($this->return_model->delete($id)) {
            if( $item->invoice_id ){
                $invoice = $this->invoice_model->read_by_invoice_no($invoice->id, true);
                $this->invoicedetail_model->deleteInvoiceItems($invoice->id, false);
            }else if($item->purchase_id){
                $purchase = $this->purchase_model->read_by_id($item->purchase_id);
                $this->purchasedetail_model->deletePurchaseItems($purchase->id, false);
            }
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('pharmacy_manager/preturn/list_invoces');
    }	
}
