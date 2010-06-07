<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Options_model extends Model{
	
	function Options_model()
	{
		parent::Model();
	}	
	
	// Get all or one of the options
	function get_options($id='')
	{
		if ($id != '')
		{
			$this->db->where('id', $id); 	
		}
		
		$query = $this->db->get('options');
		$options = array();
		foreach ($query->result() as $row)
		{
		    $options[$row->id]  = $row->value;
		}
		
		return $options;
	}

	// Set the options passed as a simple array of 'option_id'
	function set_options($options)
	{

		foreach($options as $k)
		{
		// Check the related posted variables
			$v = $this->input->post($k);
			$this->db->update('options', array('id' => $k, 'value'=>$v), array('id' => $k));					
		}

	}
	function get_site_details($id)
	{
	}

	
}

