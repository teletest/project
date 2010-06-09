<?php
$this->load->view('header');
?>

<div class="art-contentLayout"> 

<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>
<div style="float:left;margin-left:20px;">


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
<?php
$this->load->view('footer');
?>
