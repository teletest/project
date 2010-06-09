
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
<br /><br />


<h3>Display the projects matching the search criteria :</h3>
	<div>
		Search    : {s} <br />
		Filter on : {f} <br />
	</div> 

<h3>You can :</h3>
<ul>
	<li>List the projects from here</li>
	<li>Activate / Deactivate a project</li>
	<li>Delete a project</li>
	<li>View the gant chart of the project plan</li>
</ul>
<br /><br />
  <h2>Open projects</h2>

<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	<tr>
	  <td align="center" bgcolor="#e8e8d0"><strong>Code</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Created on</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Planned on</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Start Date</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>End Date</strong></p></td>                    
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Activated on</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>% Complete</strong></p></td> 
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Operation</strong></p></td>                 
	</tr>

	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	
{results}
	<tr> 
	  <td><a href='projects/projects_details/{id}' rel="lyteframe" >{code}</a></td> 
		<?php
			 if( '{$status}' == 'Active' || '{$status}' == 'Inactive' ) :
		?>
			 <td><a href='projects/change_status/{status}/{id}'>{status}</a></td>
		<?php
			 else :
		?>
			<td>{status}</td>
		<?php 
			 endif;
		?>
	  <td>{created_on}</td>
	  <td>{planned_on}</td>
	  <td>{start_date}</td>
	  <td>{end_date}</td>
	  <td>{activated_on}</td>
	  <td> <img src="/images/progress_bar1.jpg" height="13" width="96"> </td>
	  <!--<td><a href='projects/project_delete/{id}' rel="lyteframe" >Delete</a></td>-->
	  <td><a href="projects/projects_delete/{id}" class="confirmClick" title="Delete this project" >Delete</a></td>
	  
	</tr>
{/results}                  
                  
</table> 


</div>

<?php
$this->load->view('footer');
?>
