<?php
$this->load->view('header');
?>

<div class="art-contentLayout"> 

<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>
<div style="float:left;margin-left:20px;">


<h3>Add a Survey to {sname}</h3>
<form action='{site_url}index.php/projects/survey_added' method='post'>
	
<table cellspacing="2" cellpadding="2" border="0" width="100%">

    <input type="hidden" value="{sid}" name="sid" />
    <input type="hidden" value="{cid}" name="cid" />
	<input type="hidden" value="{pid}" name="pid" />
	<input type="hidden" value="{sname}" name="sname" />
	
	<tr>
		<td valign="top" heitght="20"  ><b>Category:</b></td>
		<td >
		<select xml:lang="en" dir="ltr" name="category" id="category">
				<option value="rnd" selected="selected">RND </option>
				<option value="transmission">Transmission</option>
			</select>
		</td>
	</tr>
	<tr>
		<td valign="top" heitght="20"><b>Type: </b>	</td>
		<td>
		<select xml:lang="en" dir="ltr" name="type" id="types">
				<option value="scoping" selected="selected">Scoping </option>
				<option value="intermediate">Intermediate</option>
				<option value="rss">PSS</option>
			</select>
		</td>
	</tr>
    <tr valign="top" height="20">
        <td align="right"> <b> Area : </b> </td>
        <td> <input type="text" name="area" size="25" value="">  </td> 
    </tr>

    <tr valign="top" height="20">
        <td align="right"> <b> Latitude : </b> </td>
        <td> <input type="text" name="latitude" size="20" >  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Longitude : </b> </td>
        <td> <input type="text" name="longitude" size="20" >  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Candidate Distance: </b> </td>
        <td> <input type="text" name="candidate_distance" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Proposed Antenna Height : </b> </td>
        <td> <input type="text" name="proposed_antenna_height" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Antenna Height: </b> </td>
        <td> <input type="text" name="antenna_height" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Site Type : </b> </td>
        <td> <input type="text" name="site_type" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Clutter Type : </b> </td>
        <td> <input type="text" name="clutter_type" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Building Height : </b> </td>
        <td> <input type="text" name="building_height" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Parapet Height: </b> </td>
        <td> <input type="text" name="parapet_height" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> RBS Type : </b> </td>
        <td> <input type="text" name="rbs_type" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Structure Type : </b> </td>
        <td> <input type="text" name="structure_type" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Structure Height : </b> </td>
        <td> <input type="text" name="structure_height" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Azimuths : </b> </td>
        <td> <input type="text" name="azimuths" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Tilt : </b> </td>
        <td> <input type="text" name="tilt" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Feeder Type : </b> </td>
        <td> <input type="text" name="feeder_type" size="25" value="">  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Feeder Length : </b> </td>
        <td> <input type="text" name="feeder_length" size="25" value="">  </td> 
    </tr>
    
    <tr valign="top" height="20">
        <td align="right"> <b> Site Objective : </b> </td>
        <td> <textarea name="site_objective" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Site Address : </b> </td>
        <td> <textarea name="site_address" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Coverage Area Prediction : </b> </td>
        <td> <textarea name="coverage_area_prediction" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Coverage Area 1 : </b> </td>
        <td> <textarea name="coverage_area1" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Coverage Area 2 : </b> </td>
        <td> <textarea name="coverage_area2" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Coverage Area 3 : </b> </td>
        <td> <textarea name="coverage_area3" cols="60" rows="6"></textarea>  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Ranking : </b> </td>
        <td> <input type="text" name="ranking" size="25" value="">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Remarks : </b> </td>
        <td> <textarea name="remarks" cols="60" rows="6"></textarea>  </td> 
    </tr>
	 <tr valign="top" height="20">
        <td align="right"> <b> Engineer : </b> </td>
        <td> <input type="text" name="engineer" size="25" value="">  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Status : </b> </td>
        <td> <textarea name="status" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Reason : </b> </td>
        <td> <textarea name="reason" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Comments : </b> </td>
        <td> <textarea name="comments" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Summary : </b> </td>
        <td> <textarea name="summary" cols="60" rows="6"></textarea>  </td> 
    </tr>
	<tr valign="top" height="20">
        <td align="right"> <b> Survey On : </b> </td>
        <td> <input type="text" name="survey_on" size="20" value="<?php echo date('Y-m-d'); ?>">  </td> 
    </tr>
        
    <tr valign="top" height="20">
        <td align="right">&nbsp;</td>
        <td>
        	<input type="submit" name="submit" value="Submit" onclick="this.form.submit();" />
        </td> 
    </tr>
    
    
</table>
</form>


</div>
<?php
$this->load->view('footer');
?>
