<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
     <li><a href="{site_url}index.php/projects/projects_details/{id}/#add"><span>Project Details</span></a></li>
    </ul>
    <div id="add" class="TabSpec">

		<form name="projects_details" method="POST" action="">
		{details}
		<input type="hidden" name="id" size="20" value="{id}">
		<table cellspacing="2" cellpadding="2" border="0" width="100%" align="center">
			<tr valign="top" height="20">
				<td> <b> Code : </b> <br />
				<input type="text" name="project_code" size="20" value="{code}">  </td> 
			</tr>
			
			<tr valign="top" height="20">
				<td> <b> Description : </b> <br />
				<textarea name="desc" wrap="VIRTUAL" cols="50" rows="6">{desc}</textarea> </td> 
			</tr>
			
			<tr valign="top" height="20">
				<td> <b> Created on : </b> </br>
				<input type="text" name="created_on" size="20" value="{created_on}">  </td> 
			</tr>
            <tr valign="top" height="20">
				<td><input type="submit" name="submit" value="Update" />
				<input type="reset" name="reset" value="Reset" /></td>
			</tr>
			</table>
		{/details}
		</form> 
		</div>
</div>
<?php $this->load->view('footer-new');?> 




