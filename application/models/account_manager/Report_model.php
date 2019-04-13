<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function read($data = null)
	{
		$start_date   = date('Y-m-d',strtotime($data['start_date']));
		$end_date     = date('Y-m-d',strtotime($data['end_date']));
		$patient_id   = $data['patient_id'];
		$report_option = $data['report_option'];

		if ($report_option == 1 || $report_option == ""){
			$q = $this->db->select("acm_invoice.id
				,acm_invoice.patient_id
				,acm_invoice.total
				,acm_invoice.vat
				,acm_invoice.discount
				,acm_invoice.grand_total
				,acm_invoice.paid
				,acm_invoice.due
				,acm_invoice.created_id
				,acm_invoice.date
				,acm_invoice.status")
				->from('acm_invoice') 
				->where("acm_invoice.date BETWEEN '$start_date' AND '$end_date'",null,false) 
				->where("acm_invoice.status",1) 
				//->order_by('date','asc')
				->get();
				//->result();
			$subQuery1 = $this->db->last_query();

			$lab_query = "SELECT id
							,customer_id AS patient_id
							,total_amount  AS total
							,total_tax  AS vat
							,total_discount  AS discount
							,total_amount  AS grand_total
							,paid_amount  AS paid
							,due_amount  AS due
							,created_by  AS created_id
							,date
							,status
							 FROM lab_invoice WHERE date BETWEEN '$start_date' AND '$end_date'";
			$result = $this->db->query("select * from ($subQuery1 UNION ALL $lab_query) s ORDER BY s.date DESC ");

			return $result->result();

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
			acm_invoice.patient_id, 
			acm_invoice.date 
			,acm_account.name as account_name
			,acm_invoice_details.description
			,acm_invoice_details.quantity
			,acm_invoice_details.subtotal
			,((acm_invoice.discount/acm_invoice.total)*acm_invoice_details.subtotal)  AS discount
			,(acm_invoice_details.subtotal - (acm_invoice.discount/acm_invoice.total*acm_invoice_details.subtotal)+(acm_invoice.vat/acm_invoice.total*acm_invoice_details.subtotal)-(acm_invoice.due/acm_invoice.total*acm_invoice_details.subtotal) ) subtotal
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
		//$this->db->order_by('acm_invoice.date','asc');
		
		$temp_result = $this->db->get();
		$subQuery1 = $this->db->last_query();

		$condition = " AND b.bill_date BETWEEN '$start_date' AND '$end_date'";
		$condition2 = " WHERE DATE_FORMAT(ad.date,'%Y-%m-%d') BETWEEN '$start_date' AND '$end_date'";
		$ticketCondition=""; 
		if ($report_option == 2) {
			// patient_wise filter
			$condition = " AND dis.patient_id='".$patient_id."'";
			$condition2 = " AND ad.patient_id='".$patient_id."'";
			$ticketCondition = " AND appointment.patient_id ='".$patient_id."'";
		} 

		$advance = "SELECT 
					ad.patient_id
					,DATE_FORMAT(ad.date,'%Y-%m-%d') date
					,'Advance receipt' account_name
					,ad.description
					,'1' AS quantity
					,ad.amount price
					,'0' AS discount
					,ad.amount subtotal
					FROM 
					bill_advanced ad ".$condition2;

		$dischargeQuery = "SELECT 
							dis.patient_id
							,b.bill_date AS date
							,'Discharge amount' AS account_name
							,b.note AS description
							,'1' AS quantity
							,b.total-b.discount-dis.amount AS price 
							,b.discount AS discount
							,b.total-b.discount-dis.amount AS subtotal 
							FROM 
							(
								SELECT * FROM bill 
							) b
							LEFT OUTER JOIN (
								SELECT admission_id,patient_id,SUM(amount) amount FROM bill_advanced
								GROUP BY patient_id,admission_id
							) dis ON b.admission_id=dis.admission_id
							WHERE b.total-b.discount-dis.amount>0 ".$condition;
		$ticketFree = "SELECT appointment.patient_id
						,DATE_FORMAT(appointment.create_date,'%Y-%m-%d') date
						, CONCAT(patient.firstname, ' ', patient.lastname) AS account_name
						,appointment.problem AS description
						,'1' AS quantity
						,appointment.ticket_fee price
						,'0' AS discount
						,appointment.ticket_fee subtotal
						FROM appointment
						LEFT JOIN patient ON patient.patient_id = appointment.patient_id 
						WHERE appointment.create_date BETWEEN '$start_date' AND '$end_date' ".$ticketCondition;
		$labInvoice = "SELECT j0.customer_id AS patient_id
						,j0.date
						,GROUP_CONCAT(j2.name) account_name
						,j0.invoice_details description
						,'1' AS quantity
						,(j0.total_amount+j0.total_discount+j0.invoice_discount) price
						,(j0.total_discount+j0.invoice_discount) AS discount
						,j0.paid_amount subtotal
						FROM lab_invoice j0
						LEFT JOIN lab_invoice_details j1 ON j0.id = j1.invoice_id
						LEFT JOIN lab_report_templates j2 ON j2.id = j1.product_id
						WHERE j0.date BETWEEN '$start_date' AND '$end_date'
						GROUP BY j0.id";

		//$result = $this->db->query("select * from ($subQuery1 UNION ALL $dischargeQuery UNION ALL $advance) s ORDER BY s.date DESC  ");
		$result = $this->db->query("select * from ($labInvoice UNION ALL $ticketFree UNION ALL $subQuery1 UNION ALL $dischargeQuery UNION ALL $advance) s ORDER BY s.date DESC  ");
		//$this->db->get();
		//$result = $this->db->get();
		//return $temp_result;
		
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
			acm_payment.date
			,acm_payment.pay_to
			,acm_payment.description
			,acm_account.name as account_name
			,IF(acm_payment.quantity=0,acm_payment.amount,acm_payment.amount*acm_payment.quantity) AS amount
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
		//$this->db->order_by('acm_payment.date','asc');
		$result = $this->db->get();
		$subQuery1 = $this->db->last_query();
		$condition = " AND b.bill_date BETWEEN '$start_date' AND '$end_date'";
		$refund = "SELECT b.bill_date AS date
					,dis.admission_id AS pay_to
					,'Discharge amount refund' AS description
					,'Refund' AS account_name
					,ABS(b.total-b.discount-dis.amount) amount
					FROM 
					(
						SELECT * FROM bill 
					) b
					LEFT OUTER JOIN (
						SELECT admission_id,patient_id,SUM(amount) amount FROM bill_advanced
						GROUP BY patient_id,admission_id
					) dis ON b.admission_id=dis.admission_id
					WHERE b.total-b.discount-dis.amount<0 ".$condition;

		$result = $this->db->query("select * from ($subQuery1 UNION ALL $refund) s ORDER BY s.date DESC  ");

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
