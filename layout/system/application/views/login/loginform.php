
 <div class="art-contentLayout"> 
        <div class="art-content" style="width: 870px; height: 400px"> 
          <div class="art-administrator-png" style="position: absolute; left: 0px; top: 0px; height: 417px"> 

			<?php echo form_open('login', array('id' => 'form-login'));?>
			<fieldset class="input"> 
			
              <table border="0" width="93%" height="348" cellspacing="1" cellpadding="0">
                <tr> 
                  <td height="96">&nbsp;</td>
                  <td width="106" height="96">&nbsp;</td>
                  <td width="178" height="96">&nbsp;</td>
                  <td width="252" height="96">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="33"></td>
                  <td width="285" height="33" colspan="2" align="center" valign="bottom"> 
                    <h3>Administrator Login</h3></td>
                  <td width="252" height="33"></td>
                </tr>
                <tr> 
                  <td height="20">&nbsp;</td>
                  <td height="20" width="106"> Login:</td>
                  <td height="20" width="178"> <input id="modlgn_username" type="text" name="username" class="inputbox" alt="username" size="18" /></td>
                  <td height="20" width="252">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="20">&nbsp;</td>
                  <td width="106" height="20"> Password</td>
                  <td width="178" height="20"><input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" alt="password" /></td>
                  <td width="252" height="20">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="20">&nbsp;</td>
                  <td width="106" height="20"> Remember Me</td>
                  <td width="178" height="20"><input id="modlgn_remember" type="checkbox" name="remember" class="inputbox" value="yes" alt="Remember Me" /></td>
                  <td width="252" height="20">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="22">&nbsp;</td>
                  <td width="285" height="22" colspan="2"><?php echo form_submit('login', $this->lang->line('login_login'), 'id="login" class="art-button"');?></td>
                  <td width="252" height="22">&nbsp;</td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td width="285" colspan="2"> </fieldset> 
                <ul>
                  <li><a href="#">Forgot your password?</a></li>
                  <li><a href="#">Forgot your username?</a></li>
                  <li><a href="#">Create an account</a></li>
                </ul>
                &nbsp;</td> 
                <td width="252">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="1"></td>
                  <td width="285" colspan="2" height="1"> </td>
                  <td width="252" height="1"></td>
                </tr>
                <tr> 
                  <td height="53"></td>
                  <td width="285" colspan="2" height="53"> </td>
                  <td width="252" height="53"></td>
                </tr>
              </table>
			  </fieldset>
            <?php echo form_close();?>
            <div class="cleared"></div>
          </div>
        </div>
      </div>
  

