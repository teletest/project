<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

<br /><br />
	<h3>Components Management - Add</h3>


<form name="addFrm" action="" method="post">

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tbody>
<tr>
    <td align="right"> Name:</td>
    <td><input class="text" name="name" value="" maxlength="255" size="50" type="text"> </td>
</tr>

<tr>
    <td align="right"> Discription:</td>
    <td><textarea class="text" cols="50" name="desc" style="height: 100px;"></textarea> </td>
</tr>

<tr>
    <td align="right"> Filename:</td>
    <td><input class="text" name="filename" value="" maxlength="255" size="50" type="text"> </td>
</tr>

<tr>
    <td align="right"> Type:</td>
    <td>
		<select name="type" class="text" size="1">
			<option value="0" selected="selected"></option>
			<option value="Report">Reporting Module</option>
			<option value="Chart">Charting Module</option>
			<option value="Flash">Flash Animation</option>
			<option value="Image">Image</option>
		</select>
    </td>
</tr>

<tr>
    <td align="right"> Is Active?:</td>
    <td><input class="checkbox" name="isactive" type="checkbox"> </td>
</tr>

</tbody></table>

<input value="back" onclick="javascript:history.back(-1);" class="button" type="button"> <input name="submit" value="submit" class="button" type="submit">
</form>




</div>


<?php
$this->load->view('footer');
?>