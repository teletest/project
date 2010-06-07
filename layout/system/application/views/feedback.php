<?php
$this->load->view('header');
?>
<div id="main-content">
<form action="feedback/submit" method="post" name="feedbackFrm">
  <table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">

<tbody><tr>
<td align="right" width="230">From :</td>

<td>
<input name="from" type="hidden" class="text" id="from" value="{user}">
<strong>{user}</strong></td>
</tr>
<tr>
    <td align="right"> Company :</td><td><input name="company" type='hidden' class="text" id="company" value="{company}">
    <strong>{company}</strong></td>
</tr>
<tr>
    <td align="right"> Subject :</td><td><input name="subject" type="text" class="text" id="subject" value="" size="50"></td>
</tr>
<tr>
    <td align="right"> Comments :</td>
    <td><textarea name="comments" cols="50" class="text" id="comments" style="height: 200px;"></textarea></td>
</tr>

<tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button">
    </td>
    <td align="right">
    	<input type="submit"  class="button" value="submit">


    </td>
</tr>
</tbody></table></form>












</div>


<?php
$this->load->view('footer');
?>