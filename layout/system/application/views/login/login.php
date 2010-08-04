<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>
<table width="353" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="353" height="50" align="center" valign="middle" ></td>
  </tr>
  <tr>
    <td width="353" height="211" align="center" valign="middle" background="{site_url}theme/images/administration.gif">
    <?php echo form_open('login', array('id' => 'loginform'));?>
    <table border="0" width="93%" height="193" cellspacing="1" cellpadding="0">
				
<tr>
													<td width="2" height="33"></td>
													<td height="33" colspan="3" align="left" valign="bottom" nowrap="nowrap">
		  <h3>Administrator Login</h3>													</td>
		  <td width="152" height="33"></td>
		</tr>
												<tr>
													<td height="20">&nbsp;</td>
													<td width="79" height="20" align="left" nowrap="nowrap">
													Login:</td>
												  <td height="20" colspan="2"> 
                                                  <input  id="modlgn_username" type="text" name="username" class="inputbox" alt="username" size="18" /></td>
													<td height="20" width="152">&nbsp;</td>
		</tr>
												<tr>
													<td height="20">&nbsp;</td>
													<td width="79" height="20" align="left" nowrap="nowrap">
													Password</td>
												  <td height="20" colspan="2">
                                                  <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" alt="password" /></td>
													<td width="152" height="20">&nbsp;</td>
		</tr>
												<tr>
													<td height="20">&nbsp;</td>
													<td width="79" height="20" align="left" nowrap="nowrap">
													Remember Me</td>
												  <td width="43" height="20" align="left">
                                                  <input id="modlgn_remember" type="checkbox" name="remember" class="inputbox" value="yes" alt="Remember Me" /></td>
												  <td width="46"><?php echo form_submit('login', $this->lang->line('login_login'), 'id="login" class="submitbutton"');?></td>
												  <td width="152" height="20">&nbsp;</td>
		</tr>
										
												<tr>
													<td>&nbsp;</td>
													<td colspan="3" align="left">
											

													 <ul> 

                                                  <li><a href="#">Forgot your password?</a></li>

                                                  <li><a href="#">Forgot your username?</a></li>

                                                  <li><a href="#">Create an account</a></li> 
                                                 </ul>													 </td>
												  <td width="152">&nbsp;</td>
		</tr>
												<tr>
													<td height="2"></td>
													<td colspan="3" height="2">													</td>
													<td width="152" height="2"></td>
		</tr>
											
	</table>
    <?php echo form_close();?>
    </td>
  </tr>
    <tr>
    <td width="353" height="50" align="center" valign="middle" ></td>
  </tr>
</table>


  
            
<?php $this->load->view('footer-new');?>            
</body>
</html>