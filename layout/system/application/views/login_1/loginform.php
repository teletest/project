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
<tr>
<td height="20">&nbsp;</td>
<td width="79" height="20" align="left" nowrap="nowrap">
<label for="login_username"><span class="label">Username:</span></label></td>
<td height="20" colspan="2"> 
<input type="text" id="login_username" name="login_username" value="" /></td>
<td height="20" width="152">&nbsp;</td>
</tr>
<tr>
<td height="20">&nbsp;</td>
<td width="79" height="20" align="left" nowrap="nowrap">
<label for="login_password">Password:</label></td>
<td height="20" colspan="2">
<input type="password" id="login_password" name="login_password" value="" /><br /></td>
<td width="152" height="20">&nbsp;</td>
</tr>
<tr>
<td height="20">&nbsp;</td>
<td width="79" height="20" align="left" nowrap="nowrap">
Remember Me</td>
<td width="43" height="20" align="left">
<input id="modlgn_remember" type="checkbox" name="remember" class="inputbox" value="yes" alt="Remember Me" /></td>
<td width="46"><input type="submit" id="login" name="login" value="Login" /></td>
<td width="152" height="20">&nbsp;</td>
</tr>
</form>
</div>

<br>
<br>