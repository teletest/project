<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/import_plan/#add"><span>Import Plan</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

    <span style="color:red;">{error_message} <?php echo $this->session->flashdata('conf_msg'); ?></span>
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<form name="addFrm" action="{site_url}index.php/projects/plan_imported" method="post"  enctype="multipart/form-data"> 
	<input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="created_on"  />
	<input type="hidden" name="created_by" value="<?php echo $this->session->userdata('id'); ?>" />
	<input type="hidden" name="date" size="20" value="<?php echo date('Y-m-d'); ?>"/>
	<tbody>
	 <tr>
		 <td align="right" width="230">Select Project:</td>
		 <td>
			 <select xml:lang="en" dir="ltr" name="proj" id="proj">
				<option value="" title="No filter" selected="selected">&nbsp;</option>
				{projects}	
				<option value="{id}/{code}" >{code}</option>
				{/projects} 
			 </select>
		</td>
	  </tr>
	  <tr>
		<td align="right" width="230">Nominal Plan Name:</td>
        <td><input class="text" type="text" name="plan_name" value=""  maxlength="10" /></td>
      </tr>
	  <tr>
		<td align="right">Import File:</td>
        <td><input name="userfile" type="file"> </td>
     </tr>
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
	<tr>
	   <td align="left"><input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /></td>
		<?php if($this->session->userdata('is_admin')) { ?>    
		<td align="right">
			<input type="submit" value="upload" name="submit" />
		</td>
		<?php } else { ?>
		<td>&nbsp;</td>
		<?php } ?>
	</tr>
  </tbody>
  </form>
</table>
	</div>

</div>

<?php $this->load->view('footer-new');?> 
<?php //  $this->load->view('footer'); ?>
