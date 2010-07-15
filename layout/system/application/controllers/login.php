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
		$data['ShowLeftSide']	=	false;
        $data['ShowRightSide']	=	false;
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
	
	function change_password( $user_id = "", $value = "")
	{
	    $data = tags();
		$data['tabs']	= tabs('projects');
		$data['page_title'] = $this->lang->line('login_change_password');
		
	//	if($this->session->userdata('logged_in')) {
		    $username = $this->session->userdata('username');
			$user_id = $this->session->userdata('id');
		    $data['username'] = $username;
			$data['user_id'] = $user_id;
			if($this->input->post('save')!="")
			{
			   $this->load->helper(array('form', 'url'));
			   $this->load->library('form_validation');
			   $this->form_validation->set_rules('password', 'Old Password', 'required|callback_matches_curr_pw');
			   $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[3]|max_length[32]|matches[re_new_password]');
			   $this->form_validation->set_rules('re_new_password', 'Confirm New Password', 'required|min_length[3]|max_length[32]');
			   $this->form_validation->set_message('matches', $this->lang->line('login_password_reconfirm'));
			 
			   if ($this->form_validation->run() == FALSE)
			   {
				  $this->redirect_to($user_id, validation_errors());
			   }
			   else
			   { 
			    $new_password = $this->input->post('new_password');
				$password = md5($new_password); 
				$pswd = array(
						'password' =>  $password,
					);
				$this->db->update('persons', $pswd, array('id' => $user_id));
			    $this->parser->parse('login/password_success',$data);
			   }
			}   
			else
			{	
			   $this->parser->parse('login/change_password',$data);	
			}
		
		//}
		
		 
	}
	function redirect_to($usr_id ="" , $value ="")
	{
	    $data = tags();
		$data['tabs']	= array();
		$data['page_title'] = $this->lang->line('login_change_password');
		
		$username = $this->session->userdata('username');
		$user_id = $this->session->userdata('id');
		$data['username'] = $username;
		$data['user_id'] = $user_id;
	    $this->parser->parse('login/change_password',$data);
	}
	function matches_curr_pw($str) {
        if(empty($str)) {
            return true;
        } else {
            $curr_pw = md5($str);
            $this->db->where('ID', $this->session->userdata('id'));
            $qry = $this->db->get('persons');
            $row = $qry->row_array();
            $db_pw = $row['password'];
            if($curr_pw == $db_pw) {
                return true;
            } else {
                $this->form_validation->set_message('matches_curr_pw', ' %s is not correct');
                return false;
            }    
        }
    }

	function log_in()
	{
		//Load
		$this->load->helper('url');
		$this->load->library('validation');
		$data['ShowLeftSide']	=	false;
        $data['ShowRightSide']	=	false;
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
        $data['ShowLeftSide']	=	false;
        $data['ShowRightSide']	=	false;
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