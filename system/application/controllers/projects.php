<?php
/**
 * Teletest
 *
 * A telecommunication sites rollout management system
 */

// ------------------------------------------------------------------------

/**
 * Teletest Projects Controller
 *
 * This controller manages all of the request to manage a project and the related sites.
 */
class Projects extends My_Controller {
/**
* Constructor
*
* Loads the different related model classes etc.
*
* @access public
*/

	function Projects()
	{
		parent::My_Controller();
		$this->load->model('projects_model');
		$this->load->model('admin_model');
		$this->load->model('sites_model');
		$this->load->model('charts_model');
		$this->load->library('pagination');
		$this->load->library('Workdays');
		$this->load->library('cigooglemapapi');
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->library('form_validation');
		$this->load->plugin('fusion');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('url');
			
	}
/*	function mail()
	{
	    //echo phpinfo(); 
		$this->load->library('email');  
		$this->email->from('abhalli@gmail.com','Team OnePage');  
		$this->email->to("anbhalli@yahoo.com");  
		$this->email->subject('A test email from CodeIgniter using Gmail');  
		$this->email->message("I can now email from CodeIgniter using Gmail as my server!");  
		$this->email->send();   
	
	} */
	function index($m="", $y="")
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		
		// setup breadcrumb
        $bc = array(
               'title' => 'Project',
               'url' => 'projects',
               'isRoot' => true
        );        
        $this->breadcrumb->setBreadCrumb($bc);   
        // pass data onto the views
		$data['breadcrumbs'] = get_Instance()->breadcrumblist->display();
		
