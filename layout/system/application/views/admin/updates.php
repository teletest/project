<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>



<div id="ShowTab" style="width:96%;overflow:hidden;">
    <ul>
    <li><a href="#Tab1"><span>Change Targets</span></a></li>
    <li><a href="#Tab2"><span>Users info</span></a></li>    
    <li><a href="#Tab3"><span>Daily Update</span></a></li>    
    <li><a href="#Tab4"><span>Weekly Update</span></a></li>    
    </ul>
        <div id="Tab1" class="TabSpec">
        {admin_menu}
<table class="std" border="0" cellpadding="0" >
<tr><th colspan="2"><h3>Change Targets</h3></th></tr>
<tr><td width="59%" align="right"><input type="button" name="v_result" value="Set BSC Target" OnClick="javascript:popUp('admin_changetarget.php?area=bsc','800','400')" style="width:150px;" /></td><td width="41%">&nbsp;</td>
</tr>
<tr><td align="right"><input type="button" name="v_result" value="Set CELL Target" OnClick="javascript:popUp('admin_changetarget.php?area=cell','800','400')" style="width:150px;" /></td><td>&nbsp;</td></tr>
</table>
        </div>
        
        <div id="Tab2" class="TabSpec">
        {admin_menu}
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tr><th colspan="2"><h3>Users info</h3></th></tr>
<tr><td width="59%" align="right"><input type="button" name="v_result" value="Add New User" OnClick="javascript:popUp('admin_addnewuser.php','450','400')"  style="width:150px;"/></td><td width="41%">&nbsp;</td>
</tr>
<tr><td align="right"><input type="button" name="v_result" value="Edit User Privilege" OnClick="javascript:popUp('admin_edituserpriv.php','700','800')" style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result" value="Change Level Privilege" OnClick="javascript:popUp('admin_changelevelpriv.php','600','800')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result" value="View all feedback" OnClick="javascript:popUp('admin_viewfeedback.php','450','400')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
</table>
        </div>        
        <div id="Tab3" class="TabSpec">
        {admin_menu}

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tr><th colspan="2"><h3>Daily Update</h3></th></tr>
<tr><td width="59%" align="right"><input type="button" name="v_result"  value="Update Cell Data" OnClick="javascript:popUp('admin_appendrawdata_cell.php?cat=daily')"  style="width:150px;"/></td><td width="41%">&nbsp;</td>
</tr>
<tr><td align="right"><input type="button" name="v_result"  value="Update BSC Data" OnClick="javascript:popUp('admin_appendrawdata_bsc.php?cat=daily')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Update Counter Data" OnClick="javascript:popUp('admin_appendrawdata_counter.php?cat=daily')" style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Update Network" OnClick="javascript:popUp('admin_analysis_update_network.php?cat=daily')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Calculate BSC TRAFFIC" OnClick="javascript:popUp('admin_kpi_input_bsc_traffic.php?cat=daily')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Calculate BSC SQI" OnClick="javascript:popUp('admin_kpi_input_bsc_sqi.php?cat=daily')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Calculate CELL SQI" OnClick="javascript:popUp('admin_kpi_input_cell_sqi.php?cat=daily')" style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Update Worse Cell" OnClick="javascript:popUp('admin_worsecell_daily.php')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="BSC Data (hourly)" OnClick="javascript:popUp('admin_appendrawdata_bsc.php?cat=hourly')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="CELL Data (hourly)" OnClick="javascript:popUp('admin_appendrawdata_cell.php?cat=hourly')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Calculate BH Data" OnClick="javascript:popUp('admin_network_bh.php')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="TCO Trial" OnClick="javascript:popUp('admin_analysis_counter_summerized_tco.php')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Daily BH Cluster" OnClick="javascript:popUp('admin_update_daily_bh_cluster.php')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="VIP Site Performance" OnClick="javascript:popUp('admin_update_daily_bh_vip.php')"  style="width:150px;" /></td><td>&nbsp;</td></tr>
</table>
        </div>        
        
  <div id="Tab4" class="TabSpec">
        {admin_menu}
<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tr><th colspan="2"><h3>Weekly Update</h3></th></tr>            
<tr><td width="59%" align="right"><input type="button" name="v_result"  value="Update Cell Data" OnClick="javascript:popUp('admin_appendrawdata_cell.php?cat=weekly')"  style="width:150px;" /></td><td width="41%">&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Update BSC Data" OnClick="javascript:popUp('admin_appendrawdata_bsc.php?cat=weekly')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result2"  value="Update Paging Data" onclick="javascript:popUp('admin_appendrawdata_paging.php')" style="width:150px;" /></td>
<td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Update Network" OnClick="javascript:popUp('admin_analysis_update_network.php?cat=weekly')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Calculate BSC TRAFFIC" OnClick="javascript:popUp('admin_kpi_input_bsc_traffic.php?cat=weekly')"  style="width:150px;"/></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Calculate BSC SQI" OnClick="javascript:popUp('admin_kpi_input_bsc_sqi.php?cat=weekly')" style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Calculate CELL SQI" OnClick="javascript:popUp('admin_kpi_input_cell_sqi.php?cat=weekly')" style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Update Cluster" OnClick="javascript:popUp('admin_analysis_counter_summerized.php')" style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Weekly BH Cell" OnClick="javascript:popUp('admin_update_weely_bh.php')" style="width:150px;" /></td><td>&nbsp;</td></tr>
<tr><td align="right"><input type="button" name="v_result"  value="Weekly BH Cluster" OnClick="javascript:popUp('admin_update_weekly_bh_cluster.php')" style="width:150px;" /></td><td>&nbsp;</td></tr>
</table>
  </div>        
        
        
       
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
$this->load->view('footer-new');
?>