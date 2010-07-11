// JavaScript for ASPMaker 6+
//(C) 2001-2007 e.World Technology Ltd.

// Include another client script
function ew_ClientScriptInclude(path) {
	document.write('<' + 'script');
	document.write(' language="JavaScript"');
	document.write(' type="text/javascript"');
	document.write(' src="' + path + '">');
	document.write('</' + 'script' + '>');
}

// Handle search operator changed
function ew_SrchOprChanged(elem) {
	var f = elem.form;
	var isBetween = (elem.options[elem.selectedIndex].value == "BETWEEN");
	if (isBetween) {
		var v = f.elements["v_" + elem.name.substr(2)];
		if (v[0]) {
			for (var i=0; i<v.length; i++) {
				if (v[i].type == "radio" && v[i].value == "AND") {
					v[i].checked = true;
					break;
				}
			}
		} else if (v) {
			if (v.type == "radio" && v.value == "AND") v.checked = true;
		}
	}
	var _v = document.getElementById("_v_" + elem.name.substr(2));
	if (_v) _v.style.display = (isBetween) ? "none" : "";
	var _w = document.getElementById("_w_" + elem.name.substr(2));
	if (_w) _w.style.display = (isBetween) ? "none" : "";
}

// DHTML editor
function ew_DHTMLEditor(name) {
	this.name = name;
	this.create = function() { this.active = true; }
	this.editor = null;
	this.active = false;
}

// Create DHTML editor
function ew_CreateEditor(name) {
	if (typeof ew_DHTMLEditors == 'undefined')
		return;
	for (var i = 0; i < ew_DHTMLEditors.length; i++) {
		var ed = ew_DHTMLEditors[i];
		var cr = !ed.active;
		if (name) cr = cr && ed.name == name;
		if (cr) {
			if (typeof ed.create == 'function')
				ed.create();
			if (name)
				break;
		}
	}
}

// Submit form
function ew_SubmitForm(form_object) {
	if (typeof ew_UpdateTextArea == 'function')
		ew_UpdateTextArea();
	if (ew_ValidateForm(form_object))
		form_object.submit();
}

// Remove spaces
function ew_RemoveSpaces(value) {
	str = value.replace(/^\s*|\s*$/g, "");
	str = str.toLowerCase();
	if (str == "<p />" || str == "<p/>" || str == "<p>" ||
		str == "<br />" || str == "<br/>" || str == "<br>" ||
		str == "&nbsp;" || str == "<p>&nbsp;</p>")
		return ""
	else
		return value;
}

// Check if hidden text area
function ew_IsHiddenTextArea(input_object) {
	return (input_object && input_object.type && input_object.type == "textarea" &&
		input_object.style && input_object.style.display &&
		input_object.style.display == "none");
}

// Set focus
function ew_SetFocus(input_object) {
	if (!input_object || ew_IsHiddenTextArea(input_object))
		return;
	input_object = (!input_object.type && input_object[0]) ? input_object[0] : input_object;
	var type = input_object.type;
	if (type != "hidden")
		input_object.focus();
	if (type == "text" || type == "password" || type == "textarea" || type == "file")
		input_object.select();
}

// Process validate error
function ew_OnError(input_object, error_message) {
	alert(error_message);
	if (typeof ew_GotoPageByElement != 'undefined') // check if multi-page
		ew_GotoPageByElement(input_object);
	ew_SetFocus(input_object);
	return false;
}

// Check if object has value
function ew_HasValue(obj) {
	if (!obj)
		return true;
	var type = (!obj.type && obj[0]) ? obj[0].type : obj.type;
	if (type == "text" || type == "password" || type == "textarea" ||
		type == "file" || type == "hidden") {
		return (obj.value.length != 0);
	} else if (type == "select-one") {
		return (obj.selectedIndex > 0);
	} else if (type == "select-multiple") {
		return (obj.selectedIndex > -1);
	} else if (type == "checkbox") {
		if (obj[0]) {
			for (var i=0; i < obj.length; i++) {
				if (obj[i].checked)
				return true;
			}
			return false;
		}
	} else if (type == "radio") {
		if (obj[0]) {
			for (var i=0; i < obj.length; i++) {
				if (obj[i].checked)
				return true;
			}
			return false;
		} else {
			return obj.checked;
		}
	}
	return true;
}

// Check US Date format (mm/dd/yyyy)
function ew_CheckUSDate(object_value) {
	if (object_value.length == 0)
		return true;
	
	isplit = object_value.indexOf(EW_DATE_SEPARATOR); // Split by date separator
	
	if (isplit == -1 || isplit == object_value.length)
		return false;
	
	sMonth = object_value.substring(0, isplit);
	
	if (sMonth.length == 0)
		return false;
	
	isplit = object_value.indexOf(EW_DATE_SEPARATOR, isplit + 1); // Split by date separator
	
	if (isplit == -1 || (isplit + 1 ) == object_value.length)
		return false;
	
	sDay = object_value.substring((sMonth.length + 1), isplit);
	
	if (sDay.length == 0)
		return false;
	
	isep = object_value.indexOf(' ', isplit + 1); 
	if (isep == -1) {
		sYear = object_value.substring(isplit + 1);
	} else {
		sYear = object_value.substring(isplit + 1, isep);
		sTime = object_value.substring(isep + 1);
		if (!ew_CheckTime(sTime)) // Check time
			return false; 
	}
	
	if (!ew_CheckInteger(sMonth))
		return false;
	else if (!ew_CheckRange(sMonth, 1, 12))
		return false;
	else if (!ew_CheckInteger(sYear))
		return false;
	else if (!ew_CheckRange(sYear, 0, 9999))
		return false;
	else if (!ew_CheckInteger(sDay))
		return false;
	else if (!ew_CheckDay(sYear, sMonth, sDay))
		return false;
	else
		return true;
}

// Check Date format (yyyy/mm/dd)
function ew_CheckDate(object_value) {
	if (object_value.length == 0)
		return true;

	isplit = object_value.indexOf(EW_DATE_SEPARATOR); // Split by date separator

	if (isplit == -1 || isplit == object_value.length)
		return false;

	sYear = object_value.substring(0, isplit);

	isplit = object_value.indexOf(EW_DATE_SEPARATOR, isplit + 1); // Split by date separator

	if (isplit == -1 || (isplit + 1 ) == object_value.length)
		return false;
	
	sMonth = object_value.substring((sYear.length + 1), isplit);
	
	if (sMonth.length == 0)
		return false;
	
	isep = object_value.indexOf(' ', isplit + 1); 
	if (isep == -1) {
		sDay = object_value.substring(isplit + 1);
	} else {
		sDay = object_value.substring(isplit + 1, isep);
		sTime = object_value.substring(isep + 1);
		if (!ew_CheckTime(sTime)) // Check time
			return false; 
	}
	
	if (sDay.length == 0)
		return false;
	
	if (!ew_CheckInteger(sMonth))
		return false;
	else if (!ew_CheckRange(sMonth, 1, 12))
		return false;
	else if (!ew_CheckInteger(sYear))
		return false;
	else if (!ew_CheckRange(sYear, 0, 9999))
		return false;
	else if (!ew_CheckInteger(sDay))
		return false;
	else if (!ew_CheckDay(sYear, sMonth, sDay))
		return false;
	else
		return true;
}

