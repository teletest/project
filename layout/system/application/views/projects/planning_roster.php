
<h3>Plan Selected Projects</h3>
<form action='{site_url}index.php/projects/site_planned' method='post' name="planForm">
<input type="hidden" value="{pid}" name="pid" />
<input type="hidden" value="{code}" name="code" />	
<table cellspacing="2" cellpadding="2" border="0" width="100%">

    <tr valign="top" height="20">
        <td align="right"> <b> Start Date : </b> </td>
		<td><input type="text" value="<?php echo date('Y-m-d'); ?>" size="20" name="start_date"/></td>
    </tr>
    <tr valign="top" height="20">
        <td align="right"> <b> Predefined Plan : </b> </td>
	 <td>
	 <select xml:lang="en" dir="ltr" name="f" id="f">
		<option value="" title="No filter" selected="selected">&nbsp;</option>
		{plans}	
		<option value="{name}" >{name}</option>
		{/plans} 
	</select>
	</td>
	</tr>
    <tr valign="top" height="20">
        <td align="right">&nbsp;</td>
        <td>
        	<input type="button"  value="Plan" onclick="this.form.submit();" />
        </td> 
    </tr>
    
    
</table>
</form>


