<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>



	<form action="" method="post">
	

		
		

<div id="ShowTab" style="width:96%;overflow:hidden;">
    <ul>
    <li><a href="#Tab1"><span>Group Management</span></a></li>
    </ul>
        <div id="Tab1" class="TabSpec" >
        {admin_menu}
        <br />
        <?php echo anchor('admin/groups/add',	'Add a group'); ?><br />
		<table border="0" cellpadding="0" cellspacing="1" class="ewTable" width="100%">
        
		<tr class="ewTableHeader">
        <td align="left"><strong>Group Id</strong></td>
		<td align="left"><strong>Group Name</strong></td>
		<td align="left"><strong>Is Active?</strong></td>
		<td align="left"><strong>Actions</strong></td>
		</tr>
        <tbody id="groups">
		{groups}		
		<tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
        <td align="left">{id}</td>
		<td align="left">{name}</td>
		<td align="left">{isactive}</td>
		<td align="left"><?php echo anchor('admin/groups/edit/{id}','Edit'); ?></td>
		</tr>
		{/groups}
        </tbody>
		</table>

    </div>
       
    </div>

	</form>


<?php
$this->load->view('footer-new');
?>