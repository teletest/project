<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/calendar_details/#add"><span>Calendar Details</span></a></li>
    
    </ul>
    <div id="add" >


	<h3>Event Detais</h3>
	
<table cellspacing="2" cellpadding="2" border="0" width="100%">
		
		<tr>
			<th> Date </th>
		<th> Event </th>
	</tr>
		{event_details}
		<tr>
			<td valign="top" heitght="20"> {on_date} </td>
		<td valign="top" heitght="20">{definition}</td>
		
	</tr>
		{/event_details}
		 
	</table>
    </div>

</div>
<?php
$this->load->view('footer');
?>

<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>