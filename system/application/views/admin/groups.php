<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}
<br /><br />
		
<h3>Group Management</h3>
<?php echo anchor('admin/groups/add',	'Add a group'); ?>

	<form action="" method="post">
	
		<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th>Group Id</th><th>Group Name</th><th>Is Active?</th>
		<th>Actions</th>
		</tr>
		{groups}		
		<tr><td>{id}</td><td>{name}</td><td>{isactive}</td><td><?php echo anchor('admin/groups/edit/{id}','Edit'); ?></td></tr>
		{/groups}
		</table>
		
	</form>		



</div>



<?php
$this->load->view('footer');
?>