<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$this->load->view('header-new');
?>
<h2>{page_title}</h2>
<p class="error"><?php // echo $this->lang->line('login_password_reconfirm');?></p>
<?php  $this->load->view('login/change_pswd_form');?>
<ul>
<li><?php echo $this->lang->line('login_caps_lock');?></li>
</ul>

<?php
$this->load->view('footer-new');
?>