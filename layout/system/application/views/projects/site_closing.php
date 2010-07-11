<?php
$this->load->view('header');
?>

<div id="ShowTab" style="width:96%;overflow:auto; padding:5px;height:200px;">
    <ul>
    <li><a href="{site_url}index.php/projects/site_closing/#add"><span>Site Closing</span></a></li>
    
    </ul>
    <div id="add" >

<h1>Site Closing</h1>

<br /><br />
<h2>Sites ready to be closed</h2>
<table class="table" align="center" border="0" cellpadding="1" cellspacing="2" width="98%">
                  <tbody>
				  
				    <tr>
                    <td bgcolor="#e8e8d0"><strong>Site Code</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Action</strong></td>
                    </tr>
					
					<tr>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>	
					</tr>
                   {closing_sites}
                   <tr>
                    <td>{name}</td>
                    <td><a href='site_details/{id}' rel="lyteframe"> Details </a> | <a href='site_attach_document/{id}' >Document</a></td>
                   
                    </tr>
					{/closing_sites}
				  
	<!--			  <tr>
                    <td bgcolor="#e8e8d0"><strong>ST Code</strong></td>
                    <td bgcolor="#e8e8d0"><strong>Name</strong></td>
                    <td bgcolor="#e8e8d0"><strong>Start Date</strong></td>
                    <td bgcolor="#e8e8d0"><strong>End Date</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>% Complete</strong></td>
                    <td bgcolor="#e8e8d0"><strong>Status</strong></td>
                    <td align="center" bgcolor="#e8e8d0"><p><strong>Files</strong></p></td>
                    <td align="center" bgcolor="#e8e8d0"><strong>Reports</strong></td>
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
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td><strong>ST-001</strong></td>
                    <td>Project A</td>
                    <td>1/3/2009</td>
                    <td>1/5/2009</td>
                    <td align="center"><img src="/images/progress_bar1.jpg" height="13" width="96"></td>
                    <td>Complete</td>
                    <td align="center"><img src="/images/LaST%2520Cobalt%2520Internet%2520File.png" height="24" width="24"></td>
                    <td align="center"><img src="/images/Bar%2520Chart%25205.png" height="24" width="24"></td>
                    <td align="center"><img src="/images/Group%2520Security.gif" height="24" width="24"></td>
                    <td align="center"><img src="/images/play.png" height="24" width="24"></td>
                  </tr>
                  <tr>
                    <td bgcolor="#cccccc"><strong>ST-002</strong></td>
                    <td bgcolor="#cccccc">Project B</td>
                    <td bgcolor="#cccccc">1/3/2009</td>
                    <td bgcolor="#cccccc">1/5/2009</td>
                    <td align="center" bgcolor="#cccccc"><img src="/images/progress_bar1.jpg" height="13" width="96"></td>
                    <td bgcolor="#cccccc">Inprogress</td>
                    <td align="center" bgcolor="#cccccc"><img src="/images/LaST%2520Cobalt%2520Internet%2520File.png" height="24" width="24"></td>
                    <td align="center" bgcolor="#cccccc"><img src="/images/Bar%2520Chart%25205.png" height="24" width="24"></td>
                    <td align="center" bgcolor="#cccccc"><img src="/images/Group%2520Security.gif" height="24" width="24"></td>
                    <td align="center" bgcolor="#cccccc"><img src="/images/play.png" height="24" width="24"></td>
                  </tr>
                  <tr>
                    <td><strong>ST-003</strong></td>
                    <td>Project C</td>
                    <td>1/3/2009</td>
                    <td>1/5/2009</td>
                    <td align="center"><img src="/images/progress_bar1.jpg" height="13" width="96"></td>
                    <td>Inprogress</td>
                    <td align="center"><img src="/images/LaST%2520Cobalt%2520Internet%2520File.png" height="24" width="24"></td>
                    <td align="center"><img src="/images/Bar%2520Chart%25205.png" height="24" width="24"></td>
                    <td align="center"><img src="/images/Group%2520Security.gif" height="24" width="24"></td>
                    <td align="center"><img src="/images/play.png" height="24" width="24"></td>
                  </tr> -->
                  </tbody>
                  </table>


</div>
</div>
<?php
$this->load->view('footer');
?>
