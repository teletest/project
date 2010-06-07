<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

<br /><br />

<h3>Components Management</h3>
<?php
	echo anchor('admin/components/add',	'Add a Component');
?>


	<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
	<tr><th>Name</th><th>Description</th><th>Filename</th><th>Type</th><th>Is Active?</th><th>&nbsp;</th></tr>
	{components}		
	<tr><td>{name}</td><td>{desc}</td><td>{filename}</td><td>{type}</td><td>{isactive}</td><td><?php echo anchor('admin/components/edit/{id}','Edit'); ?></td></tr>
	{/components}
	</table>


</div>



<?php
$this->load->view('footer');
?>