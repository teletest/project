<?php  $this->load->view('header');  ?>
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
		
      $("#candidate_Frm").validate({  
        rules: {
          code: "required",// simple rule, converted to {required:true}
		  longitude: {
		    required:true,
		    number:true,
			Longitude: true
		   },
		  candidate_distance:
		  {
		   required: true,
		   number:true
		  },
		  latitude: {// compound rule
          required: true,
          number: true,
		  Latitude: true
        }
        },
        messages: {
          code: "Please enter a code.",
		  latitude: {
		   required : "Please enter latitude",
		   number: "Longitude value should be Number"
		   },
		  longitude: {
		   required : "Please enter longitude",
		   number: "Longitude value should be Number"
		   },
		  candidate_distance: {
		   required : "Please enter candidate distance",
		   number : "Please specify valid candidate distance"
		   }
		  }
      });
    }); 
</script>

<div id="main-content">
<h1>Project Management</h1>

<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>

<div style="float:left;margin-left:20px;">
<?php
$this->load->view('projects/search_form');
?>

<h3>Adding Candidate to {sname}</h3>
<form name="candidate_Frm" id="candidate_Frm" action="{site_url}index.php/projects/candidate_added" method="post" >
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">

<input type="hidden" value="{sid}" name="sid" />
<input type="hidden" value="{pid}" name="pid" />
<input type="hidden" value="{sname}" name="sname" />
<tbody>
<tr>
    <td align="right" width="230"><label for="login_username"><span class="label">* Code:</span></label></td>
    <td><span style="color:red;"><?php echo form_error('code'); ?></span><input type="text" name="code" value="{code}"  /></td>
</tr>
<tr>
    <td align="right">* Latitude:</td>
    <td><span style="color:red;"><?php echo form_error('latitude'); ?></span><input class="text" name="latitude" value="" type="text" /> </td>
</tr>
<tr>
    <td align="right" valign="top">* Longitude:</td>
    <td><span style="color:red;"><?php echo form_error('longitude'); ?></span><input class="text" name="longitude" value="" type="text"></input></td>
</tr>
<tr>
    <td align="right" valign="top">* Candidate Distance:</td>
    <td><span style="color:red;"><?php echo form_error('candidate_distance'); ?></span><input class="text" name="candidate_distance" value="" type="text"></input></td>
</tr>
<tr>
    <td align="right" valign="top">Approval 1:</td>
    <td><input class="text" name="approval1" value="" type="text"></input></td>
</tr>
<tr>
    <td align="right" valign="top">Approval 2:</td>
    <td><input class="text" name="approval2" value="" type="text"></input></td>
</tr>
<tr>
    <td align="right" valign="top">Approval 3:</td>
    <td><input class="text" name="approval3" value="" type="text"></input></td>
</tr>
<tr>
    <td align="right" valign="top">Approval 4:</td>
    <td><input class="text" name="approval4" value="" type="text"></input></td>
</tr>
<tr>
    <td align="right" valign="top">Approval 5:</td>
    <td><input class="text" name="approval5" value="" type="text"></input></td>
</tr>
<tr>
    <td align="right" valign="top">Power Connection:</td>
    <td><input class="text" name="power_connection" value="" type="text"></input></td>
</tr>

<tr>
    <td align="right" valign="top">Gen_Set:</td>
    <td><input class="text" name="gen_set" value="" type="text"></input></td>
</tr>

<tr>
    <td align="right" valign="top">Others:</td>
    <td><input class="text" name="others" value="" type="text"></input></td>
</tr>

<tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
    </td>
    <td align="right">
			<input value="submit"  type="submit" name="submit"  />
    </td>
</tr>
</tbody>
</table>
</form>
</div>

</div>

<?php $this->load->view('footer'); ?>