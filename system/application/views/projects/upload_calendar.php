<?php
$this->load->view('header');
?>
<script language="JavaScript">
	function disable_upload(form_obj)
	{
	if ( form_obj.calendar_name.value != '')
	form_obj.userfile.disabled = false;
	else
	form_obj.userfile.disabled = true;
	}
</script>

<div id="main-content">


<h1>Calendar</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">


<h3>Import Calendar</h3>
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<form name="calendarForm" id="calendarForm" action="{site_url}index.php/projects/calendar_uploaded" method="post"  enctype="multipart/form-data">
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
   
</tr>
<tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
    </td>
    <td align="right">
	<?php if($this->session->userdata('is_admin')) { ?>    
		<input type="submit" value="upload" name="submit" id="submit_button" />
	<?php } else { ?>
	    &nbsp;
	<?php } ?>
    </td>
</tr>
</tbody>
</form>
</table>

<h3>Already Created Calendars</h3>

<table>
<tr>
	<th>Name</th><th>Action</th>
</tr>
{calendar}
<tr>
	<td>{name} </td>
	<td><a href='calendar_details/{id}'  >Details</a>
	<?php if($this->session->userdata('is_admin')) { ?>  
	 | <a href='calendar_edit/{id}'>Edit</a> | <a href='calendar_delete/{id}'>Delete</a>
	 <?php } ?>
	 </td>
</tr>
{/calendar}
</table>
</div>



</div>

<?php
$this->load->view('footer');
?>