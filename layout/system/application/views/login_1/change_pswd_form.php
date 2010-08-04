<br>
<br>

<div id="loginformdiv">

	<?php echo form_open('login/change_password', array('id' => 'loginform'));?>

	<fieldset>
			<dl>
				<dt><label for="username">Username:</label></dt>
				<dd>{username}</dd>
			</dl>
			<dl>
				<dt><span style="color:red;"><?php echo form_error('password'); ?></span><label for="password">Old Password:</label></dt>
				<dd><input tabindex="2" id="password" name="password" size="25" type="password" value="<?php  echo set_value('password'); ?>"></dd>
			</dl>
			<dl>
				<dt><span style="color:red;"><?php echo form_error('new_password'); ?></span><label for="password">Type new Password:</label></dt>
				<dd><input tabindex="2" id="new_password" name="new_password" size="25" type="password" value="<?php  echo set_value('new_password'); ?>"></dd>
			</dl>
			<dl>
				<dt><span style="color:red;"><?php echo form_error('re_new_password'); ?></span><label for="password">Retype new Password:</label></dt>
				<dd><input tabindex="2" id="re_new_password" name="re_new_password" size="25" type="password" value="<?php  echo set_value('re_new_password'); ?>"></dd>
			</dl>
			
			<dl>
				<dt>&nbsp;</dt>
				<dd><?php echo form_submit('save', $this->lang->line('login_save'), 'id="save" class="submitbutton"');?></dd>
			</dl>	
	</fieldset>

	<?php echo form_close();?>

</div>

<br>
<br>