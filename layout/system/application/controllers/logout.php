<?php
class Logout extends MY_Controller {

	function Logout()
	{
		parent::MY_Controller();
	}

// --------------------------------------------------------------------

	function index()
	{
		$data = tags();
		$data['tabs']	= array();
		$data['ShowLeftSide']	= "No";		
		$data['ShowRightSide']	= "No";
				
		$data['page_title'] = $this->lang->line('login_logout');
		
		
      
		// For backward compatibility
		if (!isset($_SESSION)) {
			session_start();
		} 
		if (isset($_SESSION['sess_username']))
		{
			$signum = $_SESSION['sess_username'];
	      	$time_lo = time();
	      	$um_lo = mysql_query("SELECT lastlogin FROM `login_table` WHERE `username`='$signum'") or die(mysql_error());      
	      	$um_res_lo=mysql_result($um_lo,0,'lastlogin');
	      	if(time()-$um_res_lo<300){
	            $update_me = mysql_query("UPDATE `login_table` SET diff=diff+($time_lo-lastlogin), online=0 WHERE `username`='$signum'") or die(mysql_error());
	      	}else{
	            $update_me = mysql_query("UPDATE `login_table` SET diff=diff+300, online=0 WHERE `username`='$signum'") or die(mysql_error());
	      	}      
	      	$_SESSION['sess_level']=0;
	      	$_SESSION['sess_admin']="No";
	      	$_SESSION['sess_status']="Out";
	      	$_SESSION['sess_counter']="No";
	      	$_SESSION=array();
			if(isset($_COOKIE['rnoweb_cook_name']) and isset($_COOKIE['rnoweb_cook_id']) and isset($_COOKIE['rnoweb_cook_level'])){
	            setcookie("rnoweb_cook_name", "", time()-7*24*60*60, "/");
	            setcookie("rnoweb_cook_id", "", time()-7*24*60*60, "/");
	            setcookie("rnoweb_cook_level", "", time()-7*24*60*60, "/");                        
	      	}
		}
		
		$this->session->sess_destroy();
		$this->parser->parse('logout/index', $data);
	}

}



/* End of file logout.php */
/* Location: ./system/application/controllers/logout.php */
