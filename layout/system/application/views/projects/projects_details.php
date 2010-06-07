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

<h2>Project Details</h2>
<form name="projects_details" method="POST" action="">
{details}
<input type="hidden" name="id" size="20" value="{id}">
<table cellspacing="2" cellpadding="2" border="0" width="100%">
    <tr valign="top" height="20">
        <td> <b> Code : </b> <br />
        <input type="text" name="project_code" size="20" value="{code}">  </td> 
    </tr>
    
    <tr valign="top" height="20">
        <td> <b> Description : </b> <br />
        <textarea name="desc" wrap="VIRTUAL" cols="50" rows="6">{desc}</textarea> </td> 
    </tr>
    
    <tr valign="top" height="20">
        <td> <b> Created on : </b> </br>
        <input type="text" name="created_on" size="20" value="{created_on}">  </td> 
    </tr>
</table>
{/details}
<input type="submit" name="submit" value="Update" />
<input type="reset" name="reset" value="Reset" />

</form> 

</body>
</html>

