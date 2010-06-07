<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Project Management</h1>

<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>

<div style="float:left;margin-left:20px;">
<?php
$this->load->view('projects/search_form');
?>

<h2>Open projects</h2>
<script>
isc.Page.setEvent('load',function(){
    isc.VLayout.create({
        autoDraw: true,
        width:  "100%",
        height: "100%",
        layoutMargin: 10,

        members: 
        [
            isc.Calendar.create({top: 0, left: 0})		 
        ]
    });
});


if (window.isc && isc.version.startsWith('7.0rc2')) {
    if (isc.ListGrid) {
        isc.ListGrid.addMethods({
            getRowWAIState : function (rowNum) {
                var record = this.getRecord(rowNum);
                if (this.selection && this.selection.isSelected && this.selection.isSelected(rowNum)) {
                    return {selected : true };
                }
            }
        });
    }
} else if (window.isc) {
    isc.Log.logWarn("Patch for SmartClient 7.0 Release Candidate 2 included in this application. " +
            "You are currently running SmartClient verion '"+ isc.version + 
            "'. This patch is not compatible with this build and will have no effect. " +
            "It should be removed from your application source.");
}

</script>

<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	<tr>
	  <td align="center" bgcolor="#e8e8d0" ><strong>Code</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Created on</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Planned on</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>Start Date</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>End Date</strong></p></td>                    
	  <!--<td align="center" bgcolor="#e8e8d0"><p><strong>Activated on</strong></p></td> -->
	  <td align="center" bgcolor="#e8e8d0"><p><strong>View Progress</strong></p></td>
	  <td align="center" bgcolor="#e8e8d0"><p><strong>% Complete</strong></p></td>                  
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	{if_not_found}
    <tr>
	<td colspan="8"> Your search did not return any results. </td>
	</tr>
	{/if_not_found}
	{if_found}
    {projects}
	<tr>
	 <!--<td><a href='projects/projects_details/{id}' rel="lyteframe" >{code}</a></td>-->
	  <td><a href='{site_url}index.php/projects/project_summary/{id}' >{code}</a></td>
	  <td>{status}</td>
	  <td>{created_on}</td>
	  <td>{planned_on}</td>
	  <td>{start_date}</td>
	  <td>{end_date}</td>
	  <!-- <td>{activated_on}</td> -->
	  <td><a href='{site_url}index.php/charts/MSCol2D/{id}' >View Graph</a></td>
	  <td> <img src="/images/progress_bar1.jpg" height="13" width="96"> </td>
	</tr>
    {/projects} 
   {/if_found}                 
                  
</table>

<h2>Activity Calendar</h2>  
<br>
<form action="{site_url}index.php/projects/" method="post">  
<table class="calendar">

	<tr> 
		<!--<th><input type="submit" name="prev" value="PREV" /></th>-->
		<th><a href="{site_url}index.php/projects/getPrevMonth/{m}/{year}"> <img  height="40" src="{site_url}images/PrevF.gif" /> </a></th>
		<th colspan="5">{month}{year}</th>
		<th><a href="{site_url}index.php/projects/getNextMonth/{m}/{year}"> <img height ="40" src="{site_url}images/NextF.gif" /> </a></th>
		<!--<th><input type="submit" name="next" value="NEXT" /></th>-->
	</tr>

	<tr>
	    <th>Sun</th>
		<th>Mon</th>
		<th>Tue</th>
		<th>Wed</th>
		<th>Thu</th>
		<th>Fri</th>
		<th>Sat</th>
		
	</tr>
		
{weeks}	
	<tr>
{days}	
		<td>{day}<br />
		<ul>
		{activities}
		<li><a href='../../../../project/system/application/views/projects/projects/projects_details/%7Bid%7D' rel="lyteframe" >{code}</a></li>
		{/activities}
		</ul>
		</td>
{/days}	
	</tr>
{/weeks}


</table>

</form>

</div>

</div>

<?php
$this->load->view('footer');
?>
