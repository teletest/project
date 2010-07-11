<?php
$this->load->view('header');
?>
<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/rollout_summary/#add"><span>Rollout Summary</span></a></li>
    
    </ul>
    <div id="add" >

	<h3>Rollout Summary</h3>
<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
		<thead>
			<tr>
			  <th>Stage</th>
		  <th>Quantity</th>
		</tr>
		</thead>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
	  {states}	
	  {if_found}
		<tr>
		<td>{stage}</td>
	<td><a href="{site_url}index.php/projects/site_rollout/0/{project_id}/0/0/0/0">{count}</a></td>
	</tr>
	 {/if_found}
	 {/states}
	</table>

   </div>
</div>
<?php
 $this->load->view('footer');
?>