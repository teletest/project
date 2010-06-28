<?php
class Admin extends My_Controller {

	function Admin()
	{
		parent::My_Controller();
		$this->load->model('admin_model');
		
		/*if ( ! $this->site_sentry->is_admin())
		{
			redirect('');
		}*/
		
		
	}

	function index()
	{
		$data = tags();
		$data['tabs']	= tabs('admin');
		$data['admin_title'] = 'Administration - General';
		$data['admin_menu'] = $this->admin_model->menu();
		if(!$this->session->userdata('logged_in'))
		{
		  redirect('login/');
		}
		
		if ($this->input->post('submit') != '')
		{
			$options = array('admin_user','debug_mode','cal_starttime','cal_endtime','cal_workingdays');
			$this->options_model->set_options($options);
		}

		$options = $this->options_model->get_options();		
		foreach ($options as $k=>$v)
		{
			$data[$k] = $v;	
		}
		
		if ($data['debug_mode'] == 'on')
		{
			$data['debug_mode'] = 'checked';	
		}
		else
		{
			$data['debug_mode'] = "";
		}
		
		$this->parser->parse('admin/index', $data);		
	}
	
	function system()
	{
		$data = tags();
		$data['tabs']	= tabs('admin');
		$data['admin_title'] = 'Administration - System';
		$data['admin_menu'] = $this->admin_model->menu();
		
		// Save data if submitted
		if ($this->input->post('submit') != '')
		{
			$options = array('smtp_isactive','smtp_username','smtp_password','smtp_host','smtp_port','smtp_server_timeout');
			$this->options_model->set_options($options);
		}
		$options = $this->options_model->get_options();		
		
		
		foreach ($options as $k=>$v)
		{
			$data[$k] = $v;	
		}
		
		if ($data['smtp_isactive'] == 'on')
		{
			$data['smtp_isactive'] = 'checked';	
		}
		else
		{
			$data['smtp_isactive'] = "";
		}		
				
		$this->parser->parse('admin/system', $data);		
	}
	
	function components($action='',$id='')
	{
		$data = tags();
		$data['tabs']	= tabs('admin');
		$data['admin_title'] = 'Administration - Components';
		$data['admin_menu'] = $this->admin_model->menu();
		

		if($action == 'add')
		{
			// save data if submitted
			if ($this->input->post('submit') != '')
			{
				$component = array(
					'id' 		=> $this->input->post('id'),
					'name' 	=> $this->input->post('name'),
					'desc' 	=> $this->input->post('desc'),
					'filename' => $this->input->post('filename'),
					'type' 	=> $this->input->post('type'),
					'isactive' => ($this->input->post('isactive') == '')?0:1,
				);
				
				$this->db->set($component);
				$this->db->insert('components'); 
				
				redirect('admin/components');
				
			}		
			
			$action = 'admin/components_add';
		}
		elseif($action == 'edit' && $id != '')
		{
			// update component if update requested
			if ($this->input->post('submit') == 'update')
			{	
				$component = array(
					'id' 		=> $this->input->post('id'),
					'name' 	=> $this->input->post('name'),
					'desc' 	=> $this->input->post('desc'),
					'filename' => $this->input->post('filename'),
					'type' 	=> $this->input->post('type'),
					'isactive' => ($this->input->post('isactive') == '')?0:1,
				);
				
				$this->db->update('components', $component, array('id' => $component['id']));	
				
				redirect('admin/components');
				
			}
			// delete the component		
			elseif ($this->input->post('submit') == 'delete')
			{		
				$this->db->delete('components', array('id' => $id)); 
				
				redirect('admin/components');
			}
			
					
			// get the components data
			$this->db->where('id',$id);
			$query = $this->db->get('components');			
			$data['components'] = $query->result_array();
			
			
			// Component Type
			$types = array(
				'Report' 	=> 'Reporting Module',
				'Chart' 	=> 'Charting Module',
				'Flash'		=> 'Flash Animation',
				'Image'		=> 'Image'
			);
			
			$data['types'] = array();
			
			foreach($types as $k=>$v)
			{
				$data['types'][] = array(
					'type_id' => $k,
					'type_name' => $v,
					'selected' => ($data['components'][0]['type'] == $k)?' selected':''
				);
			}
		
			
			if ($data['components'][0]['isactive'] == 1)
			{
				$data['components'][0]['isactive'] = 'checked';	
			}
			else
			{
				$data['components'][0]['isactive'] = '';
			}
			
			$action = 'admin/components_edit';
			 
		}
		else
		{
			$query = $this->db->get('components');
			$data['components'] = $query->result_array();
			
			
			$action = 'admin/components';
		}

		
				
		$this->parser->parse($action, $data);		
	}
	
