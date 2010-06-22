<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Simplelogin Class
 *
 * Makes authentication simple
 *
 * Simplelogin is released to the public domain
 * (use it however you want to)
 * 
 * Simplelogin expects this database setup
 * (if you are not using this setup you may
 * need to do some tweaking)
 * 

	#This is for a MySQL table
	CREATE TABLE `users` (
	`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`username` VARCHAR( 64 ) NOT NULL ,
	`password` VARCHAR( 64 ) NOT NULL ,
	UNIQUE (
	`username`
	)
	);

 * 
 */
class Simplelogin
{
	var $CI;
	var $user_table = 'persons';
    var $group_table = 'groups';
	function Simplelogin()
	{
		// get_instance does not work well in PHP 4
		// you end up with two instances
		// of the CI object and missing data
		// when you call get_instance in the constructor
		//$this->CI =& get_instance();
	}

	/**
	 * Create a user account
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function create($user = '', $password = '', $auto_login = true) {
		//Put here for PHP 4 users
		$this->CI =& get_instance();		

		//Make sure account info was sent
		if($user == '' OR $password == '') {
			return false;
		}
		
		//Check against user table
		$this->CI->db->where('login', $user); 
		$query = $this->CI->db->getwhere($this->user_table);
		
		if ($query->num_rows() > 0) {
			//username already exists
			return false;
			
		} else {
			//Encrypt password
			$password = md5($password);
			
			//Check against user type ( admin, officer or admin )
			//From front end only user can sign up so select group id agains user type
			$this->CI->db->where('name', 'User'); 
			$query = $this->CI->db->getwhere($this->group_table);
			$row = $query->row();
            $group_id = $row->id; 
			
			//Insert account into the database
			$data = array(
			            'group_id' => $group_id,
						'login' => $user,
						'password' => $password
					);
			$this->CI->db->set($data); 
			if(!$this->CI->db->insert($this->user_table)) {
				//There was a problem!
				return false;						
			}
			$user_id = $this->CI->db->insert_id();
			
			//Automatically login to created account
			if($auto_login) {		
				//Destroy old session
				$this->CI->session->sess_destroy();
				
				//Create a fresh, brand new session
				$this->CI->session->sess_create();
				
				//Set session data
				$this->CI->session->set_userdata(array('id' => $user_id,'username' => $user));
				
				//Set logged_in to true
				$this->CI->session->set_userdata(array('logged_in' => true));			
			
			}
			
			//Login was successful			
			return true;
		}

	}

	/**
	 * Delete user
	 *
	 * @access	public
	 * @param integer
	 * @return	bool
	 */
	function delete($user_id) {
		//Put here for PHP 4 users
		$this->CI =& get_instance();
		
		if(!is_numeric($user_id)) {
			//There was a problem
			return false;			
		}

		if($this->CI->db->delete($this->user_table, array('id' => $user_id))) {
			//Database call was successful, user is deleted
			return true;
		} else {
			//There was a problem
			return false;
		}
	}


	/**
	 * Login and sets session variables
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function login($user = '', $password = '') {
		
		//Put here for PHP 4 users
		$this->CI =& get_instance();		

		//Make sure login info was sent
		if($user == '' OR $password == '') {
			return false;
		}

		//Check if already logged in
		if($this->CI->session->userdata('username') == $user) {
			//User is already logged in.
			return false;
		}
		
		//Check against user table
		$this->CI->db->where('login', $user); 
		$query = $this->CI->db->getwhere($this->user_table);
		
		if ($query->num_rows() > 0) {
			$row = $query->row_array(); 
			
			//Check against password
			if(md5($password) != $row['password']) {
				return false;
			}
			
			//Destroy old session
			$this->CI->session->sess_destroy();
			
			//Create a fresh, brand new session
			$this->CI->session->sess_create();
			
			//Remove the password field
			unset($row['password']);
			
			//Set session data
			$this->CI->session->set_userdata($row);
			
			//Set logged_in to true
			
			if($user == "admin" || $row['group_id'] == '1')
			{
			  $this->CI->session->set_userdata(array('id' => $row['id'], 'logged_in' => true , 'is_admin' => true, 'username' => $user));
			}
			else if($row['group_id'] == '3')
			{
			  $this->CI->session->set_userdata(array('id' => $user_id, 'logged_in' => true , 'is_user' => true, 'username' => $user));			
			}
			else
			{
			  $this->CI->session->set_userdata(array('id' => $user_id, 'logged_in' => true , 'is_officer' => true, 'username' => $user));
			}
			//Login was successful			
			return true;
		} else {
			//No database result found
			return false;
		}	

	}

	/**
	 * Logout user
	 *
	 * @access	public
	 * @return	void
	 */
	function logout() {
		//Put here for PHP 4 users
		$this->CI =& get_instance();		

		//Destroy session
		$this->CI->session->sess_destroy();
	}
}
?>