// Check Euro Date format (dd/mm/yyyy)
function ew_CheckEuroDate(object_value) {
	if (object_value.length == 0)
	  return true;
	
	isplit = object_value.indexOf(EW_DATE_SEPARATOR); // Split by date separator
	
	if (isplit == -1 || isplit == object_value.length)
		return false;
	
	sDay = object_value.substring(0, isplit);
	
	monthSplit = isplit + 1;
	
	isplit = object_value.indexOf(EW_DATE_SEPARATOR, monthSplit); // Split by date separator
	
	if (isplit == -1 ||  (isplit + 1 )  == object_value.length)
		return false;
	
	sMonth = object_value.substring((sDay.length + 1), isplit);
	
	isep = object_value.indexOf(' ', isplit + 1); 
	if (isep == -1) {
		sYear = object_value.substring(isplit + 1);
	} else {
		sYear = object_value.substring(isplit + 1, isep);
		sTime = object_value.substring(isep + 1);
		if (!ew_CheckTime(sTime))
			return false; 
	}
	
	if (!ew_CheckInteger(sMonth))
		return false;
	else if (!ew_CheckRange(sMonth, 1, 12))
		return false;
	else if (!ew_CheckInteger(sYear))
		return false;
	else if (!ew_CheckRange(sYear, 0, null))
		return false;
	else if (!ew_CheckInteger(sDay))
		return false;
	else if (!ew_CheckDay(sYear, sMonth, sDay))
		return false;
	else
		return true;
}

// Check day
function ew_CheckDay(checkYear, checkMonth, checkDay) {
	maxDay = 31;
	
	if (checkMonth == 4 || checkMonth == 6 ||	checkMonth == 9 || checkMonth == 11) {
		maxDay = 30;
	} else if (checkMonth == 2)	{
		if (checkYear % 4 > 0)
			maxDay =28;
		else if (checkYear % 100 == 0 && checkYear % 400 > 0)
			maxDay = 28;
		else
			maxDay = 29;
	}
	
	return ew_CheckRange(checkDay, 1, maxDay);
}

// Check integer
function ew_CheckInteger(object_value) {
	if (object_value.length == 0)
		return true;
	
	var decimal_format = ".";
	var check_char;
	
	check_char = object_value.indexOf(decimal_format);
	if (check_char < 1)
		return ew_CheckNumber(object_value);
	else
		return false;
}

// Check number range
function ew_NumberRange(object_value, min_value, max_value) {
	if (min_value != null) {
		if (object_value < min_value)
			return false;
	}

	if (max_value != null) {
		if (object_value > max_value)
			return false;
	}
	
	return true;
}

// Check number
function ew_CheckNumber(object_value) {
	if (object_value.length == 0)
		return true;
	
	var start_format = " .+-0123456789";
	var number_format = " .0123456789";
	var check_char;
	var decimal = false;
	var trailing_blank = false;
	var digits = false;
	
	check_char = start_format.indexOf(object_value.charAt(0));
	if (check_char == 1)
		decimal = true;
	else if (check_char < 1)
		return false;
	 
	for (var i = 1; i < object_value.length; i++)	{
		check_char = number_format.indexOf(object_value.charAt(i))
		if (check_char < 0) {
			return false;
		} else if (check_char == 1)	{
			if (decimal)
				return false;
			else
				decimal = true;
		} else if (check_char == 0) {
			if (decimal || digits)	
			trailing_blank = true;
		}	else if (trailing_blank) { 
			return false;
		} else {
			digits = true;
		}
	}	
	
	return true;
}

// Check range
function ew_CheckRange(object_value, min_value, max_value) {
	if (object_value.length == 0)
		return true;
	
	if (!ew_CheckNumber(object_value))
		return false;
	else
		return (ew_NumberRange((eval(object_value)), min_value, max_value));
	
	return true;
}

// Check time
function ew_CheckTime(object_value) {
	if (object_value.length == 0)
		return true;
	
	isplit = object_value.indexOf(':');
	
	if (isplit == -1 || isplit == object_value.length)
		return false;
	
	sHour = object_value.substring(0, isplit);
	iminute = object_value.indexOf(':', isplit + 1);
	
	if (iminute == -1 || iminute == object_value.length)
		sMin = object_value.substring((sHour.length + 1));
	else
		sMin = object_value.substring((sHour.length + 1), iminute);
	
	if (!ew_CheckInteger(sHour))
		return false;
	else if (!ew_CheckRange(sHour, 0, 23))
		return false;
	
	if (!ew_CheckInteger(sMin))
		return false;
	else if (!ew_CheckRange(sMin, 0, 59))
		return false;
	
	if (iminute != -1) {
		sSec = object_value.substring(iminute + 1);		
		if (!ew_CheckInteger(sSec))
			return false;
		else if (!ew_CheckRange(sSec, 0, 59))
			return false;	
	}
	
	return true;
}

// Check phone
function ew_CheckPhone(object_value) {
	if (object_value.length == 0)
		return true;
	
	if (object_value.length != 12)
		return false;
	
	if (!ew_CheckNumber(object_value.substring(0,3)))
		return false;
	else if (!ew_NumberRange((eval(object_value.substring(0,3))), 100, 1000))
		return false;
	
	if (object_value.charAt(3) != "-" && object_value.charAt(3) != " ")
		return false
	
	if (!ew_CheckNumber(object_value.substring(4,7)))
		return false;
	else if (!ew_NumberRange((eval(object_value.substring(4,7))), 100, 1000))
		return false;
	
	if (object_value.charAt(7) != "-" && object_value.charAt(7) != " ")
		return false;
	
	if (object_value.charAt(8) == "-" || object_value.charAt(8) == "+")
		return false;
	else
		return (ew_CheckInteger(object_value.substring(8,12)));
}


