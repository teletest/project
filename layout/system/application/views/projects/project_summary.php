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
						<!-- <tr class="ewTableHeader">
						  <td valign="top"><strong>Application</strong></td>
						  <td valign="top"><strong>Remaining</strong></td>
						  <td valign="top"><strong>Used</strong></td>
						</tr> -->
					  </tbody>
					  <tbody id="thetable">
					    <!--<tr class="ewTableHeader">
						 <td colspan="3">
							 Sites Summary
						 </td>
						 </tr> -->
						 <tr>
							 <td colspan="3"><?php echo renderChart( "{site_url}charts/"."{chart_type}",  "", "{xml}" , "chart", "200", "200"); ?></td>
						</tr>
						<tr>
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
					       <td colspan="3"><?php echo renderChart( "{site_url}charts/"."{chart_type1}",  "", "{bargraph_xml}" , "chart1", "200", "200"); ?></td>
				        </tr>
						<tr>
						 <td colspan="3"><script type="text/javascript" src="{site_url}charts/amcolumn/swfobject.js"></script>
		                 <div id="flashcontent">
			              <strong>You need to upgrade your Flash Player</strong>
		                 </div>
							 <script type="text/javascript">
							// <![CDATA[		
							var myChart = new SWFObject("{site_url}charts/amcolumn/{object_type}", "my_id", "200", "400", "8", "#FFFFFF");
							myChart.addVariable("chart_id", "my_id");
							myChart.addVariable("path", ".{site_url}charts/amcolumn/");
							myChart.addVariable("settings_file", encodeURIComponent("{site_url}charts/amcolumn/{chart_type2}/chart_setting.xml"));
							myChart.addVariable("data_file", encodeURIComponent("{site_url}charts/amcolumn/{chart_type2}/chart_data.xml"));		
							myChart.addVariable("preloader_color", "#999999");
							myChart.write("flashcontent");
								// ]]>
							</script>
						</td>
						</tr>
						<!-- <tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
						  <td><div>13</div></td>
						  <td><div>admin</div></td>
						  <td><div>98</div></td>
						</tr>
						<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
						  <td><div>14</div></td>
						  <td><div>asd</div></td>
						  <td><div>asd</div></td>
						</tr> -->

					  </tbody>
					</table>
					</div>                    </td>
                  </tr>
                </table></td>
              </tr>
              
           
            </table>
            <?php }?>
<?php //$this->load->view('footer-new');?> 
<?php $this->load->view('footer'); ?>
