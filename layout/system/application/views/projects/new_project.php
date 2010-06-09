<?php
$this->load->view('header');
?>

<div class="art-contentLayout"> 

<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>
<div style="float:left;margin-left:20px;">


<h3>Add a project</h3>
<form action='{site_url}index.php/projects/new_project' method='post'>
	
<table cellspacing="2" cellpadding="2" border="0" width="100%">

    <tr valign="top" height="20">
        <td align="right"> <b> Code : </b> </td>
        <td> <input type="text" name="project_code" size="20" value="">  </td> 
    </tr>

    <tr valign="top" height="20">
        <td align="right"> <b> Created_on : </b> </td>
        <td> <input type="text" name="created_on" size="20" value="<?php echo date('Y-m-d'); ?>">  </td> 
    </tr>
    
    <tr valign="top" height="20">
        <td align="right"> <b> Description : </b> </td>
        <td> <textarea name="desc" wrap="VIRTUAL" cols="60" rows="6"></textarea>  </td> 
    </tr>
        
    <tr valign="top" height="20">
        <td align="right">&nbsp;</td>
        <td>
        	<input type="submit" name="submit" value="Submit" onclick="this.form.submit();" />
        </td> 
    </tr>
    
    
</table>
</form>

<h3>Projects waiting to be planned</h3>

<table>
<tr>
	<th>Project Code</th><th>Action</th>
</tr>
{projects}
<tr>
	<td><a href='projects_details/{id}' rel="lyteframe">{code}</a> </td><td><a href='projects_details/{id}' rel="lyteframe" >Details</a> | <a href='projects_delete/{id}'>Delete</a></td>
</tr>
{/projects}
</table>
</div>

<?php
$this->load->view('footer');
?>
