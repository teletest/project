<?php  $this->load->view('header');  ?>

<div class="art-contentLayout"> 

<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>
<div style="float:left;margin-left:20px;">

<table width="100%">
<tr>
	<th>BSC</th><th>Cluster</th><th>District</th>
</tr>
<tr>
	<td align="center" >{BSC}</td>
	<td align="center" >{Cluster}</td>
	<td style="padding:2px;">{District}</td>
</tr>
</table>
<br /><br />

<?php echo anchor('projects/activity/{id}','Add an activity' ); ?>
<table width="100%">
<tr>
	<th>Date</th><th>Subject</th><th>&nbsp;</th><th>Action</th>
</tr>

{activities}
<tr><td>{act_date}</td><td>{act_detail}</td><td>{act_attachment}</td><td><?php echo anchor('projects/activity/{id}/{act_id}','Show' ); ?></td></tr>
{/activities}

<tr><td>14 Feb 2009</td><td>PAT Done</td><td>&nbsp;</td><td><?php echo anchor('projects/activity/{id}/989','Show' ); ?></td></tr>
<tr><td>10 Feb 2009</td><td>RFS Done</td><td>*</td><td><?php echo anchor('projects/activity/{id}/980','Show' ); ?></td></tr>

</table>




<input value="back" onclick="javascript:history.back(-1);" class="button" type="button">

</div>
<?php $this->load->view('footer'); ?>