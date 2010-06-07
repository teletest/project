<?php $this->load->view('header'); ?>


<div id="main-content">
<h1>Site Summary</h1>

<div id="sub_menu">
<?php 
	echo anchor('sites','Sites') . ' | ' . 
	anchor('sites/summary','Summary') . ' | ' .  
	anchor('sites/summary/graph','Graph');
?>
</div>


<table border="1" align="center"  width="400px" style="border-collapse:collapse;border:1px solid #ccc">
<tr>
	<th>Status</th>
    <th align="center" >Macro</th>
    <th align="center" >Micro</th>
</tr>

{sites}
<tr background-color="ghost">
	<td style="padding:2px;">{site_title}</td>
    <td width="100px" align="center" ><?php echo anchor('sites/detail/macro/{detail_id}','{macro}'); ?></td>
    <td width="100px" align="center" ><?php echo anchor('sites/detail/micro/{detail_id}','{micro}'); ?></td>
</tr>
{/sites}
</table>



</div>

<?php $this->load->view('footer'); ?>