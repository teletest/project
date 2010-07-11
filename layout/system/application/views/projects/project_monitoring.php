<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/project_monitoring/#add"><span>Project Monitoring</span></a></li>
    
    </ul>
    <div id="add" >

	<?php //echo anchor('projects/summary','Summary'); ?>  <?php //echo anchor('projects/graph','Graph'); ?>
	
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="60%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>Name</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Action</strong></p></td>           
	</tr>
	
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
	{project_monitoring}
		<tr>
		  <td><a href='site_details/{id}' rel="lyteframe">{name}</a></td>
	  <td>{status}</td>
	  <td><a href='site_details/{id}' rel="lyteframe" >Details</a> | <a href='surveys_on_site/{id}' >Surveys</a> |
		  <a href='site_attach_document/{id}' rel="lyteframe">Document</a> | <a href='chart/{id}' rel="lyteframe">Chart</a></td>
		</tr>
	{/project_monitoring} 
	</table>
    </div>

</div>
<?php
$this->load->view('footer');
?>
