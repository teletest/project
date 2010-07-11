<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/nominal_plans/#add"><span>Planning Documents</span></a></li>
    
    </ul>
    <div id="add" >
	<h1>Planing Documents</h1>
	
	
	<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<tr>
		  <td align="center" bgcolor="#e8e8d0"><strong>Filename</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Attached on</strong></p></td>     
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Actions</strong></p></td>            
		</tr>
	
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		
	{attachements}
		<tr>
		  <td>{filename}</td>
		  <td>{attached_on}</td>
		 <!-- <td><a href='attachement_view/{id}' rel="lyteframe">View</a> | <a href='attachement_Print/{id}' rel="lyteframe">Print</a></td>-->
		 <td><a href='{site_url}uploads/{project_id}_{filename}' rel="lyteframe">View</a> </td>
		
		</tr>
	{/attachements}                  
					  
	</table>
	{pagination}
				<table align="center" border="0" cellpadding="1" cellspacing="2" width="98%">
				  <tr>
					<td class="headings">Google Map View of Site</td>
				  </tr>
				  <tr>
					<td align="center"><img src="{site_url}images/site_map.jpg" height="420" width="534"></td>
				  </tr>
				  <tr><td><a href='{site_url}index.php/projects/view_googlemap' target="_blank">View Google Map</a> </td></tr>
				</tbody></table>
	
    </div>
</div>
<?php
$this->load->view('footer');
?>
