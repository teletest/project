<?php
$this->load->view('header');
?>
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
<div id="main-content">

<h1>Site Rollout</h1>

<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>

<div style="float:left;margin-left:20px;">

<h3>Project Summary</h3>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	  <thead>
		<tr>
		  <th>Site Information</th>
		  <th>Quantity</th>
		</tr>
	  </thead>
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
	  <td><a href="{site_url}index.php/projects/site_plan/{project_id}">{projects_nr}</a></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	<tr>
	  <td><b>Rollout sites</b></td>
	  <td><a href="{site_url}index.php/projects/site_rollout/0/0/{project_id}">{projects_rollout}</a></td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
  {states}	
  {if_found}
    <tr>
	<td>{stage}</td>
	<td>{count}</td>
	</tr>
 {/if_found}
 {/states}
</table>
<h3>Report based on processes</h3>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	   <tbody>
			 <th colspan="2">
				 Sites Summary
			 </th>
			 {process}
			 <tr>
				 <td>{name}</td>
				 <td><a href="{site_url}index.php/projects/site_rollout/0/{process_id}/{project_id}">{count}</a></td>
			</tr>
			{/process}
	   </tbody>
</table>


<h3>Report based on region</h3>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	   <tbody>
	         <tr>
			 <th> Region </th>
			 <th> Quantity </th>
			 <th>&nbsp; </th>
			 </tr>
			 {region}
			 <tr>
				 <td>{name}</td>
				 <td><a href="#">{count}</a></td>
				 <td><a href="{site_url}index.php/projects/view_districts/{name}/{project_id}">view district</a></td>
			 </tr>
			 {/region}
	   </tbody>
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

<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	   <tbody>
			 <th>
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
			 </th>
			 <tr>
				 <td><?php echo renderChart( "{site_url}charts/"."{chart_type1}",  "", "{bargraph_xml}" , "chart1", "{width}", "{height}"); ?></td>
			</tr>
	   </tbody>
</table>
</div>



</div> 

<?php
 $this->load->view('footer');
?>
