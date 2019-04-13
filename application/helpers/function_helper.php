<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('format_price')) {

    function format_price($price, $sign, $pos = 'left'){
        $out = sprintf('%0.2f', $price);
        $out = ($pos == 'left') ? $sign.' '. $out : $out. ' '.$sign;
        return $out;
    }
 
}

if (!function_exists('get_cout_out_of_stock')) {

    function get_cout_out_of_stock($alert = 10){
        $out = 0;
        $CI = get_instance();
        $CI->load->model('pharmacy_manager/medicinestock_model');
        $out = $CI->medicinestock_model->cout_out_of_stock();
        return $out;
    }
 
}


if (!function_exists('get_cout_expired_medicine_stock')) {

    function get_cout_expired_medicine_stock($alert = 10){
        $out = 0;
        $CI = get_instance();
        $CI->load->model('pharmacy_manager/medicinestock_model');
        $out = $CI->medicinestock_model->cout_expired_stock();
        return $out;
    }
 
}

if (!function_exists('calculate_date_from_date_of_birth')) {

    function calculate_date_from_date_of_birth($dob, $tz = false){
        if(!$tz) $tz = 'Asia/Dhaka';
        $tzone  = new DateTimeZone($tz);
        if($dob=='' || $dob ==null) return 0;
        $age_diff = DateTime::createFromFormat('Y-m-d', $dob, $tzone)->diff(new DateTime('now', $tzone));
        $age_years = $age_diff->y;
        $age_months = $age_diff->m;
        $age_days = $age_diff->d;
        
        $age = $age_years > 1 ? "$age_years Years" : "$age_years Year";
        if($age_years == 0) $age = false;
        
        if(!$age) {
            $age = $age_months > 1 ? "$age_months Months" : "$age_months Month";
            if($age_months == 0) $age = false;
        }
        
        if(!$age) {
            $age = $age_days > 1 ? "$age_days Days" : "$age_days Day";
        }
        return $age;
    }
 
}

if (!function_exists('parse_string_template')) {

    function parse_string_template($template, $data = array()){
        if (preg_match_all("/{{(.*?)}}/", $template, $m)) {
            foreach ($m[1] as $i => $varname) {
                $varname = trim($varname);
                $svalue = $varname;
                if(is_array($data) && isset($data[$varname])){
                    $svalue = $data[$varname];
                }else if(is_object($data)){
                    $svalue = $data->{$varname};
                }
                $template = str_replace($m[0][$i], sprintf('%s', $svalue), $template);
            }
        }
        return $template;
    }
}

if (!function_exists('get_total_unread_messages')) {

    function get_total_unread_messages(){
        $out = 0;
        $CI = get_instance();
        $CI->load->model('messages/message_model');
        $current_user_id = $CI->session->userdata('user_id');
        if($current_user_id){
            $out = $CI->db->select("*")
			->from("message")
			->where('receiver_id', $current_user_id)
			->where('receiver_status', 0)
			->get()
			->num_rows();
        }
        return $out;
    }
}

 
// $autoload['helper'] =  array('function_helper');