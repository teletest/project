<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/closing_documents/#add"><span>Closing Documents</span></a></li>
    
    </ul>
    <div id="add"  class="TabSpec" >

	<h2>Site Closing Documents</h2>
		<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
				<tbody>
							  
					<tr class="ewTableHeader">
					  <td align="center" bgcolor="#e8e8d0"><strong>File name</strong></td>
					  <td align="center" bgcolor="#e8e8d0"><strong>Attached On</strong></td>
					  <td align="center" bgcolor="#e8e8d0"><strong>Actions</strong></td>          
					</tr>
			
					<tr>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					</tr>
				
							{closing_attachments} 
								<tr>  
								  <td>{filename}</td>
							  <td>{attached_on}</td>
							  <td><a href='{site_url}uploads/{project_id}_{filename}' rel="lyteframe">View</a> | <a href='{site_url}uploads/{project_id}_{filename}'  onClick="window.print();return false">Print</a>
							  <?php if($this->session->userdata('is_admin')) { ?>      
								 |<a href='{site_url}/index.php/projects/attachment_delete/{id}/{project_id}' class="confirmClick" title="Delete this project" >Delete</a>
							  <?php } ?> 
							  </td>
							</tr>	
							{/closing_attachments}     
							  
					<!--		<tr>
								<td bgcolor="#e8e8d0"><strong>File Name</strong></td>
								<td bgcolor="#e8e8d0"><strong>Uploaded By</strong></td>
								<td bgcolor="#e8e8d0"><strong>Date</strong></td>
								<td align="center" bgcolor="#e8e8d0"><p><strong>View</strong></p></td>
								<td align="center" bgcolor="#e8e8d0"><strong>Delete</strong></td>
								<td align="center" bgcolor="#e8e8d0"><strong>Users &amp; <br>
								  Security</strong></td>
								<td align="center" bgcolor="#e8e8d0"><strong>Select</strong></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
							  </tr>
							  <tr>
								<td><strong>ST-001</strong></td>
								<td>User A</td>
								<td>1/3/2009</td>
								<td align="center"><img src="/images/kghostview.png" height="24" width="24"></td>
								<td align="center"><img src="/images/delete.png" height="24" width="24"></td>
								<td align="center"><img src="/images/Group%2520Security.gif" height="24" width="24"></td>
								<td align="center"><img src="/images/play.png" height="24" width="24"></td>
							  </tr>
							  <tr>
								<td bgcolor="#cccccc"><strong>ST-002</strong></td>
								<td bgcolor="#cccccc">User B</td>
								<td bgcolor="#cccccc">1/3/2009</td>
								<td align="center" bgcolor="#cccccc"><img src="/images/kghostview.png" height="24" width="24"></td>
								<td align="center" bgcolor="#cccccc"><img src="/images/delete.png" height="24" width="24"></td>
								<td align="center" bgcolor="#cccccc"><img src="/images/Group%2520Security.gif" height="24" width="24"></td>
								<td align="center" bgcolor="#cccccc"><img src="/images/play.png" height="24" width="24"></td>
							  </tr>
							  <tr>
								<td><strong>ST-003</strong></td>
								<td>User C</td>
								<td>1/3/2009</td>
								<td align="center"><img src="/images/kghostview.png" height="24" width="24"></td>
								<td align="center"><img src="/images/delete.png" height="24" width="24"></td>
								<td align="center"><img src="/images/Group%2520Security.gif" height="24" width="24"></td>
								<td align="center"><img src="/images/play.png" height="24" width="24"></td>
							  </tr>
							  <tr>
								<td><strong>ST-004</strong></td>
								<td>User D</td>
								<td>1/3/2009</td>
								<td align="center"><img src="/images/kghostview.png" height="24" width="24"></td>
								<td align="center"><img src="/images/delete.png" height="24" width="24"></td>
								<td align="center"><img src="/images/Group%2520Security.gif" alt="" height="24" width="24"></td>
								<td align="center"><img src="/images/play.png" height="24" width="24"></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td colspan="2" align="center"><img src="/images/upload.png" align="absmiddle" height="24" width="24"> <strong>Upload File</strong></td>
								</tr> -->
							</tbody></table>
		
			  </div>
		</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
