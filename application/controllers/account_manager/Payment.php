<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'account_manager/account_model',
			'account_manager/payment_model',
			'account_manager/invoice_model'
		));
		
		if ($this->session->userdata('isLogIn') == false 
			|| ($this->session->userdata('user_role') != 1 && $this->session->userdata('user_role') != 7 && $this->session->userdata('user_role') != 3)
		) 
		redirect('login'); 

	}
 
	public function index()
	{
		$data['title'] = display('payment_list');
		#-------------------------------#
		$data['payments'] = $this->payment_model->read();
		$data['content'] = $this->load->view('account_manager/payment',$data,true);
		if($this->session->userdata('user_role') ==7){
			$this->load->view('dashboard_receptionist/main_wrapper',$data);
		}else{$this->load->view('layout/main_wrapper',$data);}
	} 

 	public function create()
	{ 
		$data['title'] = display('add_payment');
		#-------------------------------#
		$this->form_validation->set_rules('date', display('date') ,'required|max_length[10]');
		$this->form_validation->set_rules('account_id', display('account_name') ,'required|max_length[100]');
		$this->form_validation->set_rules('pay_to', display('pay_to') ,'required|max_length[255]');
		$this->form_validation->set_rules('description', display('description'),'trim|required');
		$this->form_validation->set_rules('amount', display('amount'),'trim|required');
		$this->form_validation->set_rules('status', display('status') ,'required');
		$this->form_validation->set_rules('mobile', "Mobile" ,'required');
		$this->form_validation->set_rules('address', "Address" ,'required');
		#-------------------------------#
		$quantity = $this->input->post('quantity');
		if($quantity==''||$quantity=='0.00' || $quantity=='0') $quantity=1;
		$date = $this->input->post('date');
		$data['payment'] = (object)$postData = [
			'id' 	      => $this->input->post('id',true),
			'date' 		  => ($date == ''?date('Y-m-d'):date('Y-m-d', strtotime($date))),
			'account_id'  => $this->input->post('account_id',true),
			'pay_to' 	  => $this->input->post('pay_to',true),
			'mobile' 	  => $this->input->post('mobile',true),
			'address' 	  => $this->input->post('address',true),
			'description' => $this->input->post('description',true),
			'quantity'    => $quantity,
			'amount'      => $this->input->post('amount',true),
			'created_id'  => $this->session->userdata('user_id'),
			'status'      => $this->input->post('status',true)
		]; 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				$id = $this->payment_model->create($postData);
				if ($id) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
					redirect('account_manager/payment/paymentView/'.$id);
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('account_manager/payment/create');
			} else {
				if ($this->payment_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
					redirect('account_manager/payment/paymentView/'.$postData['id']);
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('account_manager/payment/edit/'.$postData['id']);
			}

		} else {
			$data['credit_acc_list'] = $this->account_model->credit_acc_list();
			$data['content'] = $this->load->view('account_manager/payment_form',$data,true);
			if($this->session->userdata('user_role') ==7){
				$this->load->view('dashboard_receptionist/main_wrapper',$data);
			}else{$this->load->view('layout/main_wrapper',$data);}
		} 
	}

	public function edit($id = null) 
	{
		$data['title'] = display('payment_edit');
		#-------------------------------#
		$data['credit_acc_list'] = $this->account_model->credit_acc_list();
		$data['payment'] = $this->payment_model->read_by_id($id);
		$data['content'] = $this->load->view('account_manager/payment_form',$data,true);
		if($this->session->userdata('user_role') ==7){
			$this->load->view('dashboard_receptionist/main_wrapper',$data);
		}else{$this->load->view('layout/main_wrapper',$data);}
	}

	public function view($id = null) 
	{
		$data['title'] = display('invoice_information');
		#-------------------------------#
		$data['website'] = $this->invoice_model->website();
		$data['invoice'] = $this->invoice_model->single_view($id);
		$data['invoice_data'] = $this->invoice_model->invoice_data($id);
		$data['content'] = $this->load->view('account_manager/invoice_view',$data,true);
		if($this->session->userdata('user_role') ==7){
			$this->load->view('dashboard_receptionist/main_wrapper',$data);
		}else if($this->session->userdata('user_role') ==3){
			$this->load->view('dashboard_accountant/main_wrapper',$data);
		}else{$this->load->view('layout/main_wrapper',$data);}
	}
 

	public function delete($id = null) 
	{
		if ($this->payment_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('account_manager/payment');
	}

	public function paymentView($id = null) 
	{
		$data['title'] = "Payment";
		#-------------------------------#
		$data['website'] = $this->invoice_model->website();
		$data['payment'] = $this->payment_model->read_by_id($id);
		//$data['invoice_data'] = $this->invoice_model->invoice_data($id);
		$data['content'] = $this->load->view('account_manager/payment_view',$data,true);
		if($this->session->userdata('user_role') ==7){
			$this->load->view('dashboard_receptionist/main_wrapper',$data);
		}else if($this->session->userdata('user_role') ==3){
			$this->load->view('dashboard_accountant/main_wrapper',$data);
		}else{$this->load->view('layout/main_wrapper',$data);}
	}
  
}
