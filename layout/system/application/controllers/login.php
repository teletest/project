<?php
class Login extends My_Controller {

	function Login()
	{
		parent::MY_Controller();
		// $this->load->model('settings_model', '', TRUE);
		$this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->library('email');
	}

	// --------------------------------------------------------------------

	function index()
	{
		$username = $this->input->post('username');
		$newdata = array(
                   'username'  => $username,
                   'logged_in' => TRUE
               );

         $this->session->set_userdata($newdata);

		$data = tags();
		$data['tabs']	= array();
		$data['ShowLeftSide']	= "No";		
		$data['ShowRightSide']	= "No";






		if (isset($username) && $username != '')
		{
			$this->site_sentry->login_routine();
		}
		else
		{
			$data['page_title'] = $this->lang->line('login_login');
			$this->parser->parse('login/index', $data);
		}
	}

	// --------------------------------------------------------------------

	function login_fail()
	{
		$data = tags();
		$data['tabs']	= array();
		
		$data['page_title'] = $this->lang->line('login_login');
		
		$this->parser->parse('login/login_fail',$data);
	}

	// --------------------------------------------------------------------


	
}


/* End of file login.php */
/* Location: ./system/application/controllers/login.php */