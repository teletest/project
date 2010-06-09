
<?php
$this->load->view('header');
?>
<div class="art-contentLayout"> 

<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>
<div style="float:left;margin-left:20px;">

<div id="index"	style="float:left; padding:5px">
	<div id="pagewrap">
		  <div id="search">
			<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
		  </div>
		  
			 <table cellpadding="1" cellspacing="1" id="resultTable" class="unique_table_style">
					  <thead>
						<tr>
						  <th>Name Of Element</th>
						  <th>Quantity</th>
						</tr>
					  </thead>
					  <tbody>
					    <tr>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						</tr>
						{element}
						<tr style="text-transform: uppercase;">
						  <td><b>{filters}</b></td>
						  <td>{counts}</td>
						</tr>
						<tr>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						</tr>
							{values}
							<tr>
							  <td><a href='{site_url}index.php/projects/get_counted_sites/{filters}/{name}' >{name}</a></td>
							  <td><a href='{site_url}index.php/projects/get_counted_sites/{filters}/{name}' >{sites_count}</a></td>
							</tr>
							{/values}
							 <tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							</tr>
						{/element}
					  </tbody>
			 </table>
		   </div>
	 </div>

</div>
<?php
$this->load->view('footer');
?>

