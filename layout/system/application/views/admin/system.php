<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>


<form id='frmSystem' action="" method="post" >
<div id="ShowTab" style="width:96%;overflow:hidden;">
    <ul>
    <li><a href="#Tab1"><span>Email Server</span></a></li>
    </ul>
        <div id="Tab1" class="TabSpec" >
        {admin_menu}
     		<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th colspan="2"><h3>Email Server</h3></th></tr>
		<tr><td align="left">Use SMTP Server:</td><td align="left"><input id="smtp_isactive" name="smtp_isactive" type="checkbox" {smtp_isactive} /></td></tr>
		<tr><td align="left"> Host:</td><td align="left"><input name="smtp_host" type="text" id = "smtp" size=25 value="{smtp_host}" /></td></tr>
		<tr><td align="left">Port:</td><td align="left"><input name="smtp_port" type="text" id = "port" size=25 value="{smtp_port}" /></td></tr>
		<tr><td align="left">Username:</td><td align="left"><input name="smtp_username" type="text" id = "uname" size=25 value="{smtp_username}" /></td></tr>
		<tr><td align="left">Password:</td><td align="left"><input name="smtp_password" type="text" id = "pass" size=25 value="{smtp_password}" /></td></tr>
		<tr><td align="left">Timeout:</td><td align="left"><input name="smtp_server_timeout" type="text" id = "timeout" size=25 value="{smtp_server_timeout}" /></td></tr>
        		<tr>
		  <td>&nbsp;</td>
		<td align="left" valign="middle" height="35"><input type="submit" name="submit2" value="Submit" class="button" /></td>
		</tr>  
		</table>
        </div>
       
    </div>



	</form>	






<?php
$this->load->view('footer-new');
?>