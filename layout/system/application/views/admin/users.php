<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Administration</h1>

	

<?php
	echo anchor('admin','General') . ' | ';
	echo anchor('admin/system','System') . ' | ';
	echo anchor('admin/groups','Groups') . ' | ';
	echo anchor('admin/users','Users');
?>

	<h4>User Management</h4>
	<ul>
		<li>User Rights</li>
		<li>Group associations</li>
	</ul>



<input type="button" name="v_result" value="Add New User" OnClick="javascript:popUp('admin_addnewuser.php','450','400')" />
<input type="button" name="v_result" value="Edit User Privilege" OnClick="javascript:popUp('admin_edituserpriv.php','700','800')" />
<input type="button" name="v_result" value="Change Level Privilege" OnClick="javascript:popUp('admin_changelevelpriv.php','600','800')" />
<input type="button" name="v_result" value="View all feedback" OnClick="javascript:popUp('admin_viewfeedback.php','450','400')" />






</div>

<script language="JavaScript">
      <!-- Begin
      function popUp(URL,h,w) {
      day = new Date();
      id = day.getTime();
      URL = '/rft/' + URL;
      eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width='+w+',height='+h+',left = 20,top = 20');");
      }
      // End -->
</script>

<?php
$this->load->view('footer');
?>