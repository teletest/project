function scrollWin(){
$('html, body').animate({
scrollTop: $("#showplan").offset().top
}, 2000); alert($("#showplan").offset().top);
}