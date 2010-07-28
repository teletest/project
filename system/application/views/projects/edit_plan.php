<?php
$this->load->view('header');
?>

<h1>Nominal Plan</h1>
<div style="float:left">
<?php $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>

 {states}
<table class="{class}">
<?php //echo validation_errors();
 ?>

<form name="editplan" action="{site_url}index.php/projects/plan_edited" method="post"  >

<input type="hidden" name="login_id" value="<?php echo $this->session->userdata('username'); ?>" />
<input type="hidden" name="id" value="{id}" />
<input type="hidden" name="nominal_plan_id" value="{nominal_plan_id}" /> 

<!--<input type="hidden" name="id" value="{id}" /> -->
<input type="hidden" name="site_id" value="{site_id}" />
<input type="hidden" name="cell_id" value="{cell_id}" />
<input type="hidden" name="sector" value="{sector}" />
<input type="hidden" name="time" size="20" value="<?php echo date("h:i:s"); ?>" />
<input type="hidden" name="date" size="20" value="<?php echo date('Y-m-d'); ?>"/>

<tbody>
	<th colspan="2">Cell ID: {cell_id}</th>
</tr>

<tr>
    <td align="right">BTS TYPE</td>
	<td >
	<input class="text" name="bts_type" value="{bts_type}" />  
	</td>
</tr>
<tr>
<tr>
    <td align="right">Band</td>
	<td >
	 <input class="text" name="band" value="{band}" /> 
	</td>
</tr>
<tr>
    <td align="right">EIRP</td>
    <td ><input class="text" name="eirp" id="eirp" value="{eirp}" /></td>
</tr>
<tr>
    <td align="right">Azimuth</td>
    <td ><input class="text" name="azimuth" value="{azimuth}" /> </td>
</tr>
<tr>
    <td align="right">Electrical Tilt</td>
    <td ><input class="text" name="electrical_tilt" value="{electrical_tilt}" /> </td>
</tr>

<tr>
    <td align="right">Height (AGL)</td>
    <td ><input class="text" name="height_agl" value="{height_agl}" /> </td>
</tr>

<tr>
    <td align="right">Mechanical Tilt</td>
    <td ><input class="text" name="mechanical_tilt" value="{mechanical_tilt}" /> </td>
</tr>

<tr>
    <td align="right">Antenna Type</td>
    <td ><input class="text" name="antenna_type" value="{antenna_type}" /> </td>
</tr>

<tr>
    <td align="right">Feeder Lenght</td>
    <td ><input class="text" name="feeder_length" value="{feeder_length}" /> </td>
</tr>

<tr>
    <td align="right">Feeder Type</td>
    <td ><input class="text" name="feeder_type" value="{feeder_type}" /> </td>
</tr>

<tr>
    <td align="right">Longitude</td>
    <td ><span style="color:red;"><?php echo form_error('longitude'); ?></span><input class="text" name="longitude" value="{longitude}" /> </td>
</tr>

<tr>
    <td align="right">Latitude</td>
    <td ><span style="color:red;"><?php echo form_error('latitude'); ?></span><input class="text" name="latitude" value="{latitude}" /> </td>
</tr>
<!--
<tr>
    <td align="right">Project Name</td>
    <td ><input class="text" name="project_name" value="{project_name}" /> </td>
</tr>
-->
<tr>
    <td align="right">Phase</td>
    <td ><input class="text" name="phase" value="{phase}" /> </td>
</tr>

<tr>
    <td align="right">Region</td>
    <td ><input class="text" name="region" value="{region}" /> </td>
</tr>
<tr>
    <td align="right">Type</td>
    <td ><input class="text" name="type" value="{type}" /> </td>
</tr>

<tr>
    <td align="right">Capacity</td>
    <td ><input class="text" name="capacity" value="{capacity}" /> </td>
</tr>

<tr>
    <td align="right">Height</td>
    <td ><input class="text" name="height" value="{height}" /> </td>
</tr>

<tr>
    <td align="right">Clutter</td>
    <td ><input class="text" name="clutter" value="{clutter}" /> </td>
</tr>

<tr>
    <td align="right">Division</td>
    <td ><input class="text" name="division" value="{division}" /> </td>
</tr>
<tr>
    <td align="right">District</td>
    <td ><input class="text" name="district" value="{district}" /> </td>
</tr>
<tr>
    <td align="right">MSC</td>
    <td ><input class="text" name="msc" value="{msc}" /> </td>
</tr>
<tr>
    <td align="right">BSC</td>
    <td ><input class="text" name="bsc" value="{bsc}" /> </td>
</tr>
<!--
{if_next_nodes}
<tr>
	<td align="right">Next nodes if there is condition:</td>
	<td>
	<input class="text" name="next_nodes" value="{next_nodes}" /><br />
	</td>
</tr>
{/if_next_nodes}
-->
<tr>
    <td align="right">* Commit:<?php // echo $this->validation->commit_error; ?></td>
	<td >
	
    <span style="color:red;"><?php echo form_error('commit'); ?></span>
	<textarea class="text"  cols="48" name="commit" style="height: 100px;" value="<?php  echo set_value('commit'); ?>" > </textarea><br />
	</td>
	
</tr>
   <td align="right">&nbsp;</td>
	<td >
   <input value="Commit"  type="button" onclick="this.form.submit();" />
   </td>
</tbody>

</form>

</table>
{/states}
{pagination}


</div>
</div>

<?php
$this->load->view('footer');
?>

