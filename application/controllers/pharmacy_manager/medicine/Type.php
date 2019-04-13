<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'pharmacy_manager/type_model'
        ));
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1
        ) 
        redirect('login'); 


    }
 
    public function index()
    {
        $data['title'] = 'Medicine Type';
        #-------------------------------#
        $data['types'] = $this->type_model->read();
        $data['content'] = $this->load->view('pharmacy_manager/medicine/type_view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function form($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('name', 'Name' ,'required|max_length[100]');

        /*-------------STORE DATA------------*/
        $data['item'] = (object)$postData = array( 
            'id'          => $this->input->post('id',true),
            'name'        => $this->input->post('name',true),
        );

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->type_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/medicine/type/form');
            } else {
                $data['title'] = 'Add Type';
                $data['content'] = $this->load->view('pharmacy_manager/medicine/type_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->type_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy_manager/medicine/type/form/'.$postData['id']);
            } else {
                $data['title'] = display('bed_edit');
                $data['item'] = $this->type_model->read_by_id($id);
                $data['content'] = $this->load->view('pharmacy_manager/medicine/type_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->type_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('pharmacy_manager/medicine/type');
    }
  
}
