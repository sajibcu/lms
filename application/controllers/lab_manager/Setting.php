<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'lab_manager/setting_model',
			'human_resources/employee_model',
			'doctor_model'
		));

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}

	public function index()
	{
		$data['title'] = 'Template Setting';
		#-------------------------------#
		//check setting table row if not exists then insert a row
		$this->check_setting();
		#-------------------------------#
		$laboratorist_role_id = 4;

		$data['setting'] = $this->setting_model->read();
		$data['doctors'] = $this->doctor_model->doctor_list();
		$data['checkers'] = $this->employee_model->read($laboratorist_role_id);
		$data['content'] = $this->load->view('lab_manager/setting',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create()
	{
		$data['title'] = 'Template Setting';
		#-------------------------------#
		$this->form_validation->set_rules('doctor_id','Doctor','required|max_length[11]');
		// $this->form_validation->set_rules('checker_id','Checked By','required|max_length[11]'); 
		#-------------------------------#

		$data['setting'] = (object)$postData = [
			'setting_id'  => $this->input->post('setting_id'),
			'doctor_id' 	  => $this->input->post('doctor_id'),
			'checker_id' => $this->input->post('checker_id'),
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $setting_id then insert data
			if (empty($postData['setting_id'])) {
				if ($this->setting_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
			} else {
				if ($this->setting_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				} 
			}

			redirect('lab_manager/setting');

		} else { 
			$data['doctors'] = $this->doctor_model->read();
			$data['content'] = $this->load->view('lab_manager/setting',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	//check setting table row if not exists then insert a row
	public function check_setting()
	{
		if ($this->db->count_all('template_setting') == 0) {
			$this->db->insert('template_setting',[
				'doctor_id' => 0,
				'checker_id' => 0,
			]);
		}
	}


}
