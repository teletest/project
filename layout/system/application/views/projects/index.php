<?php
$this->load->view('header');
?>

<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>

<div id = "main_contents" style="float:left;margin-left:20px;"
<div style="width:600px;" >
    <div id="ShowTab">
    <ul>
    <li><a href="#Tab1"><span>View</span></a></li>
    <li><a href="#Tab2"><span>Activity Calendar</span></a></li>
    </ul>
        <div id="Tab1" >
        <table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
	    <tr>
		  <td align="center" bgcolor="#e8e8d0" ><strong>Code</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><strong>Status</strong></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Created on</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Planned on</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>Start Date</strong></p></td>
		  <td align="center" bgcolor="#e8e8d0"><p><strong>End Date</strong></p></td>                    
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
	  <td><a href='{site_url}index.php/projects/project_summary/{id}' >{code}</a></td>
	  <td>{status}</td>
	  <td>{created_on}</td>
	  <td>{planned_on}</td>
	  <td>{start_date}</td>
	  <td>{end_date}</td>
	  <td><a href='{site_url}index.php/charts/MSCol2D/{id}' >View Graph</a></td>
	  <td> <img src="/images/progress_bar1.jpg" height="13" width="96"> </td>
	</tr>
    {/projects} 
   {/if_found}                 
                  
</table> 
        </div>
        <div id="Tab2">
		<h2>Activity Calendar</h2>  
		<br>
		<form action="{site_url}index.php/projects/" method="post">  
		<table class="calendar">
		<tr> 
			<th><a href="{site_url}index.php/projects/getPrevMonth/{m}/{year}"> <img  height="40" src="{site_url}images/PrevF.gif" /> </a></th>
			<th colspan="5">{month}{year}</th>
			<th><a href="{site_url}index.php/projects/getNextMonth/{m}/{year}"> <img height ="40" src="{site_url}images/NextF.gif" /> </a></th>		
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
</div>
</div>





<?php
$this->load->view('footer');
?>