		// Fill in the site array with the details after running the query
		$s = $this->input->post('s');
		//$f = $this->input->post('f');
	    $this->db->order_by('activated_on','asc');
		$this->db->order_by('code','asc');	
		if ( $s == '' ) 
		{
		    $query = $this->db->get_where('projects'  );
			$data['projects'] = $query->result_array();			
		}
		else
		{	
			// build the search page to do the filtering based upon the passed parameters
			  $this->db->select('*');
			  $this->db->from('projects');
			  $this->db->like('code', $s);
			  $query = $this->db->get();
              $data['projects'] = $query->result_array();		
	    }		    
		        $_true = array(array());
				$_false = array();
				$data['if_found'] = ( $data['projects'] != NULL) ? $_true : $_false;
				$data['if_not_found'] = ( $data['projects'] == NULL) ? $_true : $_false;
			    if ( $data['projects'] == NULL )
				{
				$data['projects']='Your search did not return any results.';
				}
				// to show calendar
				if ($m=="" || $y=="")
				{
				 $data['month'] = date('m');
				 $data['year'] = date('Y');
				}
				else
				{
				 $data['month'] = $m;
				 $data['year'] = $y;
				}
				$this->_calendar($data);
				$this->parser->parse('projects/index', $data);		
		
	}

	function _calendar(&$data)
	{
	
		 $m = $data['month'];
		 $y = $data['year'];	
		// calculate the first day of the month and the total days in month
		 $d1 = date("w", mktime(0, 0, 0, $m, 1, $y));
		//This gets us the month name 
         $title = date('F', $d1) ; 
		//Here we find out what day of the week the first day of the month falls on 
		 $day_of_week = date('D', $d1) ; 				
		//We then determine how many days are in the current month
		 $dm = cal_days_in_month(0, $m, $y) ; 			
		// Adding the list of projects to be displayed in this month
	
		$query = $this->db->query("SELECT id,code,created_on FROM projects WHERE month(created_on)=$m ORDER BY code ASC;" );
		
		$results = $query->result_array();
		foreach ($results as $result)
		{
			$activities[$result['created_on']][] = array(
				'id' => $result['id'], 
				'code' => $result['code'] 
			);
		}	
		// todo -- add the actvities from the activities table as well					
	    $data['month'] = date('F', mktime(0,0,0,$m,1));
		$data['year'] = $y;
		$data['weeks'] = array();
		$data['m'] =$m ;	
				
		$rows = ceil(($d1 + $dm)/7);
		for ($w=0;$w<$rows;$w++)
		{
			for($d=1;$d<8;$d++)	
			{
			    $dd = $w * 7 + $d - $d1;
				
				if ($dd<1 || $dd > $dm)
				{
					$data['weeks'][$w]['days'][$d] = array('day'=>'', 'activities'=>array());
				}
				else
				{
					$ddd = sprintf("%4d-%02d-%02d",$y,$m, $dd);
					
					$data['weeks'][$w]['days'][$d] = array('day'=>$dd, 'activities'=>array());

					if (isset($activities[$ddd]))
					{
						$data['weeks'][$w]['days'][$d]['activities'] = 	$activities[$ddd];
					}
				}
			}
			
		}
	}
    
	  /*
    *****************************************************
    Name: getNextMonth
    Function: This function will determine what the month following
        the specified month will be, and store information
        about this month including: name, abbreviated name, etc.
    *****************************************************
    */
    function getNextMonth($m, $y)
    {
        if ( $m==12)
		{
             $m=1;
             $y=$y+1;
		}
        if ($m!=12)
		{
             $m=$m+1;
             $y=$y;
		}
		$this->index($m, $y);
    }
    
    /*
    *****************************************************
    Name: getPrevMonth
    Function: This function will determine what the month preceding
        the specified month will be, and store information
        about this month including: name, abbreviated name, etc.
    *****************************************************
    */
    function getPrevMonth( $m, $y)
    {
        if ($m==1)
		{
             $m=12;
             $y=$y-1;
	    }    
        if ($m!=1)
		{
             $m=$m-1;
             $y=$y;
		}
		$this->index($m, $y);
    }
	
	function upload_calendar($value="", $msg="")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$data['projects_title'] = 'Projects';
		
		$query = $this->db->get('calendars');
        $data['calendar'] = $query->result_array();
		$data['error_msg']=$msg;
		$this->parser->parse('projects/upload_calendar', $data);
	}
	
	function calendar_uploaded()
	{
	    if ($this->input->post('submit') != '')
		{  
		    $overwrite = $this->input->post("overwrite");
			$mypath = './uploads';
			if (!is_dir($mypath))
			{
				mkdir($mypath,0777,TRUE);
			}
			   $this->load->helper(array('form', 'url'));
			   $this->load->library('form_validation');
			   $this->form_validation->set_rules('calendar_name', 'Calendar Name', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->upload_calendar(validation_errors());
			}
			else
			{ 
			   $config['upload_path'] = './uploads/';
		       $config['allowed_types'] = 'gif|jpg|png|txt|pdf|csv';
		       $config['max_size']	= '4096';
	           $this->load->library('upload', $config);
					if ( ! $this->upload->do_upload())
					{ 
						$msg=$this->upload->display_errors();
    				    $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
	    	            $this->session->set_flashdata('conf_msg', $msg);
				        redirect( $pieces[1]);     
					}	
					else
					{ 
						$data = array('upload_data' => $this->upload->data());
						$path= $data['upload_data']['file_path'];
						$tempFile =$data['upload_data']['file_name'];
						$temp_csv = $_FILES['userfile']['tmp_name'];
			
						$name= $this->input->post('calendar_name');
						//insert calendar name
						$c_data= array(
						  'name' => $name,
						  'is_active' => '0',
						); 
						if ( $this->live_validation($name) != "0"  && $overwrite == "1"  )
						{
						   $c_id= $this->live_validation($name);
						   $update = "yes";
						} 
						else if ( $this->live_validation($name) != "0"  && $overwrite != "1"  )
						{
						  $msg="Name Already Exist. Please define some other name for you Calendar";
    				      $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
	    	              $this->session->set_flashdata('conf_msg', $msg);
				          redirect($pieces[1]);				 
						}
						else
						{  
						   $this->db->insert('calendars', $c_data);
						   $update = "no";
						   $c_id = mysql_insert_id();
						}			
						$row = 0;
						$handle = fopen($temp_csv, "r");
						$query = $this->db->get_where('event_details', array('calendar_id' => $c_id));
						$row1 = $query->first_row();
						 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
						 {
							$row++;
							if($row > '1')
							{
								// convert date into standard format
								$pieces = explode("-", $data[0]);
								$day = $pieces[0]; // Day
								$month = $pieces[1]; // Month
								$year = $pieces[2]; // Year
								$date = $year.'-'.$month.'-'.$day;
								$date = $this->mysqldate($date);			
								$event_details =array(
								'calendar_id' => $c_id,
								'on_date' => $date,
								'definition' => $data[1],								
							  );
							  if($update == "no")  
							  {  				   
							  $this->db->insert('event_details', $event_details);
							  }
							  else
							  {
							  $this->db->update('event_details', $event_details, array('id' => $row1->id));
							  $row1 = $query->next_row();
							  }
							}							   
						 } // end while loop 												
					} // end upload else  
		   } // end validation else 
	     } // end outer if     
		$this->upload_calendar();
	}
	function live_validation($calendar_name)
	{
	   //check if the query returned anything
	   $query = "select id as itisexist from calendars where name='$calendar_name'";
	   $result = mysql_query($query) or die(mysql_error());
	   $line = mysql_fetch_array($result);
	   if ($line['itisexist'] == 0 ) {
			return 0;
		}	 
	   else{ 
	         //exist
		    return $line['itisexist'];
		}		
	}
	
	function mysqldate($date)
	{
       return date("Y-m-d", strtotime($date));
    }
	
	function calendar_details($id)
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$query = $this->db->get_where('event_details', array('calendar_id' => $id));
		$data['event_details'] = $query->result_array();
	    
		$this->parser->parse('projects/calendar_details', $data);
	} 
	function calendar_edit($id , $value="")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$query = $this->db->get_where('event_details', array('calendar_id' => $id));
		$data['event_details'] = $query->result_array();
	
		$this->parser->parse('projects/calendar_edit', $data);
	} 
	function calendar_edited()
	{
	        $this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('id[]', 'Event Selection', 'required|isset');
			$this->form_validation->set_rules('definition[]', 'Even Description', 'required');
			$this->form_validation->set_message('isset', 'Please mark event if you want to edit it');
			$calendar_id= $this->input->post('calendar_id');
			$id = $this->input->post('id');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->calendar_edit($calendar_id, validation_errors());
			}
			else
			{
			  foreach ($id as $id) {
					 $data = array(
						'definition' =>  $_POST['definition'][$id],
						'on_date' => $_POST['date_toggled'][$id],
					);
				  $this->db->update('event_details', $data, array('id' => $id));
			  }// end for loop  
				 $this->upload_calendar();
			}// end else  
				
	       
	}
	function calendar_delete($id)
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$this->db->delete('calendars' , array('id' => $id));
		$this->db->delete('event_details' , array('calendar_id' => $id));	
		redirect('projects/upload_calendar');
	}

	/**
	* Plan selected projects according to selected Process
	*
	* @access public
	**/
	
	function site_planned()
	{
		 $date = $this->input->post('start_date');
		 $process_id = $this->input->post('f');
		 $projects = $this->input->post('project');
		 $project_id = $this->input->post('project_id');
		 $id = $this->input->post('calendars');
		 $off_day1= $this->input->post('off1');
		 $off_day2= $this->input->post('off2');
		 $dates = new Workdays("",  $id, $off_day1, $off_day2);
		 $valid_start_day = $dates->days_diff($date); // if returns 0 not work day
		 if ($valid_start_day == '0')
		 {
			$msg="Given day ".$date." is not a working Day. Please give some other start date.";
			$pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
			$this->session->set_flashdata('conf_msg', $msg);
			redirect( $pieces[1]);
		 }
		 else
		 {
		 // plan the selected projects 
		   $this->projects_model->planned_site( $projects , $date , $process_id , $project_id, $id, $off_day1, $off_day2);
		 }
	     $this->site_plan();
	}
	/**
	* Gives the list of sites which are waiting to be planned and rolled out
	*
	* Takes the Project ID as input, and parameter in order to filter values according to this parameter
	*
	* @access public
	*/
	function site_plan($project_id="", $msg="", $parameter="", $region="", $district="")
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		
		/*$bc = array(
               'title' => 'Site Plam',
               'url' => 'projects/site_plan',
               'isRoot' => false
        );
		$this->breadcrumb->setBreadCrumb($bc);

		$data['breadcrumbs'] =get_Instance()->breadcrumblist->display(); */
		
		if($msg == 0)
		$msg="";
		$s = $this->input->post('s');
		$f = $this->input->post('f');
		if ( $s == '' ) 
		{
			// Sites not planned
			$results_np = $this->projects_model->get_not_planned_sites($project_id, $parameter, $region, $district);
			$data['projects_np']= $results_np['values'];
			$data['error_message']=$msg;
			// Sites not rolled out
			$data['plans'] = $this->projects_model->get_processes();
			$data['calendars'] = $this->projects_model->get_calendars();
			$results_nr = $this->projects_model->get_planned_sites($project_id, $parameter, $region, $district);
			$data['projects_nr'] = $results_nr['values'];	    			
		}
		else
		{
		  $data['projects_np']= $this->projects_model->get_filtered_results($f, $s, 'Created');
		  $data['projects_nr']= $this->projects_model->get_filtered_results($f, $s, 'Planned');
		}		
		$this->parser->parse('projects/site_plan', $data);	
	}
	/**
	* Gives the documents attached to site whose ID has been passed to it
	*
	* Takes the Project ID as input
	*
	* @access public
	*/
	function site_attach_document($id, $state="")
	{    
		$data = tags();
		$data['tabs']	= tabs('projects');
        
		$query = $this->db->get_where('sites' , array('id' => $id));
		$result = $query->result_array();
		$data['site_code']  = $result[0]['name'];
		$data['attachements'] = $this->projects_model->get_attachement($id);
	 
		$_true = array(array());
        $_false = array();
        
		$data['if_att'] = ( $data['attachements'] != NULL ) ? $_true : $_false;
		$data['if_not_att'] = ( $data['attachements'] == NULL) ? $_true : $_false;
		if ( $data['attachements'] == NULL )
		{
		$data['attachements']='No File Attached';
		}		
	    $this->parser->parse('projects/site_attach_documents', $data);	
	}
	/**
	* Create a new project
	*
	* New project is created and retrives the list of all the projects whose status is "Created"
	*
	* @access public
	*/
	function new_project()
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		/*
		   $name = $this->input->post('project_code');
		   $date = $this->input->post('created_on');
		   $code = "PRJ".$name.$date;
		*/
		// save data if submitted
	
		if ($this->input->post('submit') != '')
		{
				$project = array(
				'code' 	=> $this->input->post('project_code'),
				'desc' 	=> $this->input->post('desc'),
				'status' => 'Created',
				'created_on' => $this->input->post('created_on'),
			);			
			$this->db->set($project);
			$this->db->insert('projects');
		}
		// gets the list of project of status 'created'
		$query = $this->db->get_where('projects' , array('status' => 'Created'));
		$data['projects'] = $query->result_array();	
				
		$this->parser->parse('projects/new_project', $data);	
	}
	
	/**
	* Delete the created project whose ID is passed to it
	*
	* Takes the project ID as input.
	*
	* Returns Void
	*
	* @access public
	*/
	function projects_delete($id)
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$this->db->delete('projects' , array('id' => $id, 'status' => 'Created'));	
		redirect('projects/new_project');
	}
	/**
	* returns the details of a prjoect whose id is passed to it and also updates the project details if it is updated.
	*
	* takes project ID as input.
	*
	* @access public
	*/	
	function projects_details($id)
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		if ($this->input->post('submit') != '')
		{
			$project = array(
				'id' 	=> $id,
				'code' 	=> $this->input->post('project_code'),
				'desc' 	=> $this->input->post('desc'),
				'status' => 'Created',
				'created_on' => $this->input->post('created_on'),
			);
			// update project details
			$this->db->update('projects', $project, array('id' => $id));	
		}		
		// gets project details		
		$query = $this->db->get_where('projects' , array('id'=>$id));
		$data['details'] = $query->result_array();
		$this->parser->parse('projects/projects_details', $data);	
	}

	/**
	* uploads file
	*
	* file is upladed and project id is attached to filename in order to keep file name unique
	*
	* @access public
	*/
	function do_upload()
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');    
	   if ($this->input->post('submit') != '')
		{ 
		   $config['upload_path'] = './uploads/';
		   $config['allowed_types'] = 'gif|jpg|png|txt|pdf';
		   $config['max_size']	= '4096';
	       $this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{ 
				echo $error = $this->upload->display_errors();
				$this->parser->parse('/projects/site_attach_documents', $data);      
			}	
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$path= $data['upload_data']['file_path'];
			    $tempFile =$data['upload_data']['file_name'];;
			    $ext = $data['upload_data']['file_ext'];	
					$data = array(
					'site_id' 	=> $this->input->post('id'),
					'stage_id' => $this->input->post('stage_id'),
					'filename' 	=> $tempFile,
					'is_active' 	=> $this->input->post('is_active'),
					'attached_on' => $this->input->post('attached_on'),
				);
			   $id=$this->input->post('id');
			    if ( ! empty($_FILES)) {
                  // renames file from filename to projectID_fileanme
				  rename($path.$_FILES['userfile']['name'], $path.$id.'_'.$tempFile); 
				}
				 //adds attachement related info in database 
				$this->db->insert('attachements', $data); 
				redirect("projects/site_attach_document/$id");					
			}	
		}  
		// redirect to this page when uploaded successfully temporarily.. a suuccess page can be added later
		redirect('projects/site_plan');
	}
	/**
	* Returns the details of site whose ID has been passed to it
	*
	* Takes the Site ID as input.
	*
	* @access public
	*/
	
	function site_details($id)
	{
	   $data = tags();
	   $data['tabs']	= tabs('projects');
	   $data['site_name'] = $this->projects_model->get_site_name($id);
	   $data['site_id'] = $id;
	   // gets the details of site
	   $data['sites_details']= $this->projects_model->get_site_details($id);
       $data['candidates'] = $this->projects_model->get_candidates_in_site($id);
	   // gets candidates for site
	   //$data['candidates'] = 
	   $this->parser->parse('projects/sites_details', $data);
	}
	/**
	* Updates the details of Site
	*
	* Returns Void
	*
	* @access public
	*/
	function site_update()
	{
	   $id = $this->input->post('id');
	   $data = tags();
	   $data['tabs']	= tabs('projects');

		if ($this->input->post('submit') != '')
		{
			$site = array(
				'id' 	=> $id,
				'name' 	=> $this->input->post('name'),
				'division' 	=> $this->input->post('division'),
				'district' 	=> $this->input->post('district'),
				'msc' 	=> $this->input->post('msc'),
				'bsc' 	=> $this->input->post('bsc'),
				'owner_details' 	=> $this->input->post('owner_details'),
				'address' 	=> $this->input->post('address'),
				'nominal_latitude' 	=> $this->input->post('nominal_latitude'),
				'nominal_longitude' 	=> $this->input->post('nominal_longitude'),
				'eirp' 	=> $this->input->post('eirp'),
				'erp' 	=> $this->input->post('erp'),
				'antenna_type' 	=> $this->input->post('antenna_type'),
				'electric_tilt' 	=> $this->input->post('electric_tilt'),
				'mechanical_tilt' => $this->input->post('mechanical_tilt'),
				'azimuths' => $this->input->post('azimuths'),
				'phase' => $this->input->post('phase'),
				'region' => $this->input->post('region'),
				'site_type' => $this->input->post('site_type'),
				'capacity' => $this->input->post('capacity'),
				'height' => $this->input->post('height'),
				'clutter_type' => $this->input->post('clutter_type'),
				'status' => $this->input->post('status'),
				'objectives' => $this->input->post('objectives'),
				'analysis' => $this->input->post('analysis'),
				
			);
			// updates site details in database		
			$this->db->update('sites', $site, array('id' => $id));	
		}
		// get the details of updated site 			
		$query = $this->db->get_where('sites' , array('id'=>$id));
		$data['sites_details'] = $query->result_array();	
		$this->parser->parse('projects/site_details', $data);
	}
	/**
	* Activate the sites waiting to be rolled out by setting its status "Active"
	*
	* Takes the Project ID as input
	*
	* Returns Void
	*
	* @access public
	*/	
	function site_dorollout($site_id, $project_id, $value="")
	{
	    if($value == "" )
		{
		$data = tags();
		$data['tabs']	= tabs('projects');
		}
		else
		{
		 $data['users'] = $value;
		} 
		$data['site_id'] = $site_id;
	    $data['project_id'] = $project_id;
	   
		$query = $this->db->get_where('states' , array('site_id' => $site_id));
		$data['states'] = $query->result_array();
			
		$query2 = $this->db->get('persons');
		$data['user'] = $query2->result_array();
		
		$i=0;
		foreach ($data['states'] as $row)
		{
		    $j=0;
		    foreach ($data['user'] as $row)
			{
			  $data['states'][$i]['users'][$j]['u_id'] = $data['user'][$j]['id'];
			  $data['states'][$i]['users'][$j]['name'] = $data['user'][$j]['name'];
			  $j++;
			}
			$i++;
		}		
		$this->parser->parse('projects/stages_planned', $data);
	}
	function get_users_list()
	{
	    $data['cat'] = $_POST['cat'];
		$data['id'] = $_POST['id'];
		
		$query2 = $this->db->get_where('persons' , array('department' => $data['cat']));
		$data['users'] = $query2->result_array();
		
		    $j=0;
		    foreach ($data['users'] as $row)
			{
			  $data['users'][$j]['u_id'] = $data['users'][$j]['id'];
			  $data['users'][$j]['name'] = $data['users'][$j]['name'];
			  $j++;
			}
			
	      $this->parser->parse('projects/users_list', $data);
	
	}
	function stages_planned($action='' , $id='', $next_state='', $sid='')
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$data['site_id'] = $id;
		
		if($action == 'add'){
		
		   if($this->input->post('Submit') != '')
		   {
			 $site_id = $this->input->post('site_id');
			 $project_id = $this->input->post('project_id');
			
			// change the status of the project to be 'Active'
			$project = array(
					'status' 	=> 'status'+3,				
				);
			$query = $this->db->update('projects' , $project ,array('id' => $project_id));
			// change the status of the site to be 'Active'
			$site = array(
					'status' 	=> 'status'+3,				
				);
			$query = $this->db->update('sites' , $site ,array('id' => $site_id));
			
			// add data
			$i = 0;
			$states = $this->input->post('states');
				foreach ($states as $state_id) {
                     if ($i == 0)
				     {
				        $first_state = $state_id ;
						$i++;   
				     }
				     $data = array(
							'state_id' 	=> $state_id,						
							'actual_start_date' => $_POST['actual_start_date'][$state_id],
							'actual_end_date' =>  $_POST['actual_end_date'][$state_id],
							'user_id' 	=> $_POST['users'][$state_id],
							'percentage_complete' => $_POST['percentage_complete'][$state_id],
					  );
			        $this->db->insert('stages_planned', $data);
			   } // end for loop
			   // mark it as active in state table
			   $state = array(
					'is_active' => '1',				
				);
			   $query = $this->db->update('states' , $state ,array('site_id' => $site_id, 'id' => $first_state));
			   
		     }
			 //$this->site_plan();
			 redirect('projects/site_rollout');
	   }
	   // edit data
	   elseif($action == 'edit' && $id != ''){
	   
	      $states = $this->input->post('states');
	      if($this->input->post('Edit') == 'Plan')
		  {
			   foreach ($states as $state_id) {
			   
				$info = array(
							'state_id' 	=> $state_id,
							'actual_start_date' => $_POST['actual_start_date'][$state_id],
							'actual_end_date' =>  $_POST['actual_end_date'][$state_id],
							'user_id' 	=> $_POST['users'][$state_id],
							'percentage_complete' => $_POST['percentage_complete'][$state_id],
						);
				  
			   $this->db->update('stages_planned', $info, array('state_id' => $state_id));
			   }
			   redirect('projects/site_rollout');
		   }
		   $site_id = $id;
		   $query = $this->db->get_where('states' , array('site_id' => $site_id));
		   $data['states'] = $query->result_array();
			
		   $query2 = $this->db->get('persons');
		   $data['user'] = $query2->result_array();
		   
		   $data['planned_stages'] = $this->projects_model->get_planned_stages($site_id); 
		
		   $i=0;
		   foreach ($data['planned_stages'] as $row)
		   {
		    $j=0;
		    foreach ($data['user'] as $k=>$v)
			{
				if($v['id'] == $row['user_id'])
				{
					$data['states'][$i]['users'][$j]['selected'] = "selected";

				} else{
					$data['states'][$i]['users'][$j]['selected'] = "";
		
				} 
			  $data['states'][$i]['users'][$j]['u_id'] = $data['user'][$j]['id'];
			  $data['states'][$i]['users'][$j]['name'] = $data['user'][$j]['name'];
			  $j++;
			}
			$i++;
		   }
		   //=========== Department Drop down menu ====================		
		   $data['department'] = $this->admin_model->get_department();
		   //====================================================
		   $action =  'projects/edit_stages_planned';
	   }
	   // delete stage
	   elseif($action == 'delete' && $id != ''){
	      			
		 $this->db->delete('states' , array('id' => $id ));
		 $this->db->delete('stages_planned' , array('state_id' => $id ));
		 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		 redirect($pieces[1]);
	     
	   }
	   // mark it complete
	   elseif($action == 'mark_complete' && $id != '')
	   {
	       $update = array(
		        'is_active' 	=> '0',
				'is_complete' 	=> '1',
			);			
		 $this->db->update('states', $update, array('id' => $id));
		 // Activate next state
		
		 $next_state_id = $this->projects_model->get_next_stage($id, $next_state, $sid);
		 if ($next_state_id != NULL)
		 {
		   $update = array(
		        'is_active' 	=> '1',
				'is_complete' 	=> '0',
			);			
		   $this->db->update('states', $update, array('id' => $next_state_id));
		 }
		 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		 redirect($pieces[1]);
	   }
	   
	   $this->parser->parse($action, $data);
	}
	/**
	* Delete the attachement by just changing its status to be inactive 
	*
	* Takes the Project ID as input and attachment ID as input
	*
	* Returns Void
	*
	* @access public
	*/
	function attachment_delete($id,$project_id)
	{
	    $update = array(
				'is_active' 	=> '0',
			);			
		 $this->db->update('attachements', $update, array('id' => $id));
		 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		 //redirects it to previous page where it was, page is refreshed when attachment is deleted
		 redirect($pieces[1]);	
	}
	/**
	* Gets all the attachments from databsse waiting to be rolled out
	*
	* Returns Void
	*
	* @access public
	*/
	function planing_documents()
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$query = $this->db->get_where('attachements', array('is_active'=>'0'));
		$rows=$query->num_rows();
		// Do the pagination
		$config['base_url'] = BASE_URL . 'index.php/projects/planing_documents';
		$config['uri_segment'] = '3';
		$config['total_rows'] = $rows;
		$config['per_page'] = $limit = '10';

		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		$s = $this->input->post('s');
		// get the list of attachment which are not rolled out yet.
    	$data['attachements'] = $this->projects_model->get_planning_documents($limit,$this->uri->segment(3), $s);				
		$this->parser->parse('projects/planing_documents', $data);	
	} 
	/**
	* Gets list of sites in the process of being rolled out
	*
	* Returns Void
	*
	* @access public
	*/
	function site_rollout($process_id = "", $project_id = "", $parameter="", $region="", $district="",$offset = "" )
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$s = $this->input->post('s');
		$f = $this->input->post('f');
	
	    if( $process_id == 'none' || $process_id == "" || $process_id == 0)
		{
		  $process_id = 1;
		  $pass_process_id = 'none';
		}
		else
		{ 
		  $pass_process_id = $process_id ;
		}
	
		//Gets list of sites at different stages
		$this->db->where('process_id', $process_id);
        $this->db->from('process_details');
        $rows =$this->db->count_all_results();
		
		$ts=$this->uri->total_segments();
        $offset= $this->uri->segment($ts);

	    $config['base_url'] = BASE_URL . 'index.php/projects/site_rollout/'.$pass_process_id.'/'.$project_id.'/'.$parameter.'/'.$region.'/'.$district;
		// Do the pagination
		$config['uri_segment'] = $ts;
		$config['total_rows'] = $rows;
		$config['per_page'] = $limit = '10';
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		// get the list of stages  

		$result =$data['states']= $this->projects_model->get_process($limit, $offset, $process_id);	
		
		$i=0;
		foreach ($result as $row)
		{
			$data['states'][$i]['stage'] = $data['states'][$i]['stage'];
			$result1 =  $this->projects_model->get_rolledout_sites($s, $f, $data['states'][$i]['stage'], $pass_process_id, $project_id, $parameter, $region, $district );
	        $data['states'][$i]['definition'] = $result1['values']; 

			$_true = array(array());
			$_false = array();
			$data['states'][$i]['if_found'] = ( $data['states'][$i]['definition'] != NULL ) ? $_true : $_false;
			$data['states'][$i]['if_not_found'] = ( $data['states'][$i]['definition'] == NULL) ? $_true : $_false;    
			$i++;
		}
				
		$this->parser->parse('projects/site_rollout', $data);	
	} 
	/**
	* Gets list Showing the details of site like candidated, activities , surveys and attachments
	*
	* Takes the site id as input
	*
	* Returns Void
	*
	* @access public
	*/	
	function rollout_details($sid, $pid, $name, $state_id="", $cid="")
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$data['pid'] = $pid;			

		$site_id = $sid;
		$data['sid'] = $site_id;
		$data['name'] = $name;
	    $data['state_id'] = $state_id;
		$query = $this->db->get_where('candidates' , array('site_id' => $site_id));
		$total = $query->num_rows();
		$data['candidates'] = $query->result_array();
        for ($i = 0; $i < $total; $i++)
		{
			$_true = array(array());
			$_false = array();
			
			$data['candidates'][$i]['if_active'] = ( $data['candidates'][$i]['isactive'] == '1' ) ? $_true : $_false;
			$data['candidates'][$i]['if_not_active'] = ( $data['candidates'][$i]['isactive'] == '0') ? $_true : $_false;
		}
		
		$_true = array(array());
        $_false = array();
        
		$data['if_candidate'] = ( $data['candidates'] != NULL ) ? $_true : $_false;
		$data['if_not_candidate'] = ( $data['candidates'] == NULL) ? $_true : $_false;
		
		if ( $data['candidates'] == NULL )
		{
		$data['candidates']='No Candidate for this site yet';
		//$data['pid'] = $id;
		$data['sid']= $site_id;	
		}
		else
		{  
			if ($cid == 0)
			{
				$query = $this->db->get_where('candidates' , array('site_id' => $site_id, 'isactive'=> 1),1);
				$row = $query->result_array();
			} else {	
				$query = $this->db->get_where('candidates' , array('id' => $cid),1);
				$row = $query->result_array();		
			}
			$data['if_active'] = ($query->num_rows > 0 ) ? $_true : $_false;
			$data['if_not_active'] = ($query->num_rows == 0 ) ? $_true : $_false;
			if($query->num_rows > 0)
			{
			  $cid = $row[0]['id'];
			  $data['cid']=$cid;
			  $data['cname'] = $row[0]['code'];
		    
			//get activities
			$this->db->order_by('activity_on','desc');
			$query = $this->db->get_where('activities' , array('candidate_id' => $cid));
			$data['activities'] = $query->result_array();
			// checks
			$data['if_activities'] = ( $data['activities'] != NULL ) ? $_true : $_false;
		    $data['if_not_activities'] = ( $data['activities'] == NULL) ? $_true : $_false;
			//get surveys
			$query = $this->db->get_where('surveys' , array('candidate_id' => $cid));			
			$data['surveys'] = $query->result_array();
			// checks
			$data['if_surveys'] = ( $data['surveys'] != NULL ) ? $_true : $_false;
		    $data['if_not_surveys'] = ( $data['surveys'] == NULL) ? $_true : $_false;	
			//get attachements
			//$sql = "SELECT distinct * FROM attachements a JOIN (SELECT project_id as pid FROM sites s JOIN candidates c ON s.id = c.site_id WHERE c.id = '$cid') st ON st.pid = a.project_id WHERE a.is_active='1'";
			$sql = "SELECT distinct * FROM attachements a JOIN (SELECT s.id as sid FROM sites s JOIN candidates c ON s.id = c.site_id WHERE c.id = '$cid') st ON st.sid = a.site_id WHERE a.is_active='1'";
			
			$query = $this->db->query($sql);
			$data['attachements'] = $query->result_array();
			//checks
			$data['if_attachements'] = ( $data['attachements'] != NULL ) ? $_true : $_false;
		    $data['if_not_attachements'] = ( $data['attachements'] == NULL) ? $_true : $_false;
			}					
		}		 		
		$this->parser->parse('projects/rollout_details', $data);	
	}
	/**
	* Gets list Showing all of the activities on sites
	*
	* Returns Void
	*
	* @access public
	*/	
	function rollout_log()
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$s= $this->input->post('s');
		// show all activities on sites
		$query = $this->db->get( 'activities' );
	    $rows=$query->num_rows();
		// Do the pagination
		$config['base_url'] = BASE_URL . 'index.php/projects/rollout_log';
		$config['uri_segment'] = '3';
		$config['total_rows'] = $rows;
		$config['per_page'] = $limit = '15';
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
    	$data['activities'] = $this->projects_model->get_activities($limit,$this->uri->segment(3), $s);			
		$this->parser->parse('projects/rollout_log', $data);	
	}
	/**
	* Gets list of all active doucments (documents which are rolled out)
	*
	* Returns Void
	*
	* @access public
	*/
	function rollout_documents()
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$s=$this->input->post('s');
		$config['base_url'] = BASE_URL . 'index.php/projects/rollout_documents';
		
		$query = $this->db->get_where('attachements', array('is_active'=>'1'));
		$rows=$query->num_rows();
		// Do the pagination
		$config['uri_segment'] = '3';
		$config['total_rows'] = $rows;
		$config['per_page'] = $limit = '10';
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		// get the list of attachment which are rolled out.
    	$data['rolled_out_doc'] = $this->projects_model->get_rolledout_documents($limit,$this->uri->segment(3), $s);		
		$this->parser->parse('projects/rollout_documents', $data);	
	}
	/**
	* Redirects to add_activity form page
	*
	* Takes project ID , Site ID and Client ID as input
	*
	* Returns Void
	*
	* @access public
	*/
	function add_activity($pid, $sid, $name, $state_id, $cid)
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$data['pid']= $pid;
		$data['sid']= $sid;
	    $data['cid']= $cid;
		$data['state_id'] = $state_id;
		$data['sname'] = $name;
		$result = $this->projects_model->get_site_details($sid);
		$data['sname'] = $result[0]['name'];
	    $this->parser->parse('projects/activity_add', $data);
	}
	/**
	* Adds an activity on a site
	*
	* Returns Void
	*
	* @access public
	*/
	function activity_added()
	{  
               $pid=$this->input->post('pid');
			   $sid=$this->input->post('sid');
			   $cid=$this->input->post('cid');
			   $state_id=$this->input->post('state_id');
			   $sname=$this->input->post('sname');
			   
	           $data = array(
					'project_id' 	=> $this->input->post('pid'),
					'site_id' => $this->input->post('sid'),
					'state_id' => $this->input->post('state_id'),
                    'candidate_id' =>  $this->input->post('cid'),
  					'type' 	=> $this->input->post('type'),
					'subject' 	=> $this->input->post('act_subject'),
					'desc' => $this->input->post('act_desc'),
					'comments' => $this->input->post('act_comments'),
					'activity_by' => $this->input->post('activity_by'),
					'activity_on' => $this->input->post('act_date'),
				);			  
				$this->db->insert('activities', $data);
				$this->rollout_details($sid,$pid,$sname,$cid); 
	}
	/**
	* Taked Activity Id, Project Id, Site ID and Candidate Id as input
	*
	* Directs to activity update page
	*
	* @access public
	*/
	function activity_update($id, $pid, $sid, $cid, $state_id)
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$data['id']= $id;
		$data['pid']= $pid;
		$data['sid']= $sid;
	    $data['cid']= $cid;
		$data['state_id']= $state_id;
		$query = $this->db->get_where('activities' , array('id'=>$id));
		$data['a_details'] = $query->result_array();
	    $this->parser->parse('projects/activity_edit', $data);
	}
	/**
	* edit acitvity
	*
	* Takes Activity ID, Site ID , Project ID and Candidate ID as input
	*
	* Returns Void
	*
	* @access public
	*
	*/
	function activity_edit()
	{  
	           $id= $this->input->post('id');
	           $data = array(
					'project_id' 	=> $this->input->post('pid'),
					'site_id' => $this->input->post('sid'),
					'state_id' => $this->input->post('state_id'),
                    'candidate_id' =>  $this->input->post('cid'),
  					'type' 	=> $this->input->post('type'),
					'subject' 	=> $this->input->post('act_subject'),
					'desc' => $this->input->post('act_desc'),
					'comments' => $this->input->post('act_comments'),
					'activity_by' => $this->input->post('activity_by'),
					'activity_on' => $this->input->post('act_date'),
				);
				$this->db->update('activities', $data, array('id' => $id));			  
				$this->rollout_log(); 
	}
	/**
	* Redirects to add_candidate form page
	*
	* Takes Site ID and Project ID as input
	*
	* Returns Void
	*
	* @access public
	*/
	function candidate_add($sid, $pid, $name)
	{
		    $data = tags();
			$data['tabs']	= tabs('projects');
			//$data['projects_menu'] = $this->projects_model->menu();
			$data['sid']= $sid;
			$data['pid']= $pid;
			$result = $this->projects_model->get_site_details($sid);
			$data['sname'] = $result[0]['name'];
			// create code according to alphabetic
		    $query = $this->db->get_where('candidates', array('site_id' => $sid));
			if ($query->num_rows() > 0)
			{
			   $row = $query->last_row();
			   $i = ord($row->code);
			   $i=$i+1;
			   // i should be less than 90 (65 to 90)
			   if( $i >90)
			   {
			     $this->rollout_details($sid,$pid,$name); 
			   } 
			   $data['code'] = chr($i); 
			}
			else
			{
			  //for ($i=65; $i<=90; $i++) { 
			  $Letter = chr(65); 
			  $data['code'] = $Letter;
			} 	
		    $this->parser->parse('projects/add_candidate', $data);
	}
	/**
	* Adds a candidate on a site
	*
	* Returns Void
	*
	* @access public
	*/
	function candidate_added()
	{
		$sid=$this->input->post('sid');
		$pid= $this->input->post('pid');
		$sname=$this->input->post('sname');
        if($this->input->post('submit') != '')
		{ 
		  $data = array(
					'site_id' => $this->input->post('sid'),
                    'code' =>  $this->input->post('code'),
  					'latitude' 	=> $this->input->post('latitude'),
					'longitude' 	=> $this->input->post('longitude'),
					'candidate_distance' => $this->input->post('candidate_distance'),
					'approval1' => $this->input->post('approval1'),
					'approval2' => $this->input->post('approval2'),
					'approval3' => $this->input->post('approval3'),
					'approval4' => $this->input->post('approval4'),
					'approval5' => $this->input->post('approval5'),
					'power_connection' => $this->input->post('power_connection'),
					'gen_set' => $this->input->post('gen_set'),
					'others' => $this->input->post('others'),
				);			  
				$this->db->insert('candidates', $data);
		}
				$this->rollout_details($sid, $pid, $sname); 
	}
	function view_candidate( $site_id = "", $candidate_id = "")
	{
	        $data = tags();
			$data['tabs']	= tabs('projects');
			$data['site_id']= $site_id;
			
		    $query = $this->db->get_where('candidates', array('id' => $candidate_id));
            $data['candidate'] = $query->result_array();	
		    $this->parser->parse('projects/view_candidate', $data);
	}
	/**
	* Marks a candidate active
	*
	* Takes candidate as input
	*
	* Returns Void
	*
	* @access public
	*/
	function candidate_active($c_id, $sid, $pid, $sname)
	{
		  $result = $this->projects_model->get_candidate_details($c_id);
		  $status = $result[0]['isactive'];
		  if($status == '0')
		  {
			 $update = array(
					'isactive' 	=> '1',
				);
		  }
		  else
		  {
		  $update = array(
					'isactive' 	=> '0',
				);
		  }			
		 $this->db->update('candidates', $update, array('id' => $c_id));
		 $this->rollout_details($sid, $pid, $sname); 
		/* $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		 //redirects it to previous page where it was, page is refreshed and candidate is marked active
		 redirect($pieces[1]); */
	}
	/**
	* Upload candidates against a site from excel or csv file
	*
	* Takes site Id, project Id and site name as input
	*
	* Returns Void and uploads candidates against a site
	*
	* @access public
	*/
	
	function candidate_upload($site_id="" , $project_id="", $name="")
	{
	     $data = tags();
		 $data['tabs']	= tabs('projects');
		 $data['redirect']= "candidate_upload";
		 $data['import'] = "Candidate";
		 $site_id = $data['site_id'] = ($site_id == "") ? $this->input->post('site_id') : $site_id;
		 $project_id = $data['project_id']=($project_id=="") ? $this->input->post('project_id') : $project_id;
		 $s_name = $data['site_name'] =($name=="") ? $this->input->post('site_name') : $name;
		 //$this->form_validation->set_error('There was a problem with the CSV import, please try another file'); 
		 
		 if ($this->input->post('submit') != '')
		 { 
		    $mypath = './uploads';
		    if (!is_dir($mypath))
		    {
				mkdir($mypath,0777,TRUE);
		    }
	        $this->form_validation->set_rules('userfile', 'File', 'callback_userfile');
            if($this->form_validation->run($this) == FALSE)
			{ 
				$this->parser->parse('/projects/upload_candidate', $data);      
			}	
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$path= $data['upload_data']['file_path'];
				$tempFile =$data['upload_data']['file_name'];
				$temp_csv = $_FILES['userfile']['tmp_name'];
				
				$row = 0;
				$handle = fopen($temp_csv, "r");
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {		
				$row++;
				if($row > '1')
				{  
					$candidates =array(
				    'site_id' => $site_id,
					'code' => $data[1],
				    'latitude' => $data[2],
				    'longitude' =>$data[3],
				    'candidate_distance' =>$data[4],
					'approval1'=>$data[5],
					'approval2' =>$data[6],
					'approval3' =>$data[7],
					'approval4' =>$data[8],
					'approval5' =>$data[9],
					'power_connection' =>$data[10],
					'gen_set' =>$data[11],
					'others' =>$data[12],
					'isactive' =>$data[13]		
				  );
				    $validation_value = $this->projects_model->validate_candidate_info($data); 

					if ($validation_value == '')
				    { 
					   if( strcmp($s_name, $data[0]) == 0 )
					   {
							$query = "select count(*) as itisexist from candidates where site_id='$site_id' && code='$data[1]' ";
							$result = mysql_query($query) or die(mysql_error());
							$line = mysql_fetch_array($result);		
							if ($line['itisexist'] == 0 ) {
	
							   $this->db->insert('candidates', $candidates);
							}				        
					   }
					   else
					   {
						 $msg="Plan can not be imported as given site name does not match selected site name";
						 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
						 $this->session->set_flashdata('conf_msg', $msg);
						 redirect( $pieces[1]);				   
					   }
					 }
					 else
					 {
					     $msg="File can not be imported completely as format of ".$validation_value." field for candidate ".$data[1]." is not correct";
						 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
						 $this->session->set_flashdata('conf_msg', $msg);
						 redirect( $pieces[1]);
					 }
			     } // end if			   
				} // end while loop
				@unlink($path.$tempFile); // delete file
				$this->rollout_details($site_id,$project_id,$s_name); 												
			} // end else 
	     } // end outer if 
		 else
		 {   
		  $this->parser->parse('projects/upload_candidate', $data);
	     }
	}
    /**
	* Upload activities against a candidate of site from excel or csv file
	*
	* Takes site Id, project Id, Candidate Id and site name as input
	*
	* Returns Void and uploads candidates against a site
	*
	* assumes format of file is first field describes type of activity
	*
	* @access public
	*/
	
	function activity_upload($site_id="" , $project_id="", $name="", $state_id="", $candidate_id="")
	{
	     $data = tags();
		 $data['tabs']	= tabs('projects');
		 $data['redirect']= "activity_upload";
		 $data['import'] = "Activities";
		 $site_id = $data['site_id'] = ($site_id == "") ? $this->input->post('site_id') : $site_id;
		 $project_id = $data['project_id']=($project_id=="") ? $this->input->post('project_id') : $project_id;
		 $s_name = $data['site_name'] =($name=="") ? $this->input->post('site_name') : $name;
		 $state_id = $data['state_id'] =($state_id=="") ? $this->input->post('state_id') : $state_id;
		 $candidate_id =  $data['candidate_id'] =($candidate_id=="") ? $this->input->post('candidate_id') : $candidate_id;
		 if ($this->input->post('submit') != '')
		{ 
			$mypath = './uploads';
			if (!is_dir($mypath))
			{
				mkdir($mypath,0777,TRUE);
			}
		    $this->form_validation->set_rules('userfile', 'File', 'callback_userfile');
            if($this->form_validation->run($this) == FALSE)
			{ 
				$this->parser->parse('/projects/upload_candidate', $data);      
			}	
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$path= $data['upload_data']['file_path'];
				$tempFile =$data['upload_data']['file_name'];
				$temp_csv = $_FILES['userfile']['tmp_name'];
				
				$row = 0;
				$handle = fopen($temp_csv, "r");
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$row++;
				// don't insert header row
				if($row > '1')
				{   	
					$activities =array(
				    'project_id' => $project_id,
					'site_id' => $site_id,
					'state_id' => $state_id,
				    'candidate_id' => $candidate_id,
				    'type' =>$data[0],
				    'subject' =>$data[1],
					'desc'=>$data[2],
					'comments' =>$data[3],
					'activity_by' =>$data[4],
					'activity_on' =>$data[5],		
				  );
                  
				  $validation_value = $this->projects_model->validate_activity_info($data); 

				  if ($validation_value == '')
				  { 
					$this->db->insert('activities', $activities);
				  }
				  else
				  {
					 $msg="File can not be imported completely as format of ".$validation_value." field is not correct";
					 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
					 $this->session->set_flashdata('conf_msg', $msg);
					 redirect( $pieces[1]);
				  }
			     } // end if			   
				} // end while loop
				@unlink($path.$tempFile); // delete file
				$this->rollout_details($site_id,$project_id,$s_name); 												
			} // end else 
	     } // end outer if 
		 else
		 {   
		  $this->parser->parse('projects/upload_candidate', $data);
	     }
	}
	  /**
	* Upload surveys against a candidate of site from excel or csv file
	*
	* Takes site Id, project Id, Candidate Id and site name as input
	*
	* Returns Void and uploads candidates against a site
	*
	* assumes format of file is first field describes category
	*
	* @access public
	*/
	
	function survey_upload($site_id="" , $project_id="", $name="", $state_id="", $candidate_id="")
	{
	     $data = tags();
		 $data['tabs']	= tabs('projects');
		 $data['redirect']= "survey_upload";
		 $data['import'] = "Surveys";
		 $site_id = $data['site_id'] = ($site_id == "") ? $this->input->post('site_id') : $site_id;
		 $project_id = $data['project_id']=($project_id=="") ? $this->input->post('project_id') : $project_id;
		 $s_name = $data['site_name'] =($name=="") ? $this->input->post('site_name') : $name;
		 $state_id = $data['state_id'] =($state_id=="") ? $this->input->post('state_id') : $state_id;
		 $candidate_id =  $data['candidate_id'] =($candidate_id=="") ? $this->input->post('candidate_id') : $candidate_id;
		 if ($this->input->post('submit') != '')
		{ 
			$mypath = './uploads';
			if (!is_dir($mypath))
			{
				mkdir($mypath,0777,TRUE);
			}
		    $this->form_validation->set_rules('userfile', 'File', 'callback_userfile');
            if($this->form_validation->run($this) == FALSE)
			{ 
				$this->parser->parse('/projects/upload_candidate', $data);      
			}	
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$path= $data['upload_data']['file_path'];
				$tempFile =$data['upload_data']['file_name'];
				$temp_csv = $_FILES['userfile']['tmp_name'];
				
				$row = 0;
				$handle = fopen($temp_csv, "r");
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$row++;
				if($row > '1')
				{   	
					$surveys =array(
					'site_id' => $site_id,
				    'candidate_id' => $candidate_id,
					'state_id' => $state_id,
				    'category' =>$data[1],
				    'type' =>$data[2],
					'area'=>$data[3],
					'latitude' =>$data[4],
					'longitude' =>$data[5],
					'candidate_distance' =>$data[6],
					'proposed_antenna_height' =>$data[7],
					'antenna_height'=>$data[8],
					'site_type' =>$data[9],
					'clutter_type' =>$data[10],
					'building_height' =>$data[11],
					'parapet_height' =>$data[12],
					'rbs_type' => $data[13],
					'structure_type' => $data[14],
					'structure_height' => $data[15],
					'azimuths' => $data[16],
					'tilt' => $data[17],
					'feeder_type' => $data[18],
					'feeder_length' => $data[19],
					'site_objective' => $data[20],
					'site_address' => $data[21],
					'coverage_area_prediction' => $data[22],
					'coverage_area1' => $data[23],
					'coverage_area2' => $data[24],
					'coverage_area3' => $data[25],
					'ranking' => $data[26],
					'remarks' => $data[27],
					'engineer' => $data[28],
					'status' => $data[29],
					'reason' => $data[30],
					'comments' => $data[31],
					'summary' => $data[32],
					'survey_on' => $data[33],
				  );
                  
				  $validation_value = $this->projects_model->validate_survey_info($data); 

				  if ($validation_value == '')
				  { 
					$this->db->insert('surveys', $surveys);
				  }
				  else
				  {
					 $msg="File can not be imported completely as format of ".$validation_value." field is not correct";
					 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
					 $this->session->set_flashdata('conf_msg', $msg);
					 redirect( $pieces[1]);
				  }
			     } // end if			   
				} // end while loop
				@unlink($path.$tempFile); // delete file
				$this->rollout_details($site_id,$project_id,$s_name); 												
			} // end else 
	     } // end outer if 
		 else
		 {   
		  $this->parser->parse('projects/upload_candidate', $data);
	     }
	}

	/**
	* Redirects to add_survey form page
	*
	* Takes Site ID , Project ID and Client ID as input
	*
	* Returns Void
	*
	* @access public
	*/
	function survey_add($pid, $sid, $name, $cid)
	{
	        $data = tags();
			$data['tabs']	= tabs('projects');

			$data['sid']= $sid;
			$data['cid']= $cid;
			$data['pid']= $pid;
			$data['sname'] = $name;
			$result = $this->projects_model->get_site_details($sid);
			$data['sname'] = $result[0]['name'];
		$this->parser->parse('projects/survey_add', $data);
	}
	/**
	* Adds a survey on a site
	*
	* Returns Void
	*
	* @access public
	*/
	function survey_added()
	{
        $pid=$this->input->post('pid');
		$sid=$this->input->post('sid');
		$name=$this->input->post('sname');
		$cid = $this->input->post('cid');
		$data = array(
					'site_id' => $this->input->post('sid'),
					'candidate_id' => $this->input->post('cid'),
					'category' => $this->input->post('category'),
                    'type' =>  $this->input->post('type'),
					'area' => $this->input->post('area'),
  					'latitude' 	=> $this->input->post('latitude'),
					'longitude' 	=> $this->input->post('longitude'),
					'candidate_distance' => $this->input->post('candidate_distance'),
					'proposed_antenna_height' => $this->input->post('proposed_antenna_height'),
					'antenna_height' => $this->input->post('antenna_height'),
					'site_type' => $this->input->post('site_type'),
					'clutter_type' => $this->input->post('clutter_type'),
					'building_height' => $this->input->post('building_height'),
					'parapet_height' => $this->input->post('parapet_height'),
					'rbs_type' => $this->input->post('rbs_type'),
					'structure_type' => $this->input->post('structure_type'),
					'structure_height' => $this->input->post('structure_height'),
					'azimuths' => $this->input->post('azimuths'),
					'tilt' => $this->input->post('tilt'),
					'feeder_type' => $this->input->post('feeder_type'),
					'feeder_length' => $this->input->post('feeder_length'),
					'site_address' => $this->input->post('site_address'),
					'coverage_area_prediction' => $this->input->post('coverage_area_prediction'),
					'coverage_area1' => $this->input->post('coverage_area1'),
					'coverage_area2' => $this->input->post('coverage_area2'),
					'coverage_area3' => $this->input->post('coverage_area3'),
					'ranking' => $this->input->post('ranking'),
					'remarks' => $this->input->post('remarks'),
					'engineer' => $this->input->post('engineer'),
					'status' => $this->input->post('status'),
					'reason' => $this->input->post('reason'),
					'comments' => $this->input->post('comments'),
					'summary' => $this->input->post('summary'),
					'survey_on' => $this->input->post('survey_on'),
					
				);			  
				$this->db->insert('surveys', $data);
				$this->rollout_details($sid,$pid,$name,$cid); 
	}
	/**
	* Shows the details of survey
	*
	* Takes the ID of site as input
	*
	* @access public
	*/		
	function survey_details($id)
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		//gets the details of site		
		$query = $this->db->get_where('surveys' , array('id'=>$id));
		$data['survey_details'] = $query->result_array();
		$this->parser->parse('projects/survey_details', $data);	
	}
	/**
	* Redirects to survey_eidt form page
	*
	* Takes Survey ID, Site ID , Project ID and Client ID as input
	*
	* Returns Void
	*
	* @access public
	*/
	function survey_update($id, $sid, $cid, $pid)
	{
	        $data = tags();
			$data['tabs']	= tabs('projects');

			$data['sid']= $sid;
			$data['cid']= $cid;
			$data['pid']= $pid;
			$query = $this->db->get_where('surveys' , array('id'=>$id));
		    $data['s_details'] = $query->result_array();
		    $this->parser->parse('projects/survey_edit', $data);
	}
	/**
	* Updates a survey on a site
	*
	* Returns Void
	*
	* @access public
	*/
	function survey_edit()
	{  
	  	$data = tags();
		$data['tabs']	= tabs('projects');
        $pid=$this->input->post('pid');
		$id= $this->input->post('id');
		if ($this->input->post('submit') != '')
		{
			$project = array(
				    'site_id' => $this->input->post('sid'),
					'candidate_id' => $this->input->post('cid'),
					'category' => $this->input->post('category'),
                    'type' =>  $this->input->post('type'),
					'area' => $this->input->post('area'),
  					'latitude' 	=> $this->input->post('latitude'),
					'longitude' 	=> $this->input->post('longitude'),
					'candidate_distance' => $this->input->post('candidate_distance'),
					'proposed_antenna_height' => $this->input->post('proposed_antenna_height'),
					'antenna_height' => $this->input->post('antenna_height'),
					'site_type' => $this->input->post('site_type'),
					'clutter_type' => $this->input->post('clutter_type'),
					'building_height' => $this->input->post('building_height'),
					'parapet_height' => $this->input->post('parapet_height'),
					'rbs_type' => $this->input->post('rbs_type'),
					'structure_type' => $this->input->post('structure_type'),
					'structure_height' => $this->input->post('structure_height'),
					'azimuths' => $this->input->post('azimuths'),
					'tilt' => $this->input->post('tilt'),
					'feeder_type' => $this->input->post('feeder_type'),
					'feeder_length' => $this->input->post('feeder_length'),
					'site_address' => $this->input->post('site_address'),
					'coverage_area_prediction' => $this->input->post('coverage_area_prediction'),
					'coverage_area1' => $this->input->post('coverage_area1'),
					'coverage_area2' => $this->input->post('coverage_area2'),
					'coverage_area3' => $this->input->post('coverage_area3'),
					'ranking' => $this->input->post('ranking'),
					'remarks' => $this->input->post('remarks'),
					'engineer' => $this->input->post('engineer'),
					'status' => $this->input->post('status'),
					'reason' => $this->input->post('reason'),
					'comments' => $this->input->post('comments'),
					'summary' => $this->input->post('summary'),
					'survey_on' => $this->input->post('survey_on'),
			);
			$this->db->update('surveys', $project, array('id' => $id));	
		}
		$this->rollout_details($pid,0); 
	}
	/**
	* Gives list of projects/sites in the state of being rolled out.
	*
	* Returns Void
	*
	* @access public
	*/
	function project_monitoring()
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$s=$this->input->post('s');
		$data['project_monitoring']= $this->projects_model->get_project_monitoring($s);		
		$this->parser->parse('projects/project_monitoring', $data);	
	}
	/**
	* Gives list of surveys on site whose id has been passed to it
	*
	* Takes the site ID as input
	*
	* Returns Void
	*
	* @access public
	*/
	function surveys_on_site($site_id)
	{  
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$data['surveys']= $this->projects_model->get_survey_on_site($site_id);		
		$this->parser->parse('projects/surveys_on_site', $data);	
	}
	/**
	* Shows list of all the sites rolled out (status = "Active")	
	*
	* Returns Void
	*
	* @access public
	*/
	function site_closing()
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$s = $this->input->post('s');
		$f = $this->input->post('f');
		$data['closing_sites']= $this->projects_model->get_closing_sites($s, $f);		
		$this->parser->parse('projects/site_closing', $data);	
	}
	/**
	* Shows list of the documents attached to all of the sites at closing stage	
	*
	* Returns Void
	*
	* @access public
	*/
	function closing_documents()
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$s = $this->input->post('s');
		$data['closing_attachments'] = $this->projects_model->get_closing_documents( $s );			
		$this->parser->parse('projects/closing_documents', $data);	
	}	
	/**
	* Shows list of all the sites handed over and waiting for final closing of projects (project whose status="Active")	
	*
	* Returns Void
	*
	* @access public
	*/				
	function close_project()
	{
		$data = tags();
		$data['tabs']	= tabs('projects');
		$s = $this->input->post('s');
		$data['closing_projects']= $this->projects_model->get_closing_projects($s);
		$this->parser->parse('projects/close_project', $data);	
	}
	/**
	* closes the project whose ID has been passed (set status="Active")	
	*
	* Take the project ID as input
	*
	* Returns Void
	*
	* @access public
	*/
	function project_closed($id)
	{
		// change the status="Completed"
		$update = array(
				'status' 	=> 'status'+5,
			);			
		 $this->db->update('projects', $update, array('id' => $id));
		 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		 //redirects it to previous page where it was, page is refreshed when project is closed
		 redirect($pieces[1]);
	}	


	/**
	* Directs to Nominal Plan Page
	*
	*/	
	function nominal_plans()
	{
	  $data = tags();
	  $data['tabs']	= tabs('projects');
	  $data['projects_title'] = 'Projects - Nominal Plan';
	  $this->parser->parse('projects/nominal_plans', $data);	
	}
	/**
	* Take type as input
	*
	* if type is '0' then directs to import plan page and if type is '1' then directs to view list of plan page
	*
	* @access public
	*/			
	function create_plan($value, $msg="")
	{
	  $data = tags();
	  $data['tabs']	= tabs('projects');
	  $data['projects_title'] = 'Projects - Nominal Plan';
       // import plan
	  if($value == '0')
	  {
	  $query = $this->db->get_where('projects' ,array('status' => "Created") ,$this->db->order_by("id", "asc"));
	  $data['projects']=$query->result_array();
	  $data['error_message']=$msg;
	  $this->parser->parse('projects/import_plan', $data);
	  }
	  // view existing plans
	  else
	  { 
	    
        $this->db->from('nominal_plan');
        $rows =$this->db->count_all_results();
	    $config['base_url'] = BASE_URL . 'index.php/projects/create_plan/'.$value;
		// Do the pagination
		$config['uri_segment'] = '4';
		$config['total_rows'] = $rows;
		$config['per_page'] = $limit = '20';
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		// get the list of stages
	    $data['plan']= $this->projects_model->get_nominal_plans($limit, $this->uri->segment(4));
		/*$i=0;
		foreach($data['plan'] as $row)
		{
		  $data['plan'][$i]['project_name']=$this->projects_model->get_project_name($data['plan'][$i]['project_id']);
		  $i++;
		}*/
	  //$query=$this->db->get('nominal_plans');
	  //$data['plan']=$query->result_array();
	  $this->load->library('form_validation');
	  $this->parser->parse('projects/existing_plan', $data);
	  } 
	}
	/**
	* Plan is uploaded and the values are inserted into database
	*
	* shows imported plan
	*/	
	function plan_imported()
	{
	    if ($this->input->post('submit') != '')
		{ 
			$mypath = './uploads';
			if (!is_dir($mypath))
			{
				mkdir($mypath,0777,TRUE);
			}
		   $config['upload_path'] = './uploads/';
		   $config['allowed_types'] = 'gif|jpg|png|txt|pdf|csv';
		   $config['max_size']	= '4096';
	       $this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{ 
				echo $error = $this->upload->display_errors();
				$this->parser->parse('/projects/site_attach_documents', $data);      
			}	
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$path= $data['upload_data']['file_path'];
				$tempFile =$data['upload_data']['file_name'];
				$temp_csv = $_FILES['userfile']['tmp_name'];

				$project_info = $this->input->post('proj');
				$def 	= explode('/',$project_info);
			    $project_id 	= $def[0];
			    $project_code 	= $def[1];
				$date= $this->input->post('date');
				$name= $this->input->post('plan_name');
				$plan_name = "NPL".$name.$date;
			    //insert plan name against project id
				$plan_data= array(
				  'project_id' => $project_id,
				  'plan_name' => $plan_name,
				);
				$this->db->insert('nominal_plan', $plan_data);
				$plan_id = mysql_insert_id();
					
				$row = 0;
				$handle = fopen($temp_csv, "r");
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$row++;
				if($row > '1')
				{	
					$plan_details =array(
					'nominal_plan_id' => $plan_id,
				    'cell_id' => $data[0],
					'site_id' => $data[1],
				    'sector' => $data[2],
				    'bts_type' =>$data[3],
				    'band' =>$data[4],
					'eirp'=>$data[5],
					'azimuth' =>$data[6],
					'electrical_tilt' =>$data[7],
					'height_agl' =>$data[8],
					'mechanical_tilt' =>$data[9],
					'antenna_type' =>$data[10],
					'feeder_length' =>$data[11],
					'feeder_type' =>$data[12],
					'longitude' =>$data[13],
					'latitude' =>$data[14],	
					'phase' =>$data[16],
					'region' =>$data[17],
					'type' =>$data[18],
					'capacity' =>$data[19],
					'height' =>$data[20],
					'clutter' =>$data[21],
					'division' =>$data[22],
					'district' =>$data[23],
					'msc' =>$data[24],
					'bsc' =>$data[25],		
				  );

				   if( strcmp($project_code, $data[15]) == 0 )
				   {
                        $query = "select count(*) as itisexist from nominal_plan_details where site_id='$data[1]'";
						$result = mysql_query($query) or die(mysql_error());
						$line = mysql_fetch_array($result);
					
						if ($line['itisexist'] == 0 ) {
						      $site = array( 
		                       'project_id' => $project_id,
					           'name' => $data[1],
		                      ); 
		                      $this->db->insert('sites', $site);
						}				   
				     $this->db->insert('nominal_plan_details', $plan_details);
				   }
				   else
				   {
				     $msg="Plan can not be imported as given project name does not match selected project name";
    				 $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
	    	         $this->session->set_flashdata('conf_msg', $msg);
				     redirect( $pieces[1]);				   
  				   }
			    }			   
				} // end while loop												
			} // end else 
	     } // end outer if    
		$this->display_nominal_plan($plan_id); 
		//$this->display_nominal_plan(1);
	}
	/**
	* Takes Nominal Plan Id as input
	*
	* Dispays nominal plan
	*
	* @access public
	*/	
	function display_nominal_plan($plan_id)
	{	  
	    $data = tags();
	    $data['tabs']	= tabs('projects');
	    $data['projects_title'] = 'Projects - Nominal Plan';
	    $data['plan_id'] = $plan_id;
		$this->db->where('nominal_plan_id', $plan_id);
        $this->db->from('nominal_plan_details');

        $rows =$this->db->count_all_results();
	    $config['base_url'] = BASE_URL . 'index.php/projects/display_nominal_plan/'.$plan_id;
		// Do the pagination
		$config['uri_segment'] = '4';
		$config['total_rows'] = $rows;
		$config['per_page'] = $limit = '1000';
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		$s= $this->input->post('s');
		$f= $this->input->post('f');
		// get the list of stages
	    $data['states']= $this->projects_model->get_nominal_plan($limit, $this->uri->segment(4), $s, $f, $plan_id);
		
	    $this->parser->parse('projects/nominal_plan', $data);
	}
	function iframe_view($plan_id, $type)
	{
	    $s= $this->input->post('s');
		$f= $this->input->post('f');
		$data['states']= $this->projects_model->get_nominal_plan(0, 0 , $s , $f , $plan_id);
		if($type == '1')
		{
		  $this->parser->parse('projects/iframe_edit', $data);
		}
		else
		{
	      $this->parser->parse('projects/iframe', $data);
		}
	}	
	/**
	* Takes Nominal Plan ID as input
	*
	* Deletes nominal plan
	*
	* Returns void
	*/	
	function delete_plan($id, $project_id)
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$this->db->delete('nominal_plan' , array('id' => $id));
		$this->db->delete('nominal_plan_details' , array('nominal_plan_id' => $id));
		$this->db->delete('sites' , array('project_id' => $project_id));
	    //$this->db->delete('nominal_plans' , array('id' => $id));
		$pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		redirect($pieces[1]);		
	}
	/**
	* Takes Process Id as input
	*
	* Deletes process
	*
	* Returns void
	*/
	function delete_process($id)
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$this->db->delete('processes' , array('id' => $id));
		$this->db->delete('process_details' , array('process_id' => $id));
	    $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		redirect($pieces[1]);		
	}
	/**
	* Takes Nominal Plan ID as input
	*
	* Deletes nominal plan
	*
	* Returns void
	*/
    function edit_plan($plan_id,  $value="")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
	    $data['projects_title'] = 'Projects - Nominal Plan';
		$data['plan_id'] = $plan_id;
		$this->db->where('nominal_plan_id', $plan_id);
        $this->db->from('nominal_plan_details');
        $rows =$this->db->count_all_results();
		$config['base_url'] = BASE_URL . 'index.php/projects/edit_plan/'.$plan_id;
		$config['uri_segment'] = '4';
		$config['total_rows'] = $rows;
		$config['per_page'] = $limit = '1000';
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		// get the list of stages
	    $data['states']= $this->projects_model->get_nominal_plan($limit, $this->uri->segment(4),"","", $plan_id);
		$data['plan_name']=$this->projects_model->get_plan_name($plan_id);
		$data['nominal_plan_id']= $plan_id;
		
		// get distinct values
		$results = $this->projects_model->get_distinct_values("district" , $plan_id);
		$data['District'] = $results['result'];
		$results = $this->projects_model->get_distinct_values("bsc" , $plan_id);
		$data['Bsc'] = $results['result'];
		$results = $this->projects_model->get_distinct_values("msc", $plan_id);
		$data['Msc'] = $results['result'];
		$results = $this->projects_model->get_distinct_values("region", $plan_id);
		$data['Region'] = $results['result'];
		$results = $this->projects_model->get_distinct_values("phase", $plan_id);
		$data['Phase'] = $results['result'];
		$results =  $this->projects_model->get_distinct_values("type", $plan_id);
		$data['Type'] = $results['result'];
		$results = $this->projects_model->get_distinct_values("capacity", $plan_id);
		$data['Capacity'] = $results['result'];
		$results = $this->projects_model->get_distinct_values("clutter", $plan_id);
		$data['Clutter'] = $results['result'];
		$results = $this->projects_model->get_distinct_values("division", $plan_id);
		$data['Division'] = $results['result'];
		/*$filters = array("district","bsc","msc","region", "phase" , "type", "capacity", "clutter", "division");
		$data['list'] = $filters;	
	     for ($i=0; $i<count($filters); $i++)
         {
		     $data['list'][$i]['filters'] = $filters[$i];
             //$data['list'][$i][$filters[$i]][$i]['values'] = $this->projects_model->get_distinct_values($filters[$i]);
			 $data['list'][$i]['values'] = $this->projects_model->get_distinct_values($filters[$i]);
			 
         }*/
	    //$this->parser->parse('projects/edit_plan', $data);
		$this->parser->parse('projects/edit_options', $data);
		//$this->parser->parse('projects/edit_filtered', $data);  
	}
	function filtered_results()
	{
	  $data = tags();
	  $data['tabs']	= tabs('projects');
	  $data['projects_title'] = 'Projects - Nominal Plan';
	  $s = $this->input->post('s');
	  $dis = $this->input->post('district');
	  $bsc = $this->input->post('bsc');
	  $msc = $this->input->post('msc');
	  $reg = $this->input->post('region');
	  $pha = $this->input->post('phase');
	  $type = $this->input->post('type');
	  $cap = $this->input->post('capacity');
	  $div = $this->input->post('division');
	  $clut = $this->input->post('clutter');
	  $plan_id = $this->input->post('nominal_plan_id');
	  $data['sites'] = $this->projects_model->get_edit_filtered_results($plan_id, $s, $dis, $bsc, $msc, $reg, $pha, $type, $cap, $div, $clut);
	  $i=0;
	  foreach ($data['sites'] as $id) {
	    $data['sites'][$i]['id']=$i+1;
		$i++;
	  }
	  $_true = array(array());
	  $_false = array();
	  $data['if_found'] = ( $data['sites'] != NULL) ? $_true : $_false;
	  $data['if_not_found'] = ( $data['sites'] == NULL) ? $_true : $_false;
	  $this->parser->parse('projects/filtered_results', $data);
	  
	}
	
	function edit_cell_plan(){
	  $data = tags();
	  $data['tabs']	= tabs('projects');
	  $data['projects_title'] = 'Projects - Nominal Plan';
	  $s = $this->input->post('s');
	  $plan_id = $this->input->post('nominal_plan_id');
	  $query = $this->db->get_where('nominal_plan_details' ,array('site_id' => $s));
	  $data['cells'] = $query->result_array(); 
	  $_true = array(array());
	  $_false = array();
	  $data['if_found'] = ( $data['cells'] != NULL) ? $_true : $_false;
	  $data['if_not_found'] = ( $data['cells'] == NULL) ? $_true : $_false;
	  $this->parser->parse('projects/cell_results', $data);
	}
	/**
	* Directs to Edit Plan Page
	*
	* Returns void
	*/
	function plan_edited($type)
	{ 
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('commit', 'Commit ', 'required');
		$this->form_validation->set_rules('fields[]', 'At least 1 ', 'required|isset');
	    //$this->form_validation->set_message('required', 'Please supply a commit message if you want to make changes');
        $nmp_id = $this->input->post('nominal_plan_id');
		$id = $this->input->post('id');
		$cell_id = $this->input->post('cell_id');
		$site_id = $this->input->post('site_id');
	  
		if ($this->form_validation->run() == FALSE)
		{	 
		 $this->edit_plan($nmp_id,  validation_errors()); 
		}
		else
		{	 
		 //retain old values in change log
		  $edit_info = array (
		     'date' => $this->input->post('date'),
			 'time' => $this->input->post('time'),
			 'login_id' => $this->input->post('login_id'),
		     'commit_msg' => $this->input->post('commit'),		  
		  );
		  $this->db->insert('audit_log', $edit_info);
		  $log_id = mysql_insert_id();
		  if( $type == '1')
		   {
			 $fields = $this->input->post('fields');
			 foreach ($fields as $field_id) {
				 $query = $this->db->get_where('nominal_plan_details' , array('id' => '1'));
		         $data['values'] = $query->result_array();
		         $old_value = $data['values'][0][$field_id];
			     $edit_details = array (
				 'log_id' => $log_id,
				 'nominal_plan_id' => $nmp_id,
				 'cell_id' => $cell_id,
				 'site_id' => $site_id,
				 'field_changed' => $field_id,
				 'value_changed' => $old_value, 
				);
				$this->db->insert('log_details', $edit_details);
				$edit_details =array(
				  $field_id => $this->input->post($field_id),
				 );
				$this->db->update('nominal_plan_details', $edit_details, array('nominal_plan_id' => $nmp_id));
			 }
		   }
		   else if ( $type == '2')
		   {
		     $sites = $this->input->post('sites');
			 foreach ($sites as $site_id) {
				 $fields = $this->input->post('fields');
				 foreach ($fields as $field_id) {
					 $query = $this->db->get_where('nominal_plan_details' , array('site_id' => $site_id));
					 $data['values'] = $query->result_array();
					 $old_value = $data['values'][0][$field_id];
		
					 $edit_details = array (
					 'log_id' => $log_id,
					 'nominal_plan_id' => $nmp_id,
					 'cell_id' => $cell_id,
					 'site_id' => $site_id,
					 'field_changed' => $field_id,
					 'value_changed' => $old_value, 
					);
					$this->db->insert('log_details', $edit_details);
					$edit_details =array(
					  $field_id => $this->input->post($field_id),
					 );
					$this->db->update('nominal_plan_details', $edit_details, array('site_id' => $site_id)); 
				 }
			}
		   }
		   else if ( $type == '3')
		   {	 
			 $query = $this->db->get_where('nominal_plan_details' , array('cell_id' => $cell_id));
			 $data['old_values'] = $query->result_array();
			 //$data['old_values'] = $this->projects_model->get_nominal_plan(0, 0, "", "",$nmp_id);
			 $fields = $this->db->field_data('nominal_plan_details');
			 foreach($fields as $field)
			 {
			   if($data['old_values'][0][$field->name] != $this->input->post($field->name)){
				 $edit_details = array (
				 'log_id' => $log_id,
				 'nominal_plan_id' => $nmp_id,
				 'cell_id' => $cell_id,
				 'site_id' => $site_id,
				 'field_changed' => $field->name,
				 'value_changed' => $data['old_values'][0][$field->name], 
				);
				$this->db->insert('log_details', $edit_details);
				 
			   }
			 }  
			 // insert new values
			 $edit_details =array(
						'bts_type' => $this->input->post('bts_type'),
						'band' => $this->input->post('band'),
						'eirp'=> $this->input->post('eirp'),
						'azimuth' => $this->input->post('azimuth'),
						'electrical_tilt' => $this->input->post('electrical_tilt'),
						'height_agl' => $this->input->post('height_agl'),
						'mechanical_tilt' => $this->input->post('mechanical_tilt'),
						'antenna_type' => $this->input->post('antenna_type'),
						'feeder_length' => $this->input->post('feeder_length'),
						'feeder_type' => $this->input->post('feeder_type'),
						'longitude' => $this->input->post('longitude'),
						'latitude' => $this->input->post('latitude'),						
						'phase' => $this->input->post('phase'),
						'region' => $this->input->post('region'),
						'type' => $this->input->post('type'),
						'capacity' => $this->input->post('capacity'),
						'height' => $this->input->post('height'),
						'clutter' => $this->input->post('clutter'),
						'division' => $this->input->post('division'),
						'district' => $this->input->post('district'),
						'msc' => $this->input->post('msc'),
						'bsc' => $this->input->post('bsc'),		
					  );	  
		          $this->db->update('nominal_plan_details', $edit_details, array('id' => $id));
		   } 
		  // $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		  // redirect($pieces[1]);
		   $this->create_plan('1');
		   //$this->parser->parse('projects/existing_plan', $data);
		}		
	}
	/**
	* Takes type and error_value as input (error value is displayed if validation fails)
	*
	* If type is '0' then creates process else displays existing process
	*
	* Returns void
	*/
	function display_process($type, $error_value="")
	{ 
	      $data = tags();
		  $data['tabs']	= tabs('projects');
		  $data['projects_title'] = 'List of Processes';
		  $query = $this->db->get("processes");
		  $data['process']= $query->result_array(); 
		  $_true = array(array());
          $_false = array();
          $i=0;
		  foreach( $data['process'] as $row)
		  {
		    if ($data['process'][$i]['id'] == "1")
			{
		    $data['process'][$i]['checked']= $_true;
			}
			else
			{
			$data['process'][$i]['checked']= $_false;
			}
			$i++;
		  }
		  
		  if($type==0)
		  {
		  $this->parser->parse('projects/create_process', $data);
		  }
		  else
		  {
		  $this->parser->parse('projects/display_process', $data);
		  }
	}
	/**
	* process is slecected using which new process is to be created
	*
	* Returns void
	*/
	function implement_process($pid="", $value="")
	{  
		    $process_id = $this->input->post('plan');
			if($process_id == "")
			{
			  $process_id=$pid;
			}
		    $data = tags();
		    $data['tabs']	= tabs('projects');
		    $data['projects_title'] = 'Projects - Nominal Plans';
			$data['stages']=$this->projects_model->get_process(0,0, $process_id);
			$data['process_id']= $process_id;
			$i=0;
		
			foreach($data['stages'] as $row)
			{
              $curr_stage_id = $row['stage_id'];
			  $stages[$i]=$row['stage_id'];
			  arsort($stages);			
			  //if($curr_stage_id > 1)
			  if($i >= 1)
			  {
			    $k=0;
				foreach ($stages as $key => $value)
				{
				  if($data['stages'][$key]['stage_id'] != $row['stage_id'])
				  {
                  $data['stages'][$i]['stages_sel'][$k]['s_id']= $data['stages'][$key]['stage_id'];
			      $data['stages'][$i]['stages_sel'][$k]['name']= $data['stages'][$key]['stage'];
				  }
				  $k++;
				}
			  }
			  else
			  {
			    $data['stages'][$i]['stages_sel'][0]['name']= "---";
			  }
			  $i++;
			}
		    $this->parser->parse('projects/pro_implement', $data);
	}
	/**
	* Create new process using existing one
	*
	* Returns void
	*/
	function process_implemented(){
	         
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('process_name', 'Process Name', 'required');
			$this->form_validation->set_rules('stages[]', 'Stage', 'required|isset');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_message('isset', 'Please select a stage if you want to create process');
			$process_id=$this->input->post('process_id');
			if ($this->form_validation->run() == FALSE)
			{
				$this->implement_process($process_id, validation_errors());
			}
			else
			{
            $process_name = $this->input->post('process_name');
		    $start_date = $this->input->post('created_on');
		    $process =array(
					   'name' => $process_name,
					   'created_on' => $start_date,
					   'created_by' => $this->input->post('created_by'),
					   'description' => $this->input->post('description'),
					   'comments' => $this->input->post('comment'),
					);
		    $this->db->insert('processes', $process);
		    $process_id= mysql_insert_id();			
		    // add process details	
			$stages = $this->input->post('stages');
			$timeStamp = strtotime($start_date);
			foreach ($stages as $stage_id) {
			// calculate start date for each stage
			$lead_time = $_POST['lead_time'][$stage_id];
            $timeStamp += 24 * 60 * 60 * $lead_time; // (add days according to lead time)
            $newDate = date("Y-m-d", $timeStamp);
			$stage = $_POST['stage'][$stage_id];
					 $process_details = array(
						'process_id' => $process_id,
						'stage_id' => $_POST['stage_id'][$stage_id],
						'stage' 	=> $_POST['stage'][$stage_id],
						'lead_time'=> $lead_time,
						'dependency' 	=> $_POST['dependency'][$stage_id],
						'start_date' => $newDate,
					);
					$this->db->insert('process_details', $process_details);
					
			    }// end for loop 
				$this->display_process('1');
			}
			
	}
	/**
	* Takes process id as input
	*
	* Displays process
	*/
	function process_details($id)
	{    
	      $data = tags();
		  $data['tabs']	= tabs('projects');
		  $data['projects_title'] = 'List of Processes';
		  $query = $this->db->get_where('processes' ,array('id' => $id));
		  $data['process']= $query->result_array(); 
		  $this->db->order_by("stage_id", "asc");
		  $query = $this->db->get_where('process_details' ,array('process_id' => $id));
		  $data['process_details']= $query->result_array(); 
		  $this->parser->parse('projects/process_details', $data);
	}
	function plan_summary($id)
	{
	      $data = tags();
		  $data['tabs']	= tabs('projects');
		  $data['projects_title'] = 'Plan Summary';
		  
		  $filters = array("district","bsc","msc","region", "phase" , "division");
		  //$data['list'] = $filters;	
	      for ($i=0; $i<count($filters); $i++)
          {
		     $results = $this->projects_model->get_distinct_values( $filters[$i], $id);
			 $data['element'][$i]['filters'] = $filters[$i];
			 $data['element'][$i]['counts'] = $results['count'];
		     $j=0;
			 foreach ($results['result'] as $row)
			 {
			   $data['element'][$i]['values'][$j]['name'] = $row[$filters[$i]];
			   $data['element'][$i]['values'][$j]['sites_count'] = $this->projects_model->get_sites_count($filters[$i],$row[$filters[$i]]);
			   $j++;
			 }
          }
		  $this->parser->parse('projects/plan_summary', $data);
	}
	function get_counted_sites($field, $value)
	{
	      $data = tags();
		  $data['tabs']	= tabs('projects');
		  $data['projects_title'] = 'Plan Summary';
		  $data['field']=$field;
		  $data['value']=$value;
		  //$data['sites'] = $this->projects_model->get_site_count_details($field, $value);
		  //$this->parser->parse('projects/counted_sites', $data);
		  $this->parser->parse('projects/nominal_plan', $data);
	  
	}
	function display_counted_sites($field, $value)
	{
	      $data['sites'] = $this->projects_model->get_site_count_details($field, $value);
		  $this->parser->parse('projects/counted_sites', $data);
	}
	function view_planned_stages($site_id)
	{ 
	  $this->db->order_by("id", "asc"); 
	  $query=$this->db->get_where("states", array('site_id' => $site_id));
	  $data['stages']=$query->result_array();
	  $this->parser->parse('projects/view_planned_stages', $data);
	}
	function project_summary($project_id="",  $month="", $year="",$export_option="")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$this->load->plugin( 'fusion' );
		$data['chart_type']= "Pie3D.swf";
		$data['chart_type1']= "MSColumn2D.swf";
		$data['height'] = 360; 
	    $data['width'] = 360;
		$data['project_id']=$project_id;

		if( ($month=="" || $month==0) && ($year=="" || $year==0))
		{
		  $month = date('m');
	      $year = date('y');
		}
		//get months
		$data['months'] = $this->projects_model->get_months();
		//=========== Months dropdown ====================				
			foreach($data['months'] as $k=>$v)
			{
				if($v['value'] == $month)
				{
					$data['months'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['months'][$k]['selected'] = "";
				}
			
			}
		//====================================================
		//get years
		$data['years'] = $this->projects_model->get_years();
		//=========== Year dropdown ====================				
			foreach($data['years'] as $k=>$v)
			{
				if($v['value'] == $year)
				{
					$data['years'][$k]['selected'] = "selected";                     
 					
				}else{
					
					$data['years'][$k]['selected'] = "";
				}
			
			}
		//====================================================
		// get total number of sites
		$results = $this->projects_model->get_total_sites_project($project_id);
		$data['total_sites']= $results['count'];
		// get not planned sites
		$results = $this->projects_model->get_not_planned_sites($project_id, "", "", "");
		$data['projects_np']= $results['count'];
		// get planned sites
		$results=$this->projects_model->get_planned_sites($project_id, "", "", "");
		$data['projects_nr']= $results['count'];	    
        // get rollout sites
		$this->db->where('status', 'Active');
		$this->db->where('project_id', $project_id);
        $this->db->from('sites');
		$data['projects_rollout']=$this->db->count_all_results();
		// get complete site
		$data['projects_comp']=$this->projects_model->get_completed_sites($project_id);
		// export data
		if($export_option== 1)
		{
		  header("Content-type:text/octect-stream");
		  header("Content-Disposition:attachment;filename=project_summary.csv");
		  
			 print '"' . 'Total Sites' ."\",". $data['total_sites'] . "\n";
			 print '"' . 'Sites Not Planned' ."\"," . $data['projects_np'] . "\n";
			 print '"' . 'Planned Sites' ."\",". $data['projects_nr'] . "\n";
			 print '"' . 'Rollout Sites' ."\",". $data['projects_rollout'] . "\n";
		  
		    exit;
		
		}
		$chart_values = array('Planned' => $data['projects_nr'] , 'Not Planned' =>$data['projects_np'], 'Active'=>$data['projects_rollout']);
		
		$data['xml'] = $this->charts_model->get_piechart_xml($chart_values);
		$data['bargraph_xml'] = $this->charts_model->get_mscol2D_xml($project_id, $month, $year);
		
		$data['process'] = $this->projects_model->get_procees_based_sites( $project_id );				
	    $data['region'] = $this->projects_model->get_project_regions( $project_id );
		$data['region_values'] = $this->projects_model->get_project_regions( $project_id , '1');
		
		$xml_data = ' <?xml version="1.0" encoding="UTF-8"?>'."\n";
	    $xml_data .= '<pie>'."\n";
	    $xml_data .= '<slice title="Twice a day" pull_out="true">358</slice>'."\n";
	    $xml_data .= '<slice title="Once a day">258</slice>'."\n";
	    $xml_data .= '<slice title="Once a week">154</slice>'."\n";
	    $xml_data .= '<slice title="Never" url="http://www.interactivemaps.org" description="Click on the slice to find more information" alpha="50">114</slice>'."\n";
	    $xml_data .= '</pie>'."\n";
		$data['object_type'] ="ampie.swf";
		$data['chart_type2']="pie";
		$data['xml_data'] = $xml_data;
		//
		/*$this->load->plugin('to_excel');
		to_excel($query, ['filename']);
		*/
		$this->parser->parse('projects/project_summary', $data);	   
	}
	function view_regions_in_googlemap($project_id="", $region_name)
	{
	     $data = tags();
		 $data['tabs']	= tabs('projects');
		 
		 $data['region_values'] = $this->projects_model->get_region_sites( $project_id , $region_name);
		 $this->view_googlemap($data['region_values']);
		 //$this->parser->parse('projects/google_map', $data);
	}
	function view_districts_in_region_googlemap($project_id="", $region_name="", $district_name="")
	{
	     $data = tags();
		 $data['tabs']	= tabs('projects');
		 
		 $data['site_values'] = $this->projects_model->get_region_district_sites( $project_id , $region_name, $district_name);
		 $this->view_googlemap($data['site_values']);
	}
	function rollout_summary( $project_id = "")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$data['project_id'] = $project_id;
		$this->db->where('process_id', "1");
        $this->db->from('process_details');
        $rows =$this->db->count_all_results();
		$result =$data['states']= $this->projects_model->get_process( "" , "", "1");	
		$i=0;
		foreach ($result as $row)
		{
			$data['states'][$i]['stage'] = $row['stage'];
			$result1 = $data['states'][$i]['definition'] = $this->projects_model->get_rolledout_sites("", "", $data['states'][$i]['stage'], "none", $project_id, "", "", "");
			$data['states'][$i]['count'] = $result1['count'];
			$_true = array(array());
			$_false = array();
			$data['states'][$i]['if_found'] = ( $result1['count'] != 0 ) ? $_true : $_false;
			$data['states'][$i]['if_not_found'] = ( $result1['count'] == 0 ) ? $_true : $_false;    
			$i++; 
		}
		$this->parser->parse('projects/rollout_summary', $data);
	}
	function view_districts($region_name="", $project_id="")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$this->load->plugin('fusion');
		$data['chart_type']= "Pie3D.swf";
		$data['chart_type1']= "MSColumn2D.swf";
		$data['height'] = 360; 
	    $data['width'] = 360;
		$data['region'] = $region_name;
		$data['project_id'] = $project_id;
		$data['districts'] = $this->projects_model->get_districts_region($project_id, $region_name);
		/*$_true = array(array());
        $_false = array();
        
		$data['if_district'] = ( $data['candidates'] != NULL ) ? $_true : $_false;
		$data['if_not_district'] = ( $data['candidates'] == NULL) ? $_true : $_false; */
		
		$chart_values= array(array());
		foreach( $data['districts'] as $row )
		{
		  $chart_values[$row['name']] = $row['count'];
		}
		$data['xml'] = $this->charts_model->get_piechart_xml($chart_values);
		$this->parser->parse('projects/view_districts', $data);
	}
	function view_sites_in_district($project_id="", $region="", $district="")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$this->load->plugin('fusion');
		$data['chart_type']= "Pie3D.swf";
		$data['chart_type1']= "MSColumn2D.swf";
		$data['height'] = 360; 
	    $data['width'] = 360;
		$data['region'] = $region;
		$data['district'] = $district;
		$data['project_id'] = $project_id;
		$result = $this->projects_model->get_sites_in_district($project_id, $region, $district, "Nominated");
		$data['sites_np'] = $result['count'];
		$result = $this->projects_model->get_sites_in_district($project_id, $region, $district, "Planned");
		$data['sites_p'] = $result['count'];
		$result = $this->projects_model->get_sites_in_district($project_id, $region, $district, "Active");
		$data['sites_a'] = $result['count'];
		$chart_values = array('Planned' => $data['sites_p'] , 'Not Planned' =>$data['sites_np'], 'Active'=>$data['sites_a']);
		$data['xml'] = $this->charts_model->get_piechart_xml($chart_values);

		$this->parser->parse('projects/sites_in_district', $data);
	}
	function view_sites_in_process($project_id, $process_id, $process_name)
	{
	   $data = tags();
	   $data['tabs']	= tabs('projects');
	   $this->load->plugin('fusion');
	   $data['chart_type']= "Pie3D.swf";
	   $data['chart_type1']= "MSColumn2D.swf";
	   $data['height'] = 360; 
	   $data['width'] = 360;
	   $data['process'] = $process_name;
	   $data['process_id'] = $process_id;
	   $data['project_id'] = $project_id;
	   
	   $result = $this->projects_model->get_sites_in_process($project_id, $process_id, "Planned");
	   $data['sites_p'] = $result['count'];
	   $result = $this->projects_model->get_sites_in_process($project_id, $process_id, "Active");
	   $data['sites_a'] = $result['count'];
	   $chart_values = array('Planned' => $data['sites_p'] , 'Active'=>$data['sites_a']);
	   $data['xml'] = $this->charts_model->get_piechart_xml($chart_values);

	   $this->parser->parse('projects/sites_in_process', $data);
	}
	/**
	* Taked Site Id as input
	*
	* Shows the graps of planned states
	*
	* @access public
	*/	
	function chart( $site_id="" , $status="")
	{
		    $data = tags();
		    $data['tabs']	= tabs('projects');
			$data['site_id'] =  $this->projects_model->get_site_name($site_id);
		    $this->load->plugin( 'fusion' );
		    $this->db->order_by("id", "asc");
		    $query = $this->db->get_where('states' , array('site_id' => $site_id));
		    $length = $query->num_rows();
			$first = $query->first_row('array');
            $start_date = $first['start'];
			$pieces = explode("-", $start_date);
			$year_F = $year_f = $pieces[0]; 
			$month_F = $month_f = $pieces[1];
			$dm_f = cal_days_in_month(0, $month_f, $year_f) ;
			
			$last = $query->last_row('array'); 
		    $end_date = $last['end'];
			$pieces = explode("-", $end_date);
			$year_L = $year_l = $pieces[0]; 
			$month_L = $month_l = $pieces[1];
		    $dm_l = cal_days_in_month(0, $month_l, $year_l) ;
			
			$data['stages'] = $query->result_array();
			for ($i = 0; $i < $length; $i++)
			{
				$start[$i] = $data['stages'][$i]['start'];
				$end[$i] = $data['stages'][$i]['end'];
				$state[$i] = $data['stages'][$i]['state'];
				$state_id = $data['stages'][$i]['id'];
				if($status == "Active" )
				{
					$query = $this->db->get_where('stages_planned' , array('state_id' => $state_id));
					$data['actual_stages'] = $query->result_array();
					$actual_start[$i] = $data['actual_stages'][0]['actual_start_date'];
					$actual_end[$i]= $data['actual_stages'][0]['actual_end_date'];
					$percentage[$i]= $data['actual_stages'][0]['percentage_complete'];
				}

			} 
	        //$data['chart_details']=$this->projects_model->get_chart_details($id);
			$height = 300;
			if ($length >= 30)
			  $height = 1800;
			else if ($length >= 20 )
			  $height = 1200;
			else if ($length >= 10)
			  $height = 800;
			else if ($length>= 5)
			  $height = 600;
			$data['height'] = $height; 		
			$strXML  = "";
			$strXML .= "<chart dateFormat='yyyy-mm-dd' showSlackAsFill='0' outputDateFormat='ddds mns yy' showPercentLabel='1' ganttWidthPercent='65' canvasBorderColor='999999' canvasBorderThickness='0' gridBorderColor='4567aa' gridBorderAlpha='20' ganttPaneDuration='12' ganttPaneDurationUnit='m' >";
			
			$strXML .= "<categories bgColor='009999'>";
			$strXML .= "<category start='".$year_f."-".$month_f."-01' end='".$year_l."-".$month_l."-".$dm_l."' label='Gantt Chart' fontColor='ffffff' fontSize='16'/>";
			$strXML .= "</categories>";
		   
			$strXML .= "<categories bgColor='4567aa' fontColor='ff0000'>";
			$strXML .= "<category start='".$year_f."-".$month_f."-01' end='".$year_l."-".$month_l."-".$dm_l."' label='Years' alpha='' font='Verdana' fontColor='ffffff' fontSize='16' />";
			$strXML .= "</categories>";
			
			$strXML .= "<categories bgColor='4567aa' fontColor='ff0000'>";
			for($y=$year_f; $y<=$year_l; $y++)
			{
			$strXML .= "<category start='".$year_f."-".$month_f."-01' end='".$year_l."-".$month_l."-".$dm_l."' label='".$y."' alpha='' font='Verdana' fontColor='ffffff' fontSize='16' />";
			}
			$strXML .= "</categories>";          
					
			$strXML .= "<categories bgColor='ffffff' fontColor='1288dd' fontSize='10' isBold='1' align='center'>";
		
			for($year_F = $year_f; $year_F<= $year_l; $year_F++  )
			{
				if ($year_L == $year_F)
				{
				  for( $c = $month_F; $c <=$month_l; $c++)
				  {
					$dm = cal_days_in_month(0, $c, $year_l) ;
					$name = date('F', mktime(0,0,0,$c,1));
					$strXML .= "<category start='".$year_F."-".$c."-"."01' end='".$year_F."-".$c."-".$dm."' name='".$name."' />";
				  }
				}		  
			    else
			    {
				  $month_L = 12;
				  for( $c = $month_F; $c <=$month_L; $c++)
				  {
					$dm = cal_days_in_month(0, $c, $year_F) ;
					$name = date('F', mktime(0,0,0,$c,1));
					$strXML .= "<category start='".$year_F."-".$c."-"."01' end='".$year_F."-".$c."-".$dm."' name='".$name."' />";
				  }
			    }
				$month_F = 01;
				$month_L = $month_l;
			}
			$strXML .= "</categories>"; 
			
			$strXML .= "<processes headerText='Task' fontColor='000000' fontSize='11' isAnimated='1' bgColor='4567aa' headerVAlign='bottom' headerAlign='left' headerbgColor='4567aa' headerFontColor='ffffff' headerFontSize='16' align='left' isBold='1' bgAlpha='25' >"; 
			$y = 1;
			for($x = 0 ; $x < $length ; $x++){ 
			$strXML .= "<process Name='" . $state[$x] . "' id='" . $y . "' />";
			   $y++;
			} 
		    $strXML .= "</processes>";
			
			$strXML .= "<dataTable showProcessName='1' nameAlign='left' fontColor='000000' fontSize='10' vAlign='right' align='center' headerVAlign='bottom' headerAlign='left' headerbgColor='567aa' headerFontColor='ffffff' headerFontSize='16' >";
			$strXML .= "<dataColumn bgColor='eeeeee' headerText='Start'>";
			for($x = 0 ; $x < $length ; $x++){ 
			$strXML .= "<text label='" . $start[$x] . "' />";
			} 
			$strXML .= "</dataColumn>";
				
			$strXML .= "<dataColumn bgColor='eeeeee' headerText='Finish'>";	
			for($x = 0 ; $x < $length ; $x++){ 		
			$strXML .= "<text label='" . $end[$x] . "' />";
			} 
			$strXML .= "</dataColumn>";
			$strXML .= "</dataTable>";
			
			$strXML .= "<tasks width='10' showEndDate='1'>";
			$y = 1;
			for($x = 0 ; $x < $length ; $x++){ 
			
			$strXML .= "<task name=' Planned' processId='" . $y . "' start='" . $start[$x] . "' end='" . $end[$x] . "' id='".$y."P' link='../projects' color='4567aa' height='32%25 ' topPadding='12%25 ' label='view month'  /> ";
		    if($status == "Active")
			$strXML .= "<task name=' Actual' processId='" . $y . "' start='" . $actual_start[$x] . "' end='" . $actual_end[$x] . "' id='".$y."A' link='../projects' color='EEEEEE' height='32%25 ' topPadding='56%25 ' label='view month' percentComplete='".$percentage[$x]."' /> ";
		   
		   // $strXML .= "<task name='" . Actual . "' processId='" . $y . "' start='" . $start[$x] . "' end='" . $end[$x] . "' id='".$y."A'  color='EEEEEE' alpha='100' topPadding='56%25 ' height='32%25 ' /> ";
				$y++;
			} 
			$strXML .= "</tasks>";
			// connectors
			$strXML .= "<connectors>";
			$y = 1; 
			$z= 2;
			for($x = 0 ; $x < $length ; $x++){ 
			
			$strXML .= "<connector fromTaskId='". $y ."P' toTaskId='". $z ."P' color='4567aa' thickness='2' fromTaskConnectStart='0'/>";
			$strXML .= "<connector fromTaskId='". $y ."A' toTaskId='". $z ."A' color='EEEEEE' thickness='2' fromTaskConnectStart='0'/>";
			 $y++; $z++;
			} 
			$strXML .= "</connectors>";
			$strXML .="<legend>";
						 $strXML .= "<item label='Planned' color='4567aa' />";
						 $strXML .= "<item label='Actual' color='999999' />";
						 $strXML .= "<item label='Slack (Delay)' color='FF5E5E' />";
						 $strXML .= "</legend>";
						
			$strXML .="<styles>";						
						 $strXML .= "<definition>";
						 $strXML .= "<style type='Font' name='legendFont' size='12' />";
						 $strXML .= "</definition>";
						
						 $strXML .= "<application>";
						 $strXML .= "<apply toObject='LEGEND' styles='legendFont' />";
						 $strXML .= "</application>";
		    $strXML .= "</styles>"; 
		    $strXML .= "</chart>";
		    $data['xml'] = $strXML;
	        $this->parser->parse('projects/view_chart', $data);
	}
	function userfile()
	{
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|txt|pdf|csv';
		$config['max_size']	= '4096';
		$this->load->library('upload', $config);
		
	    if (!$this->upload->do_upload('userfile'))
        {//$this->form_validation->set_message('_check_login_name', 'The callback was called.');
            $this->form_validation->set_message('userfile',$this->upload->display_errors());
            return false;
        } else {
            return true;
        }
    }
	/**
	*
	* takes input file name
	*
	* download file on your system
	**/
	function download_file( $filename ="" )
	{
	    $path_to_file = $_SERVER['DOCUMENT_ROOT']."/uploads/".$filename;
	    $data = file_get_contents($path_to_file); // Read the file's contents

		force_download($filename, $data);
	    $pieces = explode("index.php", $_SERVER['HTTP_REFERER']); 
		redirect($pieces[1]);
       
    }
	
	function view_googlemap($values = "")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
      
	    // local
		if( $_SERVER['SERVER_NAME'] == "localhost")
		$this->cigooglemapapi->setAPIKey('ABQIAAAATMD9H-Gy8U0tWqj9J61jJRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxRV5tdaEkFv8JiTEOxQHeLQbWY9SQ');
		else
		$this->cigooglemapapi->setAPIKey('ABQIAAAATMD9H-Gy8U0tWqj9J61jJRSxN_HAqdbUd6G3u3SYCdprmZYLMBTrBY9l-apTAFT3TueR1Sl0qG4cZQ');

        $this->load->helper('url');
		$image_path =base_url().'images/tower_images/image2.png';
		$shadow_path =base_url().'images/tower_images/image2_shadowshadow.png';
		$this->cigooglemapapi->width  = '800px';
        $this->cigooglemapapi->height = '300px';
        $this->cigooglemapapi->disableTypeControls();
        //$this->cigooglemapapi->disableSidebar();
        $this->cigooglemapapi->disableDirections();
        $this->cigooglemapapi->setControlSize('small');
		$this->cigooglemapapi->setMarkerIcon($image_path,$shadow_path,13,30,20,1);
        $i = 0;
		foreach($values as $value)
		{ 
		  $this->cigooglemapapi->addMarkerByAddress( $value['nominal_latitude']." ".$value['nominal_longitude'],$value['name'],"<b>".$value['name']."</b>");   
	
		}
		
        //$this->cigooglemapapi->addMarkerByAddress('21.886146 105.784809', "Site 3", "<b>Kararchi</b>" );

		// End google map
		$this->parser->parse('projects/google_map', $data);
	}
	/**
	* Plan is uploaded and the values are inserted into database
	*
	* shows imported plan
	*/	
	function site_lat_updated()
	{
	    if ($this->input->post('submit') != '')
		{ 
			$mypath = './uploads';
			if (!is_dir($mypath))
			{
				mkdir($mypath,0777,TRUE);
			}
		   $config['upload_path'] = './uploads/';
		   $config['allowed_types'] = 'gif|jpg|png|txt|pdf|csv';
		   $config['max_size']	= '4096';
	       $this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{ 
				echo $error = $this->upload->display_errors();
				$this->parser->parse('/projects/site_attach_documents', $data);      
			}	
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$path= $data['upload_data']['file_path'];
				$tempFile =$data['upload_data']['file_name'];
				$temp_csv = $_FILES['userfile']['tmp_name'];

			    $id = '660';
                $end = '855';	
				$row = 0;
				$handle = fopen($temp_csv, "r");
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE  || $id <= '855') {
				$row++;
				if($row > '1')
				{	
					$plan_details =array(
					'nominal_latitude' => $data[0],
				    'nominal_longitude' => $data[1],
		
				  );
     
					 $this->db->update('sites', $plan_details, array('id' => $id));
					 $id++;
				  
			    }			   
				} // end while loop												
			} // end else 
	     } // end outer if    
		$this->display_nominal_plan($plan_id); 
		//$this->display_nominal_plan(1);
	}
}
/* End of file projects.php */
/* Location| ./system/application/controllers/projects.php */
?>