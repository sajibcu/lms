<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'pharmacy_manager/manufacturer_model',
			'pharmacy_manager/purchase_model',
			'pharmacy_manager/purchasedetail_model'
        ));
        
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1
        ) 
        redirect('login'); 
	}
 
	public function index()
	{
		$data['title'] = 'Medicine Purchase';
		$data['items'] = $this->purchase_model->read();
		$data['content'] = $this->load->view('pharmacy_manager/purchase/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
 

	public function details($purchase_id = null)
	{  
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
		$data['title'] = display('hospital_activities');
		#-------------------------------#
		$data['category'] = $this->purchase_model->read_by_id($purchase_id);
		$data['content'] = $this->load->view('pharmacy_manager/purchase/details',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

    public function form($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('manufacturer_id', 'Manufacturer' ,'required|max_length[255]');
        $this->form_validation->set_rules('chalan_no', 'Invoice No' ,'required|max_length[255]');
        $this->form_validation->set_rules('purchase_date', 'Purchase Date' ,'required|max_length[255]');
        $this->form_validation->set_rules('details', 'Details','trim');

        /*-------------STORE DATA------------*/
        $product_names = $this->input->post('product_name');
        $product_ids = $this->input->post('product_id');
        $batch_ids   = $this->input->post('batch_id');
        $expeire_dates   = $this->input->post('expeire_date');
        $product_quantitys   = $this->input->post('product_quantity');
        $product_rates   = $this->input->post('product_rate');
        $total_prices   = $this->input->post('total_price');

        $data['item'] = (object)$postData = array( 
            'id' => $id,
            'purchase_id' => date('ymd').random_string('numeric', 7),
            'manufacturer_id' => $this->input->post('manufacturer_id'),
            'chalan_no' => $this->input->post('chalan_no', true),
            'grand_total_amount' => $this->input->post('grand_total_price', true),
            'total_discount' => $this->input->post('total_discount', true),
            'purchase_date' => $this->input->post('purchase_date', true) ? $this->input->post('purchase_date', true) :date('Y-m-d'),
            'purchase_details' => $this->input->post('purchase_details', true),
            'status' => 1,
        );
        $data['items'] = array();

        if( is_array( $product_ids) && 
            is_array( $product_names) && 
            is_array( $batch_ids) && 
            is_array( $expeire_dates) && 
            is_array( $product_quantitys) && 
            is_array( $product_rates) && 
            is_array( $total_prices)
        ){
            foreach ($product_ids as $key => $product_id) {
                $data['items'][] = (object) array( 
                    'product_name' => $product_names[$key],
                    'product_id' => $product_ids[$key],
                    'batch_id' => $batch_ids[$key],
                    'expeire_date' => $expeire_dates[$key],
                    'product_quantity' => $product_quantitys[$key],
                    'product_rate' => $product_rates[$key],
                    'total_price' => $total_prices[$key],
                );
            }
        }else{
            $data['items'][] = (object) array( 
                'product_name' => '',
                'product_id' => '',
                'batch_id' => '',
                'expeire_date' => '',
                'product_quantity' => '',
                'product_rate' => '',
                'total_price' => '0.00',
            );
            $data['postData']['grand_total_amount'] = 0;
            $data['item']->grand_total_amount = 0;
        }
        
        $data['manufacturer_list'] = $this->manufacturer_model->manufacturer_list();
        $data['additional_js'] = array('purchase.js');

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) {
                $insertItem = $this->purchase_model->create($postData);
                $purchase_id = $this->db->insert_id();

                if ($insertItem) {
                    foreach ($data['items'] as $key => $subitem) {
                        $itemdata = array(
                            'purchase_detail_id' => date('ymd').random_string('numeric', 7),
                            'purchase_id' =>  $purchase_id,
                            'product_id' => $subitem->product_id,
                            'quantity' => $subitem->product_quantity,
                            'rate' => $subitem->product_rate,
                            'total_amount' => $subitem->total_price,
                            'discount' => 0,
                            'batch_id' => $subitem->batch_id,
                            'expeire_date' => $subitem->expeire_date,
                            'status' => 1,
                        );
                        $this->purchasedetail_model->create($itemdata);
                    }
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/purchase/form');
            } else {
                $data['title'] = 'Add Medicine Purchase';
                $data['content'] = $this->load->view('pharmacy_manager/purchase/form',$data, true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                
                if ($this->purchase_model->update($postData)) {

                    $this->purchasedetail_model->deletePurchaseItems($id);
                    foreach ($data['items'] as $key => $subitem) {
                        $itemdata = array(
                            'purchase_detail_id' => date('ymd').random_string('numeric', 7),
                            'purchase_id' =>  $id,
                            'product_id' => $subitem->product_id,
                            'quantity' => $subitem->product_quantity,
                            'rate' => $subitem->product_rate,
                            'total_amount' => $subitem->total_price,
                            'discount' => 0,
                            'batch_id' => $subitem->batch_id,
                            'expeire_date' => $subitem->expeire_date,
                            'status' => 1,
                        );
                        $this->purchasedetail_model->create($itemdata);
                    }

                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/purchase/form/'.$postData['purchase_id']);
            } else {
                $purchase = $this->purchase_model->read_by_id($id);
                $purchaseItems = $this->purchasedetail_model->getPurchaseItems( $purchase->id );
                $data['items'] = array();
                foreach ($purchaseItems as $pitem) {
                    $data['items'][] = (object) array( 
                        'product_name' => $pitem->product_name,
                        'product_id' => $pitem->product_id,
                        'batch_id' => $pitem->batch_id,
                        'expeire_date' => $pitem->expeire_date,
                        'product_quantity' => $pitem->quantity,
                        'product_rate' => $pitem->rate,
                        'total_price' => $pitem->total_amount,
                    );
                }
                
                $data['title'] = 'Edit Medicine Purchase';
                $data['item'] = $purchase;
                $data['content'] = $this->load->view('pharmacy_manager/purchase/form',$data, true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->purchase_model->delete($id)) {
            $this->purchasedetail_model->deletePurchaseItems($id);
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('pharmacy_manager/manufacturer');
    }
  
	
}
