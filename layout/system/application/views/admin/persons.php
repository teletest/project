<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

	<h2>Persons Management</h2>

    <?php
	echo anchor('admin/persons/add',	'Add a person');
?>
<br /><br />

	<form action="" method="post">
		<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th>Users</th><th>Login</th><th>Group</th><th>Stakeholder</th><th colspan="3">Action</th></tr>
		{persons}	
		<tr><td>{person}</td>
		<td>{login}</td>
		<td>{groupname}</td>
		<td>{company}</td>
		<td><a href="{site_url}index.php/admin/persons/edit/{id}">Edit</a></td>
		<td><a href="{site_url}index.php/admin/persons/delete/{id}">Delete</a></td>
		<td><a href="{site_url}index.php/login/change_password/{id}">Change Password</a></td>
		</tr>
		{/persons}
		</table>
	</form>	

</div>

<?php
$this->load->view('footer');
?>