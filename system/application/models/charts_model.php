<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Charts_model extends Model{
	
	function Charts_model()
	{
		parent::Model();
	}
		
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
	
	function get_planned_sites_indays($project_id, $start_date, $end_date)
	{
	//SELECT * FROM states a JOIN (SELECT s.id sid FROM sites s JOIN projects p ON p.id = s.project_id WHERE p.id = '$project_id') st ON st.sid = a.site_id WHERE end BETWEEN '$start_date' AND '$end_date'";		
	   $query = $this->db->query("SELECT * FROM states a JOIN (SELECT s.id sid FROM sites s JOIN projects p ON p.id = s.project_id WHERE p.id = '$project_id') st ON st.sid = a.site_id WHERE end BETWEEN '$start_date' AND '$end_date'");
	   return $query->num_rows();  
	}
	
	function get_actual_sites_indays($project_id, $start_date, $end_date)
	{
	   $query = $this->db->query("SELECT * FROM states a JOIN (SELECT s.id sid FROM sites s JOIN projects p ON p.id = s.project_id WHERE p.id = '$project_id') st ON st.sid = a.site_id WHERE end BETWEEN '$start_date' AND '$end_date' AND is_complete='1'");
	   return $query->num_rows();
	   
	}
	
	function get_piechart_xml( $values )
	{
	   $strXML  = "";
	   $strXML .="<chart palette='1' decimals='0' enableSmartLabels='1' showPercentageValues='1' enableRotation='0' bgColor='FFFFFF' bgAlpha='40,100' bgRatio='0,100' bgAngle='360' showBorder='1' startingAngle='70' >";
       
	   foreach ($values as $key => $value)
	   $strXML .="<set label='".$key."' value='".$value."'  />";
	   
	   $strXML .="</chart>";
	   return $strXML;
	}
	
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

	
}
?>
