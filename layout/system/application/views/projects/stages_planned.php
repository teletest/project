<?php
$this->load->view('header');
?>

<script type="text/javascript">
function reload(form, id){

	var cat = document.getElementById('department-'+id)[document.getElementById('department-'+id).selectedIndex].innerHTML;
	var p = {};
	p['cat'] = cat;
    p['id'] = id;
    $('#second-'+id).load("{site_url}index.php/projects/get_users_list",p,function(str){
       
	 });
	  
} 

</script>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/stages_planned/#add"><span>Stages Planned</span></a></li>
    
    </ul>
    <div id="add" >
	<form action='{site_url}index.php/projects/stages_planned/add' method='post' name="frm1" id="frm1">
	
	<!--<a href="#" onClick="checkAll('states[]',1);">Check All Sites</a> | <a href="#" onClick="checkAll('states[]',0);">Uncheck All 
	Sites</a><br><br>
	<a href="{site_url}index.php/projects/mail" >Check mail</a> -->
	<input type="checkbox" name="checkall" onClick="checkedAll(frm1);" >
	
	<input type="hidden" value="{site_id}" size="10" name="site_id"/>
	<input type="hidden" value="{project_id}" size="10" name="project_id"/>
	{states}
	<input type="hidden" value="{id}" size="10" name="state_id"/>
	
	
	<table cellspacing="2" cellpadding="2" border="0" width="100%">
		<tr valign="top" height="20">
			<td align="right"><input type="checkbox" value="{id}" name="states[]"  />  <b> Stage : </b> </td>
			<td><h4>{state}</h4></td>
			<td align="right"> <b> Select Department : </b> </td>
			
			<td>
			 <div id="content"> 
			  <select xml:lang="en" dir="ltr" name="department[{id}]" id="department-<?= "{id}" ?>" onChange="reload(this.form, {id})" > 	
				 <option value="RF" selected="selected" >RF</option>
				 <option value="Structural Engineering" >Structural Engineering</option>
				 <option value="Civil Engineering" >Civil Engineering</option>
				 <option value="Installation" >Installation</option>
				 <option value="Comissioning" >Comissioning</option>
				 <option value="Testing" >Testing</option>
				 <option value="Acceptance" >Acceptance</option>
				 <option value="Quality Control" >Quality Control</option>
				 <option value="Site Act" >Site Act</option>
			 </select>
			 </div>
			</td>
			<td align="right"> <b> Select Users : </b> </td>
			<td>
			 <div id="second-<?= "{id}" ?>">
			 <select xml:lang="en" dir="ltr" name="users[{id}]" id="users">	
				 {users}
				 <option value="{u_id}" >{name}</option>
				 {/users}
			 </select>
			 </div>
			</td>
			
		</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Start Date : </b> </td>
			<td><input type="text" value="{start}" size="10" name="actual_start_date[{id}]"/></td>
			
			<td align="right"> <b> End Date : </b> </td>
			<td><input type="text" value="{end}" size="10" name="actual_end_date[{id}]"/></td>
	
			<td align="right"> <b> Percentage Complete : </b> </td>
			<td>
			 <select xml:lang="en" dir="ltr" name="percentage_complete[{id}]" id="percentage_complete">	
				 <option value="0" >0%</option>
				 <option value="25" >25%</option>
				 <option value="50" >50%</option>
				 <option value="75" >75%</option>
				 <option value="100" >100%</option>
			 </select>
			</td>
		</tr>
	</table>
	{/states}
	
			<input name="Submit"  value="Plan" type="submit" class="button" />
	
	</form>
    </div>
</div>
<?php
$this->load->view('footer');
?>
