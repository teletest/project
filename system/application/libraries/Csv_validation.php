<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/*



*/

class Csv_validation {

    var $latitude="(^\+?([1-8])?\d(\.\d+)?$)|(^-90$)|(^-(([1-8])?\d(\.\d+)?$))";
	var $longitude="(^\+?1[0-7]\d(\.\d+)?$)|(^\+?([1-9])?\d(\.\d+)?$)|(^-180$)|(^-1[1-7]\d(\.\d+)?$)|(^-[1-9]\d(\.\d+)?$)|(^\-\d(\.\d+)?$)";
    // valid pattern is yyyy-month-day
	//var $date_format = "^(?ni:(?=\d)((?'year'((1[6-9])|([2-9]\d))\d\d)(?'sep'[/.-])(?'month'0?[1-9]|1[012])\2(?'day'((?<!(\2((0?[2469])|11)\2))31)|(?<!\2(0?2)\2)(29|30)|((?<=((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|(16|[2468][048]|[3579][26])00)\2\3\2)29)|((0?[1-9])|(1\d)|(2[0-8])))(?:(?=\x20\d)\x20|$))?((?<time>((0?[1-9]|1[012])(:[0-5]\d){0,2}(\x20[AP]M))|([01]\d|2[0-3])(:[0-5]\d){1,2}))?)$";
    var $date_format ="(^[0-9]{4,4}-?[0-1][0-9]-?[0-3][0-9]$)";
	function Csv_validation()
	{
	  $this->obj =& get_instance();
	}
	function matches_pattern($str, $pattern="", $field_type)
    {        
		if($field_type == "latitude")
		  $pattern = $this->latitude;
		else if ($field_type == "longitude")
		  $pattern = $this->longitude;
		else if ($field_type == "date")
		  $pattern = $this->date_format;
		else
		  $pattern = $pattern;
		
		if (preg_match('/^' . $pattern . '$/', $str)) return 1;
    	return 0;
   }

}
?>
