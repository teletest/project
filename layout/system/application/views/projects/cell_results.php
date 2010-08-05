<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/cell_results/#add"><span>Cell Results</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec" >

	<table class="filterable" border="0" cellpadding="1" cellspacing="2" width="100%" id="report">
		<tr>
		  <th align="center" ><strong>ID</strong></th>
		  <th align="center" ><strong>Cell ID</strong></th>
		  <th align="center" ><p><strong>Site ID</strong></p></th> 
		  <th align="center" >&nbsp;</th>            
		</tr>
	<!--
		{if_not_found}
		<tr>
		<td colspan="4"> Your search did not return any results. </td>
		</tr>
		{/if_not_found} -->
		{if_found}
		{cells}
		<tr>
		  <td>{id}</td>
		  <td>{cell_id}</td>
		  <td><a href='projects/projects_details/{id}' rel="lyteframe" >{site_id}</a></td>
		  <td><div class="arrow"></div></td>    
		</tr>
			<tr >
				<td colspan="4"> 
				 <div style=" width:900px; " >  
				  <form name="editplan2" action="{site_url}index.php/projects/plan_edited/3" method="post"  >
				  <input type="hidden" name="login_id" value="<?php echo $this->session->userdata('username'); ?>" />
				  <input type="hidden" name="id" value="{id}" />
				  <input type="hidden" name="nominal_plan_id" value="{nominal_plan_id}" /> 
				  <input type="hidden" name="site_id" value="{site_id}" />
				  <input type="hidden" name="cell_id" value="{cell_id}" />
				  <input type="hidden" name="sector" value="{sector}" />
				  <input type="hidden" name="time" size="20" value="<?php echo date("h:i:s"); ?>" />
				  <input type="hidden" name="date" size="20" value="<?php echo date('Y-m-d'); ?>"/>	
						<div style="float:left"><input type="checkbox" name="fields[]"  id="fieldss" value ="{id}" class="checkBox" checked /></div>
						<div style="float:left">Cell ID: {cell_id}Name</div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">BTS TYPE :</div>
						<div style="float:left; width:200px;"><input class="text" name="bts_type" value="{bts_type}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Band :</div>
						<div style="float:left; width:200px;"><input class="text" name="band" value="{band}" /></div> 
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">EIRP :</div>
						<div style="float:left; width:200px;"><input class="text" name="eirp" id="eirp" value="{eirp}" /></div>
						<div style="float:left; width:20px;"></div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">Azimuth</div>
						<div style="float:left; width:200px;"><input class="text" name="azimuth" value="{azimuth}" /></div> 
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Electrical Tilt</div>
						<div style="float:left; width:200px;"><input class="text" name="electrical_tilt" value="{electrical_tilt}" /></div>
						<div style="float:left; width:20px;"></div> 
						<div style="float:left; width:80px;">Height (AGL)</div>
						<div style="float:left; width:200px;"><input class="text" name="height_agl" value="{height_agl}" /></div>
						<div style="float:left; width:20px;"></div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">Mechanical Tilt</div>
						<div style="float:left; width:200px;"><input class="text" name="mechanical_tilt" value="{mechanical_tilt}" /></div>
						<div style="float:left; width:20px;"></div> 
						<div style="float:left; width:80px;">Antenna Type</div>
						<div style="float:left; width:200px;"><input class="text" name="antenna_type" value="{antenna_type}" /></div>
						<div style="float:left; width:20px;"></div> 
						<div style="float:left; width:80px;">Feeder Lenght</div>
						<div style="float:left; width:200px;"><input class="text" name="feeder_length" value="{feeder_length}" /></div>
						<div style="float:left; width:20px;"></div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">Feeder Type</div>
						<div style="float:left; width:200px;"><input class="text" name="feeder_type" value="{feeder_type}" /></div> 
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Longitude</div>
						<div style="float:left; width:200px;"><input class="text" name="longitude" value="{longitude}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Latitude</div>
						<div style="float:left; width:200px;"><input class="text" name="latitude" value="{latitude}" /></div> 
						<div style="float:left; width:20px;"></div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">Phase</div>
						<div style="float:left; width:200px;"><input class="text" name="phase" value="{phase}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Region</div>
						<div style="float:left; width:200px;"><input class="text" name="region" value="{region}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Type</div>
						<div style="float:left; width:200px;"><input class="text" name="type" value="{type}" /></div>
						<div style="float:left; width:20px;"></div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">Capacity</div>
						<div style="float:left; width:200px;"><input class="text" name="capacity" value="{capacity}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Height</div>
						<div style="float:left; width:200px;"><input class="text" name="height" value="{height}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">Clutter</div>
						<div style="float:left; width:200px;"><input class="text" name="clutter" value="{clutter}" /></div>
						<div style="float:left; width:20px;"></div> 
						<br>
						
						<br>
						<div style="float:left; width:80px;">Division</div>
						<div style="float:left; width:200px;"><input class="text" name="division" value="{division}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">District</div>
						<div style="float:left; width:200px;"><input class="text" name="district" value="{district}" /></div>
						<div style="float:left; width:20px;"></div>
						<div style="float:left; width:80px;">MSC</div>
						<div style="float:left; width:200px;"><input class="text" name="msc" value="{msc}" /></div>
						<div style="float:left; width:20px;"></div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">BSC</div>
						<div style="float:left; width:200px;"><input class="text" name="bsc" value="{bsc}" /> </div>
						<div style="float:left; width:20px;"></div>
						<br>
						
						<br>
						<div style="float:left; width:80px;">* Commit:<?php // echo $this->validation->commit_error; ?></div>
						<div style="float:left; width:400px; height:110px;">
						<span style="color:red;"><?php echo form_error('commit'); ?></span>
						<textarea class="text"  cols="48" name="commit" style="height: 100px;" value="<?php  echo set_value('commit'); ?>" > </textarea><br />
						</div>
						<div style="float:left; width:20px;"></div>
						</div>
						<br>
						
						<div style="float:left; width:80px;"></div>
						<div style=" width:100px;"><input value="Commit"  class="confirmClick" title="change these fields" type="button" onclick="this.form.submit();" /></div>
						<br>
					</form>
				  </div>	
				</td> 
			 </tr> 
		{/cells} 
	   {/if_found}                                  
	</table>
	<br>
	<br>
    </div>
</div>

<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
