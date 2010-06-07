
<head>
<style type="text/css">
.style1 {
	text-align: center;
	font-size: medium;
}
</style>
</head>

<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}
<br /><br />
<h3>Group Management - Edit</h3>


<form name="editFrm" action="" method="post">


{groups}
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tbody>
<tr>
    <td align="right"> Group Id:</td>
    <td><input class="text" name="id" value="{id}" maxlength="15" size="50" type="text"> </td>
</tr>
<tr>
    <td align="right"> Group Name:</td>
    <td><input class="text" name="name" value="{name}" maxlength="255" size="50" type="text"> </td>
</tr>
<tr>
    <td align="right"> Is Active?:</td>
    <td><input class="checkbox" name="isactive" type="checkbox" {isactive} > </td>
</tr>
{/groups}
<tr>
    <td class="style1" colspan="2"> <strong>List of all associated components</strong></td>
</tr>


<tr>
  <td align="right">&nbsp;</td>
  <td><strong>Component Name </strong></td>
  <td><strong>Type</strong></td>
</tr>

{components}
<tr>
    <td align="right"><input type="checkbox" name="comp[]" value="{id}"></td>
    <td width="37%">{name}</td>
    <td width="25%">{type}</td>
</tr>
{/components}


</tbody></table>


<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /> <input name="submit" value="update" class="button" type="submit" /> <input name="submit" value="delete" class="redbutton" type="submit" onclick="return confirm();" />
</form>


<br /><br />
<h3>&nbsp;</h3>


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