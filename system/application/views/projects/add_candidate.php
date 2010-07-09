<?php  $this->load->view('header');  ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() { 
      $("#candidate_Frm").validate({ 
        rules: {
          code: "required",// simple rule, converted to {required:true}
          latitude: "required",
		  longitude: "required",
		  candidate_distance: "required",
		  email: {// compound rule
          required: true,
          email: true
        }
        },
        messages: {
          code: "Please enter a code."
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

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<form name="candidate_Frm" id="candidate_Frm" action="{site_url}index.php/projects/candidate_added" method="post" >

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
</form>
</table>

</div>

</div>

<?php $this->load->view('footer'); ?>