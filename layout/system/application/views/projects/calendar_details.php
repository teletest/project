<?php
$this->load->view('header');
?>

<div id="main-content">


<h1>New Project</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
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



</div>

<?php
$this->load->view('footer');
?>
