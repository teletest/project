<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/new_project/#add"><span>Project Management</span></a></li>

    </ul>
        <div id="add" class="TabSpec">
			<? $this->load->view('projects/image_menu.php'); ?>

     </div>
  
</div>
<?php $this->load->view('footer-new');?> 
