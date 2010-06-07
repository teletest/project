<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}


<br /><br />

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<form name="feedbackFrm" action="" method="post"></form>
<tbody><tr>
    <td align="right" width="230">From :</td>

    <td>
<input class="text" name="feedback_username" value="{user}" type="hidden"><strong>{user}</strong>	</td></tr>
<tr>
    <td align="right"> Company :</td><td><input class="text" name="feedback_company" value="{user_stkeholder}" type="hidden"><strong>{user_stakeholder}</strong>	</td>
</tr>
<tr>
    <td align="right"> Subject :</td><td><input class="text" name="user_firstname" value="" size="50" type="text"></td>
</tr>
<tr>
    <td align="right"> Comments :</td>
    <td><textarea class="text" cols="50" name="user_feedback" style="height: 200px;"></textarea></td>
</tr>

<tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button">
    </td>
    <td align="right">
    	<input value="submit" onclick="javascript:alert('submit it after field validation');" class="button" type="button">

    </td>
</tr>
</tbody></table>












</div>


<?php
$this->load->view('footer');
?>