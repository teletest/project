<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/stages_planned/#add"><span>Plan Summary</span></a></li> 
    </ul>
    <div id="add" class="TabSpec">
	 <table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
			<tr class="ewTableHeader">
				  <td>Name Of Element</td>
			      <td>Quantity</td>
			</tr>
			<tbody>
			<tr>
				<td>&nbsp;</td>
			    <td>&nbsp;</td>
			</tr>
			{element}
			<tr style="text-transform: uppercase;" class="ewTableHeader">
				<td><b>{filters}</b></td>
			    <td><b>{counts}</b></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			{values}
			<tr>
				<td><a href='{site_url}index.php/projects/get_counted_sites/{filters}/{name}' >{name}</a></td>
				<td><a href='{site_url}index.php/projects/get_counted_sites/{filters}/{name}' >{sites_count}</a></td>
			</tr>
			{/values}
			<tr>
				<td>&nbsp;</td>
			    <td>&nbsp;</td>
			</tr>
			{/element}
			</tbody>
	 </table>
	</div>
</div>
<?php $this->load->view('footer-new');?> 

