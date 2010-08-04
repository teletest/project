<?php
$this->load->view('header_new');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

<br /><br />
<h3>Companies Management - Add</h3>


<form name="editFrm" action="" method="post">

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tbody>
<tr>
    <td align="right"> Company Name:</td>
    <td><input class="text" name="name" value="" maxlength="255" size="50" type="text"> </td>
</tr>
<tr>
    <td align="right"> Address:</td>
    <td><textarea class="text" cols="50" name="address" style="height: 100px;"></textarea> </td>
</tr>
<tr>
    <td align="right"> Profile:</td>
    <td><textarea class="text" cols="50" name="profile" style="height: 100px;"></textarea> </td>
</tr>
<tr>
    <td align="right"> Notes:</td>
    <td><textarea class="text" cols="50" name="note" style="height: 100px;"></textarea> </td>
</tr>
<tr>
    <td align="right">Is Active?:</td>
    <td><input class="checkbox" name="isactive" type="checkbox"> </td>
</tr>

</tbody></table>

<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /> <input name="submit" value="submit" class="button" type="submit" />
</form>











</div>


<?php
$this->load->view('footer');
?>