// Check zip
function ew_CheckZip(object_value) {
	if (object_value.length == 0)
		return true;
	
	if (object_value.length != 5 && object_value.length != 10)
		return false;
	
	if (object_value.charAt(0) == "-" || object_value.charAt(0) == "+")
		return false;
	
	if (!ew_CheckInteger(object_value.substring(0,5)))
		return false;
	
	if (object_value.length == 5)
		return true;
	
	if (object_value.charAt(5) != "-" && object_value.charAt(5) != " ")
		return false;
	
	if (object_value.charAt(6) == "-" || object_value.charAt(6) == "+")
		return false;
	
	return (ew_CheckInteger(object_value.substring(6,10)));
}


// Check credit card
function ew_CheckCreditCard(object_value) {
	var white_space = " -";
	var creditcard_string = "";
	var check_char;
	
	if (object_value.length == 0)
		return true;
	
	for (var i = 0; i < object_value.length; i++) {
		check_char = white_space.indexOf(object_value.charAt(i));
		if (check_char < 0)
			creditcard_string += object_value.substring(i, (i + 1));
	}	
	
	if (creditcard_string.length == 0)
		return false;	 
	
	if (creditcard_string.charAt(0) == "+")
		return false;
	
	if (!ew_CheckInteger(creditcard_string))
		return false;
	
	var doubledigit = creditcard_string.length % 2 == 1 ? false : true;
	var checkdigit = 0;
	var tempdigit;
	
	for (var i = 0; i < creditcard_string.length; i++) {
		tempdigit = eval(creditcard_string.charAt(i));		
		if (doubledigit) {
			tempdigit *= 2;
			checkdigit += (tempdigit % 10);			
			if ((tempdigit / 10) >= 1.0)
				checkdigit++;			
			doubledigit = false;
		}	else {
			checkdigit += tempdigit;
			doubledigit = true;
		}
	}
		
	return (checkdigit % 10) == 0 ? true : false;
}


// Check social security number
function ew_CheckSSC(object_value) {
	var white_space = " -+.";
	var ssc_string="";
	var check_char;
	
	if (object_value.length == 0)
		return true;
	
	if (object_value.length != 11)
		return false;
	
	if (object_value.charAt(3) != "-" && object_value.charAt(3) != " ")
		return false;
	
	if (object_value.charAt(6) != "-" && object_value.charAt(6) != " ")
		return false;
	
	for (var i = 0; i < object_value.length; i++) {
		check_char = white_space.indexOf(object_value.charAt(i));
		if (check_char < 0)
			ssc_string += object_value.substring(i, (i + 1));
	}	
	
	if (ssc_string.length != 9)
		return false;	 
	
	if (!ew_CheckInteger(ssc_string))
		return false;
	
	return true;
}
	

// Check email
function ew_CheckEmail(object_value) {
	if (object_value.length == 0)
		return true;
	
	if (!(object_value.indexOf("@") > -1 && object_value.indexOf(".") > -1))
		return false;    
	
	return true;
}
	
// Check GUID {xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx}	
function ew_CheckGUID(object_value) {
	if (object_value.length == 0)
		return true;
	object_value = object_value.replace(/^\s*|\s*$/g, "");
	var re = new RegExp("^(\{{1}([0-9a-fA-F]){8}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){4}-([0-9a-fA-F]){12}\}{1})$");
	return re.test(object_value);
}

// Check file extension
function ew_CheckFileType(object_value) {
	if (object_value.length == 0) 
		return true;
	if (typeof EW_UPLOAD_ALLOWED_FILE_EXT == "undefined")
		return true;  
	var fileTypes = EW_UPLOAD_ALLOWED_FILE_EXT.split(",");
	var ext = object_value.substring(object_value.lastIndexOf(".")+1, object_value.length).toLowerCase(); 
	for (var i=0; i < fileTypes.length; i++) { 
		if (fileTypes[i] == ext) 
			return true; 
	} 
	return false; 
}	

// Update a combobox with filter value
// object_value_array format
// object_value_array[n] = option value
// object_value_array[n+1] = option text 1
// object_value_array[n+2] = option text 2
// object_value_array[n+3] = option filter value
function ew_UpdateOpt(obj, object_value_array, parent_obj) { 
	var i, j, lo;
	var arValue = [];
	if (obj.options) {
		for (i=0; i<obj.options.length; i++) {
			if (obj.options[i].selected)
				arValue[arValue.length] = obj.options[i].value;
		}
	} else {
		arValue[arValue.length] = obj.value;
	}
	lo = (obj.type == "select-multiple") ? 0 : 1;
	for (i=obj.length-1; i>=lo; i--) {
		obj.options[i] = null;
	}
	for (i=0; i<parent_obj.options.length; i++) {
		if (parent_obj.options[i].selected) { 
			for (j=0; j<object_value_array.length; j=j+4) {
				if (object_value_array[j+3].toUpperCase() == parent_obj.options[i].value.toUpperCase()) {
					ew_NewOpt(obj, object_value_array[j], object_value_array[j+1], object_value_array[j+2]); 
				}
			}
		}
	}
	ew_SelectOpt(obj, arValue);
}

// Create combobox option 
function ew_NewOpt(obj, value, text1, text2) {
	var text = text1;
	if (text2 != "")
		text += EW_FIELD_SEP + text2;
	var optionName = new Option(text, value, false, false)
	obj.options[obj.length] = optionName;
}

// Select combobox option
function ew_SelectOpt(obj, value_array) {
	var i, j;
	for (i=0; i<value_array.length; i++) {
		for (j=0; j<obj.length; j++) {
			if (obj.options[j].value.toUpperCase() == value_array[i].toUpperCase()) {
				obj.options[j].selected = true;
				break;
			}
		}
	}
	if (obj.autoselect && obj.autoselect.toLowerCase() == "true") {
		if (obj.type == "select-one" && obj.options.length == 2 &&
			!obj.options[1].selected) {
			obj.options[1].selected = true;
		} else if (obj.type == "select-multiple" && obj.options.length == 1 &&
			!obj.options[0].selected) {
			obj.options[0].selected = true;
		}
	}
}

// Get image width/height
function ew_GetImageSize(file_object, width_object, height_object) {
	if (navigator.appVersion.indexOf("MSIE") != -1)	{
		myimage = new Image();
		myimage.onload = function () {
			width_object.value = myimage.width; height_object.value = myimage.height;
		}		
		myimage.src = file_object.value;
	}
}

// Get Netscape Version
function ew_GetNNVersionNumber() {
	if (navigator.appName == "Netscape") {
		var appVer = parseFloat(navigator.appVersion);
		if (appVer < 5) {
			return appVer;
		} else {
			if (typeof navigator.vendorSub != "undefined")
				return parseFloat(navigator.vendorSub);
		}
	}
	return 0;
}

