<?php  $this->load->view('header');  ?>
<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/nominal_plans/#add"><span>Planning Documents</span></a></li>
    
    </ul>
    <div id="add" >

	<h3>Adding Candidate to {sname}</h3>

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
	<form name="addFrm" action="{site_url}index.php/projects/candidate_added" method="post" >
	
	<input type="hidden" value="{sid}" name="sid" />
	<input type="hidden" value="{pid}" name="pid" />
	<input type="hidden" value="{sname}" name="sname" />
	<tbody>
	<tr>
		<td align="right" width="230">Code:</td>
    <td><input class="text" type="text" name="code" value="{code}"  /></td>
</tr>
	<tr>
		<td align="right">Latitude:</td>
    <td><input class="text" name="latitude" value="" type="text" /> </td>
</tr>
	<tr>
		<td align="right" valign="top">Longitude:</td>
    <td><input class="text" name="longitude" value="" type="text"></input></td>
</tr>
	<tr>
		<td align="right" valign="top">Candidate Distance:</td>
    <td><input class="text" name="candidate_distance" value="" type="text"></input></td>
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
				<input value="submit"  type="submit" class="button"  name="submit"  />
		</td>
	</tr>
	</tbody>
	</form>
	</table>
    </div>

</div>
<?php $this->load->view('footer'); ?>