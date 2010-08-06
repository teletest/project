<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>
<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="{site_url}index.php/projects/view_districts/#add"><span>View Districts</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h3>Districts in Region {region}</h3>

<table  width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <tr class="ewTableHeader">
					 <td> District </td>
					 <td> Quantity </td>
					 <td> View Map</td>
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
	<table  width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		   <tbody>
				 <tr class="ewTableHeader">
					 <Td>Sites Summary</Td>
				 </tr>
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
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>

