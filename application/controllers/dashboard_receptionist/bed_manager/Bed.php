<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bed extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'bed_manager/bed_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 


    }
 
    public function index()
    {
        $data['title'] = display('bed_list');
        #-------------------------------#
        $data['beds'] = $this->bed_model->read();
        $data['content'] = $this->load->view('dashboard_receptionist/bed_manager/bed_view',$data,true);
        $this->load->view('dashboard_receptionist/main_wrapper',$data);
    } 
 
 
}
