<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Charts_model extends Model{
	
	function Charts_model()
	{
		parent::Model();
	}
	/*
	* takes state as input
	*
	* returns all the sites in that state regardless project
	*
	*/
		
	function get_rolledout_sites($state)
	{ 
			$this->db->select('sites.name, states.site_id, states.id AS stage_id , states.start, states.end, states.state, stages_planned.actual_start_date, stages_planned.actual_end_date');
			$this->db->from('sites');
			$this->db->join('states', 'sites.id = states.site_id' );
			$this->db->join('stages_planned', 'states.id = stages_planned.state_id' );
			$this->db->join('persons', 'stages_planned.user_id = persons.id' );
			$this->db->where('states.state', $state);
			$this->db->where('states.is_active', '1');
					
			$query = $this->db->get();	  
			return $query->result_array();
		
	}
	/*
	* takes project id, start date and end date as input
	*
	* returns number of planned sites in that project and between start and end date
	*
	*/
	function get_planned_sites_indays($project_id, $start_date, $end_date)
	{
	//SELECT * FROM states a JOIN (SELECT s.id sid FROM sites s JOIN projects p ON p.id = s.project_id WHERE p.id = '$project_id') st ON st.sid = a.site_id WHERE end BETWEEN '$start_date' AND '$end_date'";		
	   $query = $this->db->query("SELECT * FROM states a JOIN (SELECT s.id sid FROM sites s JOIN projects p ON p.id = s.project_id WHERE p.id = '$project_id') st ON st.sid = a.site_id WHERE end BETWEEN '$start_date' AND '$end_date'");
	   return $query->num_rows();  
	}
	/*
	* takes project id, start date and end date
	*
	* returns number of actual sites in that project and between start and end date
	*
	*/
	function get_actual_sites_indays($project_id, $start_date, $end_date)
	{
	   $query = $this->db->query("SELECT * FROM states a JOIN (SELECT s.id sid FROM sites s JOIN projects p ON p.id = s.project_id WHERE p.id = '$project_id') st ON st.sid = a.site_id WHERE end BETWEEN '$start_date' AND '$end_date' AND is_complete='1'");
	   return $query->num_rows();
	   
	}
	/*
	* takes values of pie chart as input
	*
	* generate the xml for pie chart based on values
	*
	*/
	function get_piechart_xml( $values )
	{
	   $strXML  = "";
	   $strXML .="<chart palette='1' decimals='0' enableSmartLabels='1' showPercentageValues='1' enableRotation='0' bgColor='FFFFFF' bgAlpha='40,100' bgRatio='0,100' bgAngle='360' showBorder='1' startingAngle='70' >";
       
	   foreach ($values as $key => $value)
	   $strXML .="<set label='".$key."' value='".$value."'  />";
	   
	   $strXML .="</chart>";
	   return $strXML;
	}
	/**
	* takes project id , month and year as input
	*
	* generate xml for planned and actual sites in that month
	*
	**/
	function get_mscol2D_xml($project_id, $m="", $y="")
	{
	   if($m=="" || $y=="")
	   {
	     $m = date('m');
	     $y = date('y');
	   } 
	   // calculate the first day of the month and the total days in month
	   $d1 = date("w", mktime(0, 0, 0, $m, 1, $y)); 				
	   $dm = cal_days_in_month(0, $m, $y) ; 			
	   $first_day = sprintf("%4d-%02d-%02d",$y,$m, 01);		
	   $last_day = sprintf("%4d-%02d-%02d",$y,$m, $dm);
	   $rows = ceil(($d1 + $dm)/7);
	   for ($w=0;$w<$rows;$w++)
		{
			for($d=1;$d<8;$d++)	
			{
			    $dd = $w * 7 + $d - $d1;
				if($dd >=1 && $dd<=$dm)
				{
					$ddd = sprintf("%4d-%02d-%02d",$y,$m, $dd);
					if($d == '1' || $ddd==$first_day )
					{
					 $start_date[$w] = $ddd; 
					}
					if($d == '7' || $ddd==$last_day)
					{
					 $end_date[$w] = $ddd;
					}
				}
			}	
	   }			   
	   $strXML  = "";
	   $strXML .="<chart palette='2' caption='Country Comparison' shownames='1' showvalues='0' decimals='0' useRoundEdges='1' legendBorderAlpha='0' xAxisName='Number of Weeks' yAxisName='Sites Count'>";
	   $strXML .="<categories>";
	   $y=0;
	   for($x = 0 ; $x < $rows ; $x++){ 
	   $y=$x+1;
	   $strXML .= "<category label='Week" .$y. "' />";
	   }
	   $strXML .="</categories>";
	   
	   $strXML .="<dataset seriesname='Planned' color='AFD8F8' showValues='0'>";
	   for($x = 0 ; $x < $rows ; $x++){ 
	   $planned =$this->get_planned_sites_indays($project_id, $start_date[$x], $end_date[$x]);	   
	   $strXML .= "<set value='" . $planned . "' />";
	   }
	   $strXML .="</dataset>";
	  
	   $strXML .="<dataset seriesName='Actual' color='F6BD0F' showValues='0'>";
	   for($x = 0 ; $x < $rows ; $x++){ 
	   $actual =$this->get_actual_sites_indays($project_id, $start_date[$x], $end_date[$x]);	   
	   $strXML .= "<set value='" . $actual . "' />";
	   }
	   $strXML .="</dataset>";
	   
	   $strXML .="</chart>";	  
	   return $strXML;
	}
	function get_ganttchart_xml($site_id="" , $status="")
	{
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
		return $strXML;

	}
	

	
}
?>
