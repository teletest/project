<?php
$this->load->view('header');
?>

<<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/rollout_documents/#add"><span>Rollout Documents</span></a></li>
    
    </ul>
    <div id="add" >
	<h1>Rollout Documents</h1>


<table align="center" border="0" cellpadding="1" cellspacing="2">
					  <tbody><tr>
						<td bgcolor="#e8e8d0"><strong>File Name</strong></td>
                    <td bgcolor="#e8e8d0"><strong>Date</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><p><strong>View</strong></p></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Delete</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Download</strong></td>
                  </tr>
					  <tr>
						<td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                  </tr>
					  {rolled_out_doc}
					  <tr>
						<td><strong>{filename}</strong></td>
                    <td>{attached_on}</td>
                    <td align="center"><a href='{site_url}uploads/{site_id}_{filename}' rel="lyteframe"><img src="{site_url}/images/kghostview.png" height="24" width="24"></a></td>
                    <td align="center"><a href='download_file/{site_id}_{filename}' ><img src="{site_url}/images/download_icon.jpg" height="24" width="24"></a></td>
					<?php if($this->session->userdata('is_admin')) { ?>
				    <td align="center"><a href='attachment_delete/{id}/{site_id}'  class="confirmClick" title="Delete this file"><img src="{site_url}/images/delete.png" height="24" width="24"></a></td>
				    <?php } else { ?> <td>&nbsp;</td> <?php } ?>
					
				  </tr>
					  {/rolled_out_doc}
					</tbody></table>
					{pagination}
      </div>
</div>
<?php
$this->load->view('footer');
?>
