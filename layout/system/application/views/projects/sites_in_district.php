<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="{site_url}index.php/projects/sites_in_district/#add"><span>Sites in District</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h2>Sites in district {district}</h2>
	<br>
	<h3>Sites Not Planned</h3>
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
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <Tr class="ewTableHeader">
				 <td>
					 Sites Summary
				 </td>
				 </Tr>
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
