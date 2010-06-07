

<?php
$this->load->view('header');
?>

<div id="main-content">
<h1>Nominal Plan</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">
<style type="text/css">
.small {
	font-weight: bold; 
	font-size: xx-small;
}
</style>

<!-- <form method="post" action="{site_url}index.php/projects/<?php //echo $this->uri->segment(2) ?>/<?php //echo $this->uri->segment(3) ?>">-->
<form method="post" action="{site_url}index.php/projects/iframe_view/{plan_id}/2" id="myForm" target="datamain">

Search    : <input name="s" value="" /> 
Filter on : <select xml:lang="en" dir="ltr" name="f" id="f">
			<option value="" title="No filter" selected="selected">--------</option>
			<option value="name" >Name</option>
			<option value="region" >Region</option>
			<option value="division">Division</option>
			<option value="clutter">Clutter</option>
			<option value="msc/bsc">MSC/BSC</option>
			<option value="bts_type" title="VIP Projects">BTS Type</option> 
		    </select>
			 <input type="button" id="b1" name="b1" value="Submit" onclick="this.form.submit()"  />
</form>
<br>
<br>
<h2>Nominal Plan</h2>
<!--<iframe id="datamain" src="{site_url}index.php/projects/iframe_view/{plan_id}/2"  width=1000 height=550 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=1 scrolling=auto>
</iframe> -->
<iframe id="datamain" src="{site_url}index.php/projects/display_counted_sites/{field}/{value}"  width=600 height=750 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=1 scrolling=auto>
</iframe>

<layer visibility=hide>
<div style="width:100%;" align="right">
<a href="#" onMouseover="scrollspeed=-2" onMouseout="scrollspeed=0">Up</a> | <a href="#" 
onMouseover="scrollspeed=2" onMouseout="scrollspeed=0">Down</a>
</div>
</layer>



</div>
</div>

<?php
$this->load->view('footer');
?>