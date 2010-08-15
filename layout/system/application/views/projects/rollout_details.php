<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="{site_url}index.php/projects/rollout_details/#add"><span>Rollout Details</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h1>Rollout Details</h1>
	
	<h2>Site - {name}</h2>
		{if_not_candidate}
		<br>
		<b> No candidate for this site </b>
		</br>
		<br>
		<br>
		<a href='{site_url}index.php/projects/candidate_add/{sid}/{pid}/{name}'>Add Candidate For this Site</a> <br />
		<a href='{site_url}index.php/projects/candidate_upload/{sid}/{pid}/{name}'>Upload Candidate</a> <br />
		<br>	
		{/if_not_candidate}
	{if_candidate}
	<h3>Candidates</h3>
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>Code</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Latitude</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Longitude</strong></p></td> 
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Is Active</strong></p></td> 	  
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Activate</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Action</strong></p></td>               
		</tr>
		
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
			
		{candidates}
		<tr>
		  <td><a href='{site_url}index.php/projects/rollout_details/{pid}/{id}'> {code} </a></td>
		  <td>{latitude}</td>
		  <td>{longitude}</td>
		  <td>{isactive}</td>
		  <?php if($this->session->userdata('is_admin')) { ?>  
		  {if_not_active}	  
		  <td><a href='{site_url}index.php/projects/candidate_active/{id}/{sid}/{pid}/{name}'>Activate</a></td>
		  {/if_not_active}
		  {if_active}
		  <td><a href='{site_url}index.php/projects/candidate_active/{id}/{sid}/{pid}/{name}'>Deactivate</a></td>
		  {/if_active}
		  <?php } else { ?>
		  <td>&nbsp;</td>
		  <?php } ?>
		  <td><a href='{site_url}index.php/projects/rollout_details/{sid}/{pid}/{name}/{state_id}/{id}'>View Activities</a></td>
		</tr>
		{/candidates}
	</table>
	<?php if($this->session->userdata('is_admin')) { ?>
	<a href='{site_url}index.php/projects/candidate_add/{sid}/{pid}/{name}'>Add Candidate</a> <br />
	<a href='{site_url}index.php/projects/candidate_upload/{sid}/{pid}/{name}'>Upload Candidate</a> <br />
	<?php } ?>
	{if_not_active}
	  <br>
	  No active candidate found for this site
	{/if_not_active}
	{if_active}
	<h2>Candidate {cname}</h2>
	
	<h3>Activities</h3>
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>On</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Subject</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Description</strong></p></td> 
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Comments</strong></p></td>         
		</tr>
		
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		{if_not_activities}
		 <tr>	  
		  <td colspan="4"> No activities found for this candidate</td>
		 </tr>
		{/if_not_activities}
		{if_activities}
		{activities}
		<tr>
			<td>{activity_on}</td>
		  <td><a href='../activty_edit/{id}' rel="lyteframe">{subject}</a></td>
		  <td>{desc}</td>
		  <td>{comments}</td>
		</tr>
		
		{/activities}
		{/if_activities}
	</table>
	<?php if($this->session->userdata('is_admin')) { ?>
	<a href='{site_url}index.php/projects/add_activity/{pid}/{sid}/{name}/{state_id}/{cid}' >Add Another Activity</a><br />
	<a href='{site_url}index.php/projects/activity_upload/{sid}/{pid}/{name}/{state_id}/{cid}'>Upload Activities</a> <br />
	<?php } ?>
	<h3>Surveys</h3>
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Date</strong></p></td>  
		  <td align="center" bgcolor="#e8e8d0"><strong>Category</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Type</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Reason</strong></p></td> 
		  <td align="center" bgcolor="#e8e8d0"><p><strong>View Details</strong></p></td> 
					 
		</tr>
		
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		{if_not_surveys}
		 <tr>	  
		  <td colspan="5"> No surveys found for this candidate</td>
		 </tr>
		{/if_not_surveys}
		{if_surveys}	
		{surveys}
			<tr>
				<td>{survey_on}</td>
			  <td>{category}</a></td>
			  <td>{type}</td>
			  <td>{reason}</td>
			  <td><a href='{site_url}index.php/projects/survey_details/{id}' >View</a> | <a href='{site_url}index.php/projects/survey_update/{id}/{sid}/{cid}/{pid}/{state_id}' >Edit</a></td>
			</tr>
		{/surveys}
		{/if_surveys}
	</table>
	<?php if($this->session->userdata('is_admin')) { ?>
	<a href='{site_url}index.php/projects/survey_add/{pid}/{sid}/{name}/{cid}' >Add Another Survey</a><br />
	<a href='{site_url}index.php/projects/survey_upload/{sid}/{pid}/{name}/{state_id}/{cid}'>Upload Surveys</a> <br />
	<?php } ?>
	<h3>Atachments</h3>
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>Filename</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Attached on</strong></p></td>     
		  <td align="center" bgcolor="#e8e8d0">&nbsp;</td>            
		</tr>
	
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		{if_not_attachements}
		 <tr>	  
		  <td colspan="3"> No attachement found for this candidate</td>
		 </tr>
		{/if_not_attachements}
		{if_attachements}
		
		{attachements}
		 <tr>
		  <td>{filename}</td>
		  <td>{attached_on}</td>
		  <td><a href='{site_url}uploads/{project_id}_{filename}' rel="lyteframe">View</a> | <a href='{site_url}uploads/{project_id}_{filename}'  onClick="window.print();return false">Print</a>
		   </td>
		  <!--<td><a href='attachement_view/{id}' rel="lyteframe">View</a> | <a href='attachement_Print/{id}' rel="lyteframe">Print</a></td>-->
		 </tr>
		{/attachements}                  
		{/if_attachements}              
	</table>
	 {/if_active}
	{/if_candidate}

   </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>