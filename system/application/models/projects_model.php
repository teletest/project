<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Projects_model extends Model{
	
	function Projects_model()
	{
		parent::Model();
		$this->load->library('calendar');
		$this->load->library('Workdays');
		$this->load->library('Csv_validation');

	}	
		function get_filtered_results($f, $s, $status)
		{ 
		     if ( $f == "")
			 {
			     $this->db->select('*');
			     $this->db->from('projects');
				 $this->db->where('status', $status);
				 $this->db->like('code', $s);
			 }
			 else
			 {
				 $this->db->select('*');
				 $this->db->from('projects');		 
				 $this->db->join('sites', 'projects.id = sites.project_id');
				 $this->db->where('projects.status', $status);
				 if($f=='name')
				 {
					$this->db->like('sites.name', $s);
				 }
				 if($f=='region')
				 {
				   $this->db->like('sites.region', $s);
				 }
				 else if($f=='division')
				 {
				   $this->db->like('sites.division', $s);
				 }
				 else if($f=='msc/bsc')
				 {
				   $this->db->like('sites.msc', $s);
				   $this->db->or_like('sites.bsc', $s); 
				 }
				 else if($f=='vip')
				 {
				   $this->db->like('sites.site_type', $s);
				 }
			 
			 }
			
			 $query = $this->db->get();
			 return $query->result_array();
		}
		
		function get_search_results($s)
		{
			$this->db->select('*');
			$this->db->from('projects');
			$this->db->like('code', $s);
			$this->db->or_like('desc', $s); 
			$this->db->order_by("code", "desc");
			$query = $this->db->get();
			if($query->num_rows()>0)
		  		return $query->result_array();
		  	else
		  		return NULL;
			
		}
		function get_activities($limit, $offset, $s)
		{
			    $this->db->select('*');
				$this->db->from('activities');
			    $this->db->join('sites', 'activities.site_id = sites.id' );	
				$this->db->limit($limit, $offset);
				if($s!="")
				{
				 $this->db->like('subject', $s);
				}
				$query = $this->db->get();
				return $query->result_array();
		}
		function get_planning_documents($limit, $offset, $s)
		{
		       //$query = $this->db->get_where('attachements', array('is_active'=>'0'), $limit, $offset);  
			    $this->db->select('*');
				$this->db->from('attachements');
				//$this->db->from('projects');
				$this->db->join('sites',  'sites.id = attachements.site_id' );
				$this->db->join('projects',  'projects.id=sites.project_id' );
				//$this->db->join('projects',  'projects.id = attachements.project_id' );
				$this->db->where('projects.status', 'Planned');
				$this->db->limit($limit, $offset);
				if ($s!="")
				{
				$this->db->like('attachements.filename', $s);
				}
				$query = $this->db->get();
			    return $query->result_array();
		}
		function change_status($status, $id)
		{ 
			 if($status=="Active")
			 {
				$project = array(
							   'status' => 'status'+4,
							);
			 }
			 else 
			 {
				$project = array(
							   'status' => 'status'+3,
							);
			 }
			 $this->db->where('id', $id); 
			if($this->db->update('projects', $project))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function get_updated($id)
		{
		   $query = $this->db->get_where('projects', array('id' => $id ));
		   return $query->result_array();
		}
		function get_attachement($id)
		{
		  $query = $this->db->get_where('attachements', array('site_id' => $id, 'is_active'=>'1'));
		  if($query->num_rows()>0)
		  return $query->result_array();
		  else
		  return NULL;
		}
		function get_planned_sites($project_id, $parameter, $region, $district)
		{
		    $this->db->select('sites.id, sites.name, sites.project_id, sites.status, projects.status As p_status, projects.created_on, projects.start_date, projects.end_date, projects.code, projects.planned_on');
			$this->db->from('projects');
			$this->db->join('sites', 'sites.project_id= projects.id' );
			$this->db->where('sites.status' , "Planned" );
			if($project_id!="")
			{
			  $this->db->where('sites.project_id' , $project_id );
			}
			if($parameter != "" )
			{
			  if($parameter == "district" )
			  {
			    $this->db->where( 'region' , $region );
				$this->db->where( 'district' , $district ); 
			  }
			  if($parameter == "region")
			  {
			    $this->db->where( 'region' , $region);
			  }
			}
			  $query = $this->db->get();
			  $result = array(
			  'count' => $query->num_rows(),
			  'values' => $query->result_array()
			  );
			  return $result;

		}
		// to do
		function get_not_planned_sites($project_id, $parameter, $region, $district)
		{
		    $this->db->select('sites.id, sites.name, sites.district, sites.project_id, sites.status,projects.code, projects.created_on, projects.start_date, projects.end_date, projects.code, projects.planned_on');
			$this->db->from('projects');
			$this->db->join('sites', 'sites.project_id= projects.id' );
			$this->db->where('sites.process_id' , '0' );
			$this->db->where('sites.status' , 'Nominated' );
			if($project_id!="")
			{
			  $this->db->where('sites.project_id' , $project_id ); 
			}
			if($parameter != "" )
			{
			  if($parameter == "district" )
			  {
			    $this->db->where( 'region' , $region );
				$this->db->where( 'district' , $district ); 
			  }
			  if($parameter == "region")
			  {
			    $this->db->where( 'region' , $region);
			  }
			}
		  	$query = $this->db->get();
		  	$result = array(
		  		'count' => $query->num_rows(),
		  		'values' => $query->result_array()
		  	);
		  return $result;

		}
		function get_planned_stages($site_id)
		{
		    $this->db->select('*');
			$this->db->from('stages_planned');
			$this->db->join('states', 'states.id = stages_planned.state_id' );
			$this->db->where('states.site_id', $site_id);
			$query = $this->db->get();	  
			return $query->result_array();
		   
		}
		function get_completed_sites($project_id)
		{
		}
		function get_rolledout_sites($s, $f, $state, $process_id, $project_id, $parameter, $region, $district)
		{ 
			$this->db->select('sites.project_id,sites.name AS s_name, sites.status, sites.region, sites.district, states.site_id, states.id AS state_id , states.start, states.end, states.state, states.next_state, states.is_active, stages_planned.percentage_complete, persons.name');
			$this->db->from('sites');
			$this->db->join('states', 'sites.id = states.site_id' );
			$this->db->join('stages_planned', 'states.id = stages_planned.state_id' );
			$this->db->join('persons', 'stages_planned.user_id = persons.id' );
			$this->db->where('states.state', $state);
			$this->db->where('states.is_active', '1');
			if($process_id != 'none' && $process_id!= "")
			{
				$this->db->where('process_id', $process_id);
			}
	
		/*	if($f=='name' )
			 {
			   $this->db->like('sites.name', $s);
			 }
   		     else if($f=='region')
			 {
			   $this->db->like('region', $s);
			 }
			 else if($f=='division')
			 {
			   $this->db->like('division', $s);
			 }
			 else if($f=='msc/bsc')
			 {
			   $this->db->like('msc', $s);
			   $this->db->or_like('bsc', $s); 
			 }
			 else if($f=='vip')
			 {
			   $this->db->like('site_type', $s);
			 }
			 else
			 {
			   $this->db->like('sites.name', $s);
			 }*/	
			if($project_id != 0 && $project_id!="")
			{
			  $this->db->where('sites.project_id', $project_id);
			}
			if($parameter == 'district' || $parameter == 'region')
			{
			  if($parameter == "district" )
			  {
			    $this->db->where( 'sites.region' , $region );
				$this->db->where( 'sites.district' , $district ); 
			  }
			  if($parameter == "region")
			  {
			    $this->db->where( 'sites.region' , $region);
			  }
			}
			$query = $this->db->get();

			  $result = array(
			  'count' => $query->num_rows(),
			  'values' => $query->result_array()
			  );
			  return $result;	
		}
		function get_site_name($id)
		{
		  $query= $this->db->get_where('sites', array('id' => $id));
		  $row = $query->row();
          return  $row->name; 
		}
		function get_site_details($id)
		{
		  $query = $this->db->get_where('sites', array('id' => $id));
		  return $query->result_array();
		}
		function get_candidate_details($id)
		{
		  $query = $this->db->get_where('candidates', array('id' => $id));
		  return $query->result_array();
		}
		function get_site_id($pid)
		{
		      $this->db->select('id');
			  $this->db->from('sites');
			  $this->db->where('project_id', $pid);
			  $query=$this->db->get();
			  $row = $query->row(); 
              return $row->id;
		}
		function get_project_monitoring($s)
		{   
			  $this->db->select('*');
			  $this->db->from('sites');
			  $this->db->where('status', 'Active');
			  if($s!="")
			  {
			    $this->db->like('name', $s);
			  }
			  $query=$this->db->get();
		      return $query->result_array();	
		}
		function get_survey_on_site($site_id)
		{
                $this->db->select('*');
				$this->db->from('candidates');
				$this->db->join('surveys', 'candidates.id = surveys.candidate_id' , 'surveys.site_id = $site_id');
				$query = $this->db->get();
			    return $query->result_array();
		}
		function get_closing_projects($s)
		{
		       $query = $this->db->get_where('projects', array('status' => 'Active'));    
			   $this->db->select('*');
			   $this->db->from('projects');
			   $this->db->where('status' , 'Active');
			   if($s!="")
			   {
			   $this->db->like('code', $s);
			   }
			   $query=$this->db->get();
			   return $query->result_array();
		}
		function get_closing_sites($s, $f)
		{
		      if ($s=="" && $f=="")
			  {
			  $query = $this->db->get_where('sites', array('status' => 'Active'));
			  }
			  else
			  {
			     $this->db->select('*');
				 $this->db->from('sites');
				 $this->db->where('status', 'Active');
			     if($f=='name' )
				 {
				   $this->db->like('name', $s);
				 }
				 else if($f=='region')
				 {
				   $this->db->like('region', $s);
				 }
				 else if($f=='division')
				 {
				   $this->db->like('division', $s);
				 }
				 else if($f=='msc/bsc')
				 {
				   $this->db->like('msc', $s);
				   $this->db->or_like('bsc', $s); 
				 }
				 else if($f=='vip')
				 {
				   $this->db->like('site_type', $s);
				 }
				 else
				 {
				   $this->db->like('name', $s);
				 }
				 $query=$this->db->get();
			  } 
		      return $query->result_array();
		}
		function get_closing_documents($s)
		{      
		        $this->db->select('*');
				$this->db->from('attachements');
				$this->db->join('sites', 'sites.id = attachements.site_id' );
				$this->db->where('sites.status', 'Active');
				if($s!= "")
				{
				 $this->db->like('attachements.filename', $s);
				}
				$query = $this->db->get();
		       
		      return $query->result_array();
		}
		function get_rolledout_documents($limit, $offset, $s)
		{
		   //   $query = $this->db->get_where('attachements', array('is_active' => '1'),$limit, $offset);
			  $this->db->select('*');
   			  $this->db->from('attachements');
              $this->db->where('is_active', '1');
			  $this->db->limit( $limit, $offset);
			  if($s!="")
			  {
				 $this->db->like('filename', $s);
			  }
			  $query=$this->db->get();
		      return $query->result_array();
		
		}
		function get_nominal_plans($limit, $offset)
		{
           $this->db->select('*');
  		   $this->db->from('nominal_plan');
		  /* if ($id != '0')
		   {
		   $this->db->where('id', $id);
		   }
		   if ($limit != '0' || $offset!= '0')
		   {
		     $this->db->limit( $limit, $offset);
		   }*/
		   $query=$this->db->get();
		   return $query->result_array();
		}
		function get_processes()
		{
           $this->db->select('*');
  		   $this->db->from('processes');
		   $query=$this->db->get();
		   return $query->result_array();
		}
		function get_calendars()
		{
           $this->db->select('*');
  		   $this->db->from('calendars');
		   $query=$this->db->get();
		   return $query->result_array();
		}
		function get_nominal_plan($limit, $offset, $s, $f, $id)
		{ 	 
		  $this->db->select('*');
   		  $this->db->from('nominal_plan_details');
          $this->db->where('nominal_plan_id', $id);
             if($f!="")
			 {         
				 if($f=='name' )
				 {
				   $this->db->like('site_id', $s);
				 }
				 else if($f=='region')
				 {
				   $this->db->like('region', $s);
				 }
				 else if($f=='division')
				 {
				   $this->db->like('division', $s);
				 }
				 else if($f=='msc/bsc')
				 {
				   $this->db->like('msc', $s);
				   $this->db->or_like('bsc', $s); 
				 }
				 else if($f=='bts_type')
				 {
				   $this->db->like('bts_type', $s);
				 }
				 else if($f=='clutter')
				 {
				   $this->db->like('clutter', $s);
				 }
			 }
			 else
			 {
			   $this->db->like('site_id', $s);
			 }
			 
			 if ($limit != '0' )
			 {
			  $this->db->limit( $limit, $offset);
			 }
		  $query=$this->db->get();
		  return $query->result_array();
		}
		function get_process($limit, $offset, $p_id)
		{ 
   		  $this->db->select('*');
		  $this->db->from('process_details');
		  $this->db->order_by("stage_id",'asc');
          $this->db->where('process_id', $p_id);
		  if($limit!= '0')
		  {
		    $this->db->limit( $limit, $offset);
		  }
		  $query=$this->db->get();
		  return $query->result_array();
		}
		function get_project_name($id)
		{ 
		  $query = $this->db->get_where('projects' , array('id' => $id));
		  $row = $query->row();
          return  $row->code; 
		}
		function get_plan_name($id)
		{
		  $query = $this->db->get_where('nominal_plan' , array('id' => $id));
		  $row = $query->row();
          return  $row->plan_name; 
		}
		//these r sites instead of project
		function planned_site( $projects , $date, $p_id, $project_id, $c_id, $off1, $off2)
		{
          $start_date = $date;
		  foreach ($projects as $site_id) {

		  $site = array( 
		             'process_id' => $p_id,
		             'status' => 'status'+2,
		             ); 
		  $this->db->update('sites', $site, array('id' => $site_id));
		 
		 // - creating associated states entries in the states table with the time and state detail from nominal plan and start date.
         //- all the associated states have the field "is_active = 0" in the beginning
		  $query = $this->db->get_where('process_details' , array('process_id' => $p_id ));
		  $dates = new Workdays("", $c_id, $off1, $off2);
	      
		  if ($query->num_rows() > 0)
		  {
			   foreach ($query->result() as $row)
			   {
				 // calculate end date frome leadtime
				 $timeStamp =  strtotime($date);
				 $lead_time = $row->lead_time;
				 
				 $timeStamp += 24 * 60 * 60 * $lead_time; // (add days according to lead time)
				 $end_date = date("Y-m-d", $timeStamp);
			     $working_days = $dates->days_diff($date, $end_date);
				 if($lead_time == '0')
				 {
				     $end_date=$date;
				 }
				 else
				 {
					 if( $dates->days_diff($end_date)== '0')
					 {
					   while($dates->days_diff($end_date)=='0')
					   {
						   $timeStamp =  strtotime($end_date);
						   $timeStamp += 24 * 60 * 60 * 1; // (add 1 day according to lead time)
						   $end_date = date("Y-m-d", $timeStamp);
					   }
					 }
					 $lead_time = $lead_time+1;
					 if($working_days != $lead_time)
					 {
					   $lead_time_new= $lead_time;
					   while($working_days != $lead_time)
					   {
							$timeStamp =  strtotime($date);
							$difference =  $lead_time_new - $working_days ;
							$lead_time_new = $lead_time + $difference;
							$timeStamp += 24 * 60 * 60 * $lead_time_new; // (add days according to lead time)
							$end_date = date("Y-m-d", $timeStamp);
							$working_days = $dates->days_diff($date, $end_date);
					   }
					 }
				 } 
				 // get next row 
				 $current_stage = $row->stage;
				 $row = $query->next_row('array');
			
				 if ($row > 0 )
				 $next_state= $row['stage'];
				 else
				 $next_state= 0;
				 
				 $state = array( 
							'site_id' =>  $site_id ,  
							'state' => $current_stage,
							'next_state' => $next_state,
							'start' => $date,
							'end' => $end_date,
							'is_active' => '0',
						 ); 
				  $this->db->insert('states', $state);
				  $date =$end_date;
				  }	   
		    }		 
            //- The projects status is changed to "Planned" and the planned_on is marked with the actual date in the projects table.
            $project = array(
							   'status' => 'status'+2,
							   'planned_on' => $start_date,
							);
		    $this->db->update('projects', $project, array('id' => $project_id));
		  } // end for loop  
		  
		}
		function get_chart_details($id)
		{
		  $this->db->select('*');
   		  $this->db->from('states');
          $this->db->where('site_id', $id);
		  $query=$this->db->get();
		  return $query->result_array();
		}
		function get_distinct_values( $key, $plan_id)
		{
		  $this->db->select($key);
		  $this->db->distinct();
          $this->db->from('nominal_plan_details');
		  $this->db->where('nominal_plan_id', $plan_id);
		  $query=$this->db->get();
		  $result =array(
		   'result' => $query->result_array(),
		   'count' => $query->num_rows(),
		  );
		  return $result;	  
		}
		function get_sites_count( $field, $value)
		{
		  $this->db->select('site_id');
		  $this->db->distinct();
          $this->db->from('nominal_plan_details');
		  $this->db->where($field, $value);
		  $query=$this->db->get();
		  return $query->num_rows();
		}
		function get_site_count_details( $field, $value)
		{
		  $this->db->select('*');
          $this->db->from('nominal_plan_details');
		  $this->db->where($field, $value);
		  $query=$this->db->get();
		  return $query->result_array();
		}
		function get_edit_filtered_results($plan_id, $s, $dis, $bsc, $msc, $reg, $pha, $type, $cap, $div, $clut)
		{
		  $this->db->select('site_id');
		  $this->db->distinct();
   		  $this->db->from('nominal_plan_details');
          $this->db->where('nominal_plan_id', $plan_id);
		  $this->db->like('site_id', $s);
             if($dis!="")
			 {         
				$this->db->like('district', $dis);
			 }
			 if($reg!="")
			 {
			    $this->db->like('region', $reg);
			 }
			if($div!="")
			{
				$this->db->like('division', $div);
			}
			if($msc!="")
			{
				$this->db->like('msc', $msc); 
			}
			if($bsc!="")
			{
			   $this->db->like('bsc', $bsc); 
			}
		    if($type!="")
			{
			   $this->db->like('type', $type);
			}
			if($clut!="")
			{
			   $this->db->like('clutter', $clut);
			}
			if($pha!="")
			{
			   $this->db->like('phase', $pha);
			}
			if($cap!="")
			{
			   $this->db->like('capacity', $cap);
			}		 
		  $query=$this->db->get();
		  return $query->result_array();
		}
		function get_next_stage($id, $next_state, $site_id)
		{ 

		  $this->db->select('*');
   		  $this->db->from('states');
          $this->db->where('id', $id);
		  $query=$this->db->get();
		  $row = $query->row_array(); 
          if( strcmp($row['state'], $next_state) == 0 )
		  {
		      return NULL;
		  } 
		  else
		  {
			  $this->db->select('*');
			  $this->db->from('states');
			  $this->db->where('site_id', $site_id);
			  $this->db->where('state', $next_state);
			  $query=$this->db->get();
			  $row = $query->row(); 
              return $row->id;
		  }
		      
		  
		}
		function get_total_sites_project($project_id)
		{
		     $this->db->select('*');
			 $this->db->from('sites');
			 $this->db->where('project_id' , $project_id );
			 $query=$this->db->get();
			 $result =array(
			   'result' => $query->result_array(),
			   'count' => $query->num_rows(),
			  );
			  return $result;	  
			// $rows =$this->db->count_all_results();
			// return $rows;
		}
		function get_procees_based_sites( $project_id )
		{
		  $this->db->select('sites.process_id, processes.name');
		  $this->db->distinct();
          $this->db->from('sites');
		  $this->db->join('processes', 'sites.process_id = processes.id');
		  $this->db->where('project_id' , $project_id );
		  $query=$this->db->get();
	      $result =array(array());
		  $i = 0;
		  foreach ($query->result() as $row)
		  {
			   $this->db->select('*');
			   $this->db->from('sites');
			   $this->db->where('process_id' , $row->process_id );
			   $this->db->where('project_id' , $project_id );
			   $rows =$this->db->count_all_results();
			   $result[$i]['process_id'] = $row->process_id;
			   $result[$i]['name'] = $row->name;
			   $result[$i]['count'] = $rows;
			   //$result[$row->name] = $rows;
			   $i++;
		  }
		  
		  return $result;
		}
		function get_sites_in_process($project_id, $process_id, $status)
		{
		       $this->db->select('*');
			   $this->db->from('sites');
			   $this->db->where('process_id' , $process_id );
			   $this->db->where('project_id' , $project_id );
			   if($status != "")
               {
			     $this->db->where('status', $status);
			   }
			   $query=$this->db->get();
			   $result =array(
			   'result' => $query->result_array(),
			   'count' => $query->num_rows(),
			  );
			  return $result;
		}
		function get_grouped_stages()
		{
		  // to do
		}
		function get_project_regions($project_id)
		{
		  $this->db->select('region');
		  $this->db->distinct();
		  $this->db->from('sites');
		  $this->db->where('project_id', $project_id);
		  $query=$this->db->get();
		  $result =array(array());
		  $i = 0;
		  foreach ($query->result() as $row)
		  {
			   $this->db->select('*');
			   $this->db->from('sites');
			   $this->db->where('region' , $row->region );
			   $this->db->where('project_id' , $project_id );
			   $rows =$this->db->count_all_results();
			
			   $result[$i]['name'] = $row->region;
			   $result[$i]['count'] = $rows;
			   $i++;
		  } 
		  return $result;
		}
		function get_districts_region( $project_id, $region)
		{
		  
		  $this->db->select('district');
		  $this->db->distinct();
		  $this->db->from('sites');
		  $this->db->where('project_id', $project_id);
		  $this->db->where('region', $region);
		  $query=$this->db->get();
		  $result =array(array());
		  $i = 0;
		  foreach ($query->result() as $row)
		  {
			   $this->db->select('*');
			   $this->db->from('sites');
			   $this->db->where('district' , $row->district );
			   $this->db->where('region' , $region );
			   $this->db->where('project_id' , $project_id );
			   $rows =$this->db->count_all_results();
	            
			   $result[$i]['name'] = $row->district;
			   $result[$i]['count'] = $rows;
			   $i++;
		  } 
		  return $result; 
		  
		}
		function get_sites_in_district($project_id, $region, $district, $status)
		{
		       $this->db->select('*');
			   $this->db->from('sites');
			   $this->db->where('project_id' , $project_id );
			   if($region != "")
			   {
			     $this->db->where('region' , $region );
			   }
			   $this->db->where('district' , $district );
			   if($status != "")
               {
			     $this->db->where('status', $status);
			   }
			   $query=$this->db->get();
			   $result =array(
			   'result' => $query->result_array(),
			   'count' => $query->num_rows(),
			  );
			  return $result;	  
		}
		function get_months()
		{
		   $months = array
				  ( 
				   array ('name' => "May", 'value' => "05"),
				   array ('name' => "Jun", 'value' => "06"),
				   array ('name' => "Jul", 'value' => "07"),
				   array ('name' => "Aug", 'value' => "08"),
				   array ('name' => "Sep", 'value' => "09"),
				   array ('name' => "Oct", 'value' => "10"),
				   array ('name' => "Nov", 'value' => "11"),
				   array ('name' => "Dec", 'value' => "12"),
				   array ('name' => "Jan", 'value' => "01"),
				   array ('name' => "Feb", 'value' => "02"),
				   array ('name' => "Mar", 'value' => "03"),
				   array ('name' => "Apr", 'value' => "04"), 
				  );			
		   return $months;
	
		}
		function get_years()
		{	
		   $years = array
				  ( 
				   array ('name' => "2007", 'value' => "07"),
				   array ('name' => "2008", 'value' => "08"),
				   array ('name' => "2009", 'value' => "09"),
				   array ('name' => "2010", 'value' => "10"),
				   array ('name' => "2011", 'value' => "11"),
				   array ('name' => "2012", 'value' => "12"),
				   array ('name' => "2013", 'value' => "13"),
				   array ('name' => "2014", 'value' => "14"),
				   array ('name' => "2015", 'value' => "15"),
				   array ('name' => "2016", 'value' => "16"),
				   array ('name' => "2017", 'value' => "17"),
				   array ('name' => "2018", 'value' => "18"),
				   array ('name' => "2019", 'value' => "19"),
				   array ('name' => "2020", 'value' => "20"), 
				  );			
		   return $years;
		}
		function validate_candidate_info($data)
		{ 
		  $field = "";
		  $validation = new Csv_validation();
		  // check value is valid candidate (i.e an alphabetic character)
		  $result = $validation->matches_pattern($data['1'], "[A-Z]", ""); 
		  if($result == '1') 
		  {
		    $field = "";
		  }
		  else
		  {
			return 'code';
		  }
		  
		  // check value is valid latitude && Latitude must<90 >=-90
		  $result = $validation->matches_pattern($data['2'], "", 'latitude'); 
		  	
		    if ($result == '1') {
			 $field = "";
			}
			else{
			 return 'latitude';
			}

		  // check value is valid longitude && longitude must>=-180 & <180.
           $result = $validation->matches_pattern($data['3'], "", 'longitude');
		    if ($result == '1') {
			  $field = '1';
			}
			else
			{
			  return 'longitude';
			}
		  // check value is a numeric value and valid distance
		  if((is_numeric($data[4])))
		  {
		     $field = "";
		  }
		  else
		  {
			 return 'candidate distance';
		  }
		  return $field;
		}
		function validate_activity_info($data)
		{
		  $field = "";
		  $validation = new Csv_validation();
		  // check value is valid activity type
		  $type = array("RND","Acquisition","Transmission","Civil Works","Telecom","Other");
          if (in_array($data['1'], $type)) {  
		    $field = "";
		  }
		  else
		  {
			return 'type';
		  }
		  
		  // check value is valid date and correct date format
		  $result = $validation->matches_pattern($data['6'], "", 'date'); 
		  	
		  if ($result == '1') {
		  $field = "";
		  } 
		  else{
		  return 'activity on';
		  }
		  return $field;
		}
		function validate_survey_info($data)
		{
		  $field = "";
		  $validation = new Csv_validation();
		  $category = array('RND','Transmition');
		  $type = array('Scoping','Intermediate','PSS');
		  // check value is valid cateogry type 
		  if (in_array($data['1'], $category)) {  
			  $field = "";
		  }
		  else
		  {
			  return 'category';
		  }
		  // check value is valid survey type 
		  if (in_array($data['2'], $type)) {  
			  $field = "";
		  }
		  else
		  {
			  return 'type';
		  }
		  // check value is valid latitude && Latitude must<90 >=-90
		  $result = $validation->matches_pattern($data['4'], "", 'latitude');	
		  if ($result == '1') {
			 $field = "";
		  }
		  else{
			 return 'latitude';
		  }

		  // check value is valid longitude && longitude must>=-180 & <180.
          $result = $validation->matches_pattern($data['5'], "", 'longitude');
		  if ($result == '1') {
			  $field = '1';
		  }
		  else
		  {
			  return 'longitude';
		  }
		  // check value is a numeric and valid distance
		  if((is_numeric($data[6])))
		  {
		     $field = "";
		  }
		  else
		  {
			 return 'candidate distance';
		  }
		  // check value is a numeric and valid distance
	/*	  if((is_numeric($data[7])) && (is_numeric($data[8])))
		  {
		     $field = "";
		  }
		  else
		  {
			 return 'antenna height';
		  } */
		  
		  // check value is valid date and correct date format
		  $result = $validation->matches_pattern($data['33'], "", 'date');   	
		  if ($result == '1') {
		  $field = "";
		  } 
		  else{
		  return 'survey on';
		  }
		   return $field;
		}
}
?>