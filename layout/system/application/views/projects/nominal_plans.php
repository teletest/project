<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/nominal_plans/#add"><span>Nominal Plan</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

    <h1>Nominal Plan</h1>

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
<?php $this->load->view('footer-new');?> 

