<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'pharmacy_manager/manufacturer_model',
            'pharmacy_manager/medicine_model',
            'pharmacy_manager/type_model',
			'hospital_activities/category_model',
            'pharmacy_manager/purchasedetail_model',
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
        $items = $this->medicinestock_model->read();
        
		$data['title'] = 'All Stock Report';
        $data['items'] = $items;
        $data['product_name'] = $this->input->post('product_name');
        $data['product_id'] = $this->input->post('product_id');
        $data['date'] = date('Y-m-d');
        $data['stock_date'] = date('Y-m-d');
        $data['print_date'] = date('m/d/Y H:i:s');

        $data['currency'] = "BDT";
        $data['currency_position'] = "left";
        $data['setting'] = $this->setting_model->read();
        
        $data['additional_js'] = array('medicine_invoice_list.js');

		$data['content'] = $this->load->view('pharmacy_manager/stock/index',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }  
    
	public function out_of_stock()
	{
        $items = $this->medicinestock_model->out_of_stock();
        
		$data['title'] = 'Out of Stock Report';
        $data['items'] = $items;
        $data['product_name'] = $this->input->post('product_name');
        $data['product_id'] = $this->input->post('product_id');
        $data['date'] = date('Y-m-d');
        $data['stock_date'] = date('Y-m-d');
        $data['print_date'] = date('m/d/Y H:i:s');

        $data['currency'] = "BDT";
        $data['currency_position'] = "left";
        $data['setting'] = $this->setting_model->read();
        
        $data['additional_js'] = array('medicine_invoice_list.js');

		$data['content'] = $this->load->view('pharmacy_manager/stock/out_of_stock',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }  
    
	public function expired_stock()
	{
        $items = $this->medicinestock_model->expired_stock();
        
		$data['title'] = 'Expired Stock Report';
        $data['items'] = $items;
        $data['product_name'] = $this->input->post('product_name');
        $data['product_id'] = $this->input->post('product_id');
        $data['date'] = date('Y-m-d');
        $data['stock_date'] = date('Y-m-d');
        $data['print_date'] = date('m/d/Y H:i:s');

        $data['currency'] = "BDT";
        $data['currency_position'] = "left";
        $data['setting'] = $this->setting_model->read();
        
        $data['additional_js'] = array('medicine_invoice_list.js');

		$data['content'] = $this->load->view('pharmacy_manager/stock/expired_stock',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}  

}
