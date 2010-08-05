<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php  // $this->load->view('header');  ?>
<?php $this->load->view('header-new');?>

<div id="ShowTab" style="width:96%;overflow:auto;">
    <ul>
    <li><a href="{site_url}index.php/projects/stages_planned/#add"><span>Stages Planned</span></a></li>
    
    </ul>
    <div id="add" class="TabSpec">
	<h3>Process</h3>


<table width="90%" border="0" cellpadding="0" cellspacing="1" class="ewTable">
	<tbody>
	                <tr class="ewTableHeader">
					
				      <td><strong>Process Name</strong></td>
                      <td align="center"><strong>View</strong></td>
                      <td align="center"><strong>Delete</strong></td>
                    <!--<td align="center" bgcolor="#e8e8d0"><strong>Edit</strong></td>-->
					 </tr>
					  <tr>
						
						<td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <!--<td align="center">&nbsp;</td>-->
					  </tr>
					  {process}
					  <tr>
				  
						<td>{name}</td>
						<td align="center"><a href='{site_url}index.php/projects/process_details/{id}' rel="lyteframe"><img src="{site_url}/images/kghostview.png" height="24" width="24"></a></td>
						<?php if($this->session->userdata('is_admin')) { ?>    
						<td align="center"><a href='{site_url}index.php/projects/delete_process/{id}'  class="confirmClick" title="Delete this process"><img src="{site_url}/images/delete.png" height="24" width="24"></a></td>
                    	<?php } else { ?>
						<td>&nbsp;</td>
						<?php } ?><!--<td align="center"><a href='edit_plan/{id}' rel="lyteframe" ><img src="{site_url}/images/edit.jpg" height="24" width="24"></a></td> -->
					  
					  </tr>
					  {/process}
					  
					</tbody></table>
					<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
     </div>
</div>
<?php $this->load->view('footer-new');?> 
<?php // $this->load->view('footer'); ?>
