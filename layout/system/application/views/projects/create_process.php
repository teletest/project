<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/create_process/#add"><span>Create Process</span></a></li>
    
    </ul>
    <div id="add"  class="TabSpec" >

	<h3>Create Process</h3>
	<?php echo validation_errors(); ?>
	<?php //echo $this->validation->error_string; ?>
	<form action='{site_url}index.php/projects/implement_process' method='post' name="planForm">
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	
					  <tbody>
					  <tr class="ewTableHeader">
					  <td colspan="4">Select process which you want to modify</td>
					  </tr>
					  <tr class="ewTableHeader">
						<td bgcolor="#e8e8d0"><strong>Select</strong></td>
						<td bgcolor="#e8e8d0"><strong>Process Name</strong></td>
						<td align="center" bgcolor="#e8e8d0"><p><strong>View</strong></p></td>
						<td align="center" bgcolor="#e8e8d0"><strong>Delete</strong></td>
						<!--<td align="center" bgcolor="#e8e8d0"><strong>Edit</strong></td>-->
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="center">&nbsp;</td>
					   <!-- <td align="center">&nbsp;</td> -->
					  </tr>
					  {process}
					  <tr>
						 <td>
						  <input type="radio" name="plan" value="{id}" {checked} <?php echo 'checked="checked"'?> {/checked} /></td>            
					   
					   <!-- <td> <?php  //echo $this->validation->plan_error; ?>
						<input type="checkbox" value="{id}" name="plan[]" <?php //echo set_checkbox('plan[]', "{id}", FALSE); ?>  /></td>-->
					   
						<td>{name}</td>
						<td align="center"><a href='{site_url}index.php/projects/process_details/{id}' rel="lyteframe"><img src="{site_url}/images/kghostview.png" height="24" width="24"></a></td>
						<td align="center"><a href='{site_url}index.php/projects/delete_process/{id}'  class="confirmClick" title="Delete this process"><img src="{site_url}/images/delete.png" height="24" width="24"></a></td>
						<!--<td align="center"><a href='edit_plan/{id}' rel="lyteframe" ><img src="{site_url}/images/edit.jpg" height="24" width="24"></a></td> -->
					  
					  </tr>
					  {/process}
		
					</tbody></table>
					
					<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
					<?php if($this->session->userdata('is_admin')) { ?>
				     <input type="button"  value="Implement New Process" onclick="this.form.submit();" />
				    <?php } ?>
					</form>
        </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
