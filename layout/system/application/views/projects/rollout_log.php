<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/rollout_log/#add"><span>Rollout Log</span></a></li>
    
    </ul>
    <div id="add" >

	<h1>Rollout Log</h1>
	
	<h3>Activities on all of the sites</h3>
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>Site</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Activity On</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Subject</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Description</strong></p></td> 
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Comments</strong></p></td>
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
		
	{activities}
		<tr>
		  <td>{name}</td>
		  <td>{activity_on}</td>
		  <td><a href='{site_url}index.php/projects/activity_update/{id}/{project_id}/{site_id}/{candidate_id}' rel="lyteframe">{subject}</a></td>
		  <td>{desc}</td>
		  <td>{comments}</td>
		   <td><a href='{site_url}index.php/projects/chart/{id}' rel="lyteframe">Details</a></td>
		</tr>
		
	{/activities}
	</table>
	
	 {pagination}
  </div>
</div>
<?php
$this->load->view('footer');
?>
