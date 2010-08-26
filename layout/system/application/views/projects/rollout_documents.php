<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/rollout_documents/#add"><span>Rollout Documents</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">
	<h1>Rollout Documents</h1>

<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
                  
				  <tr class="ewTableHeader">
                    <td>File Name</td>
                    <td>Date</td>
                    <td>View</td>
                    <td>Delete</td>
                    <td>Download</td>
                  </tr>
                  <tbody id="thetable">
				  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  {rolled_out_doc}
                  <tr onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
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
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>