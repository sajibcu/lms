<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'lab_manager/template/unit_model'
        ));
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 4
        ) 
        redirect('login'); 
    }
 
    public function index()
    {
        $data['title'] = 'Report Units';
        #-------------------------------#
        $data['units'] = $this->unit_model->read();
        $data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/templates/unit_view',$data,true);
        $this->load->view('dashboard_laboratorist/main_wrapper',$data);
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
                if ($this->unit_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('dashboard_laboratorist/lab_manager/templates/unit/form');
            } else {
                $data['title'] = 'Add Type';
                $data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/templates/unit_form',$data,true);
                $this->load->view('dashboard_laboratorist/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->unit_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('dashboard_laboratorist/lab_manager/templates/unit/form/'.$postData['id']);
            } else {
                $data['title'] = display('bed_edit');
                $data['item'] = $this->unit_model->read_by_id($id);
                $data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/templates/unit_form',$data,true);
                $this->load->view('dashboard_laboratorist/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->unit_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('dashboard_laboratorist/lab_manager/templates/unit');
    }
  
}
