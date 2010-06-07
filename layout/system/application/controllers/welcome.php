<?php
class Welcome extends My_Controller
{
    function Welcome()
    {
        parent::My_Controller();
    }

	function index()
	{

		if ($this->db->conn_id == "")
		{
			show_error("Teletest could not connect to your database with the information provided in system/application/config/database.php");
		}

		if ( ! $this->db->table_exists('users'))
		{
			// The system isn't installed yet.  If it isn't then this will kick in, and ask the user to install
			// location redirecting would be faster... but isn't 100% reliable across all servers
			redirect('/install/not_installed', 'refresh');
			exit;
		}

		if ($this->site_sentry->is_logged_in()) 
		{
			$data = tags();
			$data['tabs']	= tabs('dashboard');
			// $data['page_title'] = 'Dashboard';
			
			
			// Example of Processing the alerts
			// To be collected from DB
			$alerts = array(
				'Hello',
				'World',
			);
			
			// Pre processing
			$data['alerts']=array();
			foreach($alerts as $alert)
				$data['alerts'][]=array('alert'=>$alert);
			
			
			
			
			// The chart id to be collected from the DB
			// this will be a list of ids to be shown for a certain group
			$query = $this->db->get_where('components' , array('type' => 'Image', 'isactive' => 1));
			$data['images'] = $query->result_array();	

			$query = $this->db->get_where('components' , array('type' => 'Flash', 'isactive' => 1));
			$data['flash_animations'] = $query->result_array();			
			
			$query = $this->db->get_where('components' , array('type' => 'Chart', 'isactive' => 1));
			$data['charts'] = $query->result_array();
			
			// print_r($data);

			$this->parser->parse('index/dashboard', $data);
		}
		else
		{
			redirect('login');
		}
	}
	
	
	
	function rft($script = array())
	{
		if ($this->site_sentry->is_logged_in()) 
		{
					
			$data = tags();
			$data['tabs']	= tabs('rft');
	
			print_r($script);
		
			// $this->parser->parse('rft/$script', $data);
		} 
		else
		{
			redirect('login');
		}
		print_r($script);			
	
	}


	
}




/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */