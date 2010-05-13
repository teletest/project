<?php $this->load->view('header'); ?>


<div style="float:left; width="50px";">
   
   <a href="{site_url}index.php/charts/am_floating" >Floating</a><br>
   <a href="{site_url}index.php/charts/am_col_and_line" >Line and column</a><br>
   <a href="{site_url}index.php/charts/am_pie" >Pie Chart</a><br>
  
   
</div>
<div>	
   <table cellspacing="0" cellpadding="2" align="center" width="700">
	   <tbody>
			 <tr>
				 <td class="textBold" align="center">Charts</td>
			 </tr>
			 <tr>
				 <td><script type="text/javascript" src="{site_url}charts/amcolumn/swfobject.js"></script>
		                 <div id="flashcontent">
			<strong>You need to upgrade your Flash Player</strong>
		</div>
		<script type="text/javascript">
			// <![CDATA[		
			var myChart = new SWFObject("{site_url}charts/amcolumn/{object_type}", "my_id", "{height}", "{width}", "8", "#FFFFFF");
			myChart.addVariable("chart_id", "my_id");
			myChart.addVariable("path", ".{site_url}charts/amcolumn/");
			myChart.addVariable("settings_file", encodeURIComponent("{site_url}charts/amcolumn/{chart_type}/chart_setting.xml"));
			myChart.addVariable("data_file", encodeURIComponent( "{site_url}charts/amcolumn/{chart_type}/chart_data.xml"));
			myChart.addVariable("preloader_color", "#999999");
			myChart.write("flashcontent");
			// ]]>
		</script>
</td>
			</tr>
	   </tbody>
   </table>
  </div>   


<?php $this->load->view('footer'); ?>
