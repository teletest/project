<?php
$this->load->view('header');
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>




<div id="main-content">

<h1>{admin_title}</h1>
{admin_menu}

	<h2>Group Management - Add</h2>


<form action="" method="post" name="editFrm" onSubmit="MM_validateForm('id','','R','name','','R');return document.MM_returnValue">

<table class="std" border="0" cellpadding="0" cellspacing="1" width="100%">
<tbody>

<tr>
    <td align="right"> Group Name:</td>
    <td colspan="3"><input class="text" name="name" value="" maxlength="255" size="50" type="text"> </td>
</tr>
<tr>
  <td align="right">Is Active?:</td>
  <td colspan="3"><input class="checkbox" name="isactive" type="checkbox"></td>
</tr>
<!--<tr>
  <td colspan="4" align="center"><strong>Components Association : </strong></td>
  </tr>

<tr>
  <td align="right">&nbsp;</td>
  <td>&nbsp;</td>
  <td><strong>Component Name </strong></td>
  <td><strong>Type</strong></td>
</tr>
{components}
<tr>
    <td align="right">&nbsp;</td>
    <td width="3%"><input type="checkbox" name="comp[]" value="{id}"></td>
    <td width="37%">{name}</td>
    <td width="25%">{type}</td>
</tr> 
{/components}
-->
</tbody></table>

<input value="back" onclick="javascript:history.back(-1);" class="button" type="button" /> <input name="submit" value="submit" class="button" type="submit" />
</form>










</div>


<?php
$this->load->view('footer');
?>