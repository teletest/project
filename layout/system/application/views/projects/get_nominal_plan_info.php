<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $this->load->view('header-new'); ?>
<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/nominap_plan_info/{plan_id}#add"><span>Get Plan Details</span></a></li>

    </ul>
        <div id="add" class="TabSpec">
			<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
			<tr >
						<td><b>Created on</b></td>
						<td>{created_on} </td>
					</tr>
					<tr>
						<td><b>Created by</b></td>
						<td> {created_by} </td>
					</tr>
					<tr>
						<td><b>Description</b></td>
						<td> {description} </td>
					</tr>
					<tr>
						<td><b>Comments :</br></td>
						<td> {comments} </td>
					</tr>
			</table>
		</div>
</div>
<?php $this->load->view('footer-new');?>