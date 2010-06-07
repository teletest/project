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

<h2>Planned Stages</h2>

<table cellspacing="2" cellpadding="2" border="0" width="100%">

   
    <tr valign="top" height="20">
        <td> <b> Stage  </b></td>
        <td> <b> Start Date </b></td> 
        <td> <b> End Date </b></td>
    </tr>
	<tr>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	</tr>
{stages}
    <tr valign="top" height="20">
        <td> {state} </td>
        <td> {start} </td>
        <td> {end} </td>
    </tr>
{/stages}
</table>


</body>
</html>


