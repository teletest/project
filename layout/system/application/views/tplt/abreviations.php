<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>{projects_title}</h1>
{projects_menu}

<br /><br />
<table>
	<tr><th>Abb.</th><th>Definition</th></tr>
{abbriviations}
	<tr><td>{abb}</td><td>{def}</td></tr>
{/abbriviations}
</table>







</div>

<?php
$this->load->view('footer');
?>
