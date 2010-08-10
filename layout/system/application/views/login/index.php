<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$this->load->view('header-new');
?>
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
<!-- <h2>{page_title}</h2> -->

<table width="353" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="353" height="50" align="center" valign="middle" ></td>
  </tr>
  <tr>
    <td width="353" height="211" align="center" valign="middle" background="{site_url}theme/images/administration.gif">
    <form action="{site_url}index.php/login/log_in" method="post" id="form1">
    <table border="0" width="93%" height="193" cellspacing="1" cellpadding="0">
  <tr>
	<td width="2" height="33"></td>
	<td height="33" colspan="3" align="left" valign="bottom" nowrap="nowrap"><h3>Administrator Login</h3></td>													</td>
    <td width="152" height="33"></td>
  </tr>
  <tr>
	<td height="20">&nbsp;</td>
	<td width="79" height="20" align="left" nowrap="nowrap">Login:</td>
	<td height="20" colspan="2"> 
	  <input type="text" id="login_username" name="login_username" value="" /><br />
	</td>
	<td height="20" width="152">&nbsp;</td>
  </tr>
  <tr>
	<td height="20">&nbsp;</td>
	<td width="79" height="20" align="left" nowrap="nowrap">Password</td>
    <td height="20" colspan="2">
      <input type="password" id="login_password" name="login_password" value="" /></td>
	<td width="152" height="20">&nbsp;</td>
  </tr>
  <tr>
	<td height="20">&nbsp;</td>
	<td width="79" height="20" align="left" nowrap="nowrap">Remember Me</td>
    <td width="43" height="20" align="left">
      <input id="modlgn_remember" type="checkbox" name="remember" class="inputbox" value="yes" alt="Remember Me" /></td>
    <td width="46"><input type="submit" id="login" name="login" value="Login" /></td>
    <td width="152" height="20">&nbsp;</td>
  </tr>
  <tr>
	<td>&nbsp;</td>
	<td colspan="3" align="left">
		  <ul> 

		  <li><a href="#">Forgot your password?</a></li>

		  <li><a href="#">Forgot your username?</a></li>

		  <li><a href="#">Create an account</a></li> 
		  
		 </ul>
	</td>
	<td width="152">&nbsp;</td>
   </tr>
   <tr>
		<td height="2"></td>
		<td colspan="3" height="2">	</td>
		<td width="152" height="2"></td>
   </tr>
											
	</table>
    </form>
    </td>
  </tr>
    <tr>
    <td width="353" height="50" align="center" valign="middle" ></td>
  </tr>
</table>


  
            
<?php $this->load->view('footer-new');?>            
</body>
</html>
<?php 
// $this->load->view('login/loginform');
?>
