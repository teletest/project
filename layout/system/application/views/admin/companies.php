<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:hidden;">
    <ul>
    <li><a href="#Tab1"><span>Companies Management</span></a></li>
    </ul>
        <div id="Tab1" class="TabSpec" >
        {admin_menu}
        <br />

        
        <?php echo anchor('admin/companies/add',	'Add a company'); ?>
        
      		<table border="0" cellpadding="0" cellspacing="1" class="ewTable" width="100%">
		<tr class="ewTableHeader"><td align="left"><strong>Company Name</strong></td>
		<td align="left"><strong>Company Address</strong></td>
		<td align="left"><strong>Is Active?</strong></td>
		<td align="left"><strong>Actions</strong></td>
		</tr>
        <tbody id="companies">
		{companies}		
		<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);"><td align="left">{name}</td>
		<td align="left"><pre>{address}</pre></td><td align="left">{isactive}</td>
		<td align="left"><?php echo anchor('admin/companies/edit/{id}','Edit'); ?> <a href="companies/profile/{id}" rel="lyteframe" >Profile</a> <a href="companies/note/{id}" rel="lyteframe" >Note</a></td>
		</tr>
		{/companies}
        </tbody>
	  </table>

  </div>
       
    </div>

<?php
$this->load->view('footer-new');
?>