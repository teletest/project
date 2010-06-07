<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}
<br /><br />
		
<h3>Companies Management</h3>
<?php echo anchor('admin/companies/add',	'Add a company'); ?>
	
		<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th>Company Name</th><th>Company Address</th><th>Is Active?</th>
		<th>Actions</th>
		</tr>
		{companies}		
		<tr><td>{name}</td><td><pre>{address}</pre></td><td>{isactive}</td><td><?php echo anchor('admin/companies/edit/{id}','Edit'); ?> <a href="companies/profile/{id}" rel="lyteframe" >Profile</a> <a href="companies/note/{id}" rel="lyteframe" >Note</a></td></tr>
		{/companies}
	  </table>
	



</div>


<?php
$this->load->view('footer');
?>