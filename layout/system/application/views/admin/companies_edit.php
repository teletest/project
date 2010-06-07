<?php
$this->load->view('header');
?>



<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}


<br /><br />
<h3>Companies Management - Edit</h3>


<form name="editFrm" action="" method="post">
{companies}
<input name="id" value="{id}" type="hidden">
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tbody>
<tr>
    <td align="right"> Company Name:</td>
    <td><input class="text" name="name" value="{name}" maxlength="255" size="50" type="text"> </td>
</tr>
<tr>
    <td align="right"> Address:</td>
    <td><textarea class="text" cols="50" name="address" style="height: 100px;">{address}</textarea> </td>
</tr>
<tr>
    <td align="right"> Profile:</td>
    <td><textarea class="text" cols="50" name="profile" style="height: 100px;">{profile}</textarea> </td>
</tr>
<tr>
    <td align="right"> Notes:</td>
    <td><textarea class="text" cols="50" name="note" style="height: 100px;">{note}</textarea> </td>
</tr>
<tr>
    <td align="right"> Is Active?:</td>
    <td><input class="checkbox" name="isactive" type="checkbox" {isactive} > </td>
</tr>

</tbody></table>
{/companies}

<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /> <input name="submit" value="update" class="button" type="submit" /> <input name="submit" value="delete" class="redbutton" type="submit" onclick="return confirm();" />
</form>


<br /><br />
<h3>List of the persons from this company</h3>
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tbody>

 	<tr align="center">
 	  <td><strong>Person Name </strong></td>
 	  <td><strong>Status</strong></td>
 	</tr>
{persons}
 	<tr><td width="37%"><a href='{site_url}/index.php/admin/persons/edit/{id}'>{name}</a></td>
 	  <td width="32%">{isactive}</td>
 	</tr>
{/persons}

<tr><td colspan="3"></tbody></table>


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