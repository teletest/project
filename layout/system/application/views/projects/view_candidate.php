<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/view_candidate/#add"><span>View Candidates</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	{candidate}
	<h3>View Candidate {code} data</h3>
	
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<tbody>
	<tr>
		<td align="right" width="230">Code:</td>
		<td>{code}</td>
	</tr>
	<tr>
		<td align="right">Latitude:</td>
		<td>{latitude}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Longitude:</td>
		<td>{longitude}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Candidate Distance:</td>
		<td>{candidate_distance}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Approval 1:</td>
		<td>{approval1}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Approval 2:</td>
		<td>{approval2}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Approval 3:</td>
		<td>{approval3}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Approval 4:</td>
		<td>{approval4}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Approval 5:</td>
		<td>{approval5}</td>
	</tr>
	<tr>
		<td align="right" valign="top">Power Connection:</td>
		<td>{power_connection}</td>
	</tr>
	
	<tr>
		<td align="right" valign="top">Gen_Set:</td>
		<td>{gen_set}</td>
	</tr>
	
	<tr>
		<td align="right" valign="top">Others:</td>
		<td>{others}</td>
	</tr>
	
	</tbody>
	
	</table>
	{/candidate}
	</div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
