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

<link rel="stylesheet" href="{site_url}theme/style.css" type="text/css" media="screen">

<!--[if lte IE 7]>
	<link rel="stylesheet" href="{site_url}theme/ie.css" type="text/css" media="screen" /><![endif]-->	
	<meta name='robots' content='noindex,nofollow' />

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


{extraHeadContent}

<script type=text/javascript>
var ICONPATH = '<?php echo base_url()."images/"; ?>';
var SITEURL = '<?php echo site_url(); ?>';
</script>


    <meta http-equiv="Content-Language" content="en-us">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

    <title>Welcome to RADII Solutions </title>



    <script type="text/javascript" src="{site_url}theme/js/script.js"></script>



    <link rel="stylesheet" href="{site_url}theme/style.css" type="text/css" media="screen" />



	<script type="text/javascript" src="{site_url}theme/js/stmenu.js"></script>

	<link rel="stylesheet" type="text/css" href="{site_url}theme/mouseovertabs.css" />

	<script src="{site_url}theme/js/mouseovertabs.js" type="text/javascript">

	</script>



	<script language="JavaScript">
<!--
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}

function FP_swapImgRestore() {//v1.0
 var doc=document,i; if(doc.$imgSwaps) { for(i=0;i<doc.$imgSwaps.length;i++) {
  var elm=doc.$imgSwaps[i]; if(elm) { elm.src=elm.$src; elm.$src=null; } } 
  doc.$imgSwaps=null; }
}
// -->
</script>


<!-- table div -->
<LINK href="{site_url}theme/eweb-style.css" rel="stylesheet" type="text/css">
<SCRIPT type="text/javascript" src="{site_url}theme/js/eweb-js.js"></SCRIPT>
<SCRIPT type="text/javascript">
<!--
var firstrowoffset = 1;
var lastrowoffset = 0;
var EW_LIST_TABLE_NAME = 'ewlistmain';
var rowclass = 'ewTableRow';
var rowaltclass = 'ewTableAltRow';
var rowmoverclass = 'ewTableHighlightRow';
var rowselectedclass = 'ewTableSelectRow';
var roweditclass = 'ewTableEditRow';
//-->
</SCRIPT>
<!-- end table div -->
<!-- tabs div-->
<script src="{site_url}theme/js/jquery-1.1.3.1.pack.js" type="text/javascript"></script>
<script src="{site_url}theme/js/jquery.history_remote.pack.js" type="text/javascript"></script>
<script src="{site_url}theme/js/jquery.tabs.pack.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$('#ShowTab').tabs({ fxSlide: true });
	});
</script>
<link rel="stylesheet" href="{site_url}theme/jquery.tabs.css" type="text/css" media="print, projection, screen">
<!-- tabs div -->

</head>

<body onload="FP_preloadImgs(/*url*/'file:///E:/Radii%20Project/28-03/lblack/images/homeover.png', /*url*/'file:///E:/Radii%20Project/28-03/lblack/images/accountover.png', /*url*/'file:///E:/Radii%20Project/28-03/lblack/images/searchover.png', /*url*/'file:///E:/Radii%20Project/28-03/lblack/images/minimize2.png', /*url*/'file:///E:/Radii%20Project/28-03/lblack/images/maximize2.png', /*url*/'file:///E:/Radii%20Project/28-03/lblack/images/close2.png', /*url*/'file:///E:/Radii%20Project/28-03/lblack/images/log_outover.png')">

<div id="art-page-background-simple-gradient">

    </div>

    
<div id="art-main"> 
  <div class="art-Sheet"> 
    <div class="art-Sheet-tl"></div>
    <div class="art-Sheet-tr"></div>
    <div class="art-Sheet-bl"></div>
    <div class="art-Sheet-br"></div>
    <div class="art-Sheet-tc"></div>
    <div class="art-Sheet-bc"></div>
    <div class="art-Sheet-cl"></div>
    <div class="art-Sheet-cr"></div>
    <div class="art-Sheet-cc"></div>
    <div class="art-Sheet-body">  
      <div class="art-Header"> <a href="javascript:void(0);" class="setLiquid"><span>SetPageWidth</span></a>
        <div class="art-Header-png"></div>
        <div class="art-Header-jpeg"></div>
        <div class="art-Logo" style="position: absolute; left: 602px; top: 116px; width: 242px"> 
		
          <table border="0" width="100%" cellspacing="1">
            <tr> 
              <td>&nbsp;</td>
              <td width="30"> <div align="center"><a title="Home" href="#"> <img border="0" src="{site_url}images/images/home.png" width="25" height="25" id="img1" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1',/*url*/'images/images/homeover.png')"></a></div></td>
              <td width="30"> <div align="center"><a title="My Account" href="#"> 
                  <img border="0" src="{site_url}images/images/account.png" width="25" height="25" id="img2" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img2',/*url*/'images/images/accountover.png')"></a></div></td>
              <td width="30"> <div align="center"><a title="Search" href="#"> 
                  <img border="0" src="{site_url}images/images/search.png" width="25" height="25" id="img3" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img3',/*url*/'images/images/searchover.png')"></a></div></td>
              <td width="30"> <div align="center"><a title="Logout" href="{site_url}index.php/logout"> 
                  <img border="0" src="{site_url}images/images/log_out.png" width="25" height="25" id="img19" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img19',/*url*/'images/images/log_outover.png')"></a></div></td>
            </tr>
          </table>
        </div>
      </div>
      <div> 
        <script type="text/javascript">

                        stm_bm(["{site_url}images/images/menu45ba",889,"","{site_url}images/images/blank.gif",0,"","",1,0,250,0,1000,1,0,0,"","875",0,0,1,2,"default","hand","",1,25],this);

						stm_bp("p0",[0,4,0,0,2,0,0,0,100,"",-2,"",-2,40,2,3,"#999999","transparent","{site_url}images/images/bluefireback14.gif",1,1,1,"#c1c1c1 #D1D1D1 #B4C8B4"]);

						stm_ai("p0i0",[1,"Our Company","","",-1,-1,0,"#","_self","","","","",0,0,0,"","",0,0,0,1,1,"#00CCFF",1,"#B5BED6",1,"","{site_url}images/images/bg5.gif",3,3,0,0,"#FFFFF7","#000000","#000000","#FFFFFF","9pt Verdana","9pt Verdana",0,0,"","{site_url}images/images/bg4.gif","","{site_url}images/images/bg6.gif",6,6,25],85,25);

						stm_aix("p0i1","p0i0",[0,"Our Services","","",-1,-1,0,"#","_self","","","","",0,0,0,"","",0,0,0,1,1,"#FFFFF7"],85,25);

						stm_aix("p0i2","p0i1",[0,"Site Plan"],85,25);

						stm_aix("p0i3","p0i1",[0,"Site Rollout"],85,25);

						stm_aix("p0i4","p0i1",[0,"Reports & Graph"],85,25);

						stm_aix("p0i5","p0i1",[0,"Contact Management System"],85,25);

						stm_aix("p0i6","p0i1",[0,"Career"],85,25);

						stm_aix("p0i7","p0i6",[0,"Contact Info"],85,25);

						stm_ep();

						stm_em();
   

						</script>
      </div>

  <div class="art-contentLayout">    