// Get Ctrl key for multiple column sort
function ew_Sort(e, url) {
	var ctrlPressed = 0;	
	if (parseInt(navigator.appVersion) > 3) {
		if (navigator.appName == "Netscape") {
			var ua = navigator.userAgent;
    	var isFirefox = (ua != null && ua.indexOf("Firefox/") != -1);
			if ((!isFirefox && getNNVersionNumber() >= 6) || isFirefox)				
				ctrlPressed = e.ctrlKey;
			else
				ctrlPressed = ((e.modifiers+32).toString(2).substring(3,6).charAt(1)=="1");			
		} else {
		 ctrlPressed = event.ctrlKey;
		}
		if (ctrlPressed) {
			var newPage = "<scr" + "ipt language=\"JavaScript\">setTimeout('window.location.href=\"" + url + "&ctrl=1\"', 10);</scr" + "ipt>";
			document.write(newPage);
			document.close();			
			return false;
		}
	}
	return true;
}

// Confirm message
function ew_Confirm(msg)
{
	return confirm(msg);
}

// Confirm Delete Message
function ew_ConfirmDelete(msg)
{
	var agree = confirm(msg);
	if (!agree)
		ew_ClearDelete(); // Clear delete status
	return agree;
}

// Set mouse over color
function ew_MouseOver(row) {
	row.mover = true; // Mouse over
	if (typeof(row.oClassName) == "undefined")
		row.oClassName = row.className;
	if (typeof(row.oCssText) == "undefined")
		row.oCssText = row.style.cssText;
	if (!row.selected) {
		row.className = rowmoverclass;
		row.style.cssText = "";
	}
}

// Set mouse out color
function ew_MouseOut(row) {
	row.mover = false; // Mouse out
	if (!row.selected)
		ew_SetColor(row);
}

// Set row color
function ew_SetColor(row) {
	if (row.selected) {
		if (typeof(row.oClassName) == "undefined")
			row.oClassName = row.className;
		if (typeof(row.oCssText) == "undefined")
			row.oCssText = row.style.cssText;
		row.className = rowselectedclass;
	} else if (row.edit) {
		row.className = roweditclass;
	} else {
		if (typeof(row.oClassName) != "undefined")
			row.className = row.oClassName;
		if (typeof(row.oCssText) != "undefined")
			row.style.cssText = row.oCssText;
	}
}

// Set selected row color
function ew_Click(row) {
	if (row.deleteclicked)
		row.deleteclicked = false; // Reset delete button/checkbox clicked
	else {
		var bselected = row.selected;
		ew_ClearSelected(); // Clear all other selected rows
		if (!row.deleterow) row.selected = !bselected; // Toggle
		ew_SetColor(row);
	}
}

// Clear selected rows color
function ew_ClearSelected() {
	var table = document.getElementById(EW_LIST_TABLE_NAME);
	for (var i = firstrowoffset; i < table.rows.length-lastrowoffset; i++) {
		var thisrow = table.rows[i];
		if (thisrow.selected && !thisrow.deleterow) {
			thisrow.selected = false;
			ew_SetColor(thisrow);
		}
	}
}

// Clear all row delete status
function ew_ClearDelete() {
	var table = document.getElementById(EW_LIST_TABLE_NAME);
	for (var i = firstrowoffset; i < table.rows.length-lastrowoffset; i++) {
		var thisrow = table.rows[i];
		thisrow.deleterow = false;
	}
}

// Click all delete button
function ew_ClickAll(chkbox) {
	var table = document.getElementById(EW_LIST_TABLE_NAME);
	for (var i = firstrowoffset; i < table.rows.length-lastrowoffset; i++) {
		var thisrow = table.rows[i];
		thisrow.selected = chkbox.checked;
		thisrow.deleterow = chkbox.checked;
		ew_SetColor(thisrow);
	}
}

// Click single delete link
function ew_ClickDelete() {
	ew_ClearSelected();
	var table = document.getElementById(EW_LIST_TABLE_NAME);
	for (var i = firstrowoffset; i < table.rows.length-lastrowoffset; i++) {
		var thisrow = table.rows[i];
		if (thisrow.mover) {
			thisrow.deleteclicked = true;
			thisrow.deleterow = true;
			thisrow.selected = true;
			ew_SetColor(thisrow);
			break;
		}
	}
}

// Click multiple checkbox
function ew_ClickMultiCheckbox(chkbox) {
	ew_ClearSelected();
	var table = document.getElementById(EW_LIST_TABLE_NAME);
	for (var i = firstrowoffset; i < table.rows.length-lastrowoffset; i++) {
		var thisrow = table.rows[i];
		if (thisrow.mover) {
			thisrow.deleteclicked = true;
			thisrow.deleterow = chkbox.checked;
			thisrow.selected = chkbox.checked;
			ew_SetColor(thisrow);
			break;
		}
	}
}

// Toggle highlight
function ew_ToggleHighlight(lnk) {
	if (!lnk || !document.getElementsByName)
		return;
	var elems = document.getElementsByName("ewHighlightSearch");
	var i, el;
	for (i=0; i<elems.length; i++) {
		elem = elems[i];
		elem.className = (elem.className == "") ? "ewHighlightSearch" : "";
	}
	lnk.innerHTML = (lnk.innerHTML == EW_HIDE_HIGHLIGHT) ? EW_SHOW_HIGHLIGHT : EW_HIDE_HIGHLIGHT;
}

// Create XMLHTTP
// Note: AJAX feature requires IE5.5+, FF1+, and NS6.2+
function ew_CreateXMLHttp() {
	if (!(document.getElementsByTagName || document.all))
		return;		
	var ret = null;
	try {
		ret = new ActiveXObject('Msxml2.XMLHTTP');
	}	catch (e) {
	    try {
	        ret = new ActiveXObject('Microsoft.XMLHTTP');
	    } catch (ee) {
	        ret = null;
	    }
	}
	if (!ret && typeof XMLHttpRequest != 'undefined')
	    ret = new XMLHttpRequest();	
	return ret;
}

