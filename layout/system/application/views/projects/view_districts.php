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

<h3>Districts in Region {region}</h3>

<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	   <tbody>
	         <tr>
				 <th> District </th>
				 <th> Quantity </th>
				 <th> View Map</th>
			 </tr>
			 <tr>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
				 <td>&nbsp;</td>
			 </tr>
			 {districts}
			 <tr>
				 <td>{name}</td>
				 <td><a href="{site_url}index.php/projects/view_sites_in_district/{project_id}/{region}/{name}">{count}</a></td> 
				 <td><a href="{site_url}index.php/projects/view_districts_in_region_googlemap/{project_id}/{region}/{name}">View google map</a></td>
				 
			</tr>
			
			{/districts}
			<tr>
			     <td colspan="3"><a href="{site_url}index.php/projects/view_all_districts_in_region_googlemap/{project_id}/{region}">View sites in google map</a></td> 
			</tr>
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
<!--
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	   <tbody>
			 <th>
				    <span style="font-family: Arial,Arial;">
					<strong>
					<font size="2">Select Month & Year </font>	
					</strong>
					</span>
                    <?php 
	                /* echo "<form id=form1 name=form1 method=post action={site_url}index.php/projects/project_summary>
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
					</form>"; */ ?>
			 </th>
			 <tr>
				 <td><?php // echo renderChart( "{site_url}charts/"."{chart_type1}",  "", "{bargraph_xml}" , "chart1", "{width}", "{height}"); ?></td>
			</tr>
	   </tbody>
</table> -->
 
</div>
<?php
 $this->load->view('footer');
?>

