<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>
<!--
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
		
      $("#editplan").validate({  
        rules: {
          code: "required",// simple rule, converted to {required:true}
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
          code: "Please enter a code.",
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
</script> -->

<style type="text/css">
.style1 {
	color: #FFFFFF;
	font-family: Verdana;
	font-weight:bold;
	cursor:pointer;
	
}
</style>

<!--<div id="ShowTab" style="width:96%;overflow:auto;"> -->
<div id="ShowTab" style="width:96%;overflow:hidden;">
    <ul>
    <li><a href="{site_url}index.php/projects/edit_options/#add"><span>Edit Options</span></a></li>
    </ul>
    <div id="add" class="TabSpec" >
        <!-- <h1>Edit Plan</h1> -->
       <table  border="0" cellpadding="0" cellspacing="1" class="ewTable" width="100%">
	   <tbody>
		<span style="color:red;"><?php echo validation_errors();?></span>
		
		<tr>
            <td colspan="4" align="left" valign="top" ><b>Edit Nominal Plan Options</b></td> 
		 </tr>
		 <tr>
		   <td colspan="4">&nbsp;</td>
		  </tr>
         <tr>
            <td colspan="4" align="left" valign="top"  class="style1" onclick="HideMe(edit_whole);" background="{site_url}theme/images/strip.jpg" style="padding-left:25px;" height="16">Apply changes to whole Nominal Plan</td> 
		 </tr>
		  <tbody id="edit_whole" style="display:none;">
		    <tr>
			 <td colspan="4" align="center">
		       <?php $this->load->view("projects/edit_whole"); ?>
			 </td>
			</tr>
		  </tbody>
		  <tr>
		   <td colspan="4">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="4" align="left" valign="top"  class="style1" onclick="HideMe(edit_filtered);" background="{site_url}theme/images/strip.jpg" style="padding-left:25px;" height="16">Apply changes to filtered list</td> 
		 </tr>
		  <tbody id="edit_filtered" style="display:none;">
		    <tr>
			 <td colspan="4" align="center">
		       <?php  $this->load->view("projects/edit_filtered"); ?>
			 </td>
			</tr>
		  </tbody>
		  <tr>
		   <td colspan="4">&nbsp;</td>
		  </tr>
		  <tr>
            <td colspan="4" align="left" valign="top"  class="style1" onclick="HideMe(edit_cell);" background="{site_url}theme/images/strip.jpg" style="padding-left:25px;" height="16">Apply cell based changes</td> 
		 </tr>
		<tbody id="edit_cell" style="display:none;">
		    <tr>
			 <td colspan="4" align="center">
		       <?php  $this->load->view("projects/edit_cell"); ?>
			 </td>
			</tr>
		</tbody> 

     </tbody>
	</table>
    </div>
</div>

<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>