// Update a combobox with filter value by AJAX
function ew_AjaxUpdateOpt(obj, parent_obj, async) {
	if (!(document.getElementsByTagName || document.all))
		return;
	try {
		var i, j, lo;
		var arValue = [];
		if (obj.options) {
			for (i=0; i<obj.options.length; i++) {
				if (obj.options[i].selected)
					arValue[arValue.length] = obj.options[i].value;
			}
		} else {
			arValue[arValue.length] = obj.value;
		}
		lo = (obj.type == "select-multiple") ? 0 : 1;
		for (i=obj.length-1; i>=lo; i--) {
			obj.options[i] = null;
		}
		var s = eval('obj.form.s_' + obj.name + '.value');
		//var s = eval('s_' + obj.name);
		//if (!s || s == '' || filter_value == '') return;
		if (!s || s == '') return;
		var lc = eval('obj.form.lc_' + obj.name + '.value');
		if (!lc || lc == '') return;
		var ld1 = eval('obj.form.ld1_' + obj.name + '.value');
		if (!ld1 || ld1 == '') return;
		var ld2 = eval('obj.form.ld2_' + obj.name + '.value');
		if (!ld2 || ld2 == '') return;
		var lft = eval('obj.form.lft_' + obj.name + '.value');
		var xmlHttp = ew_CreateXMLHttp();
		if (!xmlHttp) return;
		var arSelValue = [];
		if (parent_obj.options) {
			for (i=0; i<parent_obj.options.length; i++) {
				if (parent_obj.options[i].selected)
					arSelValue[arSelValue.length] = encodeURIComponent(parent_obj.options[i].value); 
			}
		} else {
			arSelValue[arSelValue.length] = encodeURIComponent(parent_obj.value); 
		}
		xmlHttp.open('get', EW_LOOKUP_FILE_NAME + '?s=' + s + '&q=' + arSelValue.join(",") +
			'&lc=' + encodeURIComponent(lc) +
			'&ld1=' + encodeURIComponent(ld1) +
			'&ld2=' + encodeURIComponent(ld2) +
			'&lft=' + encodeURIComponent(lft), async);
		var f = function() {
		//alert(xmlHttp.responseText);
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200 &&
			xmlHttp.responseText) {
			//alert(xmlHttp.responseText);
			var object_value_array = xmlHttp.responseText.split('\r');
			for (var j=0; j<object_value_array.length-2; j=j+3) {
				ew_NewOpt(obj, object_value_array[j], object_value_array[j+1],
					object_value_array[j+2]);
			}
			ew_SelectOpt(obj, arValue);
		}
	}
	xmlHttp.onreadystatechange = f;
	xmlHttp.send(null);
	if (!async && !document.all)
		f();
	} catch (e) {}
}

// Html encode text
function ew_HtmlEncode(text) {
	var str = text;
	str = str.replace(/&/g, '&amp');
	str = str.replace(/\"/g, '&quot;');
	str = str.replace(/</g, '&lt;');
	str = str.replace(/>/g, '&gt;'); 
	return str;
}

// Google Suggest for textbox by AJAX
// object_value_array format
// object_value_array[n] = display value
// object_value_array[n+1] = display value 2
function ew_AjaxUpdateTextBox(object_name) {
	var obj, as;
	if (document.all) {
		obj = document.all(object_name);
		if (obj) as = document.all('as_' + object_name);
	} else if (document.getElementById) {
		obj = document.getElementById(object_name);
		if (obj) as = document.getElementById('as_' + object_name);
	}
	if (!obj || !as) return false;
	try {
		var s = eval('obj.form.s_' + obj.name + '.value');
		//var s = eval('s_' + obj.name);
		var q = obj.value;
		q = q.replace(/^\s*/, ''); // left trim
		if (!s || s == '' || q.length == 0) return false;
		var lt = eval('obj.form.lt_' + obj.name + '.value');
		if (!lt || lt == '') return;
		var xmlHttp = ew_CreateXMLHttp();
		if (!xmlHttp) return;
		xmlHttp.open('get', EW_LOOKUP_FILE_NAME + '?s=' + s + '&q=' + encodeURIComponent(q) +
			'&lt=' + encodeURIComponent(lt));
		xmlHttp.onreadystatechange = function() {
			//if (xmlHttp.readyState == 4) alert(xmlHttp.responseText);
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200 &&
				xmlHttp.responseText) {
				var object_value_array = xmlHttp.responseText.split('\r');
				var sHtml = '';
				for (var j=0; j<object_value_array.length-2; j=j+2) {
					var value = object_value_array[j];
					var text = object_value_array[j];
					if (object_value_array[j+1] != "")
						text += EW_FIELD_SEP + object_value_array[j+1];
					var i = j/2 + 1;
					sCtrlID = object_name + "_mi_" + i;
					sFunc1 = "ew_AstOnMouseClick(" + i + ", \"" + object_name + "\", \"" + as.id + "\")";
					sFunc2 = "ew_AstOnMouseOver(" + i + ", \"" + object_name + "\")";
					sHtml += "<div class=\"ewAstListItem\" id=\"" + sCtrlID + "\" name=\"" + sCtrlID + "\" onclick='" + sFunc1 + "' + onmouseover='" + sFunc2 + "'>" + text + "</div>";
					// add hidden field to store the value of current item
					sMenuItemValueID = sCtrlID + "_value";
					sHtml += "\n\r";
					sHtml += "<input type=\"hidden\" id=\"" + sMenuItemValueID + "\" name=\"" + sMenuItemValueID + "\" value=\"" + ew_HtmlEncode(text) + "\">";
				}
				//alert(sHtml);	
				ew_AstShowDiv(as.id, sHtml);
			} else {
				ew_AstHideDiv(as.id);
			}
		}
		xmlHttp.send(null);
	}	catch (e) {}
	return false;
}

// Auto fill text boxes by AJAX
function ew_AjaxAutoFill(obj, async) {
	if (!(document.getElementsByTagName || document.all))
		return;
	try {
		var i, j;
		var selValue;
		if (obj.options) {
			if (obj.selectedIndex > -1) selValue = obj.options[obj.selectedIndex].value;
		} else {
			selValue = obj.value;
		}
		var s = eval('obj.form.sf_' + obj.name + '.value');
		if (!s || s == '' || selValue == '') return;
		var lt = eval('obj.form.lt_' + obj.name + '.value');
		if (!lt || lt == '') return;
		var xmlHttp = ew_CreateXMLHttp();
		if (!xmlHttp) return;		
		xmlHttp.open('get', EW_LOOKUP_FILE_NAME + '?s=' + s + '&q=' + encodeURIComponent(selValue) +
			'&lt=' + encodeURIComponent(lt), async);
		var f = function() {
			//alert(xmlHttp.responseText);
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200 &&
				xmlHttp.responseText) {
				//alert(xmlHttp.responseText);
				var object_value_array = xmlHttp.responseText.split('\r');
				var destnames = eval('obj.form.ln_' + obj.name + '.value');
				var dest_array = destnames.split(',');
				for (var j=0; j<dest_array.length; j=j+1) {
					var destobj = ew_GetFormElement(obj.form, dest_array[j]);
					if ((destobj) && (j<object_value_array.length))
						destobj.value = object_value_array[j];
				}
			}
		}		
		xmlHttp.onreadystatechange = f;
		xmlHttp.send(null);
		if (!async && !document.all)
			f();
	}	catch (e) {}
}

// Get element from form
function ew_GetFormElement(f, name) {
	for(var i=0; i<f.elements.length; i++) {
		if(f.elements[i].name == name) {
			return f.elements[i];
		}
	}
}

