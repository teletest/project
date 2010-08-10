<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/site_rollout/#add"><span>Site Rollout</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h2>Sites being rolledout</h2>
	{states}
	<h3>{stage}:</h3>
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		<tr class="ewTableHeader">
		  <td align="center" ><strong>Name</strong></td>
		  <td align="center" ><strong>Status</strong></td>
		  <td align="center" ><strong>Start</strong></td>
		  <td align="center" ><strong>End</strong></td>
		  <td align="center" ><strong>Assignee</strong></td>
		  <td align="center" ><strong>% Complete</strong></td>  
		  <td align="center" ><strong>View Status</strong></td>    
		  <td align="center"  colspan="5">&nbsp;</td>            
		</tr>
	    <tbody id="thetable">
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
	  {if_not_found}	  
		  <tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
		  <td colspan="12">No Site found at this stage</td>
		  </tr>
	  {/if_not_found}
	  {if_found}
		{definition}
		<tr>
		  <td><a href='{site_url}index.php/projects/site_details/{site_id}' >{s_name}</a></td>
		  <td>{status}</td>
		  <td>{start}</td>
		  <td>{end}</td>
		  <td>{name}</td>
		  <td nowrap >{percentage_complete}</td>
		  <td nowrap><a href='{site_url}index.php/projects/chart/{site_id}/Active' target="_blank">view Status</a> </td>
		  <td><a href='{site_url}index.php/projects/rollout_details/{site_id}/{project_id}/{s_name}/{state_id}/0'>Details</a> </td>
		  <td><a href='{site_url}index.php/projects/site_attach_document/{site_id}/{state_id}' >Document</a> </td>
		  <?php if($this->session->userdata('is_admin')) { ?>  
		  <td><a href='{site_url}index.php/projects/stages_planned/edit/{site_id}'>Edit</a></td>
		  <td><a href='{site_url}index.php/projects/stages_planned/mark_complete/{state_id}/{next_state}/{site_id}' >Mark Complete</a></td>
		  <td><a href='{site_url}index.php/projects/stages_planned/delete/{state_id}' >Delete</a></td>
		  <?php } else { ?>
		  <td colspan="3">&nbsp;</td>
		  <?php } ?>
		</tr>
	   {/definition} 
	 {/if_found}
		<tr >
		  <td colspan="12"><a href='{site_url}index.php/charts/Bar2D/{stage}' >View progress of all sites at this stage</a></td>
		</tr>
		</tbody>
	</table>
	{/states}
	
	{pagination}
    </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
