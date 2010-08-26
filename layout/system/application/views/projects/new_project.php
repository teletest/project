<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/new_project/#add"><span>Add Project</span></a></li>
    <li><a href="{site_url}index.php/projects/new_project/#view"><span>View Project</span></a></li>
    </ul>
        <div id="add" class="TabSpec">
			<h3>Add a project</h3>
			<form action='{site_url}index.php/projects/new_project' method='post'>
				
			<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
			
				<tr valign="top" height="20">
					<td align="right"> <b> Code : </b> </td>
					<td> <input type="text" name="project_code" size="20" value="">  </td> 
				</tr>
			
				<tr valign="top" height="20">
					<td align="right"> <b> Created_on : </b> </td>
					<td> <input type="text" name="created_on" size="20" value="<?php echo date('Y-m-d'); ?>">  </td> 
				</tr>
				
				<tr valign="top" height="20">
					<td align="right"> <b> Description : </b> </td>
					<td> <textarea name="desc" wrap="VIRTUAL" cols="60" rows="6"></textarea>  </td> 
				</tr>
					
				<?php if($this->session->userdata('is_admin')) { ?>    
				<tr valign="top" height="20">
					<td align="right">&nbsp;</td>
					<td>
						<input type="submit" name="submit" value="Submit" onclick="this.form.submit();" />
					</td> 
				</tr>
				<?php } ?>
				
				
			</table>
			</form>
     </div>
     <div id="view" class="TabSpec">
			<h3>Projects waiting to be planned</h3>
			
			<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
			<tr class="ewTableHeader">
				<td>Project Code</td>
				<td>Action</td>
			</tr>
			<tbody id="thetable">
			{projects}
			<tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
				<td><a href='{site_url}index.php/projects/projects_details/{id}' >{code}</a> </td><td><a href='{site_url}index.php/projects/projects_details/{id}' rel="lyteframe" >Details</a> | <a href='{site_url}index.php/projects/projects_delete/{id}'>Delete</a></td>
			</tr>
			{/projects}
			</tbody>
			</table>

      </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php //  $this->load->view('footer'); ?>