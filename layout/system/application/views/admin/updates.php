<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

<br /><br />	
		
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tr><th colspan="2"><h3>Change Targets</h3></th></tr>
<tr><td><input type="button" name="v_result" value="Set BSC Target" OnClick="javascript:popUp('admin_changetarget.php?area=bsc','800','400')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result" value="Set CELL Target" OnClick="javascript:popUp('admin_changetarget.php?area=cell','800','400')" /></td><td>&nbsp;</td></tr>
</table>

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tr><th colspan="2"><h3>Users info</h3></th></tr>
<tr><td><input type="button" name="v_result" value="Add New User" OnClick="javascript:popUp('admin_addnewuser.php','450','400')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result" value="Edit User Privilege" OnClick="javascript:popUp('admin_edituserpriv.php','700','800')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result" value="Change Level Privilege" OnClick="javascript:popUp('admin_changelevelpriv.php','600','800')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result" value="View all feedback" OnClick="javascript:popUp('admin_viewfeedback.php','450','400')" /></td><td>&nbsp;</td></tr>
</table>

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tr><th colspan="2"><h3>Daily Update</h3></th></tr>
<tr><td><input type="button" name="v_result"  value="Update Cell Data" OnClick="javascript:popUp('admin_appendrawdata_cell.php?cat=daily')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update BSC Data" OnClick="javascript:popUp('admin_appendrawdata_bsc.php?cat=daily')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update Counter Data" OnClick="javascript:popUp('admin_appendrawdata_counter.php?cat=daily')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update Network" OnClick="javascript:popUp('admin_analysis_update_network.php?cat=daily')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Calculate BSC TRAFFIC" OnClick="javascript:popUp('admin_kpi_input_bsc_traffic.php?cat=daily')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Calculate BSC SQI" OnClick="javascript:popUp('admin_kpi_input_bsc_sqi.php?cat=daily')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Calculate CELL SQI" OnClick="javascript:popUp('admin_kpi_input_cell_sqi.php?cat=daily')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update Worse Cell" OnClick="javascript:popUp('admin_worsecell_daily.php')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="BSC Data (hourly)" OnClick="javascript:popUp('admin_appendrawdata_bsc.php?cat=hourly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="CELL Data (hourly)" OnClick="javascript:popUp('admin_appendrawdata_cell.php?cat=hourly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Calculate BH Data" OnClick="javascript:popUp('admin_network_bh.php')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="TCO Trial" OnClick="javascript:popUp('admin_analysis_counter_summerized_tco.php')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Daily BH Cluster" OnClick="javascript:popUp('admin_update_daily_bh_cluster.php')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="VIP Site Performance" OnClick="javascript:popUp('admin_update_daily_bh_vip.php')" /></td><td>&nbsp;</td></tr>
</table>

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tr><th colspan="2"><h3>Weekly Update</h3></th></tr>            
<tr><td><input type="button" name="v_result"  value="Update Cell Data" OnClick="javascript:popUp('admin_appendrawdata_cell.php?cat=weekly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update BSC Data" OnClick="javascript:popUp('admin_appendrawdata_bsc.php?cat=weekly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update Paging Data" OnClick="javascript:popUp('admin_appendrawdata_paging.php')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update Network" OnClick="javascript:popUp('admin_analysis_update_network.php?cat=weekly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Calculate BSC TRAFFIC" OnClick="javascript:popUp('admin_kpi_input_bsc_traffic.php?cat=weekly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Calculate BSC SQI" OnClick="javascript:popUp('admin_kpi_input_bsc_sqi.php?cat=weekly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Calculate CELL SQI" OnClick="javascript:popUp('admin_kpi_input_cell_sqi.php?cat=weekly')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Update Cluster" OnClick="javascript:popUp('admin_analysis_counter_summerized.php')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Weekly BH Cell" OnClick="javascript:popUp('admin_update_weely_bh.php')" /></td><td>&nbsp;</td></tr>
<tr><td><input type="button" name="v_result"  value="Weekly BH Cluster" OnClick="javascript:popUp('admin_update_weekly_bh_cluster.php')" /></td><td>&nbsp;</td></tr>
</table>


</div>

<script language="JavaScript">
<!-- Begin
function popUp(URL,w,h) {
	w=600;
	h=400;

	day = new Date();
	id = day.getTime();
    URL = '{site_url}' + URL;
      
	eval("page" + id + " = window.open( URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width='+w+',height='+h+',left = 20,top = 20');");
}
// End -->
</script>

<?php
$this->load->view('footer');
?>