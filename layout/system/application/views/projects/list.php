<?php  $this->load->view('header');  ?>

<div class="art-contentLayout"> 

<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>
<div style="float:left;margin-left:20px;">


<table border="1" align="center"  width="400px" style="border-collapse:collapse;border:1px solid #ccc">
<tr>
	<th align="center" >District</th>
    <th align="center" >BSC</th>
    <th align="center" >Cluster</th>
    <th align="center" >Site</th>
    <th align="center" >Action</th>
</tr>

{sites}
<tr background-color="ghost">
	<td width="100px" style="padding:2px;">{District}</td>
    <td width="100px" align="center" >{BSC}</td>
    <td width="100px" align="center" >{Cluster}</td>
    <td width="100px" align="center" >{Site ID}</td>
    <td width="100px" align="center" ><?php echo anchor('projects/detail/{Site ID}','Edit'); ?></td>
</tr>
{/sites}
</table>

<input value="back" onclick="javascript:history.back(-1);" class="button" type="button"> {pagination}

</div>
<?php $this->load->view('footer'); ?>