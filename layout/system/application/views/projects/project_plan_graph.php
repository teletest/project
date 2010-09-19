<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<script type="text/javascript">
	var month;
	var year;
	function showSelected()
	{
	  month=document.form1.month.options[document.form1.month.selectedIndex].value;
	  year=document.form1.year.options[document.form1.year.selectedIndex].value;
	  strAddress = "{site_url}index.php/projects/project_plan_graph/{project_id}/"+month+'/'+year;  
      location.href = strAddress; 

	}
</script>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
       <li><a href="{site_url}index.php/projects/project_summary/#add"><span>Project Plan</span></a></li>
    </ul>
    <div id="add" class="TabSpec">
	   <table align="center" class="ewTable"  style="width:178px">
		 <tbody>
		   <tr class="ewTableHeader">
				 <td colspan="3">
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
			   <td colspan="3"><?php echo renderChart( "{site_url}charts/"."{chart_type1}",  "", "{bargraph_xml}" , "chart1", "600", "300"); ?></td>
			</tr>
		  </tbody>
	   </table>
	</div>
</div>
</td>
	 <td width="210" align="center" valign="top">
			  <!-- Start Right Column-->
				<?php if (@$ShowRightSide!="No"){ ?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td height="4"></td>
				  </tr>
				  <tr>
					<td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d1d1d1;">
					  <tr>
						<td height="30" bgcolor="#d1d1d1"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
						  <tr>
							<td width="73%" align="left"><span class="BoldTest">Summary</span></td>
							<td width="27%"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
							  <tr>
								<td align="center" valign="middle"><img src="{site_url}theme/images/minimize.png" width="24" height="24" style="cursor:pointer;" alt="Minimize Menu" /></td>
								<td align="center" valign="middle"><img src="{site_url}theme/images/close.png" width="24" height="24" style="cursor:pointer;" alt="Close Menu" /></td>
							  </tr>
							</table></td>
						  </tr>
						</table></td>
					  </tr>
					  <tr>
						<td height="160" align="center" valign="middle" bgcolor="#FFFFFF">
						<div id="summary">
						<table align="center" class="ewTable"  style="width:178px">
						  <tbody>
		
						  </tbody>
						  <tbody id="thetable">
						    <tr>
							  <td align="center"><a href='{site_url}index.php/charts/MSCol2D/{selected_id}' >Progress</a></td>
							</tr>
							<tr>
							  <td align="center"><a href='{site_url}index.php/projects/project_summary/{selected_id}' >Details</a></td>
							</tr>
							<tr>
							  <td align="center"><a href='{site_url}index.php/projects/project_plan_graph/{selected_id}' >Project Plan</a></td>
							</tr>
							<tr>
							  <td align="center"><input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /></td>
							</tr>
						  </tbody>
						</table>
						</div> 
					   </td>
					  </tr>
					</table></td>
				  </tr>
				  
			   
				</table>
		   <?php }?>


<?php $this->load->view('footer'); ?>