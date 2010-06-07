<?php $this->load->view('header'); ?>


<div id="main-content">
<h1>Site Manager</h1>

<div id="sub_menu">
<?php 
	echo anchor('sites','Sites') . ' | ' . 
	anchor('sites/summary','Summary') . ' | ' .  
	anchor('sites/summary/graph','Graph');
?>
</div>

<form method="post" action="">
<table border="0">

<tr>
<td>
Find
</td>
<td>
<input name="site_s" value="" />
</td>
</tr>

<tr>
<td>
Filter By
</td>
<td> 
	<select xml:lang="en" dir="ltr" name="site_filter" id="select_filter" >
		<option value="" title="No filter" selected="selected">&nbsp;</option>
		<option value="region" title="Sites of a certain region">Region</option>
		<option value="cluster" title="Sites of a Cluster">Cluster</option>
		<option value="individual" title="Individual Sites">Individual</option>
		<option value="vip" title="VIP Sites">VIP</option>
	</select>
</td>
</tr>



</table>
<input type="button" id="b1" name="b1" value="Submit" onclick="this.form.submit();" />
</form>
<br />



<?php
	$CI =& get_instance();
	$s = $CI->input->post('site_s');
	$f = $CI->input->post('site_filter');
	
	if ( $s == ''  && $f == '') 
	{
?>


		<h3>Create {SITES_INDEX}</h3>

<? } else { ?>		
		<h3>Create {SITES_INDEX} based on following parameters :</h3>
		<div>
			Search    : <?php echo $s; ?> <br />
			Filter on : <?php echo $f; ?> <br />
		</div> 
<?php } ?>



</div>



<?php $this->load->view('footer'); ?>