<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*



*/

class Csv_validation {

    var $latitude="(^\+?([1-8])?\d(\.\d+)?$)|(^-90$)|(^-(([1-8])?\d(\.\d+)?$))";
	var $longitude="(^\+?1[0-7]\d(\.\d+)?$)|(^\+?([1-9])?\d(\.\d+)?$)|(^-180$)|(^-1[1-7]\d(\.\d+)?$)|(^-[1-9]\d(\.\d+)?$)|(^\-\d(\.\d+)?$)";

    function Csv_validation()
	{
	  $this->obj =& get_instance();
	}
	function matches_pattern($str, $pattern="", $field_type)
    {
    /*	$characters = array(
		  '[', ']', '\\', '^', '$',
		  '.', '|', '+', '(', ')',
		  '#', '?', '~'            // Our additional characters
		);
 
		$regex_characters = array(
		  '\[', '\]', '\\\\', '\^', '\$',
		  '\.', '\|', '\+', '\(', '\)',
		  '[0-9]', '[a-zA-Z]', '.' // Our additional characters
		);
    	$pattern = str_replace($characters, $regex_characters, $pattern); */
        
		if($field_type == "latitude")
		  $pattern = $this->latitude;
		else if ($field_type == "longitude")
		  $pattern = $this->longitude;
		else
		  $pattern = $pattern;
		
		if (preg_match('/^' . $pattern . '$/', $str)) return 1;
    	return 0;
   }

}
?>
