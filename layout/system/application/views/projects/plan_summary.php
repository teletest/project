
<?php
$this->load->view('header');
?>
<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/stages_planned/#add"><span>Stages Planned</span></a></li>
    
    </ul>
    <div id="add" >

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
</div>
<?php
$this->load->view('footer');
?>

