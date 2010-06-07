<?php
$this->load->view('header');
?>

<div id="main-content">


<h1>New Project</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">


<h3>Import Plan</h3>
<span style="color:red;">{error_message} <?php echo $this->session->flashdata('conf_msg'); ?></span>
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<form name="addFrm" action="{site_url}index.php/projects/plan_imported" method="post"  enctype="multipart/form-data"> 


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
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
    </td>
    <td align="right">
		<input type="submit" value="upload" name="submit" />
    </td>
</tr>
</tbody>
</form>
</table>
</div>



</div>

<?php
$this->load->view('footer');
?>