// Extended basic search clear form
function ew_ClearForm(objForm){
	with (objForm) {
		for (var i=0; i<elements.length; i++){
			var tmpObj = eval(elements[i]);
			if (tmpObj.type == "checkbox" || tmpObj.type == "radio"){
				tmpObj.checked = false;
			} else if (tmpObj.type == "select-one"){
				tmpObj.selectedIndex = 0;
			} else if (tmpObj.type == "select-multiple") {
				for (var j=0; j<tmpObj.options.length; j++)
					tmpObj.options[j].selected = false;
            } else if (tmpObj.type == "text" || tmpObj.type == "textarea"){
				tmpObj.value = "";
			}
		}
	}
}

// Functions for adding new option dynamically

// Show add option
function ew_ShowAddOption(id) {
	if (!document.getElementById) return;
	var elem;
	elem = document.getElementById("ao_" + id);
	if (elem) elem.style.display = "block"; 
	elem = document.getElementById("cb_" + id);
	if (elem)	elem.style.display = "none";	
}

// Hide add option
function ew_HideAddOption(id) {
	var elem;
	elem = document.getElementById("cb_" + id);
	if (elem)	elem.style.display = "inline"; 
	elem = document.getElementById("ao_" + id);
	if (elem) elem.style.display = "none"; 
}

// Post new option
function ew_PostNewOption(id) {
	var elem;
	var url = EW_ADD_OPTION_FILE_NAME + "?";
	elem = document.getElementById("ltn_" + id);
	url += "ltn=" + encodeURIComponent(elem.value);
	elem = document.getElementById("pfn_" + id);
	if (elem) url += "&pfn=" + encodeURIComponent(elem.value);
	elem = document.getElementById("pvn_" + id);
	if (elem) elem = document.getElementById(elem.value);
	if ((elem) && (elem.options) && (elem.selectedIndex != -1)) url += "&pf=" + encodeURIComponent(elem.options[elem.selectedIndex].value);
	elem = document.getElementById("pfq_" + id);
	if (elem) url += "&pfq=" + encodeURIComponent(elem.value);
	elem = document.getElementById("dfn_" + id);
	if (elem) url += "&dfn=" + encodeURIComponent(elem.value);
	elem = document.getElementById("dfq_" + id);
	if (elem) url += "&dfq=" + encodeURIComponent(elem.value);
	elem = document.getElementById("lfn_" + id);
	if (elem) url += "&lfn=" + encodeURIComponent(elem.value);
	elem = document.getElementById("lfq_" + id);
	if (elem) url += "&lfq=" + encodeURIComponent(elem.value);
	elem = document.getElementById("df2n_" + id);
	if (elem) url += "&df2n=" + encodeURIComponent(elem.value);
	elem = document.getElementById("df2q_" + id);
	if (elem) url += "&df2q=" + encodeURIComponent(elem.value);	

	var lf = document.getElementById("lf_" + id);
	var lfm = document.getElementById("lfm_" + id);
	if (lf) {
		if (ew_HasValue(lf)) {
			url += "&lf=" + encodeURIComponent(lf.value); 
		} else {
			if (!ew_OnError(lf, (lfm?lfm.value:"Missing link field value")))
				return false;		
		}
	}
	
	var df = document.getElementById("df_" + id);
	var dfm = document.getElementById("dfm_" + id);
	if (df) {
		if (ew_HasValue(df)) {
			url += "&df=" + encodeURIComponent(df.value); 
		} else {
			if (!ew_OnError(df, (dfm?dfm.value:"Missing display field value")))
				return false;
		}
	}
	
	var df2 = document.getElementById("df2_" + id);
	var df2m = document.getElementById("df2m_" + id);
	if (df2) {
		if (ew_HasValue(df2)) {
			url += "&df2=" + encodeURIComponent(df2.value); 
		} else {
			if (!ew_OnError(df2, (df2m?df2m.value:"Missing display field #2 value")))
				return false;
		}
	}
	
	try {			
		var xmlHttp = ew_CreateXMLHttp();
		if (!xmlHttp) return;		
		xmlHttp.open('get', url, true); // not Async
		xmlHttp.onreadystatechange = function() {
			//alert(xmlHttp.responseText);					
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200 &&
				xmlHttp.responseText) {				
				var opt = xmlHttp.responseText.split('\r');
				if (opt.length > 3 && opt[0]== 'OK') {
					var elem = document.getElementById(id);
					if (elem) {
						ew_NewOpt(elem, opt[1], opt[2], opt[3]);
						ew_HideAddOption(id);
						elem.options[elem.options.length-1].selected = true;
						if (elem.onchange) elem.onchange();
						elem.focus();
					}
				} else {
					alert(xmlHttp.responseText);
				}				
			}
		}		
		xmlHttp.send(null);
	}	catch (e) {}

}

// Functions for auto suggest box

// Set auto suggest selected value
function ew_AstSetSelectedValue(sValue) {
	var hdnSelectedValue = document.getElementById("sv_" + EW_AST_TEXT_BOX_ID);
	hdnSelectedValue.value = sValue;
}

// Set auto suggest text box value
function ew_AstSetTextBoxValue() {
	var divListItem;
	divListItem = ew_AstGetSelListItemDiv();
	if (divListItem)	{
		var sListItemValueID = ew_GetDivListItemID(EW_AST_SELECT_LIST_ITEM ) + "_value";
		var hdnListItemValue = document.getElementById(sListItemValueID);
		if (hdnListItemValue)
			ew_AstSetSelectedValue(hdnListItemValue.value);
		var txtCtrl = document.getElementById(EW_AST_TEXT_BOX_ID);
		txtCtrl.value = divListItem.innerHTML;
	}
}

// Get auto suggest text box value
function ew_AstGetTextBoxValue() {
	var txtCtrl = document.getElementById(EW_AST_TEXT_BOX_ID);
	return (txtCtrl) ? txtCtrl.value : '';
}	
		
// Auto suggest on mouse click event
function ew_AstOnMouseClick(nListIndex, sTextBoxID, sDivID) {
	EW_AST_SELECT_LIST_ITEM = nListIndex;
	EW_AST_TEXT_BOX_ID = sTextBoxID;
	ew_AstSetTextBoxValue();
	ew_AstHideDiv(sDivID);
}

// Auto suggest on mouse over event
function ew_AstOnMouseOver(nListIndex, sTextBoxID) {
	EW_AST_TEXT_BOX_ID = sTextBoxID;
	ew_AstSelectListItem(nListIndex);
}	
	
