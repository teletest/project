<?php
$this->load->view('header');
?>
<script type="text/javascript">  
   $(document).ready(function(){  
	/*$('.checkBox1').click(function () {
	 $(".checkBox1").each( function () {  
	  if($(this).is(':checked')){
	  $('#input1ID').slideDown("slow");  
	  }
	  else{
	   $('#input1ID').slideUp("slow");
	  }
	 })
	});*/
  });
</script>

<div id="main-content">
<h1>Nominal Plan</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>
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

<?php
$this->load->view('footer');
?>

