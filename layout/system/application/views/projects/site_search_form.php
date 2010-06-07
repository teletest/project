

<form method="post" action="{site_url}index.php/projects/<?php echo $this->uri->segment(2) ?>">

Search    : <input name="s" value="" /> 
Filter on : <select xml:lang="en" dir="ltr" name="f" id="f">
			<option value="" title="No filter" selected="selected">--------</option>
			<option value="name" >Name</option>
			<option value="region" >Region</option>
			<option value="division">Division</option>
			<option value="msc/bsc">MSC/BSC</option>
			<option value="vip" title="VIP Projects">VIP</option> 
		    </select>
			 <input type="button" id="b1" name="b1" value="Submit" onclick="this.form.submit();" />
</form>
