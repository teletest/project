
<?php
$this->load->view('header');
?>

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
<div class="art-contentLayout"> 


<div style="float:left">
<?php
$this->load->view('sidebar');
?>
</div>
<div style="float:left;margin-left:20px;">

<h3>Event Detais</h3>
<form name="addFrm" action="{site_url}index.php/projects/calendar_edited" method="post" >	
<table cellspacing="2" cellpadding="2" border="0" width="100%">
	
	<tr>
	    <th> Select </th>
		<th> Event </th>
		<th> Date </th>
	</tr>
	 <tr>
		<td colspan="3"><span style="color:red;"><?php echo form_error('id[]'); ?></span></td>
     </tr>
	 <tr>
        <td colspan="3"><span style="color:red;"><?php echo form_error('definition[]'); ?></span></td>	 
	 </tr>
	{event_details}
	<input type="hidden" name="calendar_id" value="{calendar_id}" >
	
	<tr>
	    <td valign="top" heitght="20"><input type="checkbox" name="id[]" value="{id}" <?php //echo set_checkbox('id[]', '{id}'); ?> /></td>
		<input type="hidden" name="ch[]" value="{ch}" >
		<td valign="top" heitght="20"><input type="text"  value="{definition}" name="definition[{id}]" maxlength="50" /></td>
		<td valign="top" heitght="20"><input name='date_toggled[{id}]' type='text' value='{on_date}' class='date date_toggled' style='display: inline' />
           <img src='{site_url}images/calendar_icon.jpg' class='date_toggler' style='position: relative; top: 3px; margin-left: 4px;' height="20" alt="date picker" title="date_picker"/>  
		</td>
	</tr>
	{/event_details}
	<tr>
    <td align="left">
        <input value="back" onclick="javascript:history.back(-1);" class="button" type="button" />
    </td>
    <td colspan="2" align="right">
			<input value="submit"  type="button" onclick="this.form.submit();" />
    </td>
    </tr>
     
</table>
</form>


</div>

<?php
$this->load->view('footer');
?>
