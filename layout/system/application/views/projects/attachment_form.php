<?php echo form_open_multipart("projects/do_upload");?>
<div id="success" ></div>
<input type="hidden" name='id' value=<?php echo $this->uri->segment(3); ?> />
<input type="hidden" name='stage_id' value=<?php echo $this->uri->segment(4); ?> />
<input type="hidden" name="file_info" value="" id="name"/>
File attached On:<input type="text" value="<?php echo date('Y-m-d'); ?>" name="attached_on"/>
<br>
Is Active :<select xml:lang="en" dir="ltr" name="is_active" id="is_active">
		<option value="1"  selected="yes">Yes</option>
		<option value="0" >No</option>
	
	</select>
	<br>
Attach File :<input type="file" name="userfile" size="20" id="userfile"/>

<br /><br />
<link href="http://site.com/css/printer.css" rel="stylesheet" type="text/css" media="print" />
<?php if($this->session->userdata('is_admin')) { ?>
<input type="submit" value="upload" name="submit"/>
<?php } ?>
	    <div id="target">
        
        </div>
</form>