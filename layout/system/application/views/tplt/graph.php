<?php $this->load->view('header'); ?>

<div id="main-content">

<h1>Project Graph</h1>
<div style="float:left">
<? $this->load->view('projects/image_menu.php'); ?>
</div>
<div style="float:left;margin-left:20px;">

<?php
$this->load->view('projects/search_form');
?>

<?php echo anchor('projects/summary','Summary'); ?> | <?php echo anchor('projects/graph','Graph'); ?>

<script type="text/javascript" src="{site_url}amline/swfobject.js"></script>
 
	<div id="c1">
		<strong>You need to upgrade your Flash Player</strong>
	</div>
	<script type="text/javascript">
		// <![CDATA[		
		var so = new SWFObject("{site_url}amline/amline.swf", "amline", "620", "400", "8", "#FFFFFF");
		so.addVariable("path", "{site_url}amline/");
  		so.addVariable("chart_data", encodeURIComponent("<chart><series>{series}<value xid='{detail_id}'>{detail_id}</value>{/series}</series><graphs><graph gid='0' title='Macro'>{macros}<value xid='{detail_id}'>{macro}</value>{/macros}</graph><graph gid='1' title='Micro'>{micros}<value xid='{detail_id}'>{micro}</value>{/micros}</graph></graphs></chart>"));
   		so.addVariable("chart_settings", encodeURIComponent("<settings><background><color>#FFFFFF,#FF9E01</color><alpha>75</alpha></background><labels><label><y>24</y><width>620</width><align>center</align><text><![CDATA[<b>Sites Status</b>]]></text></label></labels></settings>"));	
		so.write("c1");
		// ]]>
	</script>

</div>


</div>

<?php $this->load->view('footer'); ?>