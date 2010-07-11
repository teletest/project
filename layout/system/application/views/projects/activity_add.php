<?php  $this->load->view('header');  ?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/activity_add/#add"><span>Add Activity</span></a></li>
    
    </ul>
    <div id="add" >

	<h3>Adding an Activity to {sname}</h3>
	
	<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
	<form name="addFrm" action="{site_url}index.php/projects/activity_added" method="post" >
	<input type="hidden" value="{pid}" name="pid" />
	<input type="hidden" value="{sid}" name="sid" />
	<input type="hidden" value="{cid}" name="cid" />
	<input type="hidden" value="{state_id}" name="state_id" />
	<input type="hidden" value="{sname}" name="sname" />
	<tbody>
	<tr>
		<td align="right" width="230">Date:</td>
		<td><input class="text" name="act_date" value="{date}"  /></td>
	</tr>
	<tr>
	<td align="right" width="230">Type:
	</td>
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
		<td align="right">* Subject:</td>
		<td><input class="text" name="act_subject" value="" maxlength="255" size="50" type="text" /> </td>
	</tr>
	<tr>
		<td align="right" valign="top">* Description:</td>
		<td><textarea class="text" cols="50" name="act_desc" style="height: 100px;"></textarea></td>
	</tr>
	
	<tr>
		<td align="right" valign="top">* Comments:</td>
		<td><textarea class="text" cols="50" name="act_comments" style="height: 100px;"></textarea></td>
	</tr>
	<tr>
		<td align="right" >Activity By:</td>
		<td><input class="text" name="activity_by" value="" maxlength="255" size="50" type="text" /> </td>
	</tr>
	
	<tr>
	
		<td align="right"> Attachments:</td>
		<td>
			<input class="text" name="act_attachments" value="" size="40" disabled="disabled" type="text" />
			<input class="button" value="select file..." onclick="javascript:alert('present the dialog for uploading the file')" type="button" />
		</td>
	</tr>
	
	
	
	<tr>
		<td align="right">* Required Fields</td>
		<td></td>
	</tr><tr>
		<td align="left">
			<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
		</td>
		<td align="right">
		<!--	<input value="submit" onclick="javascript:alert('submit it after field validation');" class="button" type="button">-->
				<input value="submit"  type="button" onclick="this.form.submit();" />
	
		</td>
	</tr>
	</tbody>
	</form>
	</table>
    </div>
</div>	



<?php $this->load->view('footer'); ?>