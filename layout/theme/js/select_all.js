function checkAll(field, value) { 
for (var i=0;i<document.forms[1].elements[field].length;i++) { 
	if(value == 1) { 
	
	document.forms[1].elements[field][i].checked = true 
	} else { 
	document.forms[1].elements[field][i].checked = false 
	} 
  } 
} 




checked=false;
function checkedAll(frm1) {
	var aa= document.getElementById('frm1');
	 if (checked == false)
     {
           checked = true
     }
     else
     {
          checked = false
     }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
}
