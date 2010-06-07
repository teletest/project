<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

	<h2>User Management - Add</h2>


<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<form name="editFrm" action="" method="post"></form>
	<input name="user_id" value="1" type="hidden">
	<input name="contact_id" value="1" type="hidden">
	<input name="dosql" value="do_user_aed" type="hidden">
	<input name="username_min_len" value="4)" type="hidden">
	<input name="password_min_len" value="4)" type="hidden">
	

<tbody>
<tr>
    <td align="right" width="230">* Login ID:</td>
    <td><input class="text" name="user_login" value=""></td>
</tr>
<tr>
    <td align="right"> User Type:</td>
    <td>

<select name="user_group" class="text" size="1">
	<option value="0" selected="selected">User</option>
{groups}
	<option value="1" >Administrator</option>
	<option value="2">CEO</option>
	<option value="3">Director</option>
	<option value="4">Branch Manager</option>
	<option value="5">Manager</option>
	<option value="6">Supervisor</option>
	<option value="7">S.H. Manager</option>
	<option value="8">S.H. Technical Staff</option>
	<option value="9">S.H. User</option>	
{/groups}
</select>
    </td>
</tr>
<tr>
    <td align="right">* Password:</td>
    <td><input class="text" name="user_password" value="" maxlength="32" size="32" type="password"> </td>
</tr>
<tr>
    <td align="right">* Confirm Password:</td>

    <td><input class="text" name="password_check" value="" maxlength="32" size="32" type="password"> </td>
</tr>
<tr>
    <td align="right">* Name:</td>
    <td><input class="text" name="user_firstname" value="" maxlength="50" type="text"> <input class="text" name="user_lastname" value="" maxlength="50" type="text"></td>
</tr>
<tr>
    <td align="right"> Company:</td>

    <td>

<select name="user_company" class="text" size="1">
	<option value="0" selected="selected"></option>
{stakeholders}
	<option value="1">NeoSense Inc.</option>
	<option value="2">Teletest Case</option>
{/stakeholders}
</select>
    </td>
</tr>
<tr>

    <td align="right">Department:</td>
    <td>
        <input name="contact_department" value="1" type="hidden">
        <input class="text" name="user_department" value="" size="40" disabled="disabled" type="text">
        <input class="button" value="select dept..." onclick="javascript:alert('present the list of Departments to select from')" type="button">
    </td>
</tr>
<tr>
    <td align="right">* Email:</td>

    <td><input class="text" name="contact_email" value="" maxlength="255" size="40" type="text"> </td>
</tr>
<tr>
    <td align="right" valign="top">Email Signature:</td>
    <td><textarea class="text" cols="50" name="user_signature" style="height: 50px;"></textarea></td>
</tr>
<tr>
    <td align="right" valign="top">Valid From:</td>
    <td><input name="user_validfrom" maxlength="45" size="45" value="" type="text"></td>
</tr>
<tr>
    <td align="right" valign="top">Valid Untill:</td>
    <td><input name="validto" maxlength="45" size="45" value="" type="text"></td>
</tr>


<tr>
    <td align="right">* Required Fields</td>
    <td></td>
</tr><tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button">
    </td>
    <td align="right">
    	<input value="submit" onclick="javascript:alert('submit it after field validation');" class="button" type="button">

    </td>
</tr>
</tbody></table>













</div>


<?php
$this->load->view('footer');
?>