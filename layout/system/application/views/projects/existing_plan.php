<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<script type="text/javascript">

  function checkBoxIsChecked(frm, selected_id) {

	   strAddress = "{site_url}index.php/projects/create_plan/1/"+selected_id;  
       location.href = strAddress;

}



</script>
<div id="ShowTab" style="width:96%;overflow:auto;">
	<ul>
		<li><a href="{site_url}index.php/projects/existing_plan/#add"><span>Existing Plan</span></a></li>
	</ul>
	<div id="add"  class="TabSpec" >
	<h3>Nominal Plans</h3>
	<?php echo validation_errors();  ?>
	<form action='' method='post' name="frm1" id="frm1">
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	 	<tr class="ewTableHeader">	   
			<td>&nbsp;</td>
			<td><strong>Plan Name</strong></td>
			<!-- <td align="center" ><strong>View Plan</strong></td>
			<td align="center"><strong>Delete</strong></td>
			<td align="center"><strong>Edit</strong></td> -->
	  	</tr>
	  	<tbody id="thetable">
	  	<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<!--<td>&nbsp;</td>
			<td align="center">&nbsp;</td>
			<td align="center">&nbsp;</td> -->
	  	</tr>
	  	{plan}
	  	<tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
			<td><input type="checkbox" name="plan_id" id="plan_id" value="{id}" {selected} onclick="checkBoxIsChecked(this.form, {id})" ></td>
			<td>{plan_name}</td>
			<!-- <td align="center"><a href='{site_url}index.php/projects/plan_summary/{id}' ><img src="{site_url}/images/kghostview.png" height="24" width="24"></a></td>
			<?php // if($this->session->userdata('is_admin')) { ?>    
			<td align="center"><a href='{site_url}index.php/projects/delete_plan/{id}/{project_id}'  class="confirmClick" title="Delete this project"><img src="{site_url}/images/delete.png" height="24" width="24"></a></td>
			<td align="center"><a href='{site_url}index.php/projects/edit_plan/{id}' >edit</a></td> 
			<?php // } else { ?>
			<td colspan="2">&nbsp;</td> -->
			<?php // } ?>		
	  	</tr>
	  	{/plan}
		</tbody>
	</table>
	</form>
{pagination}
			
    </div>
</div>

</td>
            <td width="210" align="center" valign="top">
            <!-- Start Right Column-->
            <?php if (@$ShowRightSide!="No"){ ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="4"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d1d1d1;">
                  <tr>
                    <td height="30" bgcolor="#d1d1d1"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="73%" align="left"><span class="BoldTest">Action</span></td>
                        <td width="27%"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/minimize.png" width="24" id="img_right_sum1" height="24" style="cursor:pointer;" onclick="HideMe(right_sum1,img_right_sum1);" alt="Minimize Menu" /></td>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/close.png" width="24" height="24" style="cursor:pointer;" alt="Close Menu" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
				  
				  <tbody id="right_sum1">
                  <tr>
					<td height="160" align="center" valign="middle" bgcolor="#FFFFFF">
						<div id="summary">
						<table align="center" class="ewTable"  style="width:178px">
		
							<!--<tr class="ewTableHeader">
							  <td colspan="3" valign="top"><strong>Action</strong></td>
							</tr> -->
						
						  <tbody id="thetable">
							{if_plan_selected}
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='{site_url}index.php/projects/plan_summary/{selected_id}' id="view" title="view" ><img src="{site_url}/theme/images/kghostview.png" height="24" width="24" alt="view" title="view"></a></div></td>
							</tr>
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='{site_url}index.php/projects/edit_plan/{selected_id}' id="edit" title="edit"><img src="{site_url}/theme/images/edit-icon.png" height="24" width="24" alt="edit" title="edit"></a></div></td>
							</tr>
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='{site_url}index.php/projects/delete_plan/{selected_id}/{selected_project_id}'  class="confirmClick" title="Delete this plan" id="delete"><img src="{site_url}/theme/images/delete.png" height="24" width="24" title="delete"></a></div></td>
							</tr>
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='{site_url}index.php/projects/nominap_plan_info/{selected_id}'  title="View plan" id="delete">Plan info</a></div></td>
							</tr>
							{/if_plan_selected}
							{if_not_plan_selected}
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='#' id="view" title="view" onclick="javascript: alert('No Plan Selected')"><img src="{site_url}/theme/images/kghostview.png" height="24" width="24"></a></div></td>
							</tr>
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='#' id="edit" title="edit" onclick="javascript: alert('No Plan Selected')"><img src="{site_url}/theme/images/edit-icon.png" height="24" width="24"></a></div></td>
							</tr>
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='#'  onclick="javascript: alert('No Plan Selected')" title="Delete this plan" id="delete"><img src="{site_url}/theme/images/delete.png" height="24" width="24"></a></div></td>
							</tr>
							<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
							  <td colspan="3" align="center"> <div><a href='#'  onclick="javascript: alert('No Plan Selected')" >View Plan Info</a></div></td>
							</tr>
							{/if_not_plan_selected}
						  </tbody>
						 </table>
						</div> 
					</td>
                </table></td>
              </tr>
			  </tbody>
			  
              <tr>
                <td height="4"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d1d1d1;">
                  <tr>
                    <td height="30" bgcolor="#d1d1d1"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="73%" align="left"><span class="BoldTest">Summary</span></td>
                        <td width="27%"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/minimize.png" width="24" height="24" id="img_right_sum2" style="cursor:pointer;" onclick="HideMe(right_sum2,img_right_sum2);" alt="Minimize Menu" /></td>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/close.png" width="24" height="24" style="cursor:pointer;" alt="Close Menu" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  
				  <tbody id="right_sum2">
				  <tr>
                    <td height="160" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
				  </tbody>
                
				</table></td>
              </tr>
              <tr>
                <td height="4"></td>
              </tr>
           
            </table>
            <?php }?>
            <!-- End Right Column-->
          <!--  </td>
          </tr>
        </table></td>
        </tr> -->

<?php $this->load->view('footer');?> 
