<br>
<br>

<div id="loginformdiv">

	<?php echo form_open('login', array('id' => 'loginform'));?>

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
				<dd><?php echo form_submit('login', $this->lang->line('login_login'), 'id="login" class="submitbutton"');?></dd>
			</dl>	
	</fieldset>

	<?php echo form_close();?>

</div>

<br>
<br>