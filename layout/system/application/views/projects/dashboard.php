<?php
$this->load->view('header');
?>

<div id="main-content">


<h1>Alerts for : {user}</h1>



<ul>
{alerts}
<li>{alert}</li>
{/alerts}
</ul>

<br /><br />

{images}  
	<h2>{name}</h2>
	<img src="{site_url}data/flash_animations/{filename}" title='{desc}' />
	<br /><br />
{/images}  

<script type="text/javascript" src="{site_url}amcolumn/swfobject.js"></script>
{charts}  
	<h2>{name}</h2>
	<div id="{filename}">
		<strong>You need to upgrade your Flash Player</strong>
	</div>
	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("{site_url}amcolumn/amcolumn.swf", "amcolumn", "520", "400", "8", "#FFFFFF");
		so.addVariable("path", "{site_url}amcolumn/");
		so.addVariable("settings_file", encodeURIComponent("{site_url}data/charts/{filename}/settings.xml"));
		so.addVariable("data_file", encodeURIComponent("{site_url}data/charts/{filename}/data.xml"));		
		so.write("{filename}");
		// ]]>
	</script>
<br /><br />	
{/charts}

</div>


<?php
$this->load->view('footer');
?>
