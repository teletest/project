<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}


<br /><br />
	
		<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
		<tr><th>Date</th><th>User</th><th>Company</th><th>Subject</th><th>Action</th></tr>
		{feedback}		
		<tr><td>{cur_date}</td><td>{from}</td><td>{company}</td><td>{subject}</td><td><a href="view_comments/{id}" rel='lyteframe' rev="width: 400px; height: 300px;"> View</a></td></tr>

		{/feedback}
		</table>












</div>


<?php
$this->load->view('footer');
?>