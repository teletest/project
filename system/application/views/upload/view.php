<?php  $this->load->view('header');  ?>


<div id="main-content">
<?php  $this->load->view('left_menu');  ?>

<div style="float:left;margin-left:20px;">
<h3>Adding File</h3>
<h1>Uploadify Example</h1>
	
	<?php echo form_open_multipart('upload/index');?>
    
    <p>
    	<label for="Filedata">Choose a File</label><br/>
        <?php echo form_upload(array('name' => 'Filedata', 'id' => 'upload'));?>
        <a href="javascript:$('#upload').uploadifyUpload();">Upload File(s)</a>
    </p>
    
    
    <?php echo form_close();?>
    
	<div id="target">
	
	</div>
</div>
</div>


<?php $this->load->view('footer'); ?>