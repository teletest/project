<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<?php $this->load->view('header-new');?>

	<form action="" method="post">
 <div id="ShowTab" style="width:96%;overflow:hidden;">
    <ul>
    <li><a href="#Tab1"><span>General</span></a></li>
    <li><a href="#Tab2"><span>Calendar</span></a></li>
    </ul>
        <div id="Tab1"  class="TabSpec">
        {admin_menu}
      <table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th colspan="2" align="left"><h3>General</h3></th></tr>
		<tr><td align="left">Admin User:</td><td align="left"><input name="admin_user" type="text" size=25 value="{admin_user}" /></td></tr>
		<tr><td align="left">Debug Mode:</td><td align="left"><input name="debug_mode" type="checkbox" {debug_mode} /></td></tr>
		<tr>
		  <td>&nbsp;</td>
		<td align="left" valign="middle" height="35"><input type="submit" name="submit2" value="Submit" class="button" /></td>
		</tr>      
		</table>
        </div>
        <div id="Tab2"   class="TabSpec">
        {admin_menu}
		<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th colspan="2"><h3>Calendar</h3></th></tr>
		<tr><td align="left">Start Time:</td><td align="left"><input name="cal_starttime" type="text" size=10 value="{cal_starttime}" /></td></tr>
		<tr><td align="left">End Time:</td><td align="left"><input name="cal_endtime" type="text" size=10 value="{cal_endtime}" /></td></tr>
		<tr><td align="left">Working Days:</td><td align="left"><input name="cal_workingdays" type="text" size=25 value="{cal_workingdays}" /></td></tr>
		<tr>
		  <td>&nbsp;</td>
		<td align="left" valign="middle" height="35"><input type="submit" name="submit2" value="Submit" class="button" /></td>
		</tr>        
		</table>
        </div>
    </div>

</form>	




		
		

		

		
		
	

</div>



<?php $this->load->view('footer-new');?>            
</body>
</html>