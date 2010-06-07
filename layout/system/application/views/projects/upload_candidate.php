<?php
$this->load->view('header');
?>

<div id="main-content">


<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>

<div style="float:left;margin-left:20px;">
<h3>Import {import}</h3>
<span style="color:red;"><?php echo $this->session->flashdata('conf_msg'); ?></span>
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
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

<?php
$this->load->view('footer');
?>