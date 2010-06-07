<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Display Data Using jQuery</title>
    
    <link rel="stylesheet" href="./css/style.css" type="text/css" media="screen" charset="utf-8">
	<style type="text/css">
	body, html {
	background-color: white;
	/*font: normal normal normal 1em/1.5em Helvetica, sans-serif;*/
    }
   pre { font-family: monospace;}

	#pagewrap {
		margin: 0 auto;
		width: 100%;
	}
			
			#search {
				-webkit-border-radius: 10px;
				background-color: white;
				padding: 10px;
				position: fixed;
				right:40px;
				display: none;
			}
			
			
			#body {
				
			}
				table {
					background-color: #666;
					-webkit-border-radius: 10px;
					width: 100%;
					padding: 5px;
				}
											th.sortable {
												background-color: #666;
												color: white;
												cursor: pointer;
												text-decoration: underline;
											}
											th.sortable:hover { color: black; }
											th.sorted-asc, th.sorted-desc  { color: black; }

											td {
												background-color: #ebebeb;
												
											}
											td.odd {
												background-color: #white;
												color: black;
											}
											
											td.hovered {
											   background-color: #666;
											  color: white;
											}
	</style>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
		zebraRows('tbody tr:odd td', 'odd');
		
		$('tbody tr').hover(function(){
		  $(this).find('td').addClass('hovered');
		}, function(){
		  $(this).find('td').removeClass('hovered');
		});
		
		//default each row to visible
		$('tbody tr').addClass('visible');
		
		//overrides CSS display:none property
		//so only users w/ JS will see the
		//filter box
		$('#search').show();
		
		$('#filter').keyup(function(event) {
			//if esc is pressed or nothing is entered
		if (event.keyCode == 27 || $(this).val() == '') {
				//if esc is pressed we want to clear the value of search box
				$(this).val('');
				
				//we want each row to be visible because if nothing
				//is entered then all rows are matched.
		  $('tbody tr').removeClass('visible').show().addClass('visible');
		}
	
			//if there is text, lets filter
			else {
		  filter('tbody tr', $(this).val());
		}
	
			//reapply zebra rows
			$('.visible td').removeClass('odd');
			zebraRows('.visible:even td', 'odd');
		});
		
		//grab all header rows
		$('thead th').each(function(column) {
			$(this).addClass('sortable')
						.click(function(){
							var findSortKey = function($cell) {
								return $cell.find('.sort-key').text().toUpperCase() + ' ' + $cell.text().toUpperCase();
							};
							
							var sortDirection = $(this).is('.sorted-asc') ? -1 : 1;
							
							//step back up the tree and get the rows with data
							//for sorting
							var $rows		= $(this).parent()
																	.parent()
																	.parent()
																	.find('tbody tr')
																	.get();
							
							//loop through all the rows and find 
							$.each($rows, function(index, row) {
								row.sortKey = findSortKey($(row).children('td').eq(column));
							});
							
							//compare and sort the rows alphabetically
							$rows.sort(function(a, b) {
								if (a.sortKey < b.sortKey) return -sortDirection;
								if (a.sortKey > b.sortKey) return sortDirection;
								return 0;
							});
							
							//add the rows in the correct order to the bottom of the table
							$.each($rows, function(index, row) {
								$('tbody').append(row);
								row.sortKey = null;
							});
							
							//identify the column sort order
							$('th').removeClass('sorted-asc sorted-desc');
							var $sortHead = $('th').filter(':nth-child(' + (column + 1) + ')');
							sortDirection == 1 ? $sortHead.addClass('sorted-asc') : $sortHead.addClass('sorted-desc');
							
							//identify the column to be sorted by
							$('td').removeClass('sorted')
										.filter(':nth-child(' + (column + 1) + ')')
										.addClass('sorted');
							
							$('.visible td').removeClass('odd');
							zebraRows('.visible:even td', 'odd');
						});
		});
	});
	
	
	//used to apply alternating row styles
	function zebraRows(selector, className)
	{
		$(selector).removeClass(className)
								.addClass(className);
	}
	
	//filter results based on query
	function filter(selector, query) {
		query	=	$.trim(query); //trim white space
	  query = query.replace(/ /gi, '|'); //add OR for regex
	  
	  $(selector).each(function() {
		($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).hide().removeClass('visible') : $(this).show().addClass('visible');
	  });
	}
	</script>
  </head>
  <body id="index">
	<div id="pagewrap">
		  <div id="search">
			<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
		  </div> 
		  
			 <table cellpadding="1" cellspacing="1" id="resultTable" class="unique_table_style">
					  <thead>
						<tr>
						  <th style="white-space: pre;">Cell ID</th>
						  <th style="white-space: pre;">Site ID</th>
						  <th style="white-space: pre;">BTS Type</th>
						  <th>Band</th>
						  <th >EIRP</th>
						  <th >Azimuth</th>
						  <th style="white-space: pre;">Elec Tilt</th>
						  <th style="white-space: pre;">Height (AGL)</th>
						  <th style="white-space: pre;">Mech Tilt</th>
						  <th style="white-space: pre;">Antenna Type</th>
						  <th style="white-space: pre;">Feeder Length </th>
						  <th style="white-space: pre;">Feeder Type </th>
						  <th >Longitude</th>
						  <th >Latitude</th>
						  <th >Phase</th>
						  <th >Region</th>
						  <th >Type </th>
						  <th >Capacity</th>
						  <th >Height</th>
						  <th >Clutter</th>
						  <th >Div</th>
						  <th >Dist</th>
						  <th >MSC</th>
						  <th >BSC</th> 
						</tr>
					  </thead>
					  <tbody>
					    <tr>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td >&nbsp; </td>
						  <td >&nbsp;  </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp;  </td>
						  <td >&nbsp;  </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td>
						  <td >&nbsp; </td> 
						</tr>
						{sites}
						<tr>
						  <td style="white-space: pre; text-align:center;"> {cell_id}</td>
						  <td style="white-space: pre; text-align:center;"> {site_id}</td>
						  <td style="white-space: pre; text-align:center;"> {bts_type}</td>
						  <td style="text-align:center"> {band}</td>
						  <td style="text-align:center"> {eirp}</td>
						  <td style="text-align:center">{azimuth}</td>
						  <td style="text-align:center">{electrical_tilt}</td>
						  <td style="text-align:center"> {height_agl}</td>
						  <td style="text-align:center"> {mechanical_tilt}</td>
						  <td style="text-align:center">{antenna_type}</td>
						  <td style="text-align:center">{feeder_length}</td>
						  <td style="text-align:center">{feeder_type}</td>
						  <td style="text-align:center">{longitude}</td>
						  <td style="text-align:center">{latitude}</td>
						  <td style="text-align:center">{phase}</td>
						  <td style="text-align:center">{region}</td>
						  <td style="text-align:center">{type}</td>
						  <td style="text-align:center">{capacity}</td>
						  <td style="text-align:center">{height}</td>
						  <td style="text-align:center; white-space: pre;">{clutter}</td>
						  <td style="white-space: pre;">{division}</td>
						  <td style="white-space: pre;"> {district}</td>
						  <td style="white-space: pre;">{msc}</td>
						  <td style="white-space: pre;">{bsc}</td>
						</tr>
						{/sites}
					  </tbody>
			 </table>
		   </div>
	 </div>
  </body>
</html>


