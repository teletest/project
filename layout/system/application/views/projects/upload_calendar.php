<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>
<script type="text/javascript">
	function disable_upload(form_obj)
	{
		if ( form_obj.calendar_name.value != '')
		{
		  form_obj.userfile.disabled = false;
		}
		else
		{
		  form_obj.userfile.disabled = true;
        }
	}
</script>

<div id="ShowTab" style="width:96%;overflow:auto;" >
    <ul>
    <li><a href="{site_url}index.php/projects/upload_calendar/#add"><span>Upload Calendar</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h3>Import Calendar</h3>
   <table  width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<form name="calendarForm" id="calendarForm" action="{site_url}index.php/projects/calendar_uploaded" method="post"  enctype="multipart/form-data">
	<input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="created_on"  />
	<input type="hidden" name="created_by" value="<?php echo $this->session->userdata('id'); ?>" />
	<tbody>
	<tr>
		<td align="right" width="230">Calendar Name:</td>
    <td><input class="text" type="text" name="calendar_name" id="calendar_name" value="<?php  echo set_value('calendar_name'); ?>"  maxlength="15" onkeyup="disable_upload(document.calendarForm);" />  
		<span style="color:red;"><?php echo form_error('calendar_name'); ?>{error_msg} <?php echo $this->session->flashdata('conf_msg'); ?></span>
		<p id="response"></p>
	 </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right" width="230" colspan="2"><input type="checkbox" name="overwrite" value="1" <?php echo set_checkbox('overwrite', '1'); ?>  />
		Overwrite if name already exists?
		</td>
	</tr>
	<tr>
		<td align="right">Import File:</td>
	<td> <input name="userfile" type="file" value="" size="35" disabled="disabled" ></td>
    <tr>
        <td align="right">Description:</td>
		<td colspan="3"><span style="color:red;"><?php echo form_error('description'); ?></span>
			<textarea class="text"  cols="60" name="description" style="height: 100px;" value="<?php  echo set_value('description'); ?>" > </textarea><br />
		</td>
	</tr>
	<tr>
	   <td align="right">Comment:</td>
	   <td colspan="3">
		    <textarea class="text"  cols="60" name="comment" style="height: 100px;" value="" > </textarea><br />
	   </td>
	</tr>
    </tr>
	<tr>
		<td align="left">
			<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
		</td>
		<td align="right">
			<input type="submit" value="upload" name="submit" id="submit_button" />
		</td>
	</tr>
	</tbody>
	</form>
	</table>
	
	<h3>Already Created Calendars</h3>

   <table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<tr class="ewTableHeader">
		<td>Name</td><td>Action</td>
    </tr>
	<tbody id="thetable">
	{calendar}
	<tr>
		<td>{name} </td>
	    <td><a href='calendar_details/{id}'  >Details</a>
	    <?php if($this->session->userdata('is_admin')) { ?>  
	    | <a href='{site_url}index.php/projects/calendar_edit/{id}'>Edit</a> | <a href='{site_url}index.php/projects/calendar_delete/{id}'>Delete</a>
	    <?php } ?>
	    | <a href='{site_url}index.php/projects/calendar_implemented_on_processes/{id}'>View Processes</a>
		</td>
    </tr>
	{/calendar}
	</tbody>
	</table>

   </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>