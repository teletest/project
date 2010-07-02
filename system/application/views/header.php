<?php
header('HTTP/1.0 200 OK');
header('Content-Type: text/html; Charset=UTF-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>{title}</title>
	
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="{site_url}theme/js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="{site_url}theme/js/fusion.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
<script type="text/javascript" src="{site_url}theme/js/confirm.js"></script>
<!-- validation jquery -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script>
<link rel="stylesheet" href="{site_url}theme/style.css" type="text/css" media="screen">
<!-- LyteBox Script -->

<script type="text/javascript" src="{site_url}/lytebox/js/lytebox.js"></script>
<link rel="stylesheet" href="{site_url}/lytebox/css/lytebox.css" type="text/css" media="screen">

<!-- End LyteBox Script -->
<!--[if lte IE 7]>
	<link rel="stylesheet" href="{site_url}theme/ie.css" type="text/css" media="screen" /><![endif]-->	
	<meta name='robots' content='noindex,nofollow' />

<!-- change default alert box -->
<!--<script src="{site_url}theme/alertbox/js/mootools.js" type="text/javascript"></script>
<script src="{site_url}theme/alertbox/js/stylishalertbox.v1.js" type="text/javascript"></script>
<script src="{site_url}theme/alertbox/js/stylishalertbox.packed.js" type="text/javascript"></script>
<link rel="stylesheet" href="{site_url}theme/alertbox/stylishalertbox.css" type="text/css" media="all" />
<link rel="stylesheet" href="{site_url}theme/alertbox/global.css" type="text/css" media="all" /> -->
<!-- end change alert box -->	

<!-- calendar icon -->
<!--<base href="http://www.monkeyphysics.com/" /> -->
<link rel="stylesheet" href="{site_url}theme/calendar.css" type="text/css" />
<script type="text/javascript"  src='http://ajax.googleapis.com/ajax/libs/mootools/1.2.3/mootools.js'></script> 
<script type="text/javascript" src='http://ajax.googleapis.com/ajax/libs/mootools/1.2.3/mootools-yui-compressed.js'></script> 
<script type="text/javascript" src="{site_url}theme/js/live_validation.js" charset="utf-8"></script>
<script src="{site_url}theme/js/calendar.js" type="text/javascript" charset="utf-8"></script> 
<script src="{site_url}theme/js/datepicker.js" type="text/javascript" charset="utf-8"></script> 

<!-- end calendar icon -->

<!-- js expand -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{site_url}theme/js/jExpand.js"></script>
<link rel="stylesheet" href="{site_url}theme/js_expand.css" type="text/css" media="screen">
<!-- end js expand -->

<!-- slide up down div script -->
<script type="text/javascript" src="{site_url}theme/js/slide_up_down.js"></script>
<link rel="stylesheet" href="{site_url}theme/slide_up_down.css" type="text/css" media="screen">
<!-- end slide up down div script -->

<!-- zebra filtering script -->
<link rel="stylesheet" href="{site_url}theme/zebra_filter.css" type="text/css" media="screen" charset="utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script> 
<script src="{site_url}theme/js/zebra_filter.js" type="text/javascript" charset="utf-8"></script> 
<!-- end zebra filtering script -->
          
<script src="{site_url}theme/js/select_all.js" type="text/javascript" charset="utf-8"></script>           
<script src="{site_url}theme/js/FusionCharts.js" type="text/javascript" charset="utf-8"></script> 
<script src="{site_url}theme/js/scroll_to_div.js" type="text/javascript" charset="utf-8"></script>      

<!-- uploadify -->
<link href="{site_url}theme/default.css" rel="stylesheet" type="text/css" />
<link href="{site_url}theme/uploadify.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{site_url}theme/js/uploadify/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="{site_url}theme/js/uploadify/swfobject.js"></script>
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" src="{site_url}theme/js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
	$("#userfile").uploadify({
		uploader       : '{site_url}theme/js/uploadify/uploadify.swf',
		script         : '{site_url}theme/js/uploadify/uploadify.php',
		cancelImg      : '{site_url}images/cancel.png',
		folder         : '/uploads',
		scriptAccess: 'always',
		auto           : true,
		multi          : true,
		
		'onError' : function (a, b, c, d) {
								 if (d.status == 404)
									alert('Could not find upload script.');
								 else if (d.type === "HTTP")
									alert('error '+d.type+": "+d.status);
								 else if (d.type ==="File Size")
									alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
								 else
									alert('error '+d.type+": "+d.text);
								},
							'onComplete'   : function (event, queueID, fileObj, response, data) {
												//Post response back to controller
												$.post('<?php echo site_url('upload/uploadify');?>',{filearray: response},function(info){
													$("#target").append("<input type='hidden' name='name' value='" +response+ "' />");  //Add response returned by controller																		  
												 $('#name').val(response);
												$("#success").empty(this).append("<h3>Image Successfully Uploaded</h3>"); //clears browse button, replaces with success message
  
												});								 			
							}
	});
});
</script>
</head>
<!-- end uploadify -->
{extraHeadContent}

</head>

<!--<body onload="document.getElementById('showplan').scrollTop =600;">-->
<body >
  <div id="page-wrap1">
    <div id="page-wrap2">
      <!-- page (actual site content, custom width) -->
      <div id="page">

        <!-- main wrapper (big left column) -->
        <div id="main-wrap">
          <!-- main (container) -->
          <div id="main" class="with-sidebar">
            <!-- header -->
            <div id="header">

              <div id="topnav" class="description">{site_moto}</div>
               <h1 id="title"><a href="{site_url}">{site_name}</a></h1>
			
			  <div id="tabs">
				<ul>
				{tabs}
				<li{class}><a href="{tab_url}"><span><span>{tab_title}</span></span></a></li>
				{/tabs}
				</ul>
				
				<div id ="breadcrumbs" >
				  <span> 
					<?php  if(isset($breadcrumbs)): ?>
						{breadcrumbs}
					<?php  endif;?>
				 </span> 
				</div>
			  </div>



            </div><!-- /header -->

			<p>{message}</p>

            <br>

            <br>