// Auto suggest on key press event
function ew_AstOnKeyPress(evt) {
	if ((ew_AstGetKey(evt) == 13) && (EW_AST_CANCEL_SUBMIT)) return false;
	return true;
}	

// Auto suggest on key up event
function ew_AstOnKeyUp(sTextBoxID, sDiv, evt) {
	EW_AST_TEXT_BOX_ID = sTextBoxID;
	var nKey = ew_AstGetKey(evt);
	// skip up/down/enter
	if ((nKey != 38) && (nKey != 40) && (nKey != 13))	{
		var sNewValue;
		sNewValue = ew_AstGetTextBoxValue();
		if ((sNewValue.length <= EW_AST_MAX_NEW_VALUE_LENGTH) && (sNewValue.length > 0)) {
			if (nKey != 27) // skip escape									
				ew_AjaxUpdateTextBox(sTextBoxID);
		}			
		if (EW_AST_OLD_TEXT_BOX_VALUE != sNewValue)
			ew_AstSetSelectedValue("");
	}
}	

// Auto suggest on key down event
function ew_AstOnKeyDown(sTextBoxID, sDiv, evt) {
	EW_AST_TEXT_BOX_ID = sTextBoxID;
	// save current text box value before key press takes affect
	EW_AST_OLD_TEXT_BOX_VALUE = ew_AstGetTextBoxValue();
	var nKey = ew_AstGetKey(evt);
	// handle up/down/enter
	if (nKey == 38) // up arrow		
		ew_AstMoveDown();
	else if (nKey == 40) // down arrow		
		ew_AstMoveUp();
	else if (nKey == 13) { // enter
		// Note: Netscape will submit the form on pressing enter before firing the
		// keydown event. This only works with IE and FF.			
		if (ew_AstIsVisibleDiv(sDiv)) {
			ew_AstHideDiv(sDiv);
			evt.cancelBubble = true;				
			if (evt.returnValue) evt.returnValue = false;
			if (evt.stopPropagation) evt.stopPropagation();			
			EW_AST_CANCEL_SUBMIT = true;
 		} else {
 			EW_AST_CANCEL_SUBMIT = false;
 		}
	} else {
		ew_AstHideDiv(sDiv);
	}			
	return true;
}

// Auto suggest get selected item div
function ew_AstGetSelListItemDiv() {
	return ew_AstGetListItemDiv(EW_AST_SELECT_LIST_ITEM);
}
		
// Auto suggest get list item id
function ew_GetDivListItemID(nListItem) {
	return (EW_AST_TEXT_BOX_ID + "_mi_" + nListItem);
}

// Auto suggest get list item div
function ew_AstGetListItemDiv(nListItem) {
	var sDivListItemID;
	sDivListItemID = ew_GetDivListItemID(nListItem);
	return document.getElementById(sDivListItemID);
}

// Auto suggest move up
function ew_AstMoveUp() {
	var nListItem;
	nListItem = EW_AST_SELECT_LIST_ITEM + 1;
	if (ew_AstGetListItemDiv(nListItem)) ew_AstSelectListItem(nListItem);
}

// Auto suggest move down
function ew_AstMoveDown() {
	var nListItem;
	nListItem = EW_AST_SELECT_LIST_ITEM - 1;
	if (nListItem != 0)	ew_AstSelectListItem(nListItem);
}

// Auto suggest selected list item
function ew_AstSelectListItem(nListItem) {
	var divListItem;
	divListItem = ew_AstGetListItemDiv(nListItem);
	if(divListItem)	{
		if (nListItem != EW_AST_SELECT_LIST_ITEM) {
			ew_AstUnhighlightSelListItem();
			EW_AST_SELECT_LIST_ITEM = nListItem;
			ew_AstSetTextBoxValue();
			divListItem.className = "ewAstSelListItem";
		}
	}
}

// Auto suggest unhiglight selected list item
function ew_AstUnhighlightSelListItem() {
	var divListItem;
	divListItem = ew_AstGetSelListItemDiv();
	if (divListItem) divListItem.className = "ewAstListItem";		
}

// Auto suggest get key
function ew_AstGetKey(evt) {
	evt = (evt) ? evt : (window.event) ? event : null;
	if (evt) {
		var cCode = (evt.charCode) ? evt.charCode :
				((evt.keyCode) ? evt.keyCode :
				((evt.which) ? evt.which : 0));
		return cCode; 
	}
}

// Auto suggest hide div
function ew_AstHideDiv(sDivID) {
	document.getElementById(sDivID).style.visibility = 'hidden';
	EW_AST_SELECT_LIST_ITEM = 0;
}

// Auto suggest check if visible div
function ew_AstIsVisibleDiv(sDivID) {
	return document.getElementById(sDivID).style.visibility != 'hidden';
}

// Auto suggest show div
function ew_AstShowDiv(sDivID, sDivContent) {
	var divList;
	divList = document.getElementById(sDivID);		
	var sInnerHtml;
	// use iframe with the same size as the div		
	if (document.all) { // IE
		sInnerHtml = "<div id='" + sDivID + "_content' style='z-index:999; position:absolute;'>";
		sInnerHtml += sDivContent;
		sInnerHtml += "</div><iframe id='" + sDivID + "_iframe' src='about:blank' frameborder='1' scrolling='no'></iframe>";
		divList.innerHTML = sInnerHtml;
		var divContent = document.getElementById(sDivID + "_content");			
		var divIframe = document.getElementById(sDivID + "_iframe");					
		divContent.className = "ewAstList";
		divList.className = "ewAstListBase";				
		divIframe.style.width = divContent.offsetWidth + 'px';
		divIframe.style.height = divContent.offsetHeight + 'px';
		divIframe.marginTop = "-" + divContent.offsetHeight + 'px';
	} else {
		divList.innerHTML = sDivContent;	
	}	
	divList.style.visibility = 'visible';		
}

// Functions for multi page

// Multi page add element
function ew_MultiPageAddElement(elemid, pageIndex) {
	var item = new Array(2);
	item[0] = elemid;
	item[1] = pageIndex;
	ew_MultiPageElements.push(item);
}

// Multi page init
function ew_InitMultiPage() {
	if (!(document.getElementById || document.all))
		return;
	ew_MaxPageIndex = 0;
	for (var i=0; i<ew_MultiPageElements.length; i++) {
		if (ew_MultiPageElements[i][1] > ew_MaxPageIndex)
			ew_MaxPageIndex = ew_MultiPageElements[i][1]; 
	}	
	ew_MinPageIndex = ew_MaxPageIndex;
	for (var i=0; i<ew_MultiPageElements.length; i++) {
		if (ew_MultiPageElements[i][1] < ew_MinPageIndex)
			ew_MinPageIndex = ew_MultiPageElements[i][1]; 
	}
	ew_NextPage();
	
	// if ASP.NET 
	if (typeof Page_ClientValidate == "function") {
    original_Page_ClientValidate = Page_ClientValidate; 
		Page_ClientValidate = function() { 
			var isValid;
			isValid = original_Page_ClientValidate();          
			if (!isValid) 
				ew_FocusInvalidElement();
			return isValid; 
		} 
	}	
}

