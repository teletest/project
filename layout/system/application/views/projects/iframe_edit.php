<?php
header('HTTP/1.0 200 OK');
header('Content-Type: text/html; Charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
    <title>Expand table rows with jQuery - jExpand plugin - JankoAtWarpSpeed demos</title>
    <style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#ebebeb none repeat-x scroll center left; none repeat-x scroll center left;  border-right: 1px solid #d9d9d9;   border-top: 1px solid #d9d9d9; color:#000; padding:3px 6px; text-align:left;}
        #report td { background:#fff none repeat-x scroll center left; border-right: 1px solid #d9d9d9;   border-top: 1px solid #d9d9d9; color:#000; padding:3px 6px; }
        #report tr.odd td { background:#fff url(row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        #report div.arrow { background:transparent url(/images/arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script>        
</head>


<body> 

<style type="text/css">
.small {
	/*font-weight: bold; */ 
	/*font-size: x-small; */
}
.large{
	font-weight: bold; 
	/*font-size: small; */
}
</style>
<!--<
    <script type="text/javascript">  
          
		   $(document).ready(function(){  
            $('.checkBox').click(function () {	
			 //$(".cells").each( function () {  
			 $('input:checkbox').each( function() {
              if($(this).is(':checked')){
			  $('#idivSlide').slideDown("slow");  
			  }
			  else{
			   $('#divSlide').slideUp("slow");
			  }
			 })
            });
		  });
</script> -->
  

<table  class="filterable"  border="1" cellpadding="1" cellspacing="1" width="100%" id="report">
	  <tr>
		<th class="large">Select</th>
		<th class="large">Cell ID</th>
		<th class="large">BTS Type</th>
		<th class="large">Band </th>
		<th class="large">EIRP</th>
		<th class="large">Azimuth</th>
		<th class="large">Elec Tilt</th>
		<th  class="large" style="white-space:pre-wrap">Height (AGL)</th>
		<th class="large">Mech Tilt</th>
		<th class="large">Antenna Type</th>
		<th class="large">Feeder Length </th>
		<th class="large">Feeder Type </th>
		<th class="large">Longitude</th>
		<th class="large">Latitude</th>
		<th class="large">Phase</th>
		<th class="large">Region</th>
		<th class="large">Type </th>
		<th class="large">Capacity</th>
		<th class="large">Height</th>
		<th class="large">Clutter</th>
		<th class="large">Div</th>
		<th class="large">Dist</th>
		<th class="large">MSC</th>
		<th class="large">BSC</th>
	  </tr>
	{states}
	<tr>
	 <td><img src="{site_url}/images/play.png" height="16" width="16"><input type="checkbox" name="cells[]"  id="cells" value ="{id}" class="checkBox" /></td>
	  <td class="small"> {cell_id}</td>
	  <td class="small"> {bts_type}</td>
	  <td class="small"> {band}</td>
	  <td class="small"> {eirp}</td>
	  <td class="small"  style="text-align:center">{azimuth}</td>
	  <td class="small" style="text-align:center">{electrical_tilt}</td>
	  <td class="small" style="text-align:center"> {height_agl}</td>
	  <td class="small" style="text-align:center"> {mechanical_tilt}</td>
	  <td class="small">{antenna_type}</td>
	  <td class="small" style="text-align:center">{feeder_length}</td>
	  <td class="small">{feeder_type}</td>
	  <td class="small">{longitude}</td>
	  <td class="small">{latitude}</td>
	  <td class="small">{phase}</td>
	  <td class="small">{region}</td>
	  <td class="small" style="text-align:center">{type}</td>
	  <td class="small" style="text-align:center">{capacity}</td>
	  <td class="small" style="text-align:center">{height}</td>
	  <td class="small" style="text-align:center">{clutter}</td>
	  <td class="small">{division}</td>
	  <td class="small"> {district}</td>
	  <td class="small">{msc}</td>
	  <td class="small">{bsc}</td>
	  <!--<td><div class="arrow"></div></td> -->
	</tr>
		<tr >
			<td colspan="25"> 
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
	{/states}
</table>
<script language="JavaScript1.2">
var speed, currentpos=curpos1=0,alt=1,curpos2=-1

function initialize(){
if (window.parent.scrollspeed!=0){
speed=window.parent.scrollspeed
scrollwindow()
}
}

function scrollwindow(){
temp=(document.all)? document.body.scrollTop : window.pageYOffset
alt=(alt==0)? 1 : 0
if (alt==0)
curpos1=temp
else
curpos2=temp

window.scrollBy(0,speed)
}

setInterval("initialize()",10)

</script>


</body>
</htmll> 