	function updates()
	{
		$data = tags();
		$data['tabs']	= tabs('admin');
		$data['admin_title'] = 'Administration - Updates';
		$data['admin_menu'] = $this->admin_model->menu();		
		
		$this->parser->parse('admin/updates', $data);		
	}	
	
	function groups($action='',$id='')
	{
		$data = tags();
		$data['tabs']	= tabs('admin');
		$data['admin_title'] = 'Administration - Groups';
		$data['admin_menu'] = $this->admin_model->menu();
				
		if($action == 'add')
		{
			// save data if submitted
			if ($this->input->post('submit') != '')
			{
				
				
				$groups = array(
					'id' 		=> $this->input->post('id'),
					'name' 	=> $this->input->post('name'),
					'isactive' 	=> ($this->input->post('isactive') == '')? 0 : 1
				
				);
				
				/*
				$gid = $this->input->post('group_id');
				$g_name = $this->input->post('group_name');
				
				
				$add = $this->db->query("insert into groups(`group_id` , `group_name`) values('$gid' , '$g_name')");
				*/

				//print_r($groups);
				
				$this->db->set($groups);
				$this->db->insert('groups'); 
				
				//==========  group component associatin

				$ar_components = $this->input->post('comp');
				
				$final_components = "";
				
				foreach($ar_components as $v)
				{
				
					$final_components .= $v;
					$final_components .= ",";
				}
				
				$components = substr_replace($final_components , "" , -1);
				
				$groups_components = array(
						'component_id' => $components,
						'group_id' => $groups['id']
						);
				
				
				
				//$this->db->set($groups_components);
				$this->db->insert('group_component' , $groups_components); 

				
				
				//============================================
				
				
				redirect('admin/groups');
				
			}
			
			//=============== getting components ======================
			
			$q = $this->db->get('components');
			$data['components'] = $q->result_array();


		
			//========================================================
			$action = 'admin/groups_add';
		}
		elseif($action == 'edit' && $id != '')
		{
			// update component if update requested
			if ($this->input->post('submit') == 'update')
			{	
				$group = array(
					'id' 		=> $this->input->post('id'),
					'name' 	=> $this->input->post('name'),
					'isactive' => ($this->input->post('isactive') == '')?0:1,
				);
				
				$this->db->update('groups', $group, array('id' => $group['id']));	
				
				redirect('admin/groups');
				
			}
			// delete the component		
			elseif ($this->input->post('submit') == 'delete')
			{		
				$this->db->delete('groups', array('id' => $id)); 
				
				redirect('admin/groups');
			}
			
					
			// get the components data
			$this->db->where('id',$id);
			$query = $this->db->get('groups');			
			$data['groups'] = $query->result_array();	
			
			if ($data['groups'][0]['isactive'] == 1)
			{
				$data['groups'][0]['isactive'] = 'checked';	
			}
			else
			{
				$data['groups'][0]['isactive'] = '';
			}
			
			
			
			//=============== getting components ======================
			
			$q = $this->db->get('components');
			$data['components'] = $q->result_array();


		
			//========================================================

			
			
			
			$action = 'admin/groups_edit';
			 
		}
		else
		{
			$query = $this->db->get('groups');
			$data['groups'] = $query->result_array();
			
			
			$action = 'admin/groups';
		}

		
		$this->parser->parse($action, $data);		
	}
	
