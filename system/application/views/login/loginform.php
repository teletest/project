<br>
<br>

<div id="loginformdiv">

   <form action="{site_url}index.php/login/log_in" method="post">
					
<label for="login_username">Username:</label>
<input type="text" id="login_username" name="login_username" value="" /><br />
	
<label for="login_password">Password:</label>
<input type="password" id="login_password" name="login_password" value="" /><br />
	
<input type="submit" id="login" name="login" value="Login" />
	
</form>

	<?php // echo form_open('login/log_in', array('id' => 'loginform'));?>
   <!--
	<fieldset>
			<dl>
				<dt><label for="username">Username:</label></dt>
				<dd><input tabindex="1" name="username" id="username" size="25" value="" type="text"></dd>
			</dl>
			<dl>
				<dt><label for="password">Password:</label></dt>
				<dd><input tabindex="2" id="password" name="password" size="25" type="password"></dd>
			</dl>
			
			<dl>
				<dt>&nbsp;</dt>
				<dd><?php // echo form_submit('login', $this->lang->line('login_login'), 'id="login" class="submitbutton"');?></dd>
			</dl>	
	</fieldset> -->

	<?php // echo form_close();?>

</div>

<br>
<br>