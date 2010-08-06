<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<script type="text/javascript">
	var month;
	var year;
	function showSelected()
	{
	  month=document.form1.month.options[document.form1.month.selectedIndex].value;
	  year=document.form1.year.options[document.form1.year.selectedIndex].value;
	  strAddress = "{site_url}index.php/projects/project_summary/{project_id}/"+month+'/'+year;  
      location.href = strAddress; 
	}
</script>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/project_summary/#add"><span>Project Summary</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h3>Project Summary</h3>
<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		
			<tr class="ewTableHeader">
			  <td>Site Information</td>
		     <td>Quantity</td>
		</tr>
	
		<tr>
		  <td><b>Total sites in this project</b></td>
	  <td>{total_sites}</td>
	</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td><b>Sites not planned</b></td>
	  <td><a href="{site_url}index.php/projects/site_plan/{project_id}">{projects_np}</a></td>
	</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td><b>Planned sites</b></td>
	  <td><a href="{site_url}index.php/projects/site_plan/{project_id}" onclick="scrollWin();"  >{projects_nr}</a></td>
	</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td><b>Rollout sites</b></td>
	  <!--<td><a href="{site_url}index.php/projects/site_rollout/0/{project_id}/0/0/0/0">{projects_rollout}</a></td>-->
		  <td><a href="{site_url}index.php/projects/rollout_summary/{project_id}">{projects_rollout}</a></td>
	</tr>
		<tr>
		  <td></td>
	  <td><a href="{site_url}index.php/projects/project_summary/{project_id}/0/0/1">export summary</a></td>
	</tr>
	</table>
	<!-- second report -->
	<h3>Report based on processes</h3>
<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <th colspan="2">
					 Sites Summary
				 </th>
				 {process}
				 <tr>
					 <td>{name}</td>
					<!-- <td><a href="{site_url}index.php/projects/site_rollout/{process_id}/{project_id}/0">{count}</a></td> -->
					<td><a href="{site_url}index.php/projects/view_sites_in_process/{project_id}/{process_id}/{name}">{count}</a></td>
				</tr>
				{/process}
		   </tbody>
	</table>
	
	
	<h3>Report based on region</h3>
<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <tr class="ewTableHeader">
				 <td> Region </td>
			 <td> Quantity </td>
			 <td colspan="2">&nbsp; </td>
			 </tr>
				 {region}
				 <tr>
					 <td>{name}</td>
				 <td><a href="#">{count}</a></td>
				 <td><a href="{site_url}index.php/projects/view_districts/{name}/{project_id}">view district</a></td>
				 <td><a href="{site_url}index.php/projects/view_regions_in_googlemap/{project_id}/{name}">view googlemaps</a></td>
			 </tr>
				 {/region}
				 <tr>
					 <td colspan="4" align="right"><a href="{site_url}index.php/projects/view_districts_regions_googlemap/{project_id}">view region district googlemaps</a></td>
			 </tr>
		   </tbody>
	</table>

	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <tr class="ewTableHeader">
				 <td>
					 Sites Summary
				 </td>
				 </tr>
				 <tr>
					 <td><?php echo renderChart( "{site_url}charts/"."{chart_type}",  "", "{xml}" , "chart", "{width}", "{height}"); ?></td>
				</tr>
		   </tbody>
	</table>	
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <tr class="ewTableHeader">
				 <td>
						<span style="font-family: Arial,Arial;">
						<strong>
						<font size="2">Select Month & Year </font>	
						</strong>
						</span>
						<?php
						echo "<form id=form1 name=form1 method=post action={site_url}index.php/projects/project_summary>
						<select style='font-family: Arial; font-size: 12px; size=1' name=month onChange='showSelected()'>
						{months}
						<option value={value} {selected}>{name}</option>
						{/months}
						</select>
						
						<select style=font-family: Arial; font-size: 12px; size=1 name=year onChange='showSelected()'>
						{years}
						<option value={value} {selected}>{name}</option>
						{/years}
						</select>
						</form>";?>
				 </td>
				 </tr>
				 <tr>
					 <td><?php echo renderChart( "{site_url}charts/"."{chart_type1}",  "", "{bargraph_xml}" , "chart1", "{width}", "{height}"); ?></td>
				</tr>
		   </tbody>
	</table>
    </div>

</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
