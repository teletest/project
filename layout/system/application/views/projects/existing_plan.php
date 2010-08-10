<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/existing_plan/#add"><span>Existing Plan</span></a></li>
    
    </ul>
    <div id="add"  class="TabSpec" >
	<h3>Nominal Plans</h3>
<?php echo validation_errors();  ?>
	<!--<form action='{site_url}index.php/projects/implement_process' method='post' name="planForm"> -->
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
			
				<tr class="ewTableHeader">	   
					<td><strong>Plan Name</strong></td>
				<!--<td bgcolor="#e8e8d0"><strong>Project Name</strong></td>-->
					<td align="center" ><strong>View Plan</strong></td>
                    <td align="center"><strong>Delete</strong></td>
                    <td align="center"><strong>Edit</strong></td>
                  </tr>
				  <tbody id="thetable">
				  <tr>
					<td>&nbsp;</td>
				<!--<td>&nbsp;</td>-->
					<td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                  </tr>
					  {plan}
					  <tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
						<td>{plan_name}</td>
					    <!--<td>{project_name}</td>-->
						<!--<td align="center"><a href='{site_url}index.php/projects/display_nominal_plan/{id}' ><img src="{site_url}/images/kghostview.png" height="24" width="24"></a></td> -->
						<td align="center"><a href='{site_url}index.php/projects/plan_summary/{id}' ><img src="{site_url}/images/kghostview.png" height="24" width="24"></a></td>
						<?php if($this->session->userdata('is_admin')) { ?>    
						<td align="center"><a href='{site_url}index.php/projects/delete_plan/{id}/{project_id}'  class="confirmClick" title="Delete this project"><img src="{site_url}/images/delete.png" height="24" width="24"></a></td>
						<td align="center"><a href='{site_url}index.php/projects/edit_plan/{id}' >edit</a></td> 
						<?php } else { ?>
						<td colspan="2">&nbsp;</td>
						<?php } ?>		
					  
                      </tr>
					  {/plan}
	
					</tbody></table>
					{pagination}
					<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
					<!--<input type="button"  value="Implement Process" onclick="this.form.submit();" />
					</form> -->
         </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
