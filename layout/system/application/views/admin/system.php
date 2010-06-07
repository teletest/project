<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

<br /><br />	
	<form id='frmSystem' action="" method="post" >	

	

		<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th colspan="2"><h3>Email Server</h3></th></tr>
		<tr><td>Use SMTP Server:</td><td><input id="smtp_isactive" name="smtp_isactive" type="checkbox" {smtp_isactive} /></td></tr>
		<tr><td> Host:</td><td><input name="smtp_host" type="text" id = "smtp" size=25 value="{smtp_host}" /></td></tr>
		<tr><td>Port:</td><td><input name="smtp_port" type="text" id = "port" size=25 value="{smtp_port}" /></td></tr>
		<tr><td>Username:</td><td><input name="smtp_username" type="text" id = "uname" size=25 value="{smtp_username}" /></td></tr>
		<tr><td>Password:</td><td><input name="smtp_password" type="text" id = "pass" size=25 value="{smtp_password}" /></td></tr>
		<tr><td>Timeout:</td><td><input name="smtp_server_timeout" type="text" id = "timeout" size=25 value="{smtp_server_timeout}" /></td></tr>
		</table>
		<input type="submit" name="submit" value="Submit" id = "sub" class="button"/>

	</form>	


</div>



<?php
$this->load->view('footer');
?>