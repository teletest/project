
<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Site Details</h1>

<div style="float:left">
<? // $this->load->view('projects/image_menu.php'); ?>
</div>

<div style="float:left;margin-left:20px;">

<?php
//$this->load->view('projects/site_search_form');
?>
<br />

<table class="table" cellspacing="2" cellpadding="2" border="0" width="100%">
{sites_details}
  <tbody>
	<tr>
	 <th colspan="4" align="center">Site Details</th>
	</tr>
	<tr>
	  <td colspan="4">&nbsp;</td>
	</tr>
	<tr valign="top" height="20">
        <td colspan="4"> <b> Name : </b> {name}  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Division: </b> {division} </td> 
        <td> <b> District: </b> {district} </td> 
        <td> <b> msc: </b> {msc} </td> 
        <td> <b> bsc: </b> {bsc} </td> 
    </tr>
    <tr valign="top" height="20">
        <td colspan="4"> <b> Owner Details : </b> {owner_details} </td> 
    </tr>
	<tr valign="top" height="20">
        <td colspan="4"> <b> Address : </b> {address} </td> 
    </tr>
    
    <tr valign="top" height="20">
        <td> <b> Nominal Latitude : </b>{nominal_latitude} </td> 
        <td> <b> Nominal Longitude : </b>{nominal_longitude} </td> 
        <td> <b> Cell ID : </b> {cell_id} </td> 
        <td> <b> EIRP : </b> {eirp} </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> ERP : </b> {erp}  </td> 
        <td> <b> Antenna Type : </b> {antenna_type} </td> 
        <td> <b> Electric Tilt : </b> {electric_tilt}  </td> 
        <td> <b> Mechanical Tilt : </b> {mechanical_tilt} </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Azimuths : </b> {azimuths}  </td> 
        <td> <b> Phase : </b> {phase} </td> 
        <td> <b> Region : </b> {region} </td> 
        <td> <b> Site Type : </b> {site_type}  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Capacity : </b> {capacity}  </td> 
        <td> <b> Height : </b> {height} </td> 
        <td> <b> Clutter Type : </b>{clutter_type} </td> 
        <td> <b> Status : </b> {status}  </td> 
    </tr>
	<tr valign="top" height="20">
        <td colspan="4"> <b> Objectives : </b> {objectives} </td> 
    </tr>
	<tr valign="top" height="20">
        <td colspan="4"> <b> Analysis : </b> {analysis} </td> 
    </tr>
  </tbody>
{/sites_details}
</table>
<table>

  <tr>
	 <th colspan="2" align="center">Site Candidates</th>
  </tr>
  {candidates}
  <tr>
     <td>{code}</td>
	 <td><a href="{site_url}index.php/projects/view_candidate/{site_id}/{id}">view candidate</a></td>
  </tr>
 {/candidates}
 <tr>
    <td colspan="2">&nbsp;</td>
 </tr>
</table>

</div>

</div>

<?php
$this->load->view('footer');
?>

