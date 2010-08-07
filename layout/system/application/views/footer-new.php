</td>
            <td width="210" align="center" valign="top">
            <!-- Start Right Column-->
            <?php if (@$ShowRightSide!="No"){ ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="4"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d1d1d1;">
                  <tr>
                    <td height="30" bgcolor="#d1d1d1"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="73%" align="left"><span class="BoldTest">Summary</span></td>
                        <td width="27%"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/minimize.png" width="24" height="24" style="cursor:pointer;" alt="Minimize Menu" /></td>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/close.png" width="24" height="24" style="cursor:pointer;" alt="Close Menu" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="160" align="center" valign="middle" bgcolor="#FFFFFF">
					<div id="summary">
					<table align="center" class="ewTable"  style="width:178px">
					  <tbody>
						<!-- <tr class="ewTableHeader">
						  <td valign="top"><strong>Application</strong></td>
						  <td valign="top"><strong>Remaining</strong></td>
						  <td valign="top"><strong>Used</strong></td>
						</tr> -->
					  </tbody>
					  <tbody id="thetable">
					    <!--<tr class="ewTableHeader">
						 <td colspan="3">
							 Sites Summary
						 </td>
						 </tr> -->
						 <tr>
							 <td colspan="3"><?php echo renderChart( "{site_url}charts/"."{chart_type}",  "", "{xml}" , "chart", "200", "200"); ?></td>
						</tr>
						<tr>
						<tr class="ewTableHeader">
				         <td colspan="3">
							<span style="font-family: Arial,Arial;">
							<strong>
							<font size="2">Select Month & Year </font>	
							</strong>
							</span>
							<?php
							echo "<form id=form1 name=form1 method=post action={site_url}index.php/projects/project_summary>
							<select style='font-family: Arial; font-size: 12px; size=1' name=month onChange='showSelected()'>
							{months}
							<option value={value} {selected}>{name}</option>
							{/months}
							</select>
							
							<select style=font-family: Arial; font-size: 12px; size=1 name=year onChange='showSelected()'>
							{years}
							<option value={value} {selected}>{name}</option>
							{/years}
							</select>
							</form>";?>
				         </td>
				 
						</tr>
						<tr>
					       <td colspan="3"><?php echo renderChart( "{site_url}charts/"."{chart_type1}",  "", "{bargraph_xml}" , "chart1", "200", "200"); ?></td>
				        </tr>
						<!-- <tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);" >
						  <td><div>13</div></td>
						  <td><div>admin</div></td>
						  <td><div>98</div></td>
						</tr>
						<tr  onmouseover="ew_MouseOver(this);" onmouseout="ew_MouseOut(this);">
						  <td><div>14</div></td>
						  <td><div>asd</div></td>
						  <td><div>asd</div></td>
						</tr> -->

					  </tbody>
					</table>
					</div>                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="4"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #d1d1d1;">
                  <tr>
                    <td height="30" bgcolor="#d1d1d1"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="73%" align="left"><span class="BoldTest">Summary</span></td>
                        <td width="27%"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/minimize.png" width="24" height="24" style="cursor:pointer;" alt="Minimize Menu" /></td>
                            <td align="center" valign="middle"><img src="{site_url}theme/images/close.png" width="24" height="24" style="cursor:pointer;" alt="Close Menu" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="160" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="4"></td>
              </tr>
           
            </table>
            <?php }?>
            <!-- End Right Column-->
            </td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td height="30" align="center" valign="middle" bgcolor="#D2D2D2"><a href="#">Contact Us</a> | <a href="#">Terms of Use</a> | <a href="#">Trademarks</a> | <a href="#">Privacy Statement</a><br />
           Copyright © 2009 ---. All Rights Reserved.</td>
        </tr>
    </table></td>
    <td background="{site_url}theme/images/liner-right.gif" style="background-repeat:repeat-y;"></td>
  </tr>
  <tr>
    <td width="8" height="8"><img src="{site_url}theme/images/corner-bottom-left.gif" width="8" height="8" alt=""></td>
    <td background="{site_url}theme/images/liner-bottom.gif"></td>
    <td width="12" height="8"><img src="{site_url}theme/images/corner-bottom-right.gif" width="8" height="8" alt=""></td>
  </tr>
</table>