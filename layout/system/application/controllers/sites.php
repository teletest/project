<?php
class Sites extends My_Controller {
	
	function Sites()
	{
		// Initialize
		parent::My_Controller();
		$this->load->model('sites_model');
	}

	function index()
	{
		// Initialize
		$data = tags();
		$data['tabs']	= tabs('sites');

		$this->parser->parse('sites/index', $data);		
	}
	
	function summary($type=''){
		$data = tags();
		$data['tabs']	= tabs('sites');

		// Fill in the site array with the details after running the query
		$data['sites'] = $this->sites_model->getSitesCount();
		
		
		// Pass the data for tabular or graphical detail
		switch ($type){
			
			case 'graph':
				$data['series']=$data['sites'];
				$data['macros']=$data['sites'];
				$data['micros']=$data['sites'];
				$this->parser->parse('sites/summary_graph', $data);			
				break;
			
			default:
				$this->parser->parse('sites/summary', $data);			
				break;
		}			
		
	}
	
	function detail($type,$detail_id, $from_page=0){
		
		// Initialize
		$db = $this->load->database('rft', TRUE);	
		$per_page = 20;
		
		$data = tags();
		$data['tabs'] = tabs('sites');
		$data['type'] = $type;
		$data['detail_id'] = $detail_id;
	
		// Get the basic query for passed parameters
		$qa = $this->sites_model->getQuery($detail_id);
		$data['detail_title'] = $qa['title'];
		$q =  $qa[$type];		

		// Count all of the records
		$qtr = str_replace("?","count(*) as n",$q);
		$res = $db->query($qtr);
		$row = $res->result_array();
		$total_rows = $row[0]['n'];
		
		if ($detail_id == 'Secured')
		{
			// Special Case							
			$qa = array(
			'title'	=> "Secured",
			'macro'=> "select a.`Site ID` ,  b.District, b.BSC, b.Cluster from rnd_pss as a left join siteacceptance as b on (a.`Site ID`=b.`Site ID`) where a.`Final Status` in ('Secured','CDD Done') and a.`Site ID` not like 'MI%'  Order By District, BSC, Cluster, `Site ID` LIMIT ${from_page},${per_page}",
			
			'micro'=> "select  a.`Site ID`, b.District, b.BSC, b.Cluster  from rnd_pss as a left join siteacceptance as b on (a.`Site ID`=b.`Site ID`) where a.`Final Status` in ('Secured','CDD Done') and a.`Site ID` like 'MI%'  Order By District, BSC, Cluster, `Site ID` LIMIT ${from_page},${per_page}"
			);
			$q =  $qa[$type];				
		} 
		else 
		{					
			// Create the query to get the related information
			$q = str_replace("?","District, BSC, Cluster, `Site ID`",$q);
			$q .= " Order By District, BSC, Cluster, `Site ID` LIMIT ${from_page},${per_page}";	
		}
		$res = $db->query($q);
		$data['sites'] = $res->result_array();

		// Do the pagination Stuff
		$this->load->library('pagination');
		
		// Setup the pagination
		$this->pagination->initialize(
			array(
				'base_url' 		=> site_url() . "/sites/detail/" . $type . "/" . $detail_id,
				'total_rows'	=> $total_rows,
				'per_page'		=> $per_page,
				'uri_segment'	=> 5
			)
		);
		
		// Data to be sent to the template
		$data['pagination'] = $this->pagination->create_links();		
		
		// Parse the template
		$this->parser->parse('sites/detail', $data);	
	}
	
	
}


/* End of file sites.php */
/* Location: ./system/application/controllers/sites.php */
