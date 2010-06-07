<?php
	$prefs = array (
               'start_day'    => 'monday',
               'month_type'   => 'long',
               // 'day_type'     => 'short'
             );

	$CI =& get_instance();
	$CI->load->library('calendar', $prefs);

	echo $CI->calendar->generate();
?>
