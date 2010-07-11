<?php
//header('HTTP/1.0 200 OK');
//header('Content-Type: text/html; Charset=UTF-8');
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>

<h2>Site Details</h2>
<form  action='../site_update' method='post'>-->
<!--{sites_details}
<input type="hidden" name="id" size="20" value="{id}">
<input type="hidden" name="project_id" size="20" value="{project_id}">
<table cellspacing="2" cellpadding="2" border="0" width="100%">
    <tr valign="top" height="20">
        <td> <b> Name : </b> <br />
        <input type="text" name="name" size="20" value="{name}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Division: </b> <br />
        <input type="text" name="division" size="20" value="{division}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> District: </b> <br />
        <input type="text" name="district" size="20" value="{district}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> msc: </b> <br />
        <input type="text" name="msc" size="20" value="{msc}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> bsc: </b> <br />
        <input type="text" name="bsc" size="20" value="{bsc}">  </td> 
    </tr>
    <tr valign="top" height="20">
        <td> <b> Owner Details : </b> <br />
        <textarea name="owner_details" wrap="VIRTUAL" cols="50" rows="6">{owner_details}</textarea> </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Address : </b> <br />
        <textarea name="address" wrap="VIRTUAL" cols="50" rows="6">{address}</textarea> </td> 
    </tr>
    
    <tr valign="top" height="20">
        <td> <b> Nominal Latitude : </b> </br>
        <input type="text" name="nominal_latitude" size="20" value="{nominal_latitude}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Nominal Longitude : </b> </br>
        <input type="text" name="nominal_longitude" size="20" value="{nominal_longitude}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Cell ID : </b> </br>
        <input type="text" name="cell_id" size="20" value="{cell_id}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> EIRP : </b> </br>
        <input type="text" name="eirp" size="20" value="{eirp}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> ERP : </b> </br>
        <input type="text" name="erp" size="20" value="{erp}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Antenna Type : </b> </br>
        <input type="text" name="antenna_type" size="20" value="{antenna_type}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Electric Tilt : </b> </br>
        <input type="text" name="electric_tilt" size="20" value="{electric_tilt}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Mechanical Tilt : </b> </br>
        <input type="text" name="mechanical_tilt" size="20" value="{mechanical_tilt}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Azimuths : </b> </br>
        <input type="text" name="azimuths" size="20" value="{azimuths}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Phase : </b> </br>
        <input type="text" name="phase" size="20" value="{phase}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Region : </b> </br>
        <input type="text" name="region" size="20" value="{region}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Site Type : </b> </br>
        <input type="text" name="phase" size="20" value="{site_type}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Capacity : </b> </br>
        <input type="text" name="capacity" size="20" value="{capacity}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Height : </b> </br>
        <input type="text" name="height" size="20" value="{height}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Clutter Type : </b> </br>
        <input type="text" name="clutter_type" size="20" value="{clutter_type}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Status : </b> </br>
        <input type="text" name="status" size="20" value="{status}">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Objectives : </b> <br />
        <textarea name="objectives" wrap="VIRTUAL" cols="50" rows="6">{objectives}</textarea> </td> 
    </tr>
	<tr valign="top" height="20">
        <td> <b> Analysis : </b> <br />
        <textarea name="analysis" wrap="VIRTUAL" cols="50" rows="6" >{analysis}</textarea> </td> 
    </tr>
</table>
{/sites_details}
<input type="submit" name="submit" value="Update" /> -->
<!--
</form> -->
<?php
$this->load->view('header');
?>
<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/site_details/#add"><span>Site Details</span></a></li>
    
    </ul>
    <div id="add" >
	<h1>Site Details</h1>
	
	
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

  </div>
</div>

<?php
$this->load->view('footer');
?>

