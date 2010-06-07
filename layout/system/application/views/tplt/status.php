<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Project Manager</h1>

<?php
	echo anchor('projects','Manage') . ' | ';
	echo anchor('projects/create','Create')	. ' | ';
	echo anchor('projects/status','Status')	. ' | ';
	echo anchor('projects/nominal','Nominal Plan');
?>


<h3>You can :</h3>
<ul>
	<li>Check Status of active projects</li>
</ul>


</div>

<?php
$this->load->view('footer');
?>
