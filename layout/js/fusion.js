

// cookie functions http://www.quirksmode.org/js/cookies.html
function createCookie(name,value,days)
{
	if (days)
	{
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name)
{
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name)
{
	createCookie(name,"",-1);
}
// /cookie functions

// style switch: liquid <> fixed
function setPagewidth(){

  	var currentWidth = $('.art-Sheet').css('width');
	
   //	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    if (currentWidth=="95%") 
	{
	 newWidth = "900px";
	 hNetwidth = "874px";
	}
    else if (currentWidth=="900px")
	{
	 newWidth = "95%";
	 hNetwidth = "2000px";
    }
	else
	{
	 newWidth = "900px";
	 hNetwidth = "874px";
	}
	$('.art-Sheet').css('width', newWidth);
	
	//var hnetWidth = netWidth-27;
	//alert(hnetWidth)
	//$('.art-Footer').css('width', hNetwidth);
	//$('.art-Footer-background').css('width', hNetwidth);
	

  createCookie('pageWidth', newWidth, 365);
}

$(document).ready(function(){
 // switch styles, if needed


  $('.setLiquid').click(function(){
    setPagewidth();
    return false;
  });
  var c = readCookie('pageWidth');
  if (c) { $('.art-Sheet').css('width', c);
  
  }

});