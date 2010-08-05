<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/project_monitoring/#add"><span>Project Monitoring</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<?php //echo anchor('projects/summary','Summary'); ?>  <?php //echo anchor('projects/graph','Graph'); ?>
	
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		<tr class="ewTableHeader">
		  <td align="center" ><strong>Name</strong></td>
	      <td align="center" ><strong>Status</strong></td>
	      <td align="center" ><strong>Action</strong></td>           
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
<?php $this->load->view('footer-new');?> 
<?php //  $this->load->view('footer'); ?>

