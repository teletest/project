<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>
    
<div id="ShowTab" style="width:96%;overflow:auto;">
<!-- <div id="ShowTab" style="width:46%; overflow:scroll;" > -->
	<ul>
		<li><a href="{site_url}index.php/projects/get_counted_sites/#add"><span>Nominal Plan</span></a></li>
	</ul>
    <div id="add"  class="TabSpec" >

	
			 <table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
				
						<tr class="ewTableHeader">
						  <td style="white-space: pre;">Cell ID</td>
						  <td style="white-space: pre;">Site ID</td>
						  <td style="white-space: pre;">BTS Type</td>
						  <td>Band</td>
						  <td >EIRP</td>
						  <td >Azimuth</td>
						  <td style="white-space: pre;">Elec Tilt</td>
						  <td style="white-space: pre;">Height (AGL)</td>
						  <td style="white-space: pre;">Mech Tilt</td>
						  <td style="white-space: pre;">Antenna Type</td>
						  <td style="white-space: pre;">Feeder Length </td>
						  <td style="white-space: pre;">Feeder Type </td>
						  <td >Longitude</td>
						  <td >Latitude</td>
						  <td >Phase</td>
						  <td >Region</td>
						  <td >Type </td>
						  <td >Capacity</td>
						  <td >Height</td>
						  <td >Clutter</td>
						  <td >Div</td>
						  <td >Dist</td>
						  <td >MSC</td>
						  <td >BSC</td> 
						</tr>
		
					  <tbody id="thetable">
					    <tr>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td >&nbsp; </td>
						  <td >&nbsp;  </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp;  </td>
						  <td >&nbsp;  </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td> 
						</tr>
						{sites}
						<tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
						  <td style="white-space: pre; text-align:center;"> {cell_id}</td>
						  <td style="white-space: pre; text-align:center;"> {site_id}</td>
						  <td style="white-space: pre; text-align:center;"> {bts_type}</td>
						  <td style="text-align:center"> {band}</td>
						  <td style="text-align:center"> {eirp}</td>
						  <td style="text-align:center">{azimuth}</td>
						  <td style="text-align:center">{electrical_tilt}</td>
						  <td style="text-align:center"> {height_agl}</td>
						  <td style="text-align:center"> {mechanical_tilt}</td>
						  <td style="text-align:center">{antenna_type}</td>
						  <td style="text-align:center">{feeder_length}</td>
						  <td style="text-align:center">{feeder_type}</td>
						  <td style="text-align:center">{longitude}</td>
						  <td style="text-align:center">{latitude}</td>
						  <td style="text-align:center">{phase}</td>
						  <td style="text-align:center">{region}</td>
						  <td style="text-align:center">{type}</td>
						  <td style="text-align:center">{capacity}</td>
						  <td style="text-align:center">{height}</td>
						  <td style="text-align:center; white-space: pre;">{clutter}</td>
						  <td style="white-space: pre;">{division}</td>
						  <td style="white-space: pre;"> {district}</td>
						  <td style="white-space: pre;">{msc}</td>
						  <td style="white-space: pre;">{bsc}</td>
						</tr>
						{/sites}
					  </tbody>
			 </table> 

    </div>
</div>
<?php $this->load->view('footer-new');?> 

