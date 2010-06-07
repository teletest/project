<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sites_model extends Model{

	function Sites_model()
	{
		parent::Model();

	}	
	
	function getSitesCount()
	{
		$db = $this->load->database('rft', TRUE);

		// Load all of the quaries
		$queries = $this->getQueries();
	
		// Fill in the site array with the details after running the query
		$data = array();
			
		foreach ($queries as $id => $qry){
			
			// Count the no. of sites from respective queries in $macro and $micro
			foreach (array('macro','micro') as $type){
				$q = str_replace("?","count(*) as `n`",$qry[$type]);
				$res = $db->query($q);	
				$row = $res->result_array();
				${$type} = $row[0]['n'];
			}
								
			// Add the result for each query title
			$data[]=array(
				'detail_id' => $id,
				'site_title' => $qry['title'], 
				'macro' => $macro,
				'micro' => $micro,
				);

		}
		
		return $data;
		
	}	
	
	function getQuery($id)
	{
		return 	$this->getQueries($id);
	}
		
	function getQueries($id='')
	{
		$queries = array(
	
				
		'onhold' => array(
				'title'	=> "On Hold",
				'macro' => "select ? from `siteacceptance` where  `Onhold Date`!='0000-00-00'",
				'micro' => "select ? from `siteacceptance_micro` where  `Onhold Date`!='0000-00-00'",
				),

		
		'alarm' => array(
				'title'	=> "Alarm",
				'macro' => "select ? from `siteacceptance` where  `Alarm Date`!='0000-00-00'",
				'micro' => "select ? from `siteacceptance_micro` where  `Alarm Date`!='0000-00-00'",
				),

		'total' => array(
				'title'	=> "Total",
				'macro'=> "select ? from `siteacceptance`",
				'micro'=> "select ? from `siteacceptance_micro`"
				),	
		
		// Special Case			
		'Secured'	=> array(
				'title'	=> "Secured",
				'macro'=> "select count(distinct `Site ID`) as `n` from `rnd_pss` where `Final Status` in ('Secured','CDD Done') and `Site ID` not like 'MI%'",
				'micro'=> "select count(distinct `Site ID`) as `n` from `rnd_pss` where `Final Status` in ('Secured','CDD Done') and `Site ID` like 'MI%'"
				),

											
				
		'RFSDone'	=> array(
				'title'	=> "RFS Done",
				'macro'=> "select ? from `siteacceptance` where `RFS Date`!='0000-00-00'",
				'micro'=> "select ? from `siteacceptance_micro` where `RFS Date`!='0000-00-00'"
				),
				
		'PATDone'			=> array(
				'title'	=> "PAT Done",
				'macro'=> "select ? from `siteacceptance` where `PAT Date`!='0000-00-00'",
				'micro'=> "select ? from `siteacceptance_micro` where `PAT Date`!='0000-00-00'",
				),				
				
		'onair'		=> array(
				'title'	=> "On Air",
				'macro'=> "select ? from `siteacceptance` where `On Aired Date`!='0000-00-00'",
				'micro'=> "select ? from `siteacceptance_micro` where `On Aired Date`!='0000-00-00'"
				),												


		'DTDone'			=> array(
				'title'	=> "DT Done",
				'macro'=> "select ? from `siteacceptance` where `Date DT Completed`!='0000-00-00'",
				'micro'=> "select ? from `siteacceptance_micro` where `Date DT Completed`!='0000-00-00'",
				),
				
		'DTReportDone'			=> array(
				'title'	=> "DT Report Done",
				'macro'=> "select ? from `siteacceptance` where `Date DT Report Done`!='0000-00-00'",
				'micro'=> "select ? from `siteacceptance_micro` where `Date DT Report Done`!='0000-00-00'",
				),
				
		'DTReportSubmit'			=> array(
				'title'	=> "Report Submitted to Warid",
				'macro'=> "select ? from `siteacceptance` where `Date DT Report Submitted to Warid`!='0000-00-00'",
				'micro'=> "select ? from `siteacceptance_micro` where `Date DT Report Submitted to Warid`!='0000-00-00'",
				),
				
		'DTReportAccept'			=> array(
				'title'	=> "Accepted",
				'macro'=> "select  ? from `siteacceptance` where  `Date DT Report Accepted by Warid`!='0000-00-00'",
				'micro'=> "select  ? from `siteacceptance_micro` where  `Date DT Report Accepted by Warid`!='0000-00-00'",
				),
	
		
		);	
		
		if ($id == '')
			return $queries;
		else
			return 	$queries[$id];
			
	}



}

