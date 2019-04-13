<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manufacturer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'pharmacy_manager/manufacturer_model'
        ));
        
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1
        ) 
        redirect('login'); 
	}
 
	public function index()
	{
		$data['title'] = 'Medicine Manufacturer';
		$data['items'] = $this->manufacturer_model->read();
		$data['content'] = $this->load->view('pharmacy_manager/manufacturer/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
 

	public function details($manufacturer_id = null)
	{  
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
		$data['title'] = display('hospital_activities');
		#-------------------------------#
		$data['category'] = $this->manufacturer_model->read_by_id($manufacturer_id);
		$data['content'] = $this->load->view('pharmacy_manager/manufacturer/details',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

    public function form($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('name', 'Manufacturer Name' ,'required|max_length[255]');
        $this->form_validation->set_rules('details', 'Details','trim');
        $this->form_validation->set_rules('status', display('status') ,'required');

        /*-------------STORE DATA------------*/
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $data['item'] = (object)$postData = array( 
            'manufacturer_id' => '',
            'manufacturer_name' => $this->input->post('name'),
            'address' => $this->input->post('address', true),
            'mobile' => $this->input->post('mobile', true),
            'details' => $this->input->post('details', true),
            'balance' => $this->input->post('balance', true),
            'status'      => $this->input->post('status')
        );  

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) {
                unset($postData['balance']); 
                $postData['manufacturer_id'] = date('ymd').random_string('numeric', 7);
                if ($this->manufacturer_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/manufacturer/form');
            } else {
                $data['title'] = 'Add Medicine Manufacturer';
                $data['content'] = $this->load->view('pharmacy_manager/manufacturer/form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                unset($postData['balance']); 
                unset($postData['manufacturer_id']); 
                if ($this->manufacturer_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/manufacturer/form/'.$postData['id']);
            } else {
                $data['title'] = 'Edit Medicine Manufacturer';
                $data['item'] = $this->manufacturer_model->read_by_id($id);
                $data['content'] = $this->load->view('pharmacy_manager/manufacturer/form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->manufacturer_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('pharmacy_manager/manufacturer');
    }

    public function search_by_name(){
        $name = $this->input->post('name');
        $data = array();

        if($name){
            $data = $this->manufacturer_model->getItemsListBySearch($name, 20);
        }
        echo json_encode($data);
    }
  
	
}