	function companies($action='',$id='')
	{
		$data = tags();
		$data['tabs']	= tabs('admin');
		$data['admin_title'] = 'Administration - Companies';
		$data['admin_menu'] = $this->admin_model->menu();
				
		if($action == 'add')
		{
			// save data if submitted
			if ($this->input->post('submit') != '')
			{
				$company = array(
					'id' 		=> $this->input->post('id'),
					'name' 	=> $this->input->post('name'),
					'address' 	=> $this->input->post('address'),
					'profile' 	=> $this->input->post('profile'),
					'note' => $this->input->post('note'),
					'isactive' => ($this->input->post('isactive') == '')?0:1,
				);
				
				$this->db->set($company);
				$this->db->insert('companies'); 
				
				redirect('admin/companies');
				
			}		
			
			$action = 'admin/companies_add';
		}
		elseif($action == 'edit' && $id != '')
		{
			// update component if update requested
			if ($this->input->post('submit') == 'update')
			{	
				$company = array(
					'id' 		=> $this->input->post('id'),
					'name' 	=> $this->input->post('name'),
					'address' 	=> $this->input->post('address'),
					'profile' 	=> $this->input->post('profile'),
					'note' => $this->input->post('note'),
					'isactive' => ($this->input->post('isactive') == '')?0:1,
				);
				
				$this->db->update('companies', $company, array('id' => $company['id']));	

				redirect('admin/companies');
				
			}
			// delete the component		
			elseif ($this->input->post('submit') == 'delete')
			{		
				$this->db->delete('companies', array('id' => $id)); 
				
				redirect('admin/companies'); //
			}
			
					
			// get the components data
			$this->db->where('id',$id);
			$query = $this->db->get('companies');			
			$data['companies'] = $query->result_array();
						
			if ($data['companies'][0]['isactive'] == 1)
			{
				$data['companies'][0]['isactive'] = 'checked';	
			}
			else
			{
				$data['companies'][0]['isactive'] = '';
			}
			
			$action = 'admin/companies_edit';
			
			//===== getting persons data ====
			
			
			$this->db->where('company_id',$id);
			$query = $this->db->get('persons');			
			$data['persons'] = $query->result_array();

			 
		}elseif($action == 'profile' && $id != '')
		{
		// want to view profile =========================
		
		
		$query = $this->db->get_where('companies' , array('id' => $id));		
		$data['company'] = $query->result_array();
		
		$action = 'admin/companies_profile';
		
		}elseif($action == 'note' && $id != '')
		{
		// want to view profile =========================
		
		
		$query = $this->db->get_where('companies' , array('id' => $id));		
		$data['company'] = $query->result_array();
		
		$action = 'admin/companies_note';
		
		}
		else
		{
			$query = $this->db->get('companies');
			$data['companies'] = $query->result_array();
			
			
			$action = 'admin/companies';
		}
		
		$this->parser->parse($action, $data);		
	}
	
