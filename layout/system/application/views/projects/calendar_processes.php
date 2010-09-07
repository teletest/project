<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
      <li><a href="{site_url}index.php/projects/calendar_details/#add"><span>Processes using this Calendar</span></a></li> 
    </ul>
    <div id="add" >
	  <table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
		 <tr class="ewTableHeader">
		   <td> Project</td>
		   <td> Process </td>
	     </tr>
		 {if_process_not_found}
		  <tr>
		   <td colspan="2">This calendar is not being used by an process</td>
		  </tr>
		 {/if_process_not_found}
		 {if_process_found}
		  {list_of_processes}
		   <tr>
		    <td valign="top" heitght="20"> {code} </td>
		    <td valign="top" heitght="20">{name}</td>		
		   </tr>
		  {/list_of_processes}
		{/if_process_found}
		<tr>
		  <td align="left" colspan="2"><input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /></td>
	    </tr>
	</table>
	
	</div>
</div>

<?php $this->load->view('footer-new');?> 