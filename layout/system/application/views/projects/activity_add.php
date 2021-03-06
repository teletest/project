<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>
<script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script>

<script type="text/javascript">
    $(document).ready(function() { 
      $("#activityFrm").validate({ 
        rules: {
          act_subject: "required",// simple rule, converted to {required:true}
          act_desc: "required",
		  act_comments: "required",
		  email: {// compound rule
          required: true,
          email: true
        }
        },
        messages: {
          act_subject: "Please enter subject.",
		  act_desc:"Please enter description",
		  act_comments: "Please enter comment"
        }
      });
    });
</script>
<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/activity_add/#add"><span>Add Activity</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">

	<h3>Adding an Activity to {sname}</h3>
	
	<form name="activityFrm" id="activityFrm" action="{site_url}index.php/projects/activity_added" method="post" >
	<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
	
	<input type="hidden" value="{pid}" name="pid" />
	<input type="hidden" value="{sid}" name="sid" />
	<input type="hidden" value="{cid}" name="cid" />
	<input type="hidden" value="{state_id}" name="state_id" />
	<input type="hidden" value="{sname}" name="sname" />
	<tbody>
	<tr>
		<td align="right" width="230"><span class="label">Date:</span></td>
		<td><input name="act_date" value="{date}"  /></td>
	</tr>
	<tr>
	<td align="right" width="230"><span class="label">Type:</span></td>
	<td>
	<select xml:lang="en" dir="ltr" name="type" id="types">
			<option value="rnd" selected="selected">RND </option>
			<option value="acquisition">Acquisition</option>
			<option value="transmission">Transmission</option>
			<option value="civil works" >Civil Works</option>
			<option value="telecom" >Telecom </option>
			<option value="other" >Other</option>
		</select>
	</td>
	</tr>
	<tr>
		<td align="right"><label for="act_subject"><span class="label">* Subject:</span></label></td>
		<td><span style="color:red;"><?php echo form_error('act_subject'); ?></span><input name="act_subject" type="text" /> </td>
	</tr>
	<tr>
		<td align="right" valign="top"><label for="act_desc"><span class="label">* Description:</span></label></td>
		<td><span style="color:red;"><?php echo form_error('act_desc'); ?></span><textarea name="act_desc" style="height: 100px;"></textarea></td>
	</tr>
	
	<tr>
		<td align="right" valign="top"><label for="act_comments"><span class="label">* Comments:</span></label></td>
		<td><span style="color:red;"><?php echo form_error('act_comments'); ?></span><textarea name="act_comments" style="height: 100px;"></textarea></td>
	</tr>
	<tr>
		<td align="right" >Activity By:</td>
		<td><input name="activity_by" value="" type="text" /> </td>
	</tr>
	
	<tr>
	
		<td align="right"> Attachments:</td>
		<td>
			<input name="act_attachments" value="" disabled="disabled" type="text" />
			<input value="select file..." onclick="javascript:alert('present the dialog for uploading the file')" type="button" />
		</td>
	</tr>
	
	
	
	<tr>
		<td align="right">* Required Fields</td>
		<td></td>
	</tr><tr>
		<td align="left">
			<input value="back" onclick="javascript:history.back(-1);" type="button" />
		</td>
		<td align="right">
		<!--	<input value="submit" onclick="javascript:alert('submit it after field validation');" class="button" type="button">-->
				<input value="submit"  type="submit" name="submit" />
	
		</td>
	</tr>
	</tbody>
	
	</table>
	</form>
    </div>
</div>	


<?php $this->load->view('footer-new');?> 
