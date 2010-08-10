<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>


<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="{site_url}index.php/projects/rollout_log/#add"><span>Rollout Log</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h1>Rollout Log</h1>
	
	<h3>Activities on all of the sites</h3>
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		<tr class="ewTableHeader">
		  <td align="center" ><strong>Site</strong></td>
		  <td align="center" ><strong>Activity On</strong></td>
		  <td align="center" ><strong>Subject</strong></td>
		  <td align="center" ><strong>Description</strong></td> 
		  <td align="center" ><strong>Comments</strong></td>
		  <td align="center" ><strong>Action</strong></td>           
		</tr>
		<tbody id="thetable">
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		
	{activities}
		<tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
		  <td>{name}</td>
		  <td>{activity_on}</td>
		  <td><a href='{site_url}index.php/projects/activity_update/{id}/{project_id}/{site_id}/{candidate_id}' rel="lyteframe">{subject}</a></td>
		  <td>{desc}</td>
		  <td>{comments}</td>
		   <td><a href='{site_url}index.php/projects/chart/{id}' rel="lyteframe">Details</a></td>
		</tr>
		
	{/activities}
	   </tbody>
	</table>
	
	 {pagination}
  </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
