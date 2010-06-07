<?php
$this->load->view('header');
?>
<div id="main-content">

<script type='text/javascript'>
				window.addEvent('load', function() {
				my_datepicker =	new DatePicker('.date_toggled', {
						pickerClass: 'datepicker_vista',
						inputOutputFormat: 'Y-m-d',
						allowEmpty: true,
						toggleElements: '.date_toggler' 
						
					 });
					 my_datepicker.attach('date_toggled');
					});
	        </script>  
<h1>{admin_title}</h1>
{admin_menu}

<h2>Person Management - Add</h2>
<form name="form1" method="post" action="add">
      <table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
        <input name="user_id" value="1" type="hidden">
        <input name="contact_id" value="1" type="hidden">
        <input name="dosql" value="do_user_aed" type="hidden">
        <input name="username_min_len" value="4)" type="hidden">
        <input name="password_min_len" value="4)" type="hidden">
        <tbody>
           <tr>
            <td align="right" valign="top" >Title:</td>
            <td>
			   <select name="title" size="1" class="text" id="title">
                 <option value="0" selected="selected">-- select Title --</option>
				 <?php
				 foreach($title as $value): ?>
     			<option value="" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
               </select>
			 </td>
			<td align="right" valign="top" >Job Title:</td>
            <td ><input name="job_title" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
		   <td colspan="4">
		     <table>
			   <tr>
				 <td align="right">First Name:</td>
				 <td><input class="text" name="firstname" value="" maxlength="50" type="text"></td>
				 <td align="right">Middle Name:</td>
				 <td><input class="text" name="middlename" value="" maxlength="50" type="text"></td>
				 <td align="right">Last Name:</td>
				 <td><input class="text" name="lastname" value="" maxlength="50" type="text"></td>
               </tr>
			 </table>
		   </td>
		  </tr>
		  <tr>
             <td colspan="4"><h4>Personal Info: </h4> </td>		  
		  </tr>
          <tr>
            <td align="right" valign="top" >Suffix:</td>
            <td><select name="suffix" size="1" class="text" id="suffix">
                <option value="0" selected="selected">-- select Suffix --</option>
                <?php foreach($suffix as $value): ?>
     			<option value=""  ><? echo $value['name'] ?></option>
				<?php endforeach; ?>
               </select>
			</td>
			<td align="right" valign="top">Anniversary:</td>
            <td><input name="anniversary" maxlength="20" size="20" value="" type="text" class='date date_toggled' style='display: inline'>
			 <img src='{site_url}images/calendar_icon.jpg' class='date_toggler' style='position: relative; top: 3px; margin-left: 4px;' height="20" alt="date picker" title="date_picker"/>  
		
			</td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Language:</td>
            <td><input name="language" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Hobby:</td>
            <td><input name="hobby" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Children:</td>
            <td><input name="children" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Spouse:</td>
            <td><input name="spouse" maxlength="45" size="45" value="" type="text"></td>
          </tr>
	       <tr>  
			<td align="right" valign="top">Birthday:</td>
            <td><input name="birthday" maxlength="20" size="20" value="" type="text" class='date date_toggled' style='display: inline'>
			 <img src='{site_url}images/calendar_icon.jpg' class='date_toggler' style='position: relative; top: 3px; margin-left: 4px;' height="20" alt="date picker" title="date_picker"/>  
			</td>
            <td>Gender:</td>
			<td>
              <select name="gender" id="gender" class="text" size="1" >
                <?php
				 foreach($gender as $value): ?>
     			<option value="" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
              </select>
            </td>
		  </tr>
		  <tr>  
			<td align="right" valign="top">Referred By:</td>
            <td><input name="referred_by" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Web Page:</td>
            <td><input name="web_page" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  
		  <tr>
            <td align="right" valign="top"> Company:</td>
            <td>
              <select name="company" size="1" class="text" id="company">
                <option value="0" selected="selected">-- select company --</option>
					<?php foreach($companies as $company): ?>
					<option value="<? echo $company['id'] ?>" ><? echo $company['name'] ?></option>
					<?php endforeach;?>
              </select>
            </td>
			<td align="right" valign="top">Department:</td>
            <td>
			   <select name="department" size="1" class="text" id="department">
                 <?php
				 foreach($department as $value): ?>
     			<option value="" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
               </select>
			</td>
          </tr>
		  
		  <tr>
             <td colspan="4"><h4> Business: </h4> </td>		  
		  </tr>
		  <tr>
            <td align="right" valign="top" >Street 1:</td>
            <td><input name="b_street1" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Street 2:</td>
            <td><input name="b_street2" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Street 3:</td>
            <td><input name="b_street3" maxlength="45" size="45" value="" type="text"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td align="right" valign="top" >City:</td>
            <td><select name="b_city" id="b_city" class="text" size="1" >
                <option value="0" selected="selected">-- select city --</option>   
				<?php
				 foreach($b_cities as $value): ?>
     			<option value="<? echo $value['name'] ?>" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
              </select></td>
            <td align="right" valign="top">State:</td>
            <td><input name="b_state" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Postal Code:</td>
            <td><input name="b_postal_code" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Country:</td>
            <td><input name="b_country" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Phone 1:</td>
            <td><input name="b_phone1" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Phone 2:</td>
            <td><input name="b_phone2" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Fax:</td>
            <td><input name="b_fax" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Buiseness Address POBox:</td>
            <td><input name="b_add_pobox" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  
		  <tr>
             <td colspan="4"><h4> Home:</h4> </td>		  
		  </tr>
		  <tr>
            <td align="right" valign="top" >Street 1:</td>
            <td><input name="h_street1" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Street 2:</td>
            <td><input name="h_street2" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Street 3:</td>
            <td><input name="h_street3" maxlength="45" size="45" value="" type="text"></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		  <tr>
            <td align="right" valign="top" >City:</td>
            <td><select name="h_city" id="h_city" class="text" size="1" >
                <option value="0" selected="selected">-- select city --</option>   
				<?php
				 foreach($h_cities as $value): ?>
     			<option value="<? echo $value['name'] ?>" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
              </select></td>
            <td align="right" valign="top">State:</td>
            <td><input name="h_state" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Postal Code:</td>
            <td><input name="h_postal_code" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Country:</td>
            <td><input name="h_country" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Phone 1:</td>
            <td><input name="h_phone1" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Phone 2:</td>
            <td><input name="h_phone2" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Fax:</td>
            <td><input name="h_fax" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Home Address POBox:</td>
            <td colspan="3"><input name="h_add_pobox" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  
		  <tr>
             <td colspan="4"><h4> Other:</h4> </td>		  
		  </tr>
		  <tr>
            <td align="right" valign="top" >Street 1:</td>
            <td><input name="o_street1" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Street 2:</td>
            <td><input name="o_street2" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Street 3:</td>
            <td><input name="o_street3" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Other Address POBox:</td>
            <td colspan="3"><input name="o_add_pobox" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >City:</td>
            <td><select name="o_city" id="o_city" class="text" size="1" >
                <option value="0" selected="selected">-- select city --</option>   
				<?php
				 foreach($o_cities as $value): ?>
     			<option value="<? echo $value['name'] ?>" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
              </select></td>
            <td align="right" valign="top">State:</td>
            <td><input name="o_state" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Postal Code:</td>
            <td><input name="o_postal_code" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Country:</td>
            <td><input name="o_country" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >Phone:</td>
            <td><input name="o_phone1" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Fax:</td>
            <td><input name="o_fax" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
		  <td colspan="4">&nbsp;</td>
		  </tr>
		  <tr>
            <td align="right" valign="top" >Assistant's Phone:</td>
            <td><input name="assisstant_phone" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Assistant's Name:</td>
            <td><input name="assisstant_name" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  
		  <tr>
            <td align="right" valign="top" >Call Back:</td>
            <td><input name="call_back" maxlength="45" size="45" value="" type="text"></td>  
			<td align="right" valign="top">Car Phone:</td>
            <td><input name="car_phone" maxlength="45" size="45" value="" type="text"></td>
          </tr>
          <tr>  
			<td align="right" valign="top">Primary Phone:</td>
            <td><input name="primary_phone" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Radio Phone:</td>
            <td><input name="radio_phone" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">TTYTDD Phone:</td>
            <td><input name="ttytdd_phone" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Mobile Phone:</td>
            <td><input name="mobile_phone" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">ISDN:</td>
            <td><input name="isdn" maxlength="45" size="45" value="" type="text"></td>  
			<td align="right" valign="top">Pager:</td>
            <td><input name="pager" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Telex:</td>
            <td><input name="telex" maxlength="45" size="45" value="" type="text"></td>  
			<td align="right" valign="top">Account:</td>
            <td><input name="account" maxlength="45" size="45" value="" type="text"></td>
          </tr>

		  <tr>  
			<td align="right" valign="top">Directory Server:</td>
            <td colspan="3"><input name="dir_server" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Government ID Number:</td>
            <td><input name="gov_id_no" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Organizational ID Number:</td>
            <td><input name="org_id_no" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Keywords:</td>
            <td><input name="keywords" maxlength="45" size="45" value="" type="text"></td>  
			<td align="right" valign="top">Initials:</td>
            <td><input name="initials" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Manager's Name:</td>
            <td colspan="3"><input name="manager_name" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Internet Free Busy:</td>
            <td colspan="3"><input name="int_free_busy" maxlength="45" size="45" value="" type="text"></td>
          </tr>

		  <tr>  
			<td align="right" valign="top">Priority:</td>
            <td>
			 <select name="priority" id="priority" class="text" size="1" >
                <?php
				 foreach($priority as $value): ?>
     			<option value="" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
              </select>
			</td> 
			<td align="right" valign="top">Private:</td>
            <td>
			   <input type="radio" name="private" value="1"> Yes
               <input type="radio" name="private" value="0" checked> No 
			</td>
          </tr>
		  <tr>
			<td align="right" valign="top">Billing Information:</td>
            <td><input name="billing_info" maxlength="45" size="45" value="" type="text"></td>  
			<td align="right" valign="top">Location:</td>
            <td><input name="location" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Profession:</td>
            <td><input name="profession" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Office Location:</td>
            <td><input name="office_location" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>  
			<td align="right" valign="top">Mileage:</td>
            <td><input name="mileage" maxlength="45" size="45" value="" type="text"></td> 
			<td align="right" valign="top">Sensitivity:</td>
            <td>
			 <select name="sensitivity" id="sensitivity" class="text" size="1" >
                <?php
				 foreach($sensitivity as $value): ?>
     			<option value="" ><? echo $value['name'] ?></option>
				<?php endforeach;?>
              </select>
			</td>
          </tr>
		  
		  <tr>
		   <td>1:</td>
		   <td colspan="3">
		     <table>
			   <tr>
				 <td align="right">Email Address:</td>
				 <td><input class="text" name="email1_add" value="" maxlength="50" type="text"></td>
				 <td align="right">Email Type:</td>
				 <td><input class="text" name="email1_type" value="" maxlength="50" type="text"></td>
				 <td align="right">Email Display Name:</td>
				 <td><input class="text" name="email1_name" value="" maxlength="50" type="text"></td>
               </tr>
			 </table>
		   </td>
		  </tr>
		  <tr>
		   <td>2:</td>
		   <td colspan="3">
		     <table>
			   <tr>
				 <td align="right">Email Address:</td>
				 <td><input class="text" name="email2_add" value="" maxlength="50" type="text"></td>
				 <td align="right">Email Type:</td>
				 <td><input class="text" name="email2_type" value="" maxlength="50" type="text"></td>
				 <td align="right">Email Display Name:</td>
				 <td><input class="text" name="email2_name" value="" maxlength="50" type="text"></td>
               </tr>
			 </table>
		   </td>
		  </tr>
		  <tr>
		   <td>3:</td>
		   <td colspan="3">
		     <table>
			   <tr>
				 <td align="right">Email Address:</td>
				 <td><input class="text" name="email3_add" value="" maxlength="50" type="text"></td>
				 <td align="right">Email Type:</td>
				 <td><input class="text" name="email3_type" value="" maxlength="50" type="text"></td>
				 <td align="right">Email Display Name:</td>
				 <td><input class="text" name="email3_name" value="" maxlength="50" type="text"></td>
               </tr>
			 </table>
		   </td>
		  </tr>
		  <tr>
            <td align="right" valign="top">Notes:</td>
            <td colspan="3"><textarea class="text" cols="50" name="notes" style="height: 50px;"></textarea></td>
          </tr>
		  
          <tr>
            <td align="right" valign="top">Email Signature:</td>
            <td colspan="3"><textarea class="text" cols="50" name="email_signature" style="height: 50px;"></textarea></td>
          </tr>
          <tr>
            <td align="right" valign="top" >Valid From:</td>
            <td><input name="valid_from" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">Valid Untill:</td>
            <td><input name="valid_untill" maxlength="45" size="45" value="" type="text"></td>
          </tr>

          <tr>
            <td align="right">Is user?</td>
            <td><input name="is_user" type="checkbox" id="is_user" value="1" onChange="adjust_form()"></td>
            <td align="right"> User Group:</td>
            <td>
              <select name="group_id" id="group_id" class="text" size="1" >
                <option value="0" selected="selected">-- select group --</option>   
				<?php foreach($groups as $group): ?>
				<option value="<? echo $group['id'] ?>" ><? echo $group['name'] ?></option>
				<?php endforeach;?>
              </select>
            </td>
          </tr>		  
		  <tr>
            <td align="right">* Email:</td>
            <td><input class="text" name="email" value="" maxlength="255" size="40" type="text"></td>
            <td align="right" width="230">* Login ID:</td>
            <td><input class="text" name="login" id="login" value="" disabled></td>
          </tr>
          
		  <tr>
            <td align="right">* Password:</td>
            <td><input class="text" name="password" id="password" value="" maxlength="32" size="32" type="password" disabled> </td>
            <td align="right">* Confirm Password:</td>
            <td><input class="text" name="password_check" id="password_check" value="" maxlength="32" size="32" type="password" disabled></td>
          </tr>

		  <tr>
            <td align="right" valign="top" >User 1:</td>
            <td><input name="user_1" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">User 2:</td>
            <td><input name="user_2" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" valign="top" >User 3:</td>
            <td><input name="user_3" maxlength="45" size="45" value="" type="text"></td>
            <td align="right" valign="top">User 4:</td>
            <td><input name="user_4" maxlength="45" size="45" value="" type="text"></td>
          </tr>
		  <tr>
            <td align="right" colspan="4">* Required Fields</td>
          </tr>
          
		  <tr>
            <td align="left">
              <input name="button" type="button" class="button" onclick="javascript:history.back(-1);" value="back">
            </td>
            <td align="right" colspan="3">
              <input name="Submit" type="submit" class="button"  value="submit">
              <script language="javascript">
				function adjust_form()
				{				
				if(document.getElementById('is_user').checked)	
					{
						document.getElementById('login').disabled = false;
						document.getElementById('group').disabled = false;
						document.getElementById('password').disabled = false;
						document.getElementById('password_check').disabled = false;
					}else{
						document.getElementById('login').disabled = true;
						document.getElementById('group').disabled = true;
						document.getElementById('password').disabled = true;
						document.getElementById('password_check').disabled = true;
					}
				}
           </script>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
</div>
<?php
$this->load->view('footer');
?>