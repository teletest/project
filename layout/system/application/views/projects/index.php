<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$this->load->view('header-new');
//$this->load->view('header');
?>
<script type="text/javascript">

  function projectIsSelected(frm, selected_id) {
	   strAddress = "{site_url}index.php/projects/index/0/0/"+selected_id;  
       location.href = strAddress; 
  }
</script>
<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="{site_url}index.php/projects/#view"><span>View</span></a></li>
    <li><a href="{site_url}index.php/projects/#activity_calendar"><span>Activity Calendar</span></a></li>
    </ul>
	<div id="view" class="TabSpec">
     <table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable" >
	    <tbody>
		<tr class="ewTableHeader">
		  <td valign="top">Select</td>
		  <td valign="top" >Name</td>
		  <td valign="top">Status</td>
		  <td valign="top">Created on</td>
		  <td valign="top">Planned on</td>
		  <td valign="top">Start Date</td>
		  <!--<td valign="top">End Date</td> -->                    
		  <!--<td valign="top">View Progress</td>-->
		 <!-- <td valign="top">% Complete</td>  -->                
		</tr>
		</tbody>
		<tbody id="thetable">
	{if_not_found}
    <tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
	  <td colspan="8"> Your search did not return any results. </td>
	</tr>
	{/if_not_found}
	{if_found}

    {projects}
	<tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
      <td><input type="radio" name="project" value="{id}" {selected} onclick="projectIsSelected(this.form, {id})" /></td>
	  <td><a href='{site_url}index.php/projects/project_summary/{id}' >{code}</a></td>
	  <td>{status}</td>
	  <td>{created_on}</td>
	  <td>{planned_on}</td>
	  <td>{start_date}</td>
	  <!-- <td>{end_date}</td> -->
	  <!--<td><a href='{site_url}index.php/charts/MSCol2D/{id}' >View Graph</a></td> -->
	 <!-- <td> <img src="{site_url}images/progress_bar1.jpg" height="13" width="96"> </td> -->
	</tr>
	
    {/projects} 
   {/if_found}                 
     </tbody>             
     </table> 

	</div>
	<div id="activity_calendar" class="TabSpec">
	<h2>Activity Calendar</h2>  
	<br>
	<form action="{site_url}index.php/projects/" method="post">  
	<table  align="center" border="0" cellpadding="0" cellspacing="1" class="ewTable" width="80%">
	<tr> 
		<td align="center"><a href="{site_url}index.php/projects/getPrevMonth/{m}/{year}#activity_calendar"> <img  src="{site_url}images/prev.jpg"  height="15" alt="Prev Month" title="Prev Month" /> </a></td>
		<td colspan="5" class="ewTableHeader" align="center">{month}{year}</td>
		<td align="center"><a href="{site_url}index.php/projects/getNextMonth/{m}/{year}#activity_calendar"> <img height ="15" src="{site_url}images/next.jpg" alt="Next Month" title="Next Month"/> </a></td>		
	</tr>
	<tr class="ewTableHeader">
		<td>Sun</td>
		<td>Mon</td>
		<td>Tue</td>
		<td>Wed</td>
		<td>Thu</td>
		<td>Fri</td>
		<td>Sat</td>
		
	</tr>		
	{weeks}	
	<tr>
	{days}	
			<td>{day}<br />
			<ul>
			{activities}
			<li><a href='../../../../project/system/application/views/projects/projects/projects_details/%7Bid%7D' rel="lyteframe" >{code}</a></li>
			{/activities}
			</ul>
			</td>
	{/days}	
		</tr>
	{/weeks}
	</table>
	</form>
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
							  <td align="center">Project Plan</td>
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
