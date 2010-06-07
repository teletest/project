<?php
$this->load->view('header');
$current_year = date("Y");
?>

<script language="Javascript">
	function period()
	{
		alert ('adjust the from and to dates accordingly');
	}
	
</script>


<div id="main-content">

<h1>Report Manager</h1>


<form method="post" action="">
<table border="0">


<tr>
<td>Report</td>
<td> 
	<select xml:lang="en" dir="ltr" name="report_id">
{reports}
		<option value="{id}">{name}</option>
{/reports}
	</select>
	 ( to be filtered for stakeholders )
</td>
</tr>


<tr>
<td>
period
</td>
<td>
	<select xml:lang="en" dir="ltr" name="report_period" onchange="period();">
		<option value="">&nbsp;</option>
		<option value="q1"{q1}>Quarter 1</option>
		<option value="q2"{q2}>Quarter 2</option>
		<option value="q3"{q3}>Quarter 3</option>
		<option value="q4"{q4}>Quarter 4</option>
	</select>
</td>
</tr>

<tr>
<td>
from date
</td>
<td>
<input name="report_from" value="{report_from}" />
</td>
</tr>



<tr>
<td>
to date : 
</td>
<td>
<input name="report_to" value="{report_to}" />
</td>
</tr>


<tr>
<td>
Type
</td>
<td>
	<select xml:lang="en" dir="ltr" name="report_type">
		<option value="graphical">Graphical Only</option>
		<option value="tabular">Tabular Only</option>
		<option value="composite">Both</option>
		<option value="xml">XML</option>
	</select>
</td>
</tr>



<tr>
<td>
Output to
</td>
<td> 
	<select xml:lang="en" dir="ltr" name="report_output">
		<option value="screen">Screen</option>
		<option value="file">File</option>
	</select>
</td>
</tr>


</table>
<input type="submit" name="submit" value="Submit" />
</form>
<br />
<hr />

{report}


</div>


<?php
$this->load->view('footer');
?>