<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function tabs($current_page) {
		$tabs_array = array();
	
		$tabs = array(
			'dashboard' => "Dashboard|" . BASE_URL,
			'projects'	=> "Projects|" . BASE_URL  . "index.php/projects",
			
			'reports'	=> "Reports|" . BASE_URL  . "index.php/reports",
			'contacts'	=> "Contacts|" . BASE_URL  . "index.php/contacts",
			
			'about'		=> "About|" . BASE_URL  . "index.php/about",
			'charts'	=> "Charts|" . BASE_URL  . "index.php/charts",
			'blog'	=> "Blog|" . BASE_URL  . "blog",
		);
		
		
		$CI =& get_instance();
		if ($CI->session->userdata('is_admin')){
			$tabs['admin']= "Admin|" . BASE_URL  . "index.php/admin";
		}
		
		
		foreach($tabs as $k=>$v)
		{
			$tab_def=explode('|',$v);
			$tabs_array[]=array(
				'class'		=> ($k==$current_page)?' class="current_page_item"':'',
				'tab_url'	=> $tab_def[1],
				'tab_title'=>  $tab_def[0],
			);
		}
		
		
		
		
		return $tabs_array;
	}
?>