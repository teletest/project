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

<h1>Site Plan</h1>



<h2>Sites in district {district}</h2>
<br>
<h3>Sites Not Planned</h3>
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
	  <td><b>Sites not planned</b></td>
	  <td><a href="{site_url}index.php/projects/site_plan/{project_id}/0/district/{region}/{district}">{sites_np}</a></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	<tr>
	  <td><b>Planned sites</b></td>
	  <td><a href="{site_url}index.php/projects/site_plan/{project_id}/0/district/{region}/{district}">{sites_p}</a></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	<tr>
	  <td><b>Rollout sites</b></td>
	  <td><a href="{site_url}index.php/projects/site_rollout/0/{project_id}/district/{region}/{district}/0">{sites_a}</a></td>
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
<?php
$this->load->view('footer');
?>

