<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Site Plan</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/site_search_form');
?>

<h2>Sites in process {process}</h2>
<br>

<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	<tr>
	  <td align="center" bgcolor="#e8e8d0"><strong>Code</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>                            
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	<tr>
	  <td><b>Planned sites</b></td>
	  <td><a href="{site_url}index.php/projects/site_plan/{project_id}/{process_id}/0/0/0">{sites_p}</a></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	<tr>
	  <td><b>Rollout sites</b></td>
	  <td><a href="{site_url}index.php/projects/site_rollout/{process_id}/{project_id}/0/0/0/0">{sites_a}</a></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>	
                                 
</table>

</div>
<div style="float:left;margin-left:20px;">
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	   <tbody>
			 <th>
				 Sites Summary
			 </th>
			 <tr>
				 <td><?php echo renderChart( "{site_url}charts/"."{chart_type}",  "", "{xml}" , "chart", "{width}", "{height}"); ?></td>
			</tr>
	   </tbody>
</table>
</div>


</div>

<?php
$this->load->view('footer');
?>


