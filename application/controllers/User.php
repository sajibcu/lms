<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'doctor_model',
			'user_model',
			'dashboard_model',
			'department_model'
		));

		if ($this->session->userdata('isLogIn') == false )
		redirect('login'); 	
	}

 
	public function index()
	{  
		$data['title'] = display('doctor_list');
		$data['doctors'] = $this->doctor_model->read();
		$data['content'] = $this->load->view('doctor',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 


	public function create($user_id =null)
	{

		$this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
		$this->form_validation->set_rules('lastname',display('last_name'),'required|max_length[50]');
		$this->form_validation->set_rules('user_role',display('user_role'),'required');

		// if (!empty($user_id)) {
		// 	$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");
		// } else {
		// 	$this->form_validation->set_rules('email',display('email'),'required|max_length[50]|valid_email|callback_email_check');
		// }

		$this->form_validation->set_rules('password',display('password'),'required|max_length[32]|md5');
		$this->form_validation->set_rules('mobile',display('mobile'),'required|max_length[20]');
		$this->form_validation->set_rules('sex',display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
		$this->form_validation->set_rules('status',display('status'),'required');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/human_resources/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture, 293, 350
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_picture'));
		}
		#-------------------------------#
		//when create a user
		$data['employee'] = (object)$postData = array(
			'user_id'      		=> $this->input->post('user_id'),
			'firstname'    		=> $this->input->post('firstname'),
			'lastname' 	   		=> $this->input->post('lastname'),
			'father_or_spouse' 	=> $this->input->post('father_or_spouse'),
			'religion' 	   		=> $this->input->post('religion'),
			'email' 	   		=> $this->input->post('email'),
			'password' 	   		=> md5($this->input->post('password')),
			'mobile'       		=> $this->input->post('mobile'),
			'short_biography' 	=> $this->input->post('short_biography',true),
			'designation'       => $this->input->post('designation'),
			'department_id' 	=> $this->input->post('department_id',true),
			'employement_type' 	=> $this->input->post('employement_type',true),
			'sex' 		   		=> $this->input->post('sex'),
			'address' 	   		=> $this->input->post('address'),
			'picture'      		=> (!empty($picture)?$picture:$this->input->post('old_picture')),
			'specialist'   		=> $this->input->post('specialist',true),
			'date_of_birth' 	=> date('Y-m-d', strtotime(($this->input->post('date_of_birth',true) != null)? $this->input->post('date_of_birth',true): date('Y-m-d'))),
			'blood_group'  		=> $this->input->post('blood_group',true),
			'degree'  	   		=> $this->input->post('degree',true),
			'user_role'    		=> $this->input->post('user_role'),
			'create_date'  		=> date('Y-m-d'),
			'created_by'   		=> $this->session->userdata('user_id'),
			'status'       		=> $this->input->post('status'),
		); 

		$data['pageRights'] = $this->user_model->categoryRightsInformation('1'); 


        /*-----------CHECK ID -----------*/
        if (empty($user_id)) {

            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->user_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                    redirect('user/create');
                }
                
            } else {
            	//view section
				$data['title'] = display('add_employee');
                $data['userRoles'] = $this->user_model->user_roles();
                $data['department_list'] = $this->department_model->department_list();
                //$data['category'] = "hello"; 
                $data['content'] = $this->load->view('users/form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {

            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->user_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                    redirect('user/profile/'.$postData['user_id']);
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                    redirect('user/create');
                }
            } else {
            	//view section
                $data['title'] = display('employee_edit');
                $data['employee'] = $this->user_model->read_by_id($user_id);
                $data['userRoles'] = $this->user_model->user_roles();
                $data['department_list'] = $this->department_model->department_list(); 
                $data['content'] = $this->load->view('users/form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
	}
 

	public function profile($user_id = null)
	{ 		 
		$data['title'] =  display('employee_information');
		#-------------------------------#
		$data['profile'] = $this->user_model->read_by_id($user_id);
		$data['content'] = $this->load->view('users/profile',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function edit($user_id = null) 
	{
		
		$user_role = $this->session->userdata('user_role');
		if ($user_role == 1 && $this->session->userdata('user_id') == $user_id)
			$data['title'] = display('edit_profile');  
		elseif ($user_role == 2)
			$data['title'] = display('edit_profile');  
		else
			$data['title'] = display('edit_doctor');  
		#-------------------------------#
		$data['department_list'] = $this->department_model->department_list(); 
		$data['doctor'] = $this->doctor_model->read_by_id($user_id);
		#-------------------------------#
		if (($data['doctor']->user_id != $this->session->userdata('user_id'))
		&& $this->session->userdata('user_role') != 1)
			redirect('login');
		#-------------------------------#
		$data['content'] = $this->load->view('doctor_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($user_id = null, $user_role = null) 
	{ 
		if ($this->user_model->delete($user_id, $user_role)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function permision($user_id = null)
	{
		$data['sysLinkData'] = $this->user_model->getSyslink();
		$data['user_id'] = $user_id;
		$data['selectedRights'] = $this->db->query("SELECT * FROM user_right WHERE user_id = ".$user_id)->result();
		$data['content'] = $this->load->view('users/permision', $data, true);
		$this->load->view('layout/main_wrapper',$data);
	}
	public function permision_insert()
	{
		$user_id = $this->input->post('user_id'); 
		$counter = $this->input->post('counter');
		$this->db->query("DELETE FROM user_right WHERE user_id = ".$user_id);
		$data = array();
		for($i = 0;$i<$counter;$i++)
		{
			$link_id = $this->input->post('link_id_'.$i);
			if($link_id !='' && $link_id !=null)
			{
				$data[] = array(
					'user_id'=>$user_id,
					'link_id'=>$link_id,
				);
				//$this->db->insert()
			}
		}
		$this->db->insert_batch('user_right',$data);

		$this->session->set_flashdata('message', display('update_successfully'));
		redirect("user/permision/".$user_id);
	}

	public function list($user_role = 0)
	{ 	 
		$data['title'] = display($user_role."_list");
		//$role_id     = $this->user_roles($user_role);
		#-------------------------------#
		$data['users'] = $this->user_model->read();
        //$data['userRoles'] = $this->user_model->user_roles();
        $data['pageRights'] = $this->user_model->categoryRightsInformation('1'); 
		$data['content'] = $this->load->view('users/user_list', $data, true);
		$this->load->view('layout/main_wrapper',$data);
	}
	public function getMenu()
	{
		$group = '0';
        $cat_id = 0;
        $html = '';
        $tre_menu = false;
        $nav   = $this->dashboard_model->getMenu();

        foreach($nav as $row){
            if($group != $row->group_id){
                if($tre_menu == true)
                {
                    $html .='</ul>';
                }
                if($group != '0')
                {
                    //echo 'help';
                    $html .='</li>';
                }
                $group = $row->group_id;

                $html .='<li class="treeview"><a href="#">'.$row->group_icon.$row->group_name.'<span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span></a>';
                if($row->group_child_sts==1)
                {
                    $tre_menu = true;
                    $html .= '<ul class="treeview-menu">';
                }else $tre_menu = false;
            }

            $html .='<li><a href="'.base_url().$row->cat_url.'">'.$row->cat_icon.$row->cat_name.'</a></li>';
        }
        echo '</li>'.$html;

	} 

}
