<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

<br /><br />
<h3>Components Management - Edit</h3>


<form id="addFrm" action="" method="post">
{components}
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<input name="id" value="{id}" type="hidden">
<tbody>
<tr>
    <td align="right"> Name:</td>
    <td><input class="text" name="name" value="{name}" maxlength="255" size="50" type="text"> </td>
</tr>

<tr>
    <td align="right"> Discription:</td>
    <td><textarea class="text" cols="50" name="desc" style="height: 100px;">{desc}</textarea> </td>
</tr>

<tr>
    <td align="right"> Filename:</td>
    <td><input class="text" name="filename" value="{filename}" maxlength="255" size="50" type="text"> </td>
</tr>

<tr>
    <td align="right"> Type:</td>
    <td>
		<select name="type" class="text" size="1">
			<option value="">&nbsp;</option>
			{types}
			<option value="{type_id}"{selected}>{type_name}</option>
			{/types}
		</select>
    </td>
</tr>

<tr>
    <td align="right"> Is Active?:</td>
    <td><input class="checkbox" name="isactive" type="checkbox" {isactive}> </td>
</tr>

</tbody></table>
{/components}
<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /> <input name="submit" value="update" class="button" type="submit" /> <input name="submit" value="delete" class="redbutton" type="submit" onclick="return confirm();" />
</form>




</div>


<script language="javascript">
function confirm()
{
	alert('todo - need confirming this action here');
	return true;
}
</script>

<?php
$this->load->view('footer');
?>