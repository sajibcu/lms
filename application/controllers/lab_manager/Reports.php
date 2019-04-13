<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'patient_model',
            'doctor_model',
			'lab_manager/report_model',
			'lab_manager/reporttemplate_model',
            'lab_manager/reporttemplateitem_model',
            'lab_manager/reportdata_model',
            'lab_manager/template/unit_model',
            'lab_manager/setting_model',
            'human_resources/employee_model',
        ));
        
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1
        ) 
        redirect('login'); 
    }
    
	public function index()
	{
		$data['title'] = 'Reports Manager';
        $data['items'] = $this->report_model->read();
        $data['from_date'] = date('Y-m-d');
		$data['to_date'] = date('Y-m-d');
        $data['currency'] =  'BDT';
        $data['currency_position'] =  'left';
		$data['content'] = $this->load->view('lab_manager/reports/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
    
	public function requested_reports()
	{
		$data['title'] = 'Requested Reports';
        $data['items'] = $this->report_model->read();
        $data['from_date'] = date('Y-m-d');
		$data['to_date'] = date('Y-m-d');
        $data['currency'] =  'BDT';
        $data['currency_position'] =  'left';
		$data['content'] = $this->load->view('lab_manager/reports/requested_reports',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    } 

    public function manage_report_date_to_date()
	{
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        
		$data['title'] = 'Lab Report Invoice';
		$data['from_date'] = $from_date ? $from_date : date('Y-m-d');
		$data['to_date'] = $to_date ? $to_date : date('Y-m-d');
		$data['items'] = $this->report_model->read_by_date_range($from_date, $to_date);
		$data['content'] = $this->load->view('lab_manager/reports/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
    }
    
	public function manage_report_invoice_id()
	{
        $invoice_no = $this->input->post('invoice_no');
		$data['title'] = 'Lab Report Invoice';
		$data['from_date'] = date('Y-m-d');
		$data['to_date'] = date('Y-m-d');
		$data['items'] = $this->report_model->read_by_invoice_no($invoice_no);
		$data['content'] = $this->load->view('lab_manager/reports/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
    
    public function view($rid){
        $report = $this->report_model->read_by_id($rid);
        $customer = $this->patient_model->read_by_patient_id($report->customer_id);
        $report_template = $this->reporttemplate_model->read_by_id($report->product_id);
        $report_template_items = $this->reporttemplateitem_model->getTemplateItems($report->product_id);

        $setting = $this->setting_model->read();
        $report_data = $this->reportdata_model->getReportEntries($rid);
        $data_entries = array();

        foreach ($report_template_items as $ritem) {
            $unit_key = $ritem->code.'_unit';
            $reference_key = $ritem->code.'_reference';
            $data_entries[$unit_key] = $ritem->unit;
            $data_entries[$reference_key] = $ritem->reference_value;

            if(array_key_exists($ritem->id, $report_data)){
                $data_entries[$ritem->id] = $report_data[$ritem->id]->value;
                $data_entries[$ritem->code] = $report_data[$ritem->id]->value;
            }else{
                $data_entries[$ritem->id] = "";
                $data_entries[$ritem->code] = "";
            }
        }

        $data['title'] = 'View Report';
        $data['patient'] = $customer;
        $data['item'] = $report;
        $data['ref_doctor'] = $this->doctor_model->read_by_id($report->doctor_id);;
        $data['doctor'] = $this->doctor_model->read_by_id($setting->doctor_id);;
        $data['checker'] = $this->employee_model->read_by_id($setting->checker_id);;
        $data['report_template'] = $report_template;
        $data['template_items'] = $report_template_items;
        $data['data_entries'] = $data_entries;
        $data['show_view_button'] = count($report_data) > 0;

        $data['content'] = $this->load->view('lab_manager/reports/view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    public function entry_data($rid){
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('data[]', 'Data' ,'required');
        
        $report = $this->report_model->read_by_id($rid);
        $customer = $this->patient_model->read_by_patient_id($report->customer_id);
        $report_template = $this->reporttemplate_model->read_by_id($report->product_id);
        $report_template_items = $this->reporttemplateitem_model->getTemplateItems($report->product_id);
        // $report_template_items = is_array($report_template_items) ? $report_template_items : array();

        $report_data = $this->reportdata_model->getReportEntries($rid);

        $data_entries = $this->input->post('data');
        $data_entries = ($data_entries && is_array($data_entries)) ? $data_entries : array();

        if(!$data_entries){
            foreach ($report_template_items as $ritem) {
                if(array_key_exists($ritem->id, $report_data)){
                    $data_entries[$ritem->id] = $report_data[$ritem->id]->value;
                }else{
                    $data_entries[$ritem->id] = "";
                }
            }
        }

        if ($this->form_validation->run() === true) {
            foreach ($report_template_items as $ritem) {
                if( $ritem->input_type == 'section' || $ritem->input_type == 'sub_section' ) continue;
                if(array_key_exists($ritem->id, $report_data)){
                    // $data_entries[$ritem->id] = $report_data[$ritem->id]->value;
                    $itemdata = array(
                        'id' =>  $report_data[$ritem->id]->id,
                        'value' => $data_entries[$ritem->id],
                    );
                    $this->reportdata_model->update($itemdata);
                }else{
                    $itemdata = array(
                        'template_id' =>  $report->product_id,
                        'report_id' =>  $report->id,
                        'attribute_id' => $ritem->id,
                        'value' => $data_entries[$ritem->id],
                        'sorting_order' => $ritem->sorting_order,
                        'status' => 1,
                    );
                    $this->reportdata_model->create($itemdata);
                }
            }

            if(count($report_data) == 0){
                $this->report_model->update(array(
                    'id' => $report->id,
                    'status' => $this->report_model->status_ready_delivary,
                ));
            }
            #set success message
            $this->session->set_flashdata('message', display('save_successfully'));
            redirect('lab_manager/reports/entry_data/'.$rid);
        }else{
            $data['title'] = 'Reports Data Entry';
            $data['patient'] = $customer;
            $data['doctor'] = $this->doctor_model->read_by_id($report->doctor_id);
            $data['item'] = $report;
            $data['report_template'] = $report_template;
            $data['template_items'] = $report_template_items;
            $data['data_entries'] = $data_entries;
            $data['show_view_button'] = count($report_data) > 0;
    
            $data['content'] = $this->load->view('lab_manager/reports/entry_data',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        }
    }

    public function create($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('template_name', 'Template Name' ,'required|max_length[255]');
        $this->form_validation->set_rules('template_code', 'Template Code' ,'required|max_length[255]');
        $this->form_validation->set_rules('price', 'Price','required');

        /*-------------STORE DATA------------*/
        $names = $this->input->post('name');
        $input_types = $this->input->post('input_type');
        $reference_values = $this->input->post('reference_value');
        $sorting_orders = $this->input->post('sorting_order');

        $update_items = $this->input->post('update_item');
        $delete_items = $this->input->post('delete_item');

        $update_items = (!$update_items || !is_array($update_items)) ? array() : $update_items;
        $delete_items = (!$delete_items || !is_array($delete_items)) ? array() : $delete_items;


        $data['types'] = array(
            'section'   => 'Section',
            'sub_section'   => 'Sub Section',
            'number'   => 'Number',
            'text'   => 'Text Field',
            'textarea'   => 'Text Area',
        );

        $data['item'] = (object)$postData = array( 
            'id' => $this->input->post('id'),
            'template_id' => date('ymd').random_string('numeric', 7),
            'name' => $this->input->post('template_name'),
            'code' => $this->input->post('template_code'),
            'price' => $this->input->post('price'),
            'date' => date('Y-m-d'),
            'note' => $this->input->post('note', true),
        );
        $data['items'] =  array();

        if( is_array( $names) && 
            is_array( $input_types) && 
            is_array( $reference_values) && 
            is_array( $sorting_orders)
        ){
            foreach ($names as $key => $name) {
                $data['items'][$key] = (object) array( 
                    'name' => $names[$key],
                    'input_type' => $input_types[$key],
                    'reference_value' => $reference_values[$key],
                    'sorting_order' => $sorting_orders[$key],
                );
            }
        }else{
            $data['items'][] = (object) array( 
                'name' => '',
                'input_type' => 'text',
                'reference_value' => '',
                'sorting_order' => '1',
            );

            // $data['items'][] = (object) array( 
            //     'name' => 'Hb ( Haemoglobin )',
            //     'input_type' => 'text',
            //     'reference_value' => 'Male: 14 – 18 g/dl',
            //     'sorting_order' => '1',
            // );

            // $data['items'][] = (object) array( 
            //     'name' => '( Cyanmethaemoglobin method )',
            //     'input_type' => 'text',
            //     'reference_value' => 'Female:  12 – 16 g/dl',
            //     'sorting_order' => '2',
            // );
        }

        $data['additional_js'] = array('handlebars.min.js');

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) {
                $insertItem = $this->reporttemplate_model->create($postData);
                $template_id = $this->db->insert_id();
                
                if ($insertItem) {
                    foreach ($data['items'] as $key => $subitem) {
                        $itemdata = array(
                            'template_id' =>  $template_id,
                            'name' => $subitem->name,
                            'input_type' => $subitem->input_type,
                            'reference_value' => $subitem->reference_value,
                            'sorting_order' => $subitem->sorting_order,
                            'status' => 1,
                        );
                        $this->reporttemplateitem_model->create($itemdata);
                    }
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('lab_manager/template/index');
            } else {
                $data['title'] = 'Add Report Template';
                $data['content'] = $this->load->view('lab_manager/templates/create',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) {
                $updateItem = $this->reporttemplate_model->update($postData);
                if ($updateItem) {
                    foreach ($data['items'] as $key => $subitem) {
                        $itemdata = array(
                            'template_id' =>  $id,
                            'name' => $subitem->name,
                            'input_type' => $subitem->input_type,
                            'reference_value' => $subitem->reference_value,
                            'sorting_order' => $subitem->sorting_order,
                            'status' => 1,
                        );

                        if( in_array($key, $update_items)){
                            $itemdata['id'] = $key;
                            $this->reporttemplateitem_model->update($itemdata);
                        }else {
                            $this->reporttemplateitem_model->create($itemdata);
                        }

                        foreach ($delete_items as $did) {
                            $this->reporttemplateitem_model->delete($did);
                        }
                    }

                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
                redirect('lab_manager/template/create/'.$postData['id']);
            } else {
                $item = $this->reporttemplate_model->read_by_id($id);

                $data['title'] = 'Edit Report Template';
                $data['item'] = $item;
                if($item){
                    $items = $this->reporttemplateitem_model->getTemplateItems($id);
                    $data['items'] = $items;
                }
                $data['content'] = $this->load->view('lab_manager/templates/create',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->report_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('lab_manager/reports');
    }	
}
