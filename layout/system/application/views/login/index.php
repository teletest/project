<?php 
// Control Left,Right Side
// $ShowLeftSide	=	false;
// $ShowRightSide	=	false;

?>
<?php
$this->load->view('header');
?>

<table width="353" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="353" height="50" align="center" valign="middle" ></td>
  </tr>
  <tr>
    <td width="353" height="211" align="center" valign="middle" background="{site_url}images/administration.gif"><table border="0" width="93%" height="193" cellspacing="1" cellpadding="0">
				
<tr>
													<td width="2" height="33"></td>
													<td height="33" colspan="3" align="left" valign="bottom" nowrap="nowrap">
		  <h3>Administrator Login</h3>													</td>
		  <td width="152" height="33"></td>
		</tr>
		

<?php $this->load->view('login/loginform'); ?>


										
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
											
	</table></td>
  </tr>
    <tr>
    <td width="353" height="50" align="center" valign="middle" ></td>
  </tr>
</table>


<?php 

$this->load->view('footer');
?>