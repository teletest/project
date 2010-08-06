<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="{site_url}index.php/projects/sites_in_process/#add"><span>Sites in Process</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h2>Sites in process {process}</h2>
	<br>
	
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		<tr class="ewTableHeader">
		  <td align="center" ><strong>Code</strong></td>
		  <td align="center" ><strong>Status</strong></td>                            
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
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <tr class="ewTableHeader">
					 <td>Sites Summary</td>
				 </tr>
				 <tr>
					 <td><?php echo renderChart( "{site_url}charts/"."{chart_type}",  "", "{xml}" , "chart", "{width}", "{height}"); ?></td>
				</tr>
		   </tbody>
	</table>
	</div>


 </div>

</div>


<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>


