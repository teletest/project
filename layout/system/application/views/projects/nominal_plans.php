<?php
$this->load->view('header');
?>

<div id="main-content">


<h1>Nominal Plan</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>
    <br>
    <li>
	<a href='create_plan/0' >Do you want to import Nominal Plan </a>
    <br>
	</li>
	<br>
	<li>
	<a href='create_plan/1' >View Nominal Plans </a>
    <br>
	</li>
	<br>
	<li>
	<a href='{site_url}index.php/projects/display_process/0' >Do you want to Create new process using existing processes</a>
	<br>
	</li>
	<br>
	<li>
	<a href='{site_url}index.php/projects/display_process/1' >Display Existing processes</a>
	<br>
	</li>
    <br>
	<li>
	<a href='{site_url}index.php/projects/upload_calendar' >Upload Calendar of Holidays</a>
	<br>
	</li>

</div>
</div>

<?php
$this->load->view('footer');
?>
