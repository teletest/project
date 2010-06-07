<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{projects_title}</h1>
{projects_menu}
<br /><br />

{states}
<table class="{class}">
	<th colspan=2>{id} - {def}</th>
</tr>

<tr>
	<td>
	start: {min_start} - {max_start}<br />
	delay: {delay}
	</td>
</tr>
<tr>
	<td>
	next: {nodes} {nnodes}<br />
	</td>
</tr>
</table>
{/states}
{pagination}



</div>

<?php
$this->load->view('footer');
?>
