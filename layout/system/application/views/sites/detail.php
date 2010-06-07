<?php  $this->load->view('header');  ?>

<div id="main-content">
<h1>Site Details</h1>

<div id="sub_menu">
<?php 
	echo anchor('sites','Sites')  . ' | ' . 
	anchor('sites/summary','Summary') . ' &raquo; '.
	"{detail_title} ({type}) | ".
	anchor('sites/summary/graph','Graph');
?>

</div>

<table border="1" align="center"  width="400px" style="border-collapse:collapse;border:1px solid #ccc">
<tr>
	<th align="center" >District</th>
    <th align="center" >BSC</th>
    <th align="center" >Cluster</th>
    <th align="center" >Site</th>
</tr>

{sites}
<tr background-color="ghost">
	<td width="100px" style="padding:2px;">{District}</td>
    <td width="100px" align="center" >{BSC}</td>
    <td width="100px" align="center" >{Cluster}</td>
    <td width="100px" align="center" >{Site ID}</td>
</tr>
{/sites}
</table>

{pagination}




</div>

<?php $this->load->view('footer'); ?>