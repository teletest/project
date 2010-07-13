<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<form name="addFrm" action="{site_url}index.php/projects/plan_imported" method="post"  enctype="multipart/form-data">

<input type="hidden" name="date" size="20" value="<?php echo date('Y-m-d'); ?>"/>
<tbody>
<tr>
    <td align="right" width="230">Nominal Plan Name:</td>
    <td><input class="text" type="text" name="plan_name" value=""  maxlength="10" /></td>
</tr>
<tr>
    <td align="right">Import File:</td>
    <td><input name="file" type="file"> </td>
</tr>


<tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
    </td>
    <?php if($this->session->userdata('is_admin')) { ?>
	<td align="right">
			<input value="submit"  type="button" onclick="this.form.submit();" />
    </td>
	<?php } else { ?> &nbsp;
	<?php } ?>
</tr>
</tbody>
</form>
</table>