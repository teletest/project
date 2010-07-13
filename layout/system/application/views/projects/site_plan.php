<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/site_plan/#add"><span>Site Plan</span></a></li>
    
    </ul>
    <div id="add" >
	<h1>Site Plan</h1>
	
	
	<h2>Sites waiting to be planned</h2>
	<form action='{site_url}index.php/projects/site_planned' method='post' name="planForm">
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>&nbsp;</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Project Code</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Site Name</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Created on</strong></p></td>              
		</tr>
	
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td> 
		</tr>
	<a href="#" onClick="checkAll('project[]',1);">Check All Sites</a> | <a href="#" onClick="checkAll('project[]',0);">Uncheck All 
	Sites</a><br><br>	
	{projects_np}
		<input type="hidden" value="{project_id}" name="project_id" />
		<tr>  
		  <td><input type="checkbox" value="{id}" name="project[]"  /> </td>
		  <td><a href='projects_details/{id}' rel="lyteframe">{code}</a></td>
		  <td><a href='projects_details/{id}' rel="lyteframe">{name}</a></td>
		  <td>{status}</td>
		  <td>{created_on}</td>
		  <!-- <td><a href='site_doplan/{id}/{code}' rel="lyteframe">Plan</a> | <a href='site_attach_document/{id}' >Document</a></td> -->
		  <!-- <td> <a href='site_attach_document/{id}' >Document</a></td> -->
		</tr>
	{/projects_np}                  
					  
	</table>
	
	<h3>Plan Selected Projects</h3>
	
		
	<table cellspacing="2" cellpadding="2" border="0" width="100%">
	
		<tr valign="top" height="20">
			<td align="right"> <b> Start Date : </b> </td>
			<td><input type="text" value="<?php echo date('Y-m-d'); ?>" size="20" name="start_date"/><span style="color:red;">{error_message} <?php echo $this->session->flashdata('conf_msg'); ?></span></td>
		</tr>
		 <tr valign="top" height="20">
			<td align="right"> <b>Define Week Day Off 1 : </b> </td>
			<td>
			 <select xml:lang="en" dir="ltr" name="off1" id="off1">	
				 <option value="6" selected="selected" >Saturday</option>
				 <option value="0" >Sunday</option>
				 <option value="1" >Monday</option>
				 <option value="2" >Tuesday</option>
				 <option value="3" >Wednesday</option>
				 <option value="4" >Thursday</option>
				 <option value="5" >Friday</option>
			 </select>
			</td>
		</tr>
		 <tr valign="top" height="20">
			<td align="right"> <b>Define Week Day Off 2 : </b> </td>
			<td>
			 <select xml:lang="en" dir="ltr" name="off2" id="off2">	
				 <option value="6" >Saturday</option>
				 <option value="0" selected="selected">Sunday</option>
				 <option value="1" >Monday</option>
				 <option value="2" >Tuesday</option>
				 <option value="3" >Wednesday</option>
				 <option value="4" >Thursday</option>
				 <option value="5" >Friday</option>
			 </select>
			</td>
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Predefined Calendars : </b> </td>
		 <td>
		 <select xml:lang="en" dir="ltr" name="calendars" id="calendars">
			<option value="" title="No filter" selected="selected">&nbsp;</option>
			{calendars}	
			   <option value="{id}" >{name}</option>
			{/calendars} 
		</select>
		</td>
		</tr>
		
		<tr valign="top" height="20">
			<td align="right"> <b> Predefined Processes : </b> </td>
		 <td>
		 <select xml:lang="en" dir="ltr" name="f" id="f">
			<option value="" title="No filter" selected="selected">&nbsp;</option>
			{plans}	
			<option value="{id}" >{name}</option>
			{/plans} 
		</select>
		</td>
		</tr>
		<tr valign="top" height="20">
			<td align="right">&nbsp;</td>
			<td>
				<?php if($this->session->userdata('is_admin')) { ?>  
             	<input type="button"  value="Plan" onclick="this.form.submit();" />
			    <?php } else { ?>
			    &nbsp;
			    <?php } ?>
			</td> 
		</tr>
		
		
	</table>
	</form>
	
	
	
	<?php
	//$this->load->view('projects/planning_roster');
	?>
	<div id="showplan">
	<h2>Sites waiting to be rolledout</h2>
	
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
	
		  <td align="center" bgcolor="#e8e8d0"><strong>Code</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Created on</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Planned on</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Start Date</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>End Date</strong></p></td>                    
		  <td align="center" bgcolor="#e8e8d0">&nbsp;</td>                  
		</tr>
	
		<tr>
		 
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		
	{projects_nr}
		<tr>
		  <td><a href='site_details/{id}' rel="lyteframe">{name}</a></td>
		  <td>{status}</td>
		  <td>{created_on}</td>
		  <td>{planned_on}</td>
		  <td>{start_date}</td>
		  <td>{end_date}</td>
		  <!--<td><a href='view_planned_stages/{id}' rel="lyteframe">View Planned Stages</a> |
		  <a href='site_dorollout/{id}/{project_id}'>Activate</a> | <a href='site_attach_document/{id}/0'>Document</a>
		  
		  </td> -->
		  <td><a href='{site_url}index.php/projects/chart/{id}/Planned'   target="_blank" >View Planned Stages</a> |
		  <?php if($this->session->userdata('is_admin')) { ?>  
	       <a href='{site_url}index.php/projects/site_dorollout/{id}/{project_id}'>Activate</a> |
	      <?php } ?>
		  <a href='{site_url}index.php/projects/site_attach_document/{id}/0'>Document</a>
	  
		  </td>
		</tr>
	{/projects_nr}                  
					  
	</table>

    </div>

</div>

<?php
$this->load->view('footer');
?>
