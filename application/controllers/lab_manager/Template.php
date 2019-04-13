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
        
        if ($this->session->userdata('isLogIn') == false ) 
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
		$data['content'] = $this->load->view('lab_manager/templates/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
 

    public function create($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('template_name', 'Template Name' ,'required|max_length[255]');
        $this->form_validation->set_rules('template_code', 'Template Code' ,'required|max_length[255]');
        $this->form_validation->set_rules('price', 'Price','required');

        $units = $this->unit_model->unit_list();

        /*-------------STORE DATA------------*/
        $names = $this->input->post('name');
        $codes = $this->input->post('code');
        $input_types = $this->input->post('input_type');
        $input_units = $this->input->post('input_unit');
        $reference_values = $this->input->post('reference_value');
        $sorting_orders = $this->input->post('sorting_order');

        $update_items = $this->input->post('update_item');
        $delete_items = $this->input->post('delete_item');

        $update_items = (!$update_items || !is_array($update_items)) ? array() : $update_items;
        $delete_items = (!$delete_items || !is_array($delete_items)) ? array() : $delete_items;

        $data['units'] = $units;

        $data['types'] = array(
            'section'   => 'Section',
            'sub_section'   => 'Sub Section',
            'number'   => 'Number',
            'yes_no'   => 'Yes/No',
            'positive_negetive'   => 'Positive/Negetive',
            'text'   => 'Text Field',
            'textarea'   => 'Text Area',
        );

        $data['item'] = (object)$postData = array( 
            'id' => $this->input->post('id'),
            'template_id' => date('ymd').random_string('numeric', 7),
            'name' => $this->input->post('template_name'),
            'title' => $this->input->post('template_title'),
            'sub_title' => $this->input->post('template_subtitle'),
            'data_method' => $this->input->post('data_method'),
            'code' => $this->input->post('template_code'),
            'price' => $this->input->post('price'),
            'date' => date('Y-m-d'),
            'sample_type' => $this->input->post('sample_type', true),
            'note' => $this->input->post('note', true),
        );
        $data['items'] =  array();

        if( is_array( $names) && 
            is_array( $input_types) && 
            is_array( $input_units) && 
            is_array( $reference_values) && 
            is_array( $sorting_orders)
        ){
            foreach ($names as $key => $name) {
                $data['items'][$key] = (object) array( 
                    'name' => $names[$key],
                    'code' => $codes[$key],
                    'input_type' => $input_types[$key],
                    'unit_id' => $input_units[$key],
                    'reference_value' => $reference_values[$key],
                    'sorting_order' => $sorting_orders[$key],
                );
            }
        }else{
            $data['items'][] = (object) array( 
                'name' => '',
                'code' => '',
                'input_type' => 'text',
                'unit_id' => '0',
                'reference_value' => '',
                'sorting_order' => '1',
            );
            // ALTER TABLE `lab_report_template_items` ADD `code` VARCHAR(100) NOT NULL AFTER `name`;

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
                            'code' => $subitem->code,
                            'input_type' => $subitem->input_type,
                            'unit_id' => $subitem->unit_id,
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
                            'code' => $subitem->code,
                            'input_type' => $subitem->input_type,
                            'unit_id' => $subitem->unit_id,
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
                    $this->session->set_flashdata('exception',display('please_try_again'));
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

        $data['content'] = $this->load->view('lab_manager/templates/view',$data,true);
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
        redirect('lab_manager/template');
    }	
}
