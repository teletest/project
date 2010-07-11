<?php
$this->load->view('header');
?>
<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/survey_details/#add"><span>Survey Details</span></a></li>
    
    </ul>
    <div id="add" >

	<h3>Survey Detais</h3>
{survey_details}	
	<table cellspacing="2" cellpadding="2" border="0" width="100%">
		
		<tr>
			<td valign="top" heitght="20">Category:
			</td>
			<td>
			 {category}			
			</td>
		</tr>
		<tr>
			<td valign="top" heitght="20">Type:
			</td>
			<td>{type}</td>
	</tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Area : </b> </td>
        <td> {area} </td> 
    </tr>
	
		<tr valign="top" height="20">
			<td align="right"> <b> Latitude : </b> </td>
        <td> {latitude} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Longitude : </b> </td>
        <td> {longitude} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Candidate Distance: </b> </td>
        <td> {candidate_distance}  </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Proposed Antenna Height : </b> </td>
        <td> {proposed_antenna_height} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Antenna Height: </b> </td>
        <td> {antenna_height} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Site Type : </b> </td>
        <td> {site_type} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Clutter Type : </b> </td>
        <td>  {clutter_type} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Building Height : </b> </td>
        <td> {building_height} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Parapet Height: </b> </td>
        <td> {parapet_height} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> RBS Type : </b> </td>
        <td> {rbs_type} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Structure Type : </b> </td>
        <td> {structure_type} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Structure Height : </b> </td>
        <td> {structure_height} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Azimuths : </b> </td>
        <td> {azimuths} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Tilt : </b> </td>
        <td> {tilt} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Feeder Type : </b> </td>
        <td> {feeder_type} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Feeder Length : </b> </td>
        <td> {feeder_length} </td> 
    </tr>
		
		<tr valign="top" height="20">
			<td align="right"> <b> Site Objective : </b> </td>
        <td> {site_objective} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Site Address : </b> </td>
        <td> {site_address}  </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Coverage Area Prediction : </b> </td>
        <td> {coverage_area_prediction} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Coverage Area 1 : </b> </td>
        <td> {coverage_area1} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Coverage Area 2 : </b> </td>
        <td> {coverage_area2} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Coverage Area 3 : </b> </td>
        <td> {coverage_area3}  </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Ranking : </b> </td>
        <td> {ranking} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Remarks : </b> </td>
        <td> {remarks} </td> 
    </tr>
		 <tr valign="top" height="20">
			<td align="right"> <b> Engineer : </b> </td>
        <td> {engineer} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Status : </b> </td>
        <td> {status} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Reason : </b> </td>
        <td> {reason} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Comments : </b> </td>
        <td> {comments} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Summary : </b> </td>
        <td> {summary} </td> 
    </tr>
		<tr valign="top" height="20">
			<td align="right"> <b> Survey On : </b> </td>
        <td> {survey_on} </td> 
    </tr>
			
		
		
	</table>
	{/survey_details}
	</form>

    </div>
</div>
<?php
$this->load->view('footer');
?>
