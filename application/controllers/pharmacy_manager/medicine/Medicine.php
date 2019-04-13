<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'pharmacy_manager/medicine_model',
            'pharmacy_manager/type_model',
            'pharmacy_manager/manufacturer_model',
			'hospital_activities/category_model',
            'pharmacy_manager/purchasedetail_model',
            'pharmacy_manager/medicinestock_model',
        ));
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1
        ) 
        redirect('login'); 

    }
    
    public function search_by_name(){
        $term = $this->input->post('term');
        $product_name = $this->input->post('product_name');
        $data = array();

        if($product_name){
            $data = $this->medicine_model->getItemsListBySearch($product_name, 20);
        }
        echo json_encode($data);
    }

    public function list_by_manufacturer(){
        $term = $this->input->post('term');
        $manufacturer_id = $this->input->post('manufacturer_id');
        $data = array();

        if($manufacturer_id){
            $data = $this->medicine_model->getManufacturerItemsList($manufacturer_id, $term);
        }
        echo json_encode($data);
    }

    public function retrieve_medicine_data(){
        $product_id = $this->input->post('product_id');
        $manufacturer_id = $this->input->post('manufacturer_id');
        $batch_list = $this->input->post('batch_list');

        $data = array();
        $item = $this->medicine_model->read_by_product_id($product_id);
        // $item = $this->medicine_model->read_by_manufacturer_product($product_id, $manufacturer_id);
        if($item){
            $data["total_product"] = 0;
            $data["price"] = $item->price;
            $data["manufacturer_price"] = $item->buy_price;
            $data["manufacturer_id"] = $item->manufacturer_id;
            $data["unit"] = $item->unit;
            $data["tax"] = $item->tax/100;
            $data["discount_type"] = 2;
        }

        if($batch_list){
            $data["batch"] = $this->medicinestock_model->list_batch_by_product_id($product_id);
        }
        
        echo json_encode($data);
    }

    public function retrieve_product_batchid(){
        $batch_id = $this->input->post('batch_id');

        $data = array();
        $item = $this->medicinestock_model->get_batch_info($batch_id);
        if($batch_id){
            $data = $item;
        }
        echo json_encode($data);
    }
 
	public function index()
	{ 
		$data['title'] = display('medicine_list');  ;
		$data['items'] = $this->medicine_model->read();
		$data['content'] = $this->load->view('pharmacy_manager/medicine/medicine_view',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
 

	public function details($id = null)
	{   
		$data['title'] = display('medicine_list');
		#-------------------------------#
        $medicine = $this->medicine_model->read_by_id($id);

        $description = "<ul class=\"list-unstyled\">
                    <li>".display('medicine_name')." : $medicine->name</li>
                    <li>".display('category_name')." : $medicine->category</li>
                    <li>".display('price')." : $medicine->price</li>
                    <li>".display('manufactured_by')." : $medicine->manufactured_by</li> 
                </ul>
                $medicine->description"; 

        $data['details'] = (object) array(
            'title'       => $medicine->name,
            'description' => $description,
            'patient_id'  => null,
            'doctor_name' => null,
            'date'        => null,
        );

		$data['content'] = $this->load->view('hospital_activities/details',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

    public function form($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('name', display('medicine_name') ,'required|max_length[50]');
        $this->form_validation->set_rules('generic_name', 'Generic Name' ,'required|max_length[50]');
        $this->form_validation->set_rules('category_id', display('category_name') ,'required|max_length[11]');
        $this->form_validation->set_rules('manufacturer_id', 'Manufacturer Name' ,'required|max_length[50]');
        $this->form_validation->set_rules('type_id', 'Medicine Type' ,'required|max_length[11]');
        $this->form_validation->set_rules('description', display('description'),'trim');
        $this->form_validation->set_rules('box_size', 'Box Size' ,'required|max_length[30]');
        $this->form_validation->set_rules('unit', 'Unit' ,'required|max_length[30]');
        $this->form_validation->set_rules('price', 'Sell Price' ,'required');
        $this->form_validation->set_rules('buy_price', 'Manufacturer Price' ,'required');

        /*-------------STORE DATA------------*/
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $data['units'] = $this->medicine_model->units;
        $data['taxes'] = $this->medicine_model->taxes;
        $data['category_list'] = $this->category_model->category_list();
        $data['type_list'] = $this->type_model->type_list();
        $data['manufacturer_list'] = $this->manufacturer_model->manufacturer_list();

        $data['item'] = (object)$postData = array( 
            'id'          => $this->input->post('id'),
            'product_name'        => $this->input->post('name'),
            'generic_name'        => $this->input->post('generic_name'),
            'box_size'        => $this->input->post('box_size'),
            'unit'        => $this->input->post('unit'),
            'product_location'        => $this->input->post('product_location'),
            'product_details' => $this->input->post('product_details', false),
            'type_id'     => $this->input->post('type_id'),
            'category_id' => $this->input->post('category_id'),
            'price'       => $this->input->post('price'),
            'buy_price'       => $this->input->post('buy_price'),
            'tax'       => $this->input->post('tax'),
            'manufacturer_id' => $this->input->post('manufacturer_id'),
            'status'      => 1
        );  

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                #-------------------------------#
                //picture upload
                $picture = $this->fileupload->do_upload(
                    'assets/images/medicine/',
                    'image'
                );
                // if picture is uploaded then resize the picture
                if ($picture !== false && $picture != null) {
                    $this->fileupload->do_resize( 
                        $picture, 293, 350
                    );
                }
                //if picture is not uploaded
                if ($picture === false) {
                    $this->session->set_flashdata('exception', display('invalid_picture'));
                }
                
                if(!empty($picture)){
                    $postData['image']  = $picture;
                }
                #-------------------------------# 
                
                
                $postData['id'] = date('ymd').random_string('numeric', 7);
                if ($this->medicine_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/medicine/medicine/form');
            } else {
                $data['title'] = display('add_medicine');
                $data['content'] = $this->load->view('pharmacy_manager/medicine/medicine_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                #-------------------------------#
                //picture upload
                $picture = $this->fileupload->do_upload(
                    'assets/images/medicine/',
                    'image'
                );
                // if picture is uploaded then resize the picture
                if ($picture !== false && $picture != null) {
                    $this->fileupload->do_resize( 
                        $picture, 293, 350
                    );
                }
                //if picture is not uploaded
                if ($picture === false) {
                    $this->session->set_flashdata('exception', display('invalid_picture'));
                }
                if(!empty($picture)){
                    $postData['image']  = $picture;
                }
                #-------------------------------# 

                if ($this->medicine_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/medicine/medicine/form/'.$id);
            } else {
                $data['title'] = display('medicine_edit');
                $data['item'] = $this->medicine_model->read_by_id($id);
                $data['content'] = $this->load->view('pharmacy_manager/medicine/medicine_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->medicine_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('pharmacy_manager/medicine/medicine');
    }
  
	
}
