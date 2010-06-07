<?php
$this->load->view('header');
?>

<div id="main-content">


<h1>Surveys </h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">


<h3>Surveys made on Site</h3>
	
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	
	<tr>
	  <td align="center" bgcolor="#e8e8d0"><strong>Surveys Made By</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Type</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Details</strong></p></td>           
	</tr>

	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
{surveys}
	<tr>
	  <td>{code}</td>
	  <td>{type}</td>
	  <td><a href='../survey_details/{id}' rel="lyteframe" >Details</a> </td>
	</tr>

{/surveys}    
    
</table>






</div>



</div>

<?php
$this->load->view('footer');
?>

