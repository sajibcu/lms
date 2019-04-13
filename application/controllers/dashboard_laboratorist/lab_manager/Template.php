<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'lab_manager/reporttemplate_model',
            'lab_manager/reporttemplateitem_model',
            'lab_manager/template/unit_model',
            'lab_manager/setting_model',
            'human_resources/employee_model',
            'doctor_model',
        ));
        
        $this->load->helper('string');
        
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 4
        ) 
        redirect('login'); 
    }
    
    public function search_by_name(){
        $term = $this->input->post('term');
        $product_name = $this->input->post('product_name');
        $data = array();

        if($product_name){
            $data = $this->reporttemplate_model->getItemsListBySearch($product_name, 20);
        }
        echo json_encode($data);
    }

    public function retrieve_report_template_data(){
        $product_id = $this->input->post('product_id');

        $data = array();
        $item = $this->reporttemplate_model->read_by_id($product_id);
        if($item){
            $data["total_product"] = 0;
            $data["price"] = $item->price;
            $data["tax"] = $item->tax/100;
            $data["discount_type"] = 2;
        }        
        echo json_encode($data);
    }
 
	public function index()
	{
		$data['title'] = 'Templates Manager';
        $data['items'] = $this->reporttemplate_model->read();
        $data['currency'] =  'BDT';
        $data['currency_position'] =  'left';
		$data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/templates/list',$data,true);
		$this->load->view('dashboard_laboratorist/main_wrapper',$data);
	} 

    public function view($rid){
        // $report = $this->report_model->read_by_id($rid);
        // $customer = $this->patient_model->read_by_patient_id($report->customer_id);
        $report_template = $this->reporttemplate_model->read_by_id($rid);
        $report_template_items = $this->reporttemplateitem_model->getTemplateItems($rid);
        $setting = $this->setting_model->read();

        $report_data = array();
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
                $data_entries[$ritem->id] = "{{ data }}";
                $data_entries[$ritem->code] = "{{ data }}";
            }
        }

        $data['title'] = 'View Template';
        $data['report_template'] = $report_template;
        $data['doctor'] = $this->doctor_model->read_by_id($setting->doctor_id);;
        $data['checker'] = $this->employee_model->read_by_id($setting->checker_id);;
        $data['template_items'] = $report_template_items;
        $data['data_entries'] = $data_entries;
        $data['show_view_button'] = count($report_data) > 0;

        $data['content'] = $this->load->view('dashboard_laboratorist/lab_manager/templates/view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }
 

    public function delete($id = null) 
    {
        if ($this->reporttemplate_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('dashboard_laboratorist/lab_manager/template');
    }	
}
