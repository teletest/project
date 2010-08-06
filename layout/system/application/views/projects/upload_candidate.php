<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/upload_candidate/#add"><span>Upload Candidate</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h3>Import {import}</h3>
<span style="color:red;"><?php echo $this->session->flashdata('conf_msg'); ?></span>
	<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<?php echo form_open_multipart("projects/{redirect}");?>
	
	<input type="hidden" name='project_id' value="{project_id}" />
	<input type="hidden" name='site_id' value="{site_id}" />
	<input type="hidden" name='site_name' value="{site_name}" />
	<input type="hidden" name='state_id' value="{state_id}" />
	<input type="hidden" name='candidate_id' value="{candidate_id}" />
	<tbody>
	  <tr>
		<td align="right">Import File:</td>
	<td><input type="file" name="userfile" size="20" /><span style="color:red;"><?php echo form_error('userfile'); ?></span> </td>
  </tr>
	  <tr>
		<td><input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /></td>
		<td><input type="submit" value="upload" name="submit"/></td>
	  </tr>	
	</tbody>
	</form>
	</table>
    </div>

</div>

<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>