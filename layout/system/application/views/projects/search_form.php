

<form method="post" action="{site_url}index.php/projects/<?php echo $this->uri->segment(2) ?>">

Find : <input name="s" value="" /> 
     <input type="button" id="b1" name="b1" value="Submit" onclick="this.form.submit();" />
</form>