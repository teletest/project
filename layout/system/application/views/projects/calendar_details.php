<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
      <li><a href="{site_url}index.php/projects/calendar_details/#add"><span>Calendar Details</span></a></li> 
    </ul>
    <div id="add" >
	  <table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		 <tr class="ewTableHeader">
		   <td> Date </td>
		   <td> Event </td>
	     </tr>
		 {event_details}
		<tr>
		   <td valign="top" heitght="20"> {on_date} </td>
		   <td valign="top" heitght="20">{definition}</td>		
		</tr>
		{/event_details}
	</table>
    </div>
</div>

<?php $this->load->view('footer-new');?> 
