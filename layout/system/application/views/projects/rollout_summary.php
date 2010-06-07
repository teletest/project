<?php
$this->load->view('header');
?>


<div id="main-content">

<h1>Site Rollout</h1>

<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>

<div style="float:left;margin-left:20px;">

<h3>Rollout Summary</h3>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
    <thead>
		<tr>
		  <th>Stage</th>
		  <th>Quantity</th>
		</tr>
	</thead>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
  {states}	
  {if_found}
    <tr>
	<td>{stage}</td>
	<td><a href="{site_url}index.php/projects/site_rollout/0/{project_id}/0/0/0/0">{count}</a></td>
	</tr>
 {/if_found}
 {/states}
</table>
</div>



</div> 

<?php
 $this->load->view('footer');
?>