<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="#add"><span>Add Attachment</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">
<h3>Add Attachement</h3>



<br /><br />


<h2>Attachments</h2>
<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<tr class="ewTableHeader">
	  <td align="center" ><strong>File name</strong></td>
	  <td align="center" ><strong>Attached On</strong></td>
	  <td align="center" ><strong>Actions</strong></td>          
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
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
