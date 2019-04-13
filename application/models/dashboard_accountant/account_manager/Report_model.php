<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function read($data = null)
	{
		$start_date   = date('Y-m-d',strtotime($data['start_date']));
		$end_date     = date('Y-m-d',strtotime($data['end_date']));
		$patient_id   = $data['patient_id'];
		$report_option = $data['report_option'];

		if ($report_option == 1){
			return $this->db->select("*")
				->from('acm_invoice') 
				->where("acm_invoice.date BETWEEN '$start_date' AND '$end_date'",null,false) 
				->where("acm_invoice.status",1) 
				->order_by('date','asc')
				->get()
				->result();

		} else if ($report_option == 2) {
			return $this->db->select("*")
				->from('acm_invoice') 
				->where("acm_invoice.date BETWEEN '$start_date' AND '$end_date'",null,false) 
				->where("acm_invoice.patient_id",$patient_id) 
				->where("acm_invoice.status",1) 
				->order_by('date','asc')
				->get()
				->result();
		}  
	}

	public function debit($data = null)
	{		
		$report_option = $data['report_option'];
		$account_id    = $data['account_id'];
		$patient_id    = $data['patient_id'];
		$start_date   = date('Y-m-d',strtotime($data['start_date']));
		$end_date     = date('Y-m-d',strtotime($data['end_date']));
		/*------------------------------------*/
		$this->db->select("
			acm_invoice_details.*, 
			acm_invoice.patient_id, 
			acm_invoice.date, 
			acm_account.name as account_name
			");
		$this->db->from('acm_invoice_details'); 
		$this->db->join('acm_invoice', 'acm_invoice.id = acm_invoice_details.invoice_id', 'full');
		$this->db->join('acm_account', 'acm_account.id = acm_invoice_details.account_id');
			/*--------------------------------*/
			if ($report_option == 2) {
				// patient_wise filter
				$this->db->where("acm_invoice.patient_id", $patient_id);
			} else if ($report_option == 3) {
				$this->db->where('acm_invoice_details.account_id', $account_id); 

			}
			/*--------------------------------*/
		$this->db->where("acm_invoice.date BETWEEN '$start_date' AND '$end_date'",null,false); 
		$this->db->where("acm_invoice.status",1); 
		$this->db->order_by('acm_invoice.date','asc');
		$result = $this->db->get();
		return $result->result(); 
	} 

	public function credit($data = null)
	{		
		$report_option = $data['report_option'];
		$account_id    = $data['account_id'];
		$pay_to    	   = $data['pay_to'];
		$start_date    = date('Y-m-d',strtotime($data['start_date']));
		$end_date      = date('Y-m-d',strtotime($data['end_date']));
		/*------------------------------------*/
		$this->db->select("
			acm_payment.*,
			acm_account.name as account_name
			");
		$this->db->from('acm_payment'); 
		$this->db->join('acm_account', 'acm_account.id = acm_payment.account_id');
		/*--------------------------------*/
		if ($report_option == 2) {
			// patient_wise filter
			$this->db->like("acm_payment.pay_to", $pay_to);
		} else if ($report_option == 3) {
			$this->db->where('acm_payment.account_id', $account_id); 

		}
		/*--------------------------------*/
		$this->db->where("acm_payment.date BETWEEN '$start_date' AND '$end_date'",null,false); 
		$this->db->where("acm_payment.status",1); 
		$this->db->order_by('acm_payment.date','asc');
		$result = $this->db->get();
		return $result->result(); 
	} 

	public function lab_reports($data = null)
	{		
		$report_option = $data['report_option'];
		$operator_id    = $data['operator_id'];
		$patient_id    	   = $data['patient_id'];
		$doctor_id    	   = $data['doctor_id'];
		$start_date    = date('Y-m-d',strtotime($data['start_date'])).' 00:00:01';
		$end_date      = date('Y-m-d',strtotime($data['end_date'])).' 23:59:59';
		/*------------------------------------*/
		$this->db->select("
			lab_invoice.*,
			concat(user.firstname,' ',user.lastname) as operator_name,
			user.user_role as operator_role,
			concat(patient.firstname,' ',patient.lastname) as patient_name,
			concat(doctor.firstname,' ',doctor.lastname) as doctor_name,
			");
		$this->db->from('lab_invoice'); 
		$this->db->join('user', 'user.user_id = lab_invoice.created_by', 'left');
		$this->db->join('user as doctor', 'doctor.user_id = lab_invoice.doctor_id', 'left');
		$this->db->join('patient', 'patient.patient_id = lab_invoice.customer_id', 'left');
		/*--------------------------------*/
		if ($report_option == 2) {
			// patient_wise filter
			$this->db->like("lab_invoice.customer_id", $patient_id);
		} else if ($report_option == 3) {
			$this->db->where('lab_invoice.created_by', $operator_id); 
		} else if ($report_option == 4) {
			$this->db->where('lab_invoice.doctor_id', $doctor_id); 
		}
		/*--------------------------------*/
		$this->db->where("lab_invoice.created_at BETWEEN '$start_date' AND '$end_date'",null,false); 
		// $this->db->where("lab_invoice.status",1); 
		$this->db->order_by('lab_invoice.created_at','desc');
		$result = $this->db->get();
		return $result->result(); 
	} 
	
	public function lab_operator_list()
	{		
		$this->db->select("
			concat(user.firstname,' ',user.lastname) as name,
			lab_invoice.created_by as user_id,
			user.user_role
			");
		$this->db->from('lab_invoice'); 
		$this->db->join('user', 'user.user_id = lab_invoice.created_by', 'left');
		$this->db->group_by('lab_invoice.created_by');
		$this->db->order_by('user.firstname','asc');
		$result = $this->db->get();

		$userRoles = array( 
			'1' => display('admin'),
			'2' => display('doctor'),
			'3' => display('accountant'),
			'4' => display('laboratorist'),
			'5' => display('nurse'),
			'6' => display('pharmacist'),
			'7' => display('receptionist'),
			'8' => display('representative'), 
			'9' => display('case_manager') 
		); 
		
		$list = array();
			
		if ($result->num_rows() > 0) { 
			$list[''] = display('select_option'); 
			foreach ($result->result() as $value) {
				if($value->name == ' ' || !$value->name){
					$list[$value->user_id] = "Unknown ({$value->user_id})";
				}else{
					$user_role = isset($userRoles[$value->user_role]) ? $userRoles[$value->user_role] : '';
					$list[$value->user_id] = "{$value->name} ($user_role)";
				}
			}
			return $list;
		} else {
			return false; 
		} 
	} 

	public function lab_doctor_list()
	{		
		$this->db->select("
			concat(user.firstname,' ',user.lastname) as name,
			user.user_id,
			user.user_role
			");
		$this->db->from('lab_invoice'); 
		$this->db->join('user', 'user.user_id = lab_invoice.doctor_id', 'left');
		$this->db->group_by('lab_invoice.doctor_id');
		$this->db->order_by('user.firstname','asc');
		$result = $this->db->get();		
		$list = array();
			
		if ($result->num_rows() > 0) { 
			$list[''] = display('select_option'); 
			foreach ($result->result() as $value) {
				if($value->name == ' ' || !$value->name){
					$list[$value->user_id] = "Unknown ({$value->user_id})";
				}else{
					$list[$value->user_id] = "{$value->name}";
				}
			}
			return $list;
		} else {
			return false; 
		} 
	} 

	public function appointment($data = null)
	{		
		$report_option = $data['report_option'];
		$operator_id    = $data['operator_id'];
		$patient_id    	   = $data['patient_id'];
		$doctor_id    	   = $data['doctor_id'];
		$start_date    = date('Y-m-d',strtotime($data['start_date']));
		$end_date      = date('Y-m-d',strtotime($data['end_date']));
		/*------------------------------------*/
		$this->db->select("
			appointment.*,
			concat(user.firstname,' ',user.lastname) as operator_name,
			user.user_role as operator_role,
			concat(patient.firstname,' ',patient.lastname) as patient_name,
			concat(doctor.firstname,' ',doctor.lastname) as doctor_name,
			");
		$this->db->from('appointment'); 
		$this->db->join('user', 'user.user_id = appointment.created_by', 'left');
		$this->db->join('user as doctor', 'doctor.user_id = appointment.doctor_id', 'left');
		$this->db->join('patient', 'patient.patient_id = appointment.patient_id', 'left');
		/*--------------------------------*/
		if ($report_option == 2) {
			// patient_wise filter
			$this->db->like("appointment.patient_id", $patient_id);
		} else if ($report_option == 3) {
			$this->db->where('appointment.created_by', $operator_id); 
		} else if ($report_option == 4) {
			$this->db->where('appointment.doctor_id', $doctor_id); 
		}
		/*--------------------------------*/
		$this->db->where("appointment.create_date BETWEEN '$start_date' AND '$end_date'",null,false); 
		$this->db->where("appointment.status",1); 
		$this->db->order_by('appointment.create_date','desc');
		$result = $this->db->get();
		return $result->result(); 
	} 

	public function appointment_operator_list()
	{		
		$this->db->select("
			concat(user.firstname,' ',user.lastname) as name,
			appointment.created_by as user_id,
			user.user_role
			");
		$this->db->from('appointment'); 
		$this->db->join('user', 'user.user_id = appointment.created_by', 'left');
		$this->db->group_by('appointment.created_by');
		$this->db->order_by('user.firstname','asc');
		$result = $this->db->get();

		$userRoles = array( 
			'1' => display('admin'),
			'2' => display('doctor'),
			'3' => display('accountant'),
			'4' => display('laboratorist'),
			'5' => display('nurse'),
			'6' => display('pharmacist'),
			'7' => display('receptionist'),
			'8' => display('representative'), 
			'9' => display('case_manager') 
		); 
		
		$list = array();
			
		if ($result->num_rows() > 0) { 
			$list[''] = display('select_option'); 
			foreach ($result->result() as $value) {
				if($value->name == ' ' || !$value->name){
					$list[$value->user_id] = "Unknown ({$value->user_id})";
				}else{
					$user_role = isset($userRoles[$value->user_role]) ? $userRoles[$value->user_role] : '';
					$list[$value->user_id] = "{$value->name} ($user_role)";
				}
			}
			return $list;
		} else {
			return false; 
		} 
	} 

	public function appointment_doctor_list()
	{		
		$this->db->select("
			concat(user.firstname,' ',user.lastname) as name,
			user.user_id,
			user.user_role
			");
		$this->db->from('appointment'); 
		$this->db->join('user', 'user.user_id = appointment.doctor_id', 'left');
		$this->db->group_by('appointment.doctor_id');
		$this->db->order_by('user.firstname','asc');
		$result = $this->db->get();		
		$list = array();
			
		if ($result->num_rows() > 0) { 
			$list[''] = display('select_option'); 
			foreach ($result->result() as $value) {
				if($value->name == ' ' || !$value->name){
					$list[$value->user_id] = "Unknown ({$value->user_id})";
				}else{
					$list[$value->user_id] = "{$value->name}";
				}
			}
			return $list;
		} else {
			return false; 
		} 
	} 
}
