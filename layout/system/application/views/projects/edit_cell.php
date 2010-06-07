<!--<div style="float:left;margin-left:20px;">
<style type="text/css">
.small {
	font-weight: bold; 
	/*font-size: xx-small;*/
}

		.highlighted { background: yellow; }
span + span .highlighted { background: magenta; }
form.filter + table { border: solid thin #aaa; }
form.filter + table th { margin: 2px; padding: 2px; border: solid thin #bbb; }
form.filter + table td { margin: 2px; padding: 2px; border: solid thin #ccc; }

</style>

<script type="text/javascript">  
          jQuery( function() {
		   //$(document).ready(function(){
		    $('#datamain').load( function(){
 		    //$('#datamain').contents().find("input[@name='cells']").click(function () {  
			$('#datamain').contents().find('.checkBox').click(function () {   
             //$('.checkBox').click(function () {
			
			 $(".cells").each( function () {  
			 //$('input:checkbox').each( function() {
              if($(this).is(':checked')){
			   $('#idivSlide').slideDown("slow");  
			  }
			  else{
			   $('#divSlide').slideUp("slow");
			  }
			 })
            });
		  });
		 });
       </script>

<br>
<br>
<h2>Nominal Plan</h2>
<iframe id="datamain" src="{site_url}index.php/projects/iframe_view/{plan_id}/1"  width=1000 height=550 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=1 scrolling=yes>
</iframe>

<layer visibility=hide>
<div style="width:100%;" align="right">
<a href="#" onMouseover="scrollspeed=-2" onMouseout="scrollspeed=0">Up</a> | <a href="#" 
onMouseover="scrollspeed=2" onMouseout="scrollspeed=0">Down</a> 
</div>
</layer> 


</div> -->
<form method="post" action="{site_url}index.php/projects/edit_cell_plan/{nominal_plan_id}" id="myForm" >
<input type="hidden" name="nominal_plan_id" value="{nominal_plan_id}" />
Search by Site ID   : <input name="s" value="" /> 
<input type="button" id="b1" name="b1" value="Search" onclick="this.form.submit();" />
</form>
