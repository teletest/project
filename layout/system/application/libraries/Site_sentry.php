<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Site Sentry security library for Code Igniter applications
* Author: James Nicol, Glossopteris Web Designs & Development, www.glossopteris.com, April 2006
*
* Modified for Teletest by Irfan TOOR
*/

class Site_sentry 
{

	function Site_sentry()
	{
		$this->obj =& get_instance();
	}

	function is_logged_in()
	{
		if ($this->obj->session) {

			//If user has valid session, and such is logged in
			if ($this->obj->session->userdata('logged_in'))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}

		}
		else
		{
			return FALSE;
		}
	} 

	function is_admin()
	{
		if ($this->obj->session) {

			//If user has valid session, and such is logged in
			if ($this->obj->session->userdata('is_admin'))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}

		}
		else
		{
			return FALSE;
		}
	} 


	function login_routine()
	{
		//Make the input username and password into variables
		$password = $this->obj->input->post('password');
		$username = $this->obj->input->post('username');

		//Use the input username and password and check against 'users' table
		$this->obj->db->where('login',$username);
		$this->obj->db->where('isactive',1);
		$this->obj->db->limit(1);
		$query = $this->obj->db->get('persons');

		$login_result = FALSE;

		if($query->num_rows() > 0){
			$rs = $query->row();
			if(md5($password) == $rs->password){
				$login_result = TRUE;
				
				$id		= $rs->login; 
				$name	= $rs->name;
				
				$this->obj->db->where('id',$rs->group_id);
				$this->obj->db->where('isactive',1);
				$this->obj->db->limit(1);				
				$query = $this->obj->db->get('groups');
				
				$rs = $query->row();

				if ($rs->name == 'Administrator')
					$is_admin = TRUE;
				else
					$is_admin = FALSE;
			}
		}


		//If username and password match set the logged in flag in 'ci_sessions'
		if ($login_result==1)
		{

			// Backward compatibility for existing teletest database
//			if (!isset($_SESSION)) {
//				session_start();
//			}
			
			$credentials = array('id' => $id, 'user' => $name, 'logged_in' => $login_result, 'is_admin' => $is_admin );
			$this->obj->session->set_userdata($credentials);

			
			// Backward compatibility for existing teletest database
            		putenv("TZ=Asia/Dacca");	
      			
      			
      		/* todo - transfer it to index.php rather
                $loc=$_POST['target'];
                
                if($loc=="index.php" and $_SESSION['sess_bsc']!="NONE"){
                      $loc="welcome.php";
                }elseif($loc=="index.php" and $_SESSION['sess_level'] > 3){
                      $loc="manager.php";
                }
                
                if (!strpos($loc,"?"))
                {
                 	$loc = $loc."?Phase=".$Phase;
                }
                else
                {
                	$loc = $loc."&Phase=".$Phase;
                }
                */

                        
           
			
			//On success redirect user to default page
			redirect('','location');
		}
		else
		{
			//On error send user back to login page, and add error message
			redirect('login/login_fail/');
		}
	}

}
?>