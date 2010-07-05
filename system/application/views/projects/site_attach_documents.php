
<?php

$this->load->view('header');

?>

<div id="main-content">

<h1>Attached Documets</h1>
<div style="float:left">
<? //$this->load->view('projects/image_menu.php'); ?>
</div>

<br /><br />
<h3>Add Attachement</h3>


<?php
$this->load->view('projects/attachment_form');
?>
<br /><br />


<h2>Attachments</h2>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	<tr>
	  <td align="center" bgcolor="#e8e8d0"><strong>File name</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Attached On</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Actions</strong></td>          
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
    {if_not_att}
    <tr>
	<td colspan="3"> No File attached </td>
	</tr>
	{/if_not_att}
	{if_att}
	{attachements} 
		<tr> 
		  <td>{filename}</td>
		  <td>{attached_on}</td>
		  <td><a href='{site_url}uploads/{project_id}_{filename}' rel="lyteframe">View</a> | <a href='{site_url}uploads/{project_id}_{filename}'  onClick="window.print();return false">Print</a>
		  <?php if($this->session->userdata('is_admin')) { ?>  
			 |<a href='{site_url}/index.php/projects/attachment_delete/{id}/{project_id}' class="confirmClick" title="Delete this project" >Delete</a>
		  <?php } ?>
		  </td> 
		</tr>		
	{/attachements}                  
       {/if_att}          
</table> 


</div>

<?php
$this->load->view('footer');
?>
