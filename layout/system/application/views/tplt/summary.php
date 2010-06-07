<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Project Summary</h1>

<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>

<?php echo anchor('projects/summary','Summary'); ?> | <?php echo anchor('projects/graph','Graph'); ?>


<table border="1" align="center"  width="400px" style="border-collapse:collapse;border:1px solid #ccc">
<tr>
	<th>Status</th>
    <th align="center" >Macro</th>
    <th align="center" >Micro</th>
</tr>

{sites}
<tr background-color="ghost">
	<td style="padding:2px;">{site_title}</td>
    <td width="100px" align="center" ><?php echo anchor('projects/macro/{detail_id}','{macro}'); ?></td>
    <td width="100px" align="center" ><?php echo anchor('projects/micro/{detail_id}','{micro}'); ?></td>
</tr>
{/sites}
</table>



<h3>You can :</h3>
<ul>
	<li>List the projects from here</li>
	<li>Activate / Deactivate a project</li>
	<li>Delete a project</li>
	<li>View the gant chart of the project plan</li>
</ul>
</div>

</div>

<?php
$this->load->view('footer');
?>
