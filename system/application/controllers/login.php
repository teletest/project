<?php
/*class Login extends My_Controller {

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
	
	function change_password( $user_id = "")
	{
	    $username = $_SESSION['sess_username'];
		$old_password = $_SESSION['sess_password'];
	    $data = tags();
		$data['tabs']	= array();
		$data['page_title'] = $this->lang->line('login_login');
		$data['username'] = $username;
		$data['password'] = $old_password;
		$this->parser->parse('login/change_password',$data);
		 
	}


	
} */
?>
<?php
class Login extends Controller {

	function Login()
	{
		parent::Controller();
		// $this->load->model('settings_model', '', TRUE);
		$this->load->helper('string');
		$this->load->library('encrypt');
		$this->load->library('email');
	}

	// --------------------------------------------------------------------

	function index()
	{
		//This assumes you used the sample MySQL table
		$user_table = 'persons';
		$data = tags();
		$data['tabs']	= tabs('project');
		$data['page_title'] = "Login";
		//Load the URL helper
		$this->load->helper('url');
		
		//BOF Login user
		if(!$this->session->userdata('logged_in')) {
		
		$this->parser->parse('login/index', $data);
			//redirect('login/');
		
		} else {
			echo '<div id="logut">';
				echo '<h3>Logut</h3>';
				echo '<a href="' . site_url('/login/logout/') . '">Click here to logout.</a>';
			echo '</div>';
			echo '<hr />';
			
		}
		//EOF Login user
		
	}
	
	function create()
	{
		//Load
		$this->load->helper('url');
		$this->load->library('validation');
		
		//Check incoming variables
		//$rules['create_username']	= "required|min_length[4]|max_length[32]|alpha_dash";
		//$rules['create_password']	= "required|min_length[4]|max_length[32]|alpha_dash";
		
		$rules['create_username']	= "required|min_length[4]|max_length[32]";
		$rules['create_password']	= "required|min_length[4]|max_length[32]";		

		$this->validation->set_rules($rules);

		$fields['create_username'] = 'Username';
		$fields['create_password'] = 'Password';
		
		$this->validation->set_fields($fields);
				
		if ($this->validation->run() == false) {

			redirect('/login/');			
		} else {
			//Create account
			if($this->simplelogin->create($this->input->post('create_username'), $this->input->post('create_password'))) {

				redirect('/project/');	
			} else {

				redirect('/login/');			
			}			
		}
	}

	function delete($user_id)
	{
		/* This method can delete your current user account
		 * and you will still be logged in until you click
		 * the logout button (then you won't be able to login again')
		 */
		
		//Load
		$this->load->helper('url');

		if($this->simplelogin->delete($user_id)) {

			redirect('/login/');	
		} else {

			redirect('/login/');			
		}			
		
	}

	function log_in()
	{
		//Load
		$this->load->helper('url');
		$this->load->library('validation');
		
		//Check incoming variables
		$rules['login_username']	= "required|min_length[4]|max_length[32]|alpha_dash";
		$rules['login_password']	= "required|min_length[4]|max_length[32]|alpha_dash";		

		$this->validation->set_rules($rules);

		$fields['login_username'] = 'Username';
		$fields['login_password'] = 'Password';
		
		$this->validation->set_fields($fields);
				
		if ($this->validation->run() == false) {

			redirect('/login/');			

		} else {
			//Create account
			if($this->simplelogin->login($this->input->post('login_username'), $this->input->post('login_password'))) {
                redirect('/projects/');
					
			} else {
                redirect('/login/');			
			}			
		}
	}

	function logout()
	{
		//Load
		$this->load->helper('url');

		//Logout
		$this->simplelogin->logout();
		redirect('/login/');
	}


	
}


/* End of file login.php */
/* Location: ./system/application/controllers/login.php */


/* End of file login.php */
/* Location: ./system/application/controllers/login.php */
?>