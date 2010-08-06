<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/rollout_summary/#add"><span>Rollout Summary</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec" >

	<h3>Rollout Summary</h3>
<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">

		<tr class="ewTableHeader"> 
		  <td>Stage</td>
		  <td>Quantity</td>
		</tr>

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
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
