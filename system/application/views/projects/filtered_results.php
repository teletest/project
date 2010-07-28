<?php
$this->load->view('header');
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script>

<script type="text/javascript">
    $(document).ready(function() { 
	  // define lognitude latitude format
	  jQuery.validator.addMethod("Latitude", function(latitude, element) {
		return this.optional(element)  || 
			 latitude.match(/(^\+?([1-8])?\d(\.\d+)?$)|(^-90$)|(^-(([1-8])?\d(\.\d+)?$))/);
        
		}, "Please specify a valid latitude");
		jQuery.validator.addMethod("Longitude", function(longitude, element) {
		return this.optional(element)  || 
			 longitude.match(/(^\+?1[0-7]\d(\.\d+)?$)|(^\+?([1-9])?\d(\.\d+)?$)|(^-180$)|(^-1[1-7]\d(\.\d+)?$)|(^-[1-9]\d(\.\d+)?$)|(^\-\d(\.\d+)?$)/);
        
		}, "Please specify a valid longitude"); 
		
      $("#editfilter").validate({  
        rules: {
		  longitude: {
		  
		    number:true,
			Longitude: true
		   },
		  candidate_distance:
		  {
		   number:true
		  },
		  latitude: {// compound rule
          number: true,
		  Latitude: true
        }
        },
        messages: {
		  latitude: {
		   number: "Longitude value should be Number"
		   },
		  longitude: {
		   number: "Longitude value should be Number"
		   },
		  height: {

		   number : "Please specify valid height value"
		   }
		  }
      });
    }); 
</script>
<h1>Nominal Plan</h1>
<div style="float:left">
<?php $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">
<!--<form name="editplan2" action="{site_url}index.php/projects/plan_edited/2" method="post"  >-->
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	<tr>
	  <td align="center" bgcolor="#e8e8d0" ><strong>ID</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Site ID</strong></p></td>                
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	{if_not_found}
    <tr> 
	<td colspan="8"> Your search did not return any results. </td>
	</tr>
	{/if_not_found}
	{if_found}
    {sites}
	<tr>
	 <td>{id}</td>
	  <td><a href='projects/projects_details/{id}' rel="lyteframe" >{site_id}</a></td>
	</tr>
	<input type="hidden" name="sites[]" value="{site_id}" />
    {/sites} 
   {/if_found}                 
                  
