<?php  $this->load->view('header');  ?>

<div id="main-content">
<h1>{projects_title}</h1>
{projects_menu}
<br /><br />

<?php
$this->load->view('projects/search_form');
?>
<br /><br />

<h3>Listing Activity {act_id} of {id}</h3>

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<form name="addFrm" action="" method="post"></form>

<tbody>
<tr>
    <td align="right" width="230">Date:</td>
    <td><input class="text" name="act_date" value="{date}" disabled></td>
</tr>
<tr>
    <td align="right">* Subject:</td>
    <td><input class="text" name="act_subject" value="" maxlength="255" size="50" type="text"> </td>
</tr>

<tr>
    <td align="right" valign="top">* Comments:</td>
    <td><textarea class="text" cols="50" name="act_comments" style="height: 300px;"></textarea></td>
</tr>

<tr>

    <td align="right"> Attachments:</td>
    <td>
        <input class="text" name="act_attachments" value="" size="40" disabled="disabled" type="text">
        <input class="button" value="select file..." onclick="javascript:alert('present the dialog for uploading the file')" type="button">
    </td>
</tr>



<tr>
    <td align="right">* Required Fields</td>
    <td></td>
</tr><tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button">
    </td>
    <td align="right">
    	<input value="submit" onclick="javascript:alert('submit it after field validation');" class="button" type="button">

    </td>
</tr>
</tbody></table>




</div>

<?php $this->load->view('footer'); ?>