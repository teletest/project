<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto; ">
    <ul>
    <li><a href="{site_url}index.php/projects/pro_implement/#add"><span>Process Implement</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">
	<h2>Process Implementation</h2>
<br>
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<form name="addFrm" action="{site_url}index.php/projects/process_implemented" method="post" >
	<input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="created_on"  />
	<input type="hidden" name="created_by" value="<?php echo $this->session->userdata('username'); ?>" />
	<input type="hidden" value="{process_id}" name="process_id" />
	<tbody>
					<tr>
						<td colspan="3"align="right" width="230"><strong>Enter Process Name :</strong></td>
					
					<td colspan="2"><input type="text"  value="<?php  echo set_value('process_name'); ?>" name="process_name" /><span style="color:red;"><?php echo form_error('userfile'); ?></span> </td>
				</tr>
					 <tr class="ewTableHeader">
					   <td><strong>Select</strong></td>
					   <td ><strong> ID</strong></td>
                       <td align="center" ><strong>Stage Name</strong></td>
                       <td align="center"><strong>Lead Time</strong></td>
                       <td align="center"><strong>Dependency</strong></td>
                     </tr>
					  <tr>
						<!--<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td align="center">&nbsp;</td>-->
						<td colspan="5"><span style="color:red;"><?php echo form_error('stages[]'); ?></span></td>
                  </tr>
						{stages}
						<tr>
							<!-- <td><input type="checkbox" value="{id}" name="stages[]"  /></td> -->
							<td><input type="checkbox" name="stages[]" value="{id}" <?php echo set_checkbox('stages[]', '{id}'); ?> /></td>
							<td>{stage_id}</td>
							<td><input type="text" id="stage" name="stage[{id}]" value ="{stage}" /></td>
							<td><input type="text" id="lead_time" name="lead_time[{id}]" value ="{lead_time}" /></td>
							<!--<td><input type="text" id="dependency" name="dependency[{id}]" value ="{dependency}" /></td>-->
							<td>
							<select name="dependency[{id}]">
								{stages_sel}
								  <option value="{s_id}">{name}</option>
								{/stages_sel}
							</select>
							</td>
							<input type="hidden" id="stage_id" name="stage_id[{id}]" value ="{stage_id}" />
						</tr>
						{/stages}
						<tr>
							<td>&nbsp;</td>
						<td align="right"><span style="color:red;">*</span> Description:<?php // echo $this->validation->commit_error; ?></td>
						<td colspan="3">						
							<span style="color:red;"><?php echo form_error('description'); ?></span>
							<textarea class="text"  cols="48" name="description" style="height: 100px;" value="<?php  echo set_value('description'); ?>" > </textarea><br />
							</td>
							
						</tr>
						<tr>
							<td>&nbsp;</td>
						    <td align="right">Comment:</td>
						<td colspan="3">
							<textarea class="text"  cols="48" name="comment" style="height: 100px;" value="" > </textarea><br />
							</td>
							
						</tr>
						<tr>
							 <td colspan="2"> <input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /></td>
							 <?php if($this->session->userdata('is_admin')) { ?>    				
							 <td colspan="3">
							 <input type="button"  value="Create Process" onclick="this.form.submit();" /></td>
							 <?php  } else { ?> <td colspan="3">&nbsp;  </td><?php } ?>
						 
						</tr>
	
	</form>
	</tbody>
	</table>
    </div>

</div>
<?php $this->load->view('footer-new');?> 
<?php //  $this->load->view('footer'); ?>
