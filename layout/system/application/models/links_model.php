<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Links_model extends Model{
	
	function Links_model()
	{
		parent::Model();
	}	
	
	// Define the Submenu of Admin
	function menu()
	{
		$menu = anchor('comments_add',	'Feedback');				
			
		return $menu;
	
	}

	
}
?>
