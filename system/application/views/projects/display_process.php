<?php
$this->load->view('header');
?>

<div id="main-content">


<h1>Nominal Plan</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>
<h3>Process</h3>


<table align="center" border="0" cellpadding="1" cellspacing="2">

                  <tbody><tr>
                
                    <td bgcolor="#e8e8d0"><strong>Process Name</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><p><strong>View</strong></p></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Delete</strong></td>
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
					<?php } ?>
					<!--<td align="center"><a href='edit_plan/{id}' rel="lyteframe" ><img src="{site_url}/images/edit.jpg" height="24" width="24"></a></td> -->
                    
                  </tr>
				  {/process}
                  
                </tbody></table>
				<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
                
				
</div>
</div>

<?php
$this->load->view('footer');
?>
