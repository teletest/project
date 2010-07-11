<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/site_rollout/#add"><span>Site Rollout</span></a></li>
    
    </ul>
    <div id="add" >

	<h2>Sites being rolledout</h2>
	{states}
	<h3>{stage}:</h3>
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>Name</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Start</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>End</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Assignee</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>% Complete</strong></p></td>  
		  <td align="center" bgcolor="#e8e8d0"><p><strong>View Status</strong></p></td>    
		  <td align="center" bgcolor="#e8e8d0" colspan="5">&nbsp;</td>            
		</tr>
	
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
		  <tr >
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
		  <td>{percentage_complete}</td>
		  <td><a href='{site_url}index.php/projects/chart/{site_id}/Active' target="_blank">view Status</a> </td>
		  <td><a href='{site_url}index.php/projects/rollout_details/{site_id}/{project_id}/{s_name}/{state_id}/0'>Details</a> </td>
		  <td><a href='{site_url}index.php/projects/site_attach_document/{site_id}/{state_id}' >Document</a> </td>
		  <td><a href='{site_url}index.php/projects/stages_planned/edit/{site_id}'>Edit</a></td>
		  <td><a href='{site_url}index.php/projects/stages_planned/mark_complete/{state_id}/{next_state}/{site_id}' >Mark Complete</a></td>
		  <td><a href='{site_url}index.php/projects/stages_planned/delete/{state_id}' >Delete</a></td>
		  
		</tr>
	   {/definition} 
	 {/if_found}
		<tr >
		  <td colspan="12"><a href='{site_url}index.php/charts/Bar2D/{stage}' >View progress of all sites at this stage</a></td>
		</tr>
	</table>
	{/states}
	
	{pagination}
    </div>
</div>
<?php
$this->load->view('footer');
?>