// Multi page check if element exists
function ew_PageHasElements(pageIndex) {
	for (var i=0; i<ew_MultiPageElements.length; i++) {
		if (ew_MultiPageElements[i][1] == pageIndex)
			return true;
	}
	return false;
}

// Multi page go to next page
function ew_NextPage() {
	if (!(document.getElementById || document.all))
		return;
	ew_EnableButtons(false);
	var hasElements = false;
	while (!hasElements && ew_PageIndex < ew_MaxPageIndex) {
		hasElements = ew_PageHasElements(++ew_PageIndex);
		if (hasElements)
			ew_ShowPage();
	}
	ew_UpdateButtons();
	ew_EnableButtons(true);
}

// Multi page go to prev page
function ew_PrevPage() {
	if (!(document.getElementById || document.all))
		return;
	ew_EnableButtons(false);
	var hasElements = false;
	while (!hasElements && ew_PageIndex > ew_MinPageIndex) {
		hasElements = ew_PageHasElements(--ew_PageIndex);
		if (hasElements)
			ew_ShowPage();
	}
	ew_UpdateButtons();
	ew_EnableButtons(true);
}

// Multi page show this page
function ew_ShowPage() {
	var fn;
	if (!fn && typeof ew_CreateEditor == 'function')
		fn = ew_CreateEditor;
// if (!fn && typeof EW_createEditor == 'function')
// fn = EW_createEditor; // for backward compatibility
	for (var i=0; i<ew_MultiPageElements.length; i++) {
		var row = ew_GetRowByElementId(ew_MultiPageElements[i][0]);
		if (row) {
			row.style.display = (ew_MultiPageElements[i][1] == ew_PageIndex) ? '' : 'none';
			if (row.style.display == '' && fn)
				fn(ew_MultiPageElements[i][0]);
		}
	}
}

// Multi page update buttons
function ew_UpdateButtons() {	
	if (ew_MaxPageIndex == ew_MinPageIndex)
		return;
	var elem = ew_GetElement('ewMultiPagePager');
	if (!elem)
		return;		
	var pager = "<table class='ewMultiPagePager'><tr>";
	if (ew_PageIndex <= ew_MinPageIndex) {
		pager = pager + "<td>" + ew_MultiPagePrev + "</td>";
	} else {
		pager = pager + "<td><a href='javascript:ew_PrevPage();'>" + ew_MultiPagePrev + "</a></td>";
	}
	for (var i=ew_MinPageIndex; i<=ew_MaxPageIndex; i++) {
		if (i == ew_PageIndex) {
			pager = pager + "<td>" + i + "</td>";
		} else {
			pager = pager + "<td><a href='javascript:ew_GotoPageByIndex(" + i + ");'>" + i + "</a></td>";
		}
	}  
	if (ew_PageIndex >= ew_MaxPageIndex) {
		pager = pager + "<td>" + ew_MultiPageNext + "</td>";
	} else {
		pager = pager + "<td><a href='javascript:ew_NextPage();'>" + ew_MultiPageNext + "</a></td>";
	}	
	pager = pager + "</tr><tr><td colspan=" + (ew_MaxPageIndex - ew_MinPageIndex + 3) +">";
	pager = pager + ew_MultiPagePage + " " + (ew_PageIndex) + " " + ew_MultiPageOf + " " + (ew_MaxPageIndex);
	pager = pager + "</td></tr></table>";
	elem.innerHTML = pager;
}

// Multi page enable buttons
function ew_EnableButtons(bool) {
	var btn = ew_GetElement('btnAction'); 
	if (btn)
		btn.disabled = !bool;
}

// Get element by id
function ew_GetElement(elemid) { // 2.0.1
	var elem;
	if (document.getElementById) {
		elem = document.getElementById(elemid);
		if (elem) {
			return elem;		
		} else {
			elem = document.getElementsByName(elemid);
			if (elem && elem.length > 0)
				return elem[0];
		}
	}
	return null;
}

// Get page index by element id
function ew_GetPageIndexByElementId(elemid) {
	var pageIndex = -1;
	for (var i=0; i<ew_MultiPageElements.length; i++) {
		if (ew_MultiPageElements[i][0] == elemid)
			return ew_MultiPageElements[i][1];
	}
	return pageIndex;
}

// Goto page by index
function ew_GotoPageByIndex(pageIndex) {
	if (pageIndex < ew_MinPageIndex || pageIndex > ew_MaxPageIndex)
		return; 
	ew_PageIndex = pageIndex - 1;
	ew_NextPage();
}

// Goto page by element
function ew_GotoPageByElement(elem) {
	var pageIndex;
	if (!elem) return;
	var id = (!elem.type && elem[0]) ? elem[0].id : elem.id;
	if (id == "") return;
	pageIndex = ew_GetPageIndexByElementId(id);
	ew_GotoPageByIndex(pageIndex);
}

// Get row by element id
function ew_GetRowByElementId(elemid) { // 2.0.1
	var elem, tb;	
	elem = ew_GetElement(elemid);	
	if (!elem)
		return null;
	var isRow = false;		
	while (!isRow) {
		elem = ew_GetParentElement(elem);
		if (!elem) break;		
		if (elem.tagName == "TR") {
			tb = ew_GetParentElement(elem);
			if (tb) tb = ew_GetParentElement(tb);			
			isRow = (tb) && (tb.tagName == "TABLE") && (tb.className == EW_TABLE_CLASSNAME);
		}	
	}
	return (isRow) ? elem : null;	
}

// Get parent element
function ew_GetParentElement(elem) { // 2.0.1
	if (!elem)
		return null;
	if (document.all) {		
		return elem.parentElement;
	}	else if (document.getElementById) {		
		return elem.parentNode;
	}	
}

// Check if element is visible
function ew_IsElementVisible(elemid) {
	if (!(document.getElementById || document.all))
		return true;
	var elem = ew_GetElement(elemid);
	return (elem && elem.style.display == '');
}

// for ASP.NET
// Focus invalid element
function ew_FocusInvalidElement() {	
 	for (var i=0; i<Page_Validators.length; i++) {
		if (!Page_Validators[i].isvalid) {
			var elem = ew_GetElement(Page_Validators[i].controltovalidate);
			ew_GotoPageByElement(elem);
			ew_SetFocus(elem);
			break;
		}
	}
}