<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Site Rollout</h1>

<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>

<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>
<br />


<h2>Site - {name}</h2>

<h3>Candidates</h3>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	<tr>
	  <td align="center" bgcolor="#e8e8d0"><strong>Code</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Latitude</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Longitude</strong></p></td> 
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Is Active</strong></p></td> 	  
	  <td align="center" bgcolor="#e8e8d0">&nbsp;</td> 
	  <td align="center" bgcolor="#e8e8d0">Action</td>               
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
	  <td><a href='{site_url}index.php/projects/rollout_details/{pid}/{id}/'>{code}</a></td>
	  <td>{latitude}</td>
	  <td>{longitude}</td>
	  <td>{isactive}</td>	  
	  <td><a href='../candidate_active/{id}'>Mark as Active</a></td>
	  <td><a href='../candidate_add/{site_id}/{pid}'>Add Candidate</a></td>
	</tr>
{/candidates}
</table>

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
	
{activities}
	<tr>
		<td>{activity_on}</td>
	  <td><a href='../activty_edit/{id}' rel="lyteframe">{subject}</a></td>
	  <td>{desc}</td>
	  <td>{comments}</td>
	</tr>
{/activities}
</table>


<h3>Surveys</h3>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	<tr>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Date</strong></p></td>  
	  <td align="center" bgcolor="#e8e8d0"><strong>Category</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Type</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Reason</strong></p></td> 
	             
	</tr>
	
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	
{surveys}
	<tr>
		<td>{survey_on}</td>
	  <td>{category}</a></td>
	  <td>{type}</td>
	  <td>{reson}</td>
	</tr>
{/surveys}
</table>


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
	
{attachements}
	<tr>
	  <td><a href='attachement/{id}' rel="lyteframe">{filename}</a></td>
	  <td>{attached_on}</td>
	  <td><a href='attachement_view/{id}' rel="lyteframe">View</a> | <a href='attachement_Print/{id}' rel="lyteframe">Print</a></td>
	</tr>
{/attachements}                  
                  
</table>









</div>



</div>

<?php
$this->load->view('footer');
?>