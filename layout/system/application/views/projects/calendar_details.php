<?php
$this->load->view('header');
?>

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
