<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>
<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/process_details/#add"><span>Process Details</span></a></li>

    </ul>
        <div id="add" class="TabSpec">
			<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
			{process}
				<tr >
					<td><b>Created on</b></td>
					<td>{created_on} </td>
					<td>&nbsp;  </td>
				</tr>
				<tr>
					<td><b>Created by</b></td>
					<td> {created_by} </td>
					<td>&nbsp;  </td>
				</tr>
				<tr>
					<td><b>Description</b></td>
					<td colspan="2"> {description} </td>
				</tr>
				<tr>
					<td><b>Comments :</br></td>
					<td colspan="2"> {comments} </td>
				</tr>
			{/process}
				<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				</tr>
				<tr class="ewTableHeader">
					<td> <b> Stage  </b></td>
					<td> <b> Lead Time </b></td> 
					<td> <b> Dependency </b></td>
				</tr>
			{process_details}
				<tr valign="top" height="20">
					<td> {stage} </td>
					<td> {lead_time} </td>
					<td> {dependency} </td>
				</tr>
			{/process_details}
			</table>

</div>
</div>


