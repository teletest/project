<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/surveys_on_site/#add"><span>Surveys On Site</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h3>Surveys made on Site</h3>
	
<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		
		<tr class="ewTableHeader">
		  <td align="center" ><strong>Surveys Made By</strong></td>
	  <td align="center" ><strong>Type</strong></td>
	  <td align="center" ><strong>Details</strong></td>           
	</tr>
	
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
	{surveys}
		<tr>
		  <td>{code}</td>
	  <td>{type}</td>
	  <td><a href='../survey_details/{id}' rel="lyteframe" >Details</a> </td>
	</tr>
	
	{/surveys}    
		
	</table>
    </div>


</div>


<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>

