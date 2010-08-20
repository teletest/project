<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/edit_options/#add"><span>Edit Options</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec" >
        <h1>Edit Plan</h1>

		<br>
		<span style="color:red;"><?php echo validation_errors();?></span>
		<br>

		<div class="dhtmlgoodies_question">Apply changes to whole Nominal Plan</div>
				<div class="dhtmlgoodies_answer">
				   <div><?php $this->load->view("projects/edit_whole"); ?></div>
				</div>
		<br>
		<div class="dhtmlgoodies_question">Apply changes to filtered list</div>
				<div class="dhtmlgoodies_answer">
				   <div><?php $this->load->view("projects/edit_filtered"); ?></div>
				</div>
		<br>
		<div class="dhtmlgoodies_question">Apply cell based changes</div>
				<div class="dhtmlgoodies_answer">
					<div style="float:left;"> <?php  $this->load->view("projects/edit_cell"); ?></div> 
				</div>
		<br>
   
    </div>
</div>

<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>

