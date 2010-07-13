<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/existing_plan/#add"><span>Existing Plan</span></a></li>
    
    </ul>
    <div id="add" >
	<h3>Nominal Plans</h3>
<?php echo validation_errors();  ?>
	<!--<form action='{site_url}index.php/projects/implement_process' method='post' name="planForm"> -->
	<table align="center" border="0" cellpadding="1" cellspacing="2">
					  <tbody><tr>
					   
						<td bgcolor="#e8e8d0"><strong>Plan Name</strong></td>
					<!--<td bgcolor="#e8e8d0"><strong>Project Name</strong></td>-->
						<td align="center" bgcolor="#e8e8d0"><p><strong>View Plan</strong></p></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Delete</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Edit</strong></td>
                  </tr>
					  <tr>
						<td>&nbsp;</td>
                    <!--<td>&nbsp;</td>-->
						<td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                  </tr>
					  {plan}
					  <tr>
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
<?php
$this->load->view('footer');
?>
