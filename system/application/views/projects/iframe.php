<html> 

<head> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"> 
<title>New Page 1</title> 

<link rel="stylesheet" href="{site_url}theme/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="{site_url}/lytebox/css/lytebox.css" type="text/css" media="screen">

<style type="text/css">
.small {
	font-weight: bold; 
	/*font-size: xx-small;*/
}

		.highlighted { background: yellow; }

</style>
<script language="JavaScript1.2" type="text/javascript">
/*
 * A very simple script to filter a table according to search criteria
 *
 * http://leparlement.org/filterTable
 * See also http://www.vonloesch.de/node/23
 */
function filterTable(term, table) {
  dehighlight(table);
  var terms = term.value.toLowerCase().split(" ");

  for (var r = 1; r < table.rows.length; r++) {
    var display = '';
    for (var i = 0; i < terms.length; i++) {
      if (table.rows[r].innerHTML.replace(/<[^>]+>/g, "").toLowerCase()
        .indexOf(terms[i]) < 0) {
        display = 'none';
      } else {
        if (terms[i].length) highlight(terms[i], table.rows[r]);
      }
      table.rows[r].style.display = display;
    }
  }
}


/*
 * Transform back each
 * <span>preText <span class="highlighted">term</span> postText</span>
 * into its original
 * preText term postText
 */
function dehighlight(container) {
  for (var i = 0; i < container.childNodes.length; i++) {
    var node = container.childNodes[i];

    if (node.attributes && node.attributes['class']
      && node.attributes['class'].value == 'highlighted') {
      node.parentNode.parentNode.replaceChild(
          document.createTextNode(
            node.parentNode.innerHTML.replace(/<[^>]+>/g, "")),
          node.parentNode);
      // Stop here and process next parent
      return;
    } else if (node.nodeType != 3) {
      // Keep going onto other elements
      dehighlight(node);
    }
  }
}

/*
 * Create a
 * <span>preText <span class="highlighted">term</span> postText</span>
 * around each search term
 */
function highlight(term, container) {
  for (var i = 0; i < container.childNodes.length; i++) {
    var node = container.childNodes[i];

    if (node.nodeType == 3) {
      // Text node
      var data = node.data;
      var data_low = data.toLowerCase();
      if (data_low.indexOf(term) >= 0) {
        //term found!
        var new_node = document.createElement('span');

        node.parentNode.replaceChild(new_node, node);

        var result;
        while ((result = data_low.indexOf(term)) != -1) {
          new_node.appendChild(document.createTextNode(
                data.substr(0, result)));
          new_node.appendChild(create_node(
                document.createTextNode(data.substr(
                    result, term.length))));
          data = data.substr(result + term.length);
          data_low = data_low.substr(result + term.length);
        }
        new_node.appendChild(document.createTextNode(data));
      }
    } else {
      // Keep going onto other elements
      highlight(term, node);
    }
  }
}

function create_node(child) {
  var node = document.createElement('span');
  node.setAttribute('class', 'highlighted');
  node.attributes['class'].value = 'highlighted';
  node.appendChild(child);
  return node;
}

/*
 * Here is the code used to set a filter on all filterable elements, usually I
 * use the behaviour.js library which does that just fine
 */
tables = document.getElementsByTagName('table');
for (var t = 0; t < tables.length; t++) {
  element = tables[t];
 alert ('hello');
  if (element.attributes['class']
    && element.attributes['class'].value == 'filterable') {

    /* Here is dynamically created a form */
    var form = document.createElement('form');
    form.setAttribute('class', 'filter');
    // For ie...
    form.attributes['class'].value = 'filter';
    var input = document.createElement('input');
    input.onkeyup = function() {
      filterTable(input, element);
    }
    form.appendChild(input);
    element.parentNode.insertBefore(form, element);
  }
}
</script>

</head> 

<body>

<style type="text/css">
.small {
	/*font-weight: bold; */ 
	/*font-size: x-small; */
}
.large{
	font-weight: bold; 
	/*font-size: small; */
}
</style>


<table  class="filterable"  border="1" cellpadding="1" cellspacing="1" width="100%">
		<tr>
		<th class="large">Cell ID</th>
		<th class="large">BTS Type</th>
		<th class="large">Band </th>
		<th class="large">EIRP</th>
		<th class="large">Azimuth</th>
		<th class="large">Elec Tilt</th>
		<th  class="large" style="white-space:pre-wrap">Height (AGL)</th>
		<th class="large">Mech Tilt</th>
		<th class="large">Antenna Type</th>
		<th class="large">Feeder Length </th>
		<th class="large">Feeder Type </th>
		<th class="large">Longitude</th>
		<th class="large">Latitude</th>
		<th class="large">Phase</th>
		<th class="large">Region</th>
		<th class="large">Type </th>
		<th class="large">Capacity</th>
		<th class="large">Height</th>
		<th class="large">Clutter</th>
		<th class="large">Div</th>
		<th class="large">Dist</th>
		<th class="large">MSC</th>
		<th class="large">BSC</th>
		</tr>
	  <tr>
	  <td class="small">&nbsp;  </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp;  </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp;  </td>
	  <td class="small">&nbsp;  </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	  <td class="small">&nbsp; </td>
	</tr>
	{states}
	<tr>
	  <td class="small"> {cell_id}</td>
	  <td class="small"> {bts_type}</td>
	  <td class="small"> {band}</td>
	  <td class="small"> {eirp}</td>
	  <td class="small"  style="text-align:center">{azimuth}</td>
	  <td class="small" style="text-align:center">{electrical_tilt}</td>
	  <td class="small" style="text-align:center"> {height_agl}</td>
	  <td class="small" style="text-align:center"> {mechanical_tilt}</td>
	  <td class="small">{antenna_type}</td>
	  <td class="small" style="text-align:center">{feeder_length}</td>
	  <td class="small">{feeder_type}</td>
	  <td class="small">{longitude}</td>
	  <td class="small">{latitude}</td>
	  <td class="small">{phase}</td>
	  <td class="small">{region}</td>
	  <td class="small" style="text-align:center">{type}</td>
	  <td class="small" style="text-align:center">{capacity}</td>
	  <td class="small" style="text-align:center">{height}</td>
	  <td class="small" style="text-align:center">{clutter}</td>
	  <td class="small">{division}</td>
	  <td class="small"> {district}</td>
	  <td class="small">{msc}</td>
	  <td class="small">{bsc}</td>
	</tr>
	{/states}
</table>


<script language="JavaScript1.2">
var speed, currentpos=curpos1=0,alt=1,curpos2=-1

function initialize(){
if (window.parent.scrollspeed!=0){
speed=window.parent.scrollspeed
scrollwindow()
}
}

function scrollwindow(){
temp=(document.all)? document.body.scrollTop : window.pageYOffset
alt=(alt==0)? 1 : 0
if (alt==0)
curpos1=temp
else
curpos2=temp

window.scrollBy(0,speed)
}

setInterval("initialize()",10)

</script>


</body>
</htmll>-