	function persons($action='' , $id='', $values="")
	{
		$data = tags();
		$data['tabs'] = tabs('admin');
		$data['admin_title'] = 'Administration - Persons';
		$data['admin_menu'] = $this->admin_model->menu();
		$data['cities'] = $this->admin_model->get_cities();
		$data['h_cities'] =  $this->admin_model->get_cities();
		$data['o_cities'] =  $this->admin_model->get_cities();
		$data['b_cities'] =  $this->admin_model->get_cities();
		$data['suffix'] =  $this->admin_model->get_suffix();
		$data['title'] =  $this->admin_model->get_title();
		$data['priority'] =  $this->admin_model->get_priority();
	    $data['gender'] =  $this->admin_model->get_gender();
		$data['sensitivity'] =  $this->admin_model->get_sensitivity();
		$data['department'] =  $this->admin_model->get_department();
		
		if($action == 'add'){
		
			//if data submitted
			if($this->input->post('Submit') != '')
			{
			   $this->load->helper(array('form', 'url'));
			   $this->load->library('form_validation');
			   $this->form_validation->set_rules('login', 'Login', 'required');
			   $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[32]|matches[password_check]');
			   $this->form_validation->set_rules('password_check', 'Confirm New Password', 'required|min_length[3]|max_length[32]');
			   $this->form_validation->set_message('matches', $this->lang->line('login_password_reconfirm'));
			 
			   if ($this->form_validation->run() == FALSE)
			   {
				 // $this->redirect_to($user_id, validation_errors());
				  $this->parser->parse("add", "", validation_errors());
			   }
			   else
			   {	
				$person = array(
				'title' => $this->input->post('title'),
				'job_title' => $this->input->post('job_title'),
				'name' => $this->input->post('firstname')." ".$this->input->post('middlename')." ".$this->input->post('lastname'),
				'suffix' => $this->input->post('suffix'),
				'anniversary' => $this->input->post('anniversary'),
				'language' => $this->input->post('language'),
				'hobby' => $this->input->post('hobby'),
				'children' => $this->input->post('children'),
				'spouse' => $this->input->post('spouse'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $this->input->post('gender'),
				'referred_by' => $this->input->post('referred_by'),
				'web_page' => $this->input->post('web_page'),
				'company' => $this->input->post('company'),
				'department' => $this->input->post('department'),
				'b_street1' => $this->input->post('b_street1'),
				'b_street2' => $this->input->post('b_street2'),
				'b_street3' => $this->input->post('b_street3'),
				'b_city' => $this->input->post('b_city'),
				'b_state' => $this->input->post('b_state'),
				'b_postal_code' => $this->input->post('b_postal_code'),
				'b_country' => $this->input->post('b_country'),
				'b_phone1' => $this->input->post('b_phone1'),
				'b_phone2' => $this->input->post('b_phone2'),
				'b_fax' => $this->input->post('b_fax'),
				'b_add_pobox' => $this->input->post('b_add_pobox'),
				'h_street1' => $this->input->post('h_street1'),
				'h_street2' => $this->input->post('h_street2'),
				'h_street3' => $this->input->post('h_street3'),
				'h_city' => $this->input->post('h_city'),
				'h_state' => $this->input->post('h_state'),
				'h_postal_code' => $this->input->post('h_postal_code'),
				'h_country' => $this->input->post('h_country'),
				'h_phone1' => $this->input->post('h_phone1'),
				'h_phone2' => $this->input->post('h_phone2'),
				'h_fax' => $this->input->post('h_fax'),
				'h_add_pobox' => $this->input->post('h_add_pobox'),
				'o_street1' => $this->input->post('o_street1'),
				'o_street2' => $this->input->post('o_street2'),
				'o_street3' => $this->input->post('o_street3'),
				'o_city' => $this->input->post('o_city'),
				'o_state' => $this->input->post('o_state'),
				'o_postal_code' => $this->input->post('o_postal_code'),
				'o_country' => $this->input->post('o_country'),
				'o_phone1' => $this->input->post('o_phone1'),
				'o_fax' => $this->input->post('o_fax'),
				'o_add_pobox' => $this->input->post('o_add_pobox'),
				'assisstant_phone' => $this->input->post('assisstant_phone'),
				'assisstant_name' => $this->input->post('assisstant_name'),
				'call_back' => $this->input->post('call_back'),
				'car_phone' => $this->input->post('car_phone'),
				'primary_phone' => $this->input->post('primary_phone'),
				'radio_phone' => $this->input->post('radio_phone'),
				'ttytdd_phone' => $this->input->post('ttytdd_phone'),
				'mobile_phone' => $this->input->post('mobile_phone'),
				'isdn' => $this->input->post('isdn'),
				'pager' => $this->input->post('pager'),
				'telex' => $this->input->post('telex'),
				'account' => $this->input->post('account'),
				'dir_server' => $this->input->post('dir_server'),
				'gov_id_no' => $this->input->post('gov_id_no'),
				'org_id_no' => $this->input->post('org_id_no'),
				'keywords' => $this->input->post('keywords'),
				'initials' => $this->input->post('initials'),
				'manager_name' => $this->input->post('manager_name'),
				'int_free_busy' => $this->input->post('int_free_busy'),
				'priority' => $this->input->post('priority'),
				'private' => $this->input->post('private'),
				'billing_info' => $this->input->post('billing_info'),
				'location' => $this->input->post('location'),
				'profession' => $this->input->post('profession'),
				'office_location' => $this->input->post('office_location'),
				'mileage' => $this->input->post('mileage'),
				'sensitivity' => $this->input->post('sensitivity'),
				'email1_add' => $this->input->post('email1_add'),
				'email1_type' => $this->input->post('email1_type'),
				'email1_name' => $this->input->post('email1_name'),
				'email2_add' => $this->input->post('email2_add'),
				'email2_type' => $this->input->post('email2_type'),
				'email2_name' => $this->input->post('email2_name'),
				'email3_add' => $this->input->post('email3_add'),
				'email3_type' => $this->input->post('email3_type'),
				'email3_name' => $this->input->post('email3_name'),
				'notes' => $this->input->post('notes'),
				'user_1' => $this->input->post('user_1'),
				'user_2' => $this->input->post('user_2'),
				'user_3' => $this->input->post('user_3'),
				'user_4' => $this->input->post('user_4'),
				'company_id' => $this->input->post('company'),
				'email_signature' => $this->input->post('email_signature'),
				'valid_from' => $this->input->post('validfrom'),
				'valid_untill' => $this->input->post('validuntill'),
				'email' => $this->input->post('email'),
				'isactive' => ($this->input->post('is_user') == '')?0:1,
				'login' => $this->input->post('login'),
				'password' => md5($this->input->post('password')),
				'password_check' => md5($this->input->post('password_check')),
				'group_id' => $this->input->post('group_id')
				);
				
				// inserting data
				$this->db->insert('persons' , $person);				
				redirect('admin/persons');
			  }
			}
 
			// company names
			$qry = $this->db->get('companies');
			$data['companies'] = $qry->result_array();
			
			// group names
			$qry = $this->db->get('groups');
			$data['groups'] = $qry->result_array();
			
			$action =  'admin/persons_add';
		
		}elseif($action == 'edit' && $id != ''){
		
		//if update request
			if($this->input->post('Edit') == 'submit')
			{
			   $this->load->helper(array('form', 'url'));
			   $this->load->library('form_validation');
			  // $this->form_validation->set_rules('password', 'Old Password', 'required|callback_matches_curr_pw');
			   $this->form_validation->set_rules('login', 'Login', 'required');
			   $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|max_length[32]|matches[password_check]');
			   $this->form_validation->set_rules('password_check', 'Confirm New Password', 'required|min_length[3]|max_length[32]');
			   $this->form_validation->set_message('matches', $this->lang->line('login_password_reconfirm'));
			 
			   if ($this->form_validation->run() == FALSE)
			   {
				 // $this->redirect_to($user_id, validation_errors());
				  //$this->input->post('Edit')= "";
				  $errors= validation_errors();
				 // redirect("admin/persons/edit/$id/$errors");
				 // $this->persons("edit", $id, validation_errors());
			   }
			   else
			   {
				$person = array(
				'title' => $this->input->post('title'),
				'job_title' => $this->input->post('job_title'),
				'name' => $this->input->post('firstname')." ".$this->input->post('middlename')." ".$this->input->post('lastname'),
				'suffix' => $this->input->post('suffix'),
				'anniversary' => $this->input->post('anniversary'),
				'language' => $this->input->post('language'),
				'hobby' => $this->input->post('hobby'),
				'children' => $this->input->post('children'),
				'spouse' => $this->input->post('spouse'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $this->input->post('gender'),
				'referred_by' => $this->input->post('referred_by'),
				'web_page' => $this->input->post('web_page'),
				'company' => $this->input->post('company'),
				'department' => $this->input->post('department'),
				'b_street1' => $this->input->post('b_street1'),
				'b_street2' => $this->input->post('b_street2'),
				'b_street3' => $this->input->post('b_street3'),
				'b_city' => $this->input->post('b_city'),
				'b_state' => $this->input->post('b_state'),
				'b_postal_code' => $this->input->post('b_postal_code'),
				'b_country' => $this->input->post('b_country'),
				'b_phone1' => $this->input->post('b_phone1'),
				'b_phone2' => $this->input->post('b_phone2'),
				'b_fax' => $this->input->post('b_fax'),
				'b_add_pobox' => $this->input->post('b_add_pobox'),
				'h_street1' => $this->input->post('h_street1'),
				'h_street2' => $this->input->post('h_street2'),
				'h_street3' => $this->input->post('h_street3'),
				'h_city' => $this->input->post('h_city'),
				'h_state' => $this->input->post('h_state'),
				'h_postal_code' => $this->input->post('h_postal_code'),
				'h_country' => $this->input->post('h_country'),
				'h_phone1' => $this->input->post('h_phone1'),
				'h_phone2' => $this->input->post('h_phone2'),
				'h_fax' => $this->input->post('h_fax'),
				'h_add_pobox' => $this->input->post('h_add_pobox'),
				'o_street1' => $this->input->post('o_street1'),
				'o_street2' => $this->input->post('o_street2'),
				'o_street3' => $this->input->post('o_street3'),
				'o_city' => $this->input->post('o_city'),
				'o_state' => $this->input->post('o_state'),
				'o_postal_code' => $this->input->post('o_postal_code'),
				'o_country' => $this->input->post('o_country'),
				'o_phone1' => $this->input->post('o_phone1'),
				'o_fax' => $this->input->post('o_fax'),
				'o_add_pobox' => $this->input->post('o_add_pobox'),
				'assisstant_phone' => $this->input->post('assisstant_phone'),
				'assisstant_name' => $this->input->post('assisstant_name'),
				'call_back' => $this->input->post('call_back'),
				'car_phone' => $this->input->post('car_phone'),
				'primary_phone' => $this->input->post('primary_phone'),
				'radio_phone' => $this->input->post('radio_phone'),
				'ttytdd_phone' => $this->input->post('ttytdd_phone'),
				'mobile_phone' => $this->input->post('mobile_phone'),
				'isdn' => $this->input->post('isdn'),
				'pager' => $this->input->post('pager'),
				'telex' => $this->input->post('telex'),
				'account' => $this->input->post('account'),
				'dir_server' => $this->input->post('dir_server'),
				'gov_id_no' => $this->input->post('gov_id_no'),
				'org_id_no' => $this->input->post('org_id_no'),
				'keywords' => $this->input->post('keywords'),
				'initials' => $this->input->post('initials'),
				'manager_name' => $this->input->post('manager_name'),
				'int_free_busy' => $this->input->post('int_free_busy'),
				'priority' => $this->input->post('priority'),
				'private' => $this->input->post('private'),
				'billing_info' => $this->input->post('billing_info'),
				'location' => $this->input->post('location'),
				'profession' => $this->input->post('profession'),
				'office_location' => $this->input->post('office_location'),
				'mileage' => $this->input->post('mileage'),
				'sensitivity' => $this->input->post('sensitivity'),
				'email1_add' => $this->input->post('email1_add'),
				'email1_type' => $this->input->post('email1_type'),
				'email1_name' => $this->input->post('email1_name'),
				'email2_add' => $this->input->post('email2_add'),
				'email2_type' => $this->input->post('email2_type'),
				'email2_name' => $this->input->post('email2_name'),
				'email3_add' => $this->input->post('email3_add'),
				'email3_type' => $this->input->post('email3_type'),
				'email3_name' => $this->input->post('email3_name'),
				'notes' => $this->input->post('notes'),
				'user_1' => $this->input->post('user_1'),
				'user_2' => $this->input->post('user_2'),
				'user_3' => $this->input->post('user_3'),
				'user_4' => $this->input->post('user_4'),
				'company_id' => $this->input->post('company'),
				'email_signature' => $this->input->post('email_signature'),
				'valid_from' => $this->input->post('validfrom'),
				'valid_untill' => $this->input->post('validuntill'),
				'email' => $this->input->post('email'),
				'isactive' => ($this->input->post('is_user') == '')?0:1,
				'login' => $this->input->post('login'),
				'password' => md5($this->input->post('password')),
				'group_id' => $this->input->post('group_id')
				);	
				if($this->input->post('login') !== "")
				{ 
				
				$person['login'] = $this->input->post('login');
				
				}
				
				$this->db->update('persons', $person , array('id' => $id));	

				redirect('admin/persons');
			  }
			}

			$this->db->where('id',$id);
			$query = $this->db->get('persons');	
			$data['persons'] = $query->result_array();
			
			//========== break first and last name ============
			
			$name = $data['persons'][0]['name'];
			$ar_name = explode(" " , $name);
			$data['firstname']= $ar_name['0'];
			if (count($ar_name) > 1 )
			{
			 $data['middlename']= $ar_name['1'];
			 $data['lastname'] = end($ar_name);
			}
			else
			{
			 $data['middlename']= "";
			 $data['lastname'] = "";
			}
			/*array_pop($ar_name); // removing last element in an array which is last name
			$f_name = "";
			foreach($ar_name as $v)
			{
				$f_name .= $v;
				$f_name .= " ";
			}
			$data['firstname'] = trim($f_name);*/
			//===================================================	
			//=========== companies dropdown ====================
			
			$qry = $this->db->get('companies');
			$data['companies'] = $qry->result_array();
			
			foreach($data['companies'] as $k=>$v)
			{
			
				if($v['id'] == $data['persons'][0]['company_id'])
				{
					$data['companies'][$k]['selected'] = "selected";
					
				}else{
					
					$data['companies'][$k]['selected'] = "";
				}
			
			}	
			
			//====================================================
			//=========== groups dropdown ====================
			
			$qry = $this->db->get('groups');
			$data['groups'] = $qry->result_array();
			
			foreach($data['groups'] as $k=>$v)
			{
			
				if($v['id'] == $data['persons'][0]['group_id'])
				{
					$data['groups'][$k]['selected'] = "selected";
					
				}else{
					
					$data['groups'][$k]['selected'] = "";
				}
			
			}
			//====================================================
			
			//=========== Home City dropdown ====================				
			foreach($data['h_cities'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['h_city'])
				{
					$data['h_cities'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['h_cities'][$k]['selected'] = "";
				}
			
			}
			//====================================================		
			//=========== Business City dropdown ====================		
						
			foreach($data['b_cities'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['b_city'])
				{
					$data['b_cities'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['b_cities'][$k]['selected'] = "";
				}
			}
			//====================================================
            //=========== Other City dropdown ====================		
			
			foreach($data['o_cities'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['o_city'])
				{
					$data['o_cities'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['o_cities'][$k]['selected'] = "";
				}
			
			}
			//====================================================
			//=========== Suffix Drop down menu ====================		
			foreach($data['suffix'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['suffix'])
				{
					$data['suffix'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['suffix'][$k]['selected'] = "";
				}
			
			}
			//====================================================
            //=========== Title Drop down menu ====================		
			foreach($data['title'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['title'])
				{
					$data['title'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['title'][$k]['selected'] = "";
				}
			
			}
			//====================================================
			//=========== Priority Drop down menu ====================		
			
			foreach($data['priority'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['priority'])
				{
					$data['priority'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['priority'][$k]['selected'] = "";
				}
			
			}
			//====================================================
            //=========== Gender Drop down menu ====================		
			foreach($data['gender'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['gender'])
				{
					$data['gender'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['gender'][$k]['selected'] = "";
				}
			
			}
			//====================================================
			//=========== Sensitivity Drop down menu ====================		
			
			foreach($data['sensitivity'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['sensitivity'])
				{
					$data['sensitivity'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['sensitivity'][$k]['selected'] = "";
				}
			
			}
			//====================================================
			//=========== Department Drop down menu ====================		
			
			foreach($data['department'] as $k=>$v)
			{
				if($v['name'] == $data['persons'][0]['department'])
				{
					$data['department'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['department'][$k]['selected'] = "";
				}
			
			}
			//====================================================
			
	  			if($data['persons'][0]['isactive'] == 1){
				$data['persons'][0]['isactive'] = 'checked';
			}
			if($data['persons'][0]['private'] == 1){
				$data['persons'][0]['yes'] = 'checked';
			}
			else{
			   $data['persons'][0]['no'] = 'checked';
			}
			
			$action =  'admin/persons_edit';
		
		}
		elseif($action == 'delete' && $id != ''){
		   
		   $this->db->delete('persons' , array('id' => $id));
		   $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		   redirect($pieces[1]);
		
		}
		else{
		
		//getting persons data by joining tables
		/*
		$this->db->select('p.id , p.name , g.id , g.name , c.company_id , c.company_name');
		$this->db->from('persons as p');
		$this->db->join('groups as g', 'g.id = p.group_id' , 'left');
		$this->db->join('companies as c', 'c.id = p.company_id' , 'left');
		*/
		
		$this->db->select('
		p.id as id, p.name as person, g.name as groupname, c.name as company
		from persons p
		left join groups g on g.id=p.group_id
		left join companies c on c.id = p.company_id;
		'
		);	
		$query = $this->db->get();
		$data['persons'] = $query->result_array();
		
		$action =  'admin/persons';
		
		}
		
			$this->parser->parse($action , $data);
	}
	
	function feedback($action='')
	{
		$data = tags();
		$data['tabs'] = tabs('admin');
		$data['admin_title'] = 'Persons - Feedback';
		$data['admin_menu'] = $this->admin_model->menu();
		$query = $this->db->get('feedback');
		$data['feedback'] = $query->result_array();
		
		$action =  ($action == '')?'admin/feedback':'admin/feedback_' . $action;
			
		$this->parser->parse($action, $data); 
	}
	
	function view_comments($id='')
	{
		$data = array();
		$where = array(
			'id' => $id 
			);
		
		$query = $this->db->get_where('feedback' , $where);
		$data['cur_feedback'] = $query->result_array();
		
		
		
		$this->parser->parse('admin/view_comments' , $data);

	}

	
}


/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */