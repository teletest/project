<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>




	<form action="" method="post">



<div id="ShowTab" style="width:96%;overflow:hidden;">
    <ul>
    <li><a href="#Tab1"><span>Persons Management</span></a></li>
    </ul>
        <div id="Tab1" class="TabSpec" >
        {admin_menu}
        <br />
            <?php
	echo anchor('admin/persons/add',	'Add a person');
?>
<br/>
		<table border="0" cellpadding="0" cellspacing="1" class="ewTable" width="100%">
		<tr class="ewTableHeader"><td width="20%" align="left"><strong>Users</strong>
	        </td>
		
		<td width="28%" align="left"><strong>Group</strong>		    </td>
		
		<td width="29%" align="left"><strong>Stakeholder</strong>		    </td>
		
		<td colspan="2" align="center"><strong>Action</strong>
		    </td>
		</tr>
        <tbody id="persons">
		{persons}	
		<tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);"><td align="left">{person}</td>
		<td align="left">{groupname}</td>
		<td align="left">{company}</td>
		<td width="11%" align="center"><a href="{site_url}index.php/admin/persons/edit/{id}">Edit</a></td>
		<td width="12%" align="center"><a href="{site_url}index.php/admin/persons/delete/{id}">Delete</a></td>
		</tr>
		{/persons}
        </tbody>
		</table>

    </div>
       
    </div>
	</form>	
<?php
$this->load->view('footer-new');
?>