</table>
<br>
<br>
<h2>Edit Fields</h2>
<form name="editfilter" id="editfilter" action="{site_url}index.php/projects/plan_edited/2" method="post"  >
<table >
	  
      <input type="hidden" name="login_id" value="<?php echo $this->session->userdata('username'); ?>" />
      <input type="hidden" name="id" value="{id}" />
      <input type="hidden" name="nominal_plan_id" value="{nominal_plan_id}" /> 
      <input type="hidden" name="site_id" value="" />
      <input type="hidden" name="cell_id" value="All" />
      <input type="hidden" name="sector" value="All" />

	  <!-- <input type="hidden" name="sites[]" value="{site_id}" /> -->
 
	  <input type="hidden" name="time" size="20" value="<?php echo date("h:i:s"); ?>" />
      <input type="hidden" name="date" size="20" value="<?php echo date('Y-m-d'); ?>"/>
		<tbody>
			<th colspan="3">Nominal Plan : {plan_name}</th>
		</tr>	
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="bts_type"  <?php //echo set_checkbox('fields[]', 'bts_type'); ?>/></td>
			<td align="right">BTS TYPE</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input type="text" name="bts_type" value=""/></span></td>
		</tr>
		<tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="band" <?php //echo set_checkbox('fields[]', 'band'); ?>/></td>
			<td align="right">Band</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="band" value="" /></span></td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="eirp" <?php //echo set_checkbox('fields[]', 'eirp'); ?>/></td>
			<td align="right">EIRP</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="eirp" id="eirp" value="" /></span></td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="azimuth"<?php //echo set_checkbox('fields[]', 'azimuth'); ?>/></td>
			<td align="right">Azimuth</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="azimuth" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="electrical_tilt" <?php //echo set_checkbox('fields[]', 'electrical_tilt'); ?>/></td>
			<td align="right">Electrical Tilt</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="electrical_tilt" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="height_agl" <?php //echo set_checkbox('fields[]', 'height_agl'); ?>/></td>
			<td align="right">Height (AGL)</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="height_agl" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="mechanical_tilt" <?php //echo set_checkbox('fields[]', 'mechanical_tilt'); ?>/></td>
			<td align="right">Mechanical Tilt</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="mechanical_tilt" value="" /></span></td>
		</tr>	
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="antenna_type" <?php //echo set_checkbox('fields[]', 'antenna_type'); ?>/></td>
			<td align="right">Antenna Type</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="antenna_type" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="feeder_length" <?php //echo set_checkbox('fields[]', 'feeder_length'); ?>/></td>
			<td align="right">Feeder Lenght</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="feeder_length" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="feeder_type" <?php //echo set_checkbox('fields[]', 'feeder_type'); ?>/></td>
			<td align="right">Feeder Type</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="feeder_type" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="longitude" <?php //echo set_checkbox('fields[]', 'longitude'); ?>/></td>
			<td align="right">Longitude</td><span style="color:red;"><?php echo form_error('longitude'); ?>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="longitude" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="latitude" <?php //echo set_checkbox('fields[]', 'latitude'); ?>/></td>
			<td align="right">Latitude</td><span style="color:red;"><?php echo form_error('latitude'); ?>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="latitude" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="phase" <?php //echo set_checkbox('fields[]', 'phase'); ?>/></td>
			<td align="right">Phase</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="phase" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="region" <?php //echo set_checkbox('fields[]', 'region'); ?>/></td>
			<td align="right">Region</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="region" value="" /> </span></td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="type" <?php //echo set_checkbox('fields[]', 'type'); ?>/></td>
			<td align="right">Type</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="type" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="capacity"<?php //echo set_checkbox('fields[]', 'capacity'); ?>/></td>
			<td align="right">Capacity</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="capacity" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="height" <?php //echo set_checkbox('fields[]', 'height'); ?>/></td>
			<td align="right">Height</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="height" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="clutter" <?php //echo set_checkbox('fields[]', 'clutter'); ?>/></td>
			<td align="right">Clutter</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="clutter" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="division" <?php //echo set_checkbox('fields[]', 'division'); ?>/></td>
			<td align="right">Division</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="division" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="district" <?php //echo set_checkbox('fields[]', 'district'); ?>/></td>
			<td align="right">District</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="district" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="msc" <?php //echo set_checkbox('fields[]', 'msc'); ?>/></td>
			<td align="right">MSC</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="msc" value="" /></span> </td>
		</tr>
		<tr>
		    <td><input type="checkbox" class="checkBox1" name="fields[]" value="bsc" <?php //echo set_checkbox('fields[]', 'bsc'); ?>/></td>
			<td align="right">BSC</td>
			<td ><span class="divClass" id="input1ID" style="display:block"><input class="text" name="bsc" value="" /></span> </td>
		</tr>
		<tr>
			<td align="right">* Commit:<?php // echo $this->validation->commit_error; ?></td>
			<td colspan="2"><span style="color:red;"><?php echo form_error('commit'); ?></span>
			<textarea class="text"  cols="48" name="commit" style="height: 100px;" value="<?php  echo set_value('commit'); ?>" > </textarea><br />
			</td>
		</tr>
		<tr>
		   <td align="right">&nbsp;</td>
		   <td colspan="2"> <input value="Commit"  class="confirmClick" title="change these fields" type="button" onclick="this.form.submit();" /></td>
		 </tr>
	  </tbody>
	
</table>
  </form>
</div>

<?php
$this->load->view('footer');
?>
