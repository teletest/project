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

<h3>Nominal Plans</h3>
<?php echo validation_errors(); ?>
<?php //echo $this->validation->error_string; ?>
<form action='{site_url}index.php/projects/implement_process' method='post' name="planForm">
<table align="center" border="0" cellpadding="1" cellspacing="2">

                  <tbody>
				  <th colspan="4">Select process which you want to modify</th>
				  <tr>
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
				<input type="button"  value="Implement New Process" onclick="this.form.submit();" />
				</form>

</div>
<?php
$this->load->view('footer');
?>
