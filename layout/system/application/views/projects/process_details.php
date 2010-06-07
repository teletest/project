<?php
header('HTTP/1.0 200 OK');
header('Content-Type: text/html; Charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<h2>Process Details</h2>
<!--<form name="process_details" method="POST" action="">

<input type="hidden" name="id" size="20" value="{id}">-->
<table cellspacing="2" cellpadding="2" border="0" width="100%">
{process}
    <tr>
	    <td><b>Created on</b></td>
	    <td>{created_on} </td>
		<td>&nbsp;  </td>
	</tr>
	<tr>
	    <td><b>Created by</b></td>
	    <td> {created_by} </td>
		<td>&nbsp;  </td>
    </tr>
	<tr>
	    <td><b>Description</b></td>
	    <td colspan="2"> {description} </td>
    </tr>
	<tr>
	    <td><b>Comments :</br></td>
	    <td colspan="2"> {comments} </td>
    </tr>
{/process}
    <tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
    <tr valign="top" height="20">
        <td> <b> Stage  </b></td>
        <td> <b> Lead Time </b></td> 
        <td> <b> Dependency </b></td>
    </tr>
{process_details}
    <tr valign="top" height="20">
        <td> {stage} </td>
        <td> {lead_time} </td>
        <td> {dependency} </td>
    </tr>
{/process_details}
</table>

<!--<input type="submit" name="submit" value="Update" />
<input type="reset" name="reset" value="Reset" />

</form> -->

</body>
</html>


