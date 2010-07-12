<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/#view"><span>View</span></a></li>
    <li><a href="{site_url}index.php/projects/#activity_calendar"><span>Activity Calendar</span></a></li>
    </ul>
	<div id="view" >
     <table width="90%">
	    <tbody>
		<tr>
		  <td valign="top" >Code</td>
		  <td valign="top">Status</td>
		  <td valign="top">Created on</td>
		  <td valign="top">Planned on</td>
		  <td valign="top">Start Date</td>
		  <!--<td valign="top">End Date</td> -->                    
		  <td valign="top">View Progress</td>
		 <!-- <td valign="top">% Complete</td>  -->                
		</tr>
		</tbody>
		<tbody >
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <!--<td>&nbsp;</td> -->
		 <!-- <td>&nbsp;</td> -->
		</tr>
	{if_not_found}
    <tr>
	<td colspan="8"> Your search did not return any results. </td>
	</tr>
	{/if_not_found}
	{if_found}

    {projects}
	<tr>

	  <td><a href='{site_url}index.php/projects/project_summary/{id}' >{code}</a></td>
	  <td>{status}</td>
	  <td>{created_on}</td>
	  <td>{planned_on}</td>
	  <td>{start_date}</td>
	  <!-- <td>{end_date}</td> -->
	  <td><a href='{site_url}index.php/charts/MSCol2D/{id}' >View Graph</a></td>
	 <!-- <td> <img src="{site_url}images/progress_bar1.jpg" height="13" width="96"> </td> -->
	</tr>
	
    {/projects} 
   {/if_found}                 
     </tbody>             
     </table> 

	</div>
	<div id="activity_calendar">
	<h2>Activity Calendar</h2>  
	<br>
	<form action="{site_url}index.php/projects/" method="post">  
	<table  align="center" width="100%">
	<tr bordercolorlight="#999999" bordercolordark="#666666"> 
		<th><a href="{site_url}index.php/projects/getPrevMonth/{m}/{year}#activity_calendar"> <img  height="40" src="{site_url}images/prev.jpg" /> </a></th>
		<th colspan="5">{month}{year}</th>
		<th><a href="{site_url}index.php/projects/getNextMonth/{m}/{year}#activity_calendar"> <img height ="40" src="{site_url}images/next.jpg" /> </a></th>		
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


<?php $this->load->view('footer'); ?>
