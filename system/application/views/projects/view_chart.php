<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"> 
<title>Gantt Chart</title> 
<script src="{site_url}theme/js/FusionCharts.js" type="text/javascript" charset="utf-8"></script> 
</head> 
<body>
<span style="color:red;"><?php echo $this->session->flashdata('conf_msg'); ?></span>	
   <table cellspacing="0" cellpadding="2" align="center" width="700">
	   <tbody>
			 <tr>
				 <td class="textBold" align="center">{site_id}</td>
			 </tr>
			 <tr>
				 <td><?php echo renderChart( "{site_url}charts/Gantt.swf",  "", "{xml}" , "chart1", 1000, "{height}"); ?></td>
			</tr>
	   </tbody>
   </table>
</body> 
</html>