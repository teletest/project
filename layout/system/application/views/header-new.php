<?php
header('HTTP/1.0 200 OK');
header('Content-Type: text/html; Charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to RADII Solutions </title>
<script type="text/javascript">
var ICONPATH = '<?php echo base_url()."images/"; ?>';

var SITEURL = '<?php echo site_url(); ?>';
</script>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="{site_url}js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="{site_url}js/fusion.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
<script type="text/javascript" src="{site_url}js/confirm.js"></script>

<!-- calendar icon -->
<!--<base href="http://www.monkeyphysics.com/" /> -->
<link rel="stylesheet" href="{site_url}css/calendar.css" type="text/css" />
<script type="text/javascript"  src='http://ajax.googleapis.com/ajax/libs/mootools/1.2.3/mootools.js'></script> 
<script type="text/javascript" src='http://ajax.googleapis.com/ajax/libs/mootools/1.2.3/mootools-yui-compressed.js'></script> 
<script type="text/javascript" src="{site_url}js/live_validation.js" charset="utf-8"></script>
<script src="{site_url}js/calendar.js" type="text/javascript" charset="utf-8"></script> 
<script src="{site_url}js/datepicker.js" type="text/javascript" charset="utf-8"></script> 

<!-- end calendar icon -->

<!-- js expand -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{site_url}js/jExpand.js"></script>
<link rel="stylesheet" href="{site_url}css/js_expand.css" type="text/css" media="screen">
<!-- end js expand -->

<!-- slide up down div script -->
<script type="text/javascript" src="{site_url}js/slide_up_down.js"></script>
<link rel="stylesheet" href="{site_url}css/slide_up_down.css" type="text/css" media="screen">
<!-- end slide up down div script -->

<!-- zebra filtering script -->
<link rel="stylesheet" href="{site_url}css/zebra_filter.css" type="text/css" media="screen" charset="utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script> 
<script src="{site_url}js/zebra_filter.js" type="text/javascript" charset="utf-8"></script> 
<!-- end zebra filtering script -->
          
<script src="{site_url}js/select_all.js" type="text/javascript" ></script>           
<script src="{site_url}js/FusionCharts.js" type="text/javascript" charset="utf-8"></script> 
<script src="{site_url}js/scroll_to_div.js" type="text/javascript" charset="utf-8"></script>      


<?php $this->load->view('inc-css');?>
<?php $this->load->view('inc-js');?>


</head>
<body onload="alternate('thetable');">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  width="8" height="8"><img src="{site_url}theme/images/corner-top-left.gif" width="8" height="8" alt=""></td>
    <td background="{site_url}theme/images/top-liner.gif"></td>
    <td width="8" height="8"><img src="{site_url}theme/images/corner-top-right.gif" width="8" height="8" alt=""></td>
  </tr>
  <tr>
    <td background="{site_url}theme/images/liner-left.gif"></td>
    <td height="300" align="center" valign="top" bgcolor="#E8E8E8"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14%" align="left" bgcolor="#FFFFFF"><img src="{site_url}theme/images/header-logo.jpg" width="161" height="144" /></td>
            <td width="39%" align="left" bgcolor="#FFFFFF"><img src="{site_url}theme/images/header-text.jpg"  /></td>
            <td width="47%" height="144" align="center" valign="bottom" background="{site_url}theme/images/header-map.jpg" bgcolor="#FFFFFF" style="background-position:right;background-repeat:no-repeat;">
            <table border="0" width="94%" cellspacing="1">

									<tr>

										<td>&nbsp;</td>

										<td width="30">

										  <a title="Home" href="#">

								          <img border="0" src="{site_url}theme/images/home.png" width="25" height="25" id="img1" onmouseout="this.src='{site_url}theme/images/home.png'" onmouseover="this.src='{site_url}theme/images/homeover.png'"></a></td>

									  <td width="30">

										<a title="My Account" href="#">

									    <img border="0" src="{site_url}theme/images/account.png" width="25" height="25" id="img2" onmouseout="this.src='{site_url}theme/images/account.png'" onmouseover="this.src='{site_url}theme/images/accountover.png'"></a></td>

									  <td width="30">

										<a title="Search" href="#"><img border="0" src="{site_url}theme/images/search.png" width="25" height="25" id="img3" onmouseout="this.src='{site_url}theme/images/search.png'" onmouseover="this.src='{site_url}theme/images/searchover.png'" /></a></td>

									 <td width="30">

										<a title="Logout" href="{site_url}index.php/logout">

									    <img border="0" src="{site_url}images/log_out.png" width="25" height="25" id="img19" onmouseout="this.src='{site_url}images/log_out.png'" onmouseover="this.src='{site_url}images/log_outover.png'"></a></td>
			</tr>
									<tr>
									  <td height="15" colspan="5"></td>
				    </tr>
								</table>                </td>
          </tr>
          <tr>
            <td height="34" colspan="3" align="center" valign="top" >
            <table id="Table_01" width="100%" height="26" border="0" cellpadding="0" cellspacing="0">
<tr>
		<td rowspan="2" width="14">
			<img src="{site_url}theme/images/navigationbar_01.gif" height="26" alt=""></td>
		<td rowspan="2" align="center" valign="middle" background="{site_url}theme/images/navigationbar_02.gif">
        
        <table  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="22" width="80" align="center" class="TopMenuText">Dash Board</td>
                <td height="22"  align="center" class="TopMenuText"><a href="{site_url}index.php/admin"><img src="{site_url}theme/images/cat-divider.gif" width="2" height="26" /></a></td>
               	<td height="22" width="80" align="center" class="TopMenuText">Projects</td>
                <td height="22"  align="center" class="TopMenuText"><a href="{site_url}index.php/projects"><img src="{site_url}theme/images/cat-divider.gif" width="2" height="26" /></a></td>
               	<td height="22" width="80" align="center" class="TopMenuText">Reports</td>                
                <td height="22"  align="center" class="TopMenuText"><a href="{site_url}index.php/admin"><img src="{site_url}theme/images/cat-divider.gif" width="2" height="26" /></a></td>
               	<td height="22" width="80" align="center" class="TopMenuText">Contacts</td>                
                <td height="22"  align="center" class="TopMenuText"><a href="{site_url}index.php/admin"><img src="{site_url}theme/images/cat-divider.gif" width="2" height="26" /></a></td>
               	<td height="22" width="80" align="center" class="TopMenuText">About Us</td>  
                <td height="22"  align="center" class="TopMenuText"><a href="{site_url}index.php/admin"><img src="{site_url}theme/images/cat-divider.gif" width="2" height="26" /></a></td>
               	<td height="22" width="80" align="center" class="TopMenuText">Charts</td>                 
                <td height="22"  align="center" class="TopMenuText"><a href="{site_url}index.php/admin"><img src="{site_url}theme/images/cat-divider.gif" width="2" height="26" /></a></td>
               	<td height="22" width="80" align="center" class="TopMenuText">Admin</td>                 
                              
                
              </tr>
            </table></td>
		<td width="26">
			<img src="{site_url}theme/images/navigationbar_03.gif" height="25" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="{site_url}theme/images/navigationbar_04.gif" width="26" height="1" alt=""></td>
	</tr>
</table>
            
            </td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td height="158" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="210" height="129" align="center" valign="top">
            <!-- Start right Column-->
            <?php 
			if (@$ShowLeftSide!="No"){ ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="4"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d1d1d1;">
                  <tr>
                    <td height="30" bgcolor="#d1d1d1"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="73%" align="left"><span class="BoldTest">Summary</span></td>
                        <td width="27%"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/minimize.png" width="24" id="imgTree" height="24" onclick="HideMe(mnuTree,imgTree);" style="cursor:pointer;" alt="Minimize Menu" /></td>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/close.png" width="24" height="24" style="cursor:pointer;" alt="Close Menu" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tbody id="mnuTree">
                  <tr>
                    <td height="160" align="left" valign="top" bgcolor="#FFFFFF" style="padding-left:4px;">

<!-- Tree Menu-->
 <TABLE border=0><TR><TD><FONT size=-2><A style="font-size:7pt;text-decoration:none;color:silver" href="http://www.treemenu.net/" target=_blank></A></FONT></TD></TR></TABLE>
<SCRIPT>initializeDocument()</SCRIPT>
<NOSCRIPT>
 A tree for site navigation will open here if you enable JavaScript in your browser.
 </NOSCRIPT>


                    </td>
                  </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td height="4"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d1d1d1;">
                  <tr>
                    <td height="30" bgcolor="#d1d1d1"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="73%" align="left"><span class="BoldTest">Summary</span></td>
                        <td width="27%"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/minimize.png" width="24" id="imglgn" height="24" onclick="HideMe(mnulgn,imglgn);" style="cursor:pointer;" alt="Minimize Menu" /></td>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/close.png" width="24" height="24" style="cursor:pointer;" alt="Close Menu" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <div id="summary1">
                  <tbody id="mnulgn">
                  <tr>
                    <td height="160" align="left" bgcolor="#FFFFFF" style="padding-left:6px;">
                   Username<br />
                      <input id="modlgn_username" alt="username" size="18" name="username" />
                      <br />
                    
                   Password<br />
                     
                      <input id="modlgn_passwd" value="" alt="password" size="18" type="password" name="passwd" />
                  
               
                      <br />
                      Remember Me
                      <input id="modlgn_remember" value="yes" alt="Remember Me" type="checkbox" name="remember" />
                      <br />
                      <input type="image" src="{site_url}theme/images/login.jpg"  />
             <br />

                      <a href="#">Forgot your password?</a><br />
<a href="#">Forgot your username?</a> <br />
<a href="#">Create an account</a> </td>
                  </tr>
                  </tbody>
                  </div>
                </table></td>
              </tr>
              <tr>
                <td height="4"></td>
              </tr>
           
            </table>
            <?php }?>
            <!-- End right Column-->
            </td>
            <td align="center" valign="top" style="padding-top:4px;" >