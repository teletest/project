<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		Teletest
 * @author		Teletest Dev Team
 * @copyright	Copyright (c) 2009, NeoSense, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/*
Instructions:

Load the plugin using:

 	$this->load->plugin('tags');

	
	$tags = tags();
*/


	
/**
|==========================================================
| list all of the basic tags
|==========================================================
|
*/
function tags()
{		

		$CI =& get_instance();
		
		// Tags used in the theme
		$tags = array(
			'date'			=> date('D, d M Y'),
			'title'			=> 'Teletest Roleout',
			'site_url'		=> $CI->config->item('base_url'),
			'site_name'		=> 'Teletest Rollout',
			'site_moto'		=> 'Teletest Rollout',
			'copyright'		=> '<small>&copy; 2008 <a href="http://www.telepot.net/">Telepot</a></small>',
			'search_form'	=> '',
			'main_menu'		=> '',
			'user'			=> '',
			'logout'		=> '',
			'is_admin'		=> FALSE,
			'message'		=> '',
			'debug'			=> '',
			
			'extraHeadContent'
							=> '',
			// ..
		);

		// process passed variables
		$passed = array_merge($_GET, $_POST, isset($_SESSION) && is_array($_SESSION) ? $_SESSION : array());	
		// passed arguments
		// $arg = array('s','page','tags','tag','message','archives','admin','state','action');

		foreach($passed as $k=>$v)
			$tags[$k] = $v;
		
		
		if ($CI->site_sentry->is_logged_in()) 
		{
			$tags['user_id']	= $CI->session->userdata('user_id');
			$tags['user']		= $CI->session->userdata('user');
			$tags['is_admin']	= $CI->session->userdata('is_admin');
			if($tags['user'] != '')
				$tags['logout']		= ' | <a href="' . $tags['site_url'] . 'index.php/logout">Logout</a><br />';
		}
			
			
			
		return $tags;
}


/* End of file tags_pi.php */
/* Location: ./system/plugins/tags_pi.php */