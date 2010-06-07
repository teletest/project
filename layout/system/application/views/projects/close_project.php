<?php
$this->load->view('header');
?>

<div id="main-content">

<h1>Close Project</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>

<br /><br />
<h2>Projects ready to be closed</h2>

<table class="table" border="0" cellpadding="1" cellspacing="2" width="100%">
         <tbody>
	
				    <tr>
                    <td bgcolor="#e8e8d0"><strong>Project Code</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Action</strong></td>
                    </tr>
					
					<tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>	
					</tr>
                   {closing_projects}
                   <tr>
                    <td>{code}</td>
                    <td><a href='projects_details/{id}' rel="lyteframe"> Details </a> | <a href='site_attach_document/{id}' >Document</a> | <a href='project_closed/{id}' >Close</a></td>
                   
                    </tr>
					{/closing_projects}
					
				

            <!--
			     <tr>
                    <td bgcolor="#e8e8d0"><strong>Project Code</strong></td>
                    <td bgcolor="#e8e8d0"><strong>Name</strong></td>

                    <td bgcolor="#e8e8d0"><strong>Start Date</strong></td>
                    <td bgcolor="#e8e8d0"><strong>End Date</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>% Complete</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><p><strong>Files</strong></p></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Reports</strong></td>
                    </tr> 
			
			     <tr>
                    <td>AMF-001</td>
                    <td>Project A</td>
                    <td>1/3/2009</td>
                    <td>1/5/2009</td>
                    <td align="center"><img src="/images/progress_bar1.jpg" height="13" width="96"></td>
                    <td align="center"><img src="/images/images/LaST%2520Cobalt%2520Internet%2520File.png" height="24" width="24"></td>

                    <td align="center"><img src="/images/Bar%2520Chart%25205.png" height="24" width="24"></td>
                    </tr>
                  <tr>
                    <td>AMF-002</td>
                    <td>Project B</td>
                    <td>1/3/2009</td>
                    <td>1/5/2009</td>

                    <td align="center"><img src="/images/progress_bar1.jpg" height="13" width="96"></td>
                    <td align="center"><img src="/images/LaST%2520Cobalt%2520Internet%2520File.png" height="24" width="24"></td>
                    <td align="center"><img src="/images/Bar%2520Chart%25205.png" height="24" width="24"></td>
                    </tr>
                  <tr>
                    <td>AMF-003</td>
                    <td>Project C</td>
                    <td>1/3/2009</td>

                    <td>1/5/2009</td>
                    <td align="center"><img src="/images/progress_bar1.jpg" height="13" width="96"></td>
                    <td align="center"><img src="/images/LaST%2520Cobalt%2520Internet%2520File.png" height="24" width="24"></td>
                    <td align="center"><img src="/images/Bar%2520Chart%25205.png" height="24" width="24"></td>
                    </tr>
                  <tr>
                    <td>AMF-004</td>
                    <td>Project D</td>

                    <td>1/3/2009</td>
                    <td>1/5/2009</td>
                    <td align="center"><img src="/images/progress_bar1.jpg" height="13" width="96"></td>
                    <td align="center"><img src="/images/LaST%2520Cobalt%2520Internet%2520File.png" height="24" width="24"></td>
                    <td align="center"><img src="/images/Bar%2520Chart%25205.png" height="24" width="24"></td>
                    </tr> -->

                </tbody></table>


</div>



</div>

<?php
$this->load->view('footer');
?>
