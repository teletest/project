<br>
<br>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script>
<script type="text/javascript">


    $(document).ready(function() {
      $("#form1").validate({
        rules: {
          login_username: "required",// simple rule, converted to {required:true}
          login_password: "required",
		  email: {// compound rule
          required: true,
          email: true
        },
        url: {
          url: true
        },
        comment: {
          required: true
        }
        },
        messages: {
		  login_username: " Please enter a username.",
		  login_password: "Please enter a password."

        }
      });
    });


 
</script>
<div id="loginformdiv">

   <form action="{site_url}index.php/login/log_in" method="post" id="form1">
					
<label for="login_username"><span class="label">Username:</span></label>
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