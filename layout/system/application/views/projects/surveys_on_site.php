<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/surveys_on_site/#add"><span>Surveys On Site</span></a></li>
    
    </ul>
    <div id="add" >

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

