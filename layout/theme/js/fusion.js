

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

  	var currentWidth = $('#page').css('width');
   //	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    if (currentWidth=="95%") newWidth = "960px";
    else if (currentWidth=="960px") newWidth = "95%";
    else newWidth = "960px";
	$('#page').css('width', newWidth);

  createCookie('pageWidth', newWidth, 365);
}

$(document).ready(function(){
 // switch styles, if needed


  $('.setLiquid').click(function(){
    setPagewidth();
    return false;
  });
  var c = readCookie('pageWidth');
  if (c) $('#page').css('width', c);

});