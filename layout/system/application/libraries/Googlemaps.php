<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Google Maps Class V 1.0
 *
 * Displays a Google Maps
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		BIOSTALL (Steve Marks)
 * @link		http://biostall.com
 */
 
class Googlemaps {

	var	$version			= "2";
	var	$apikey				= "";
	var $map_div_id			= "map_canvas";
	var $google_host		= "maps.google.com";
	var $map_width			= "100%";
	var $map_height			= "450px";
	var $center_lat_long	= "37.4419, -122.1419";
	var $center_address		= "";
	var $sensor				= "false";
	var $zoom				= 13;
	var $type				= "normal"; // normal, satellite, hybrid, earth
	var $controls			= array();
	var $hide_controls		= FALSE;
	var $icon_image			= "";
	
	var	$markers			= array();
	var	$possible_controls	= array("GLargeMapControl3D", 
									"GLargeMapControl",
									"GSmallMapControl", 
									"GSmallZoomControl3D", 
									"GSmallZoomControl", 
									"GScaleControl", 
									"GMapTypeControl",
									"GHierarchicalMapTypeControl",
									"GOverviewMapControl",
									"GNavLabelControl"
							   );
	
	var	$infowindow_onload	= '';
	
	
	function Googlemaps($config = array())
	{
		if (count($config) > 0)
		{
			$this->initialize($config);
		}

		log_message('debug', "Google Maps Class Initialized");
	}

	function initialize($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}
	
	function get_lat_long_from_address($address='')
	{
		if (substr(trim($this->google_host), 0, 7)!="http://") { $this->google_host = "http://".$this->google_host; }
		$contents = file_get_contents($this->google_host."/maps/geo?key=".$this->apikey."&output=csv&q=".str_replace(" ", "+", $address));
		$contents = explode(",", $contents);
		
		return $contents[2].','.$contents[3];
		
	}
	
	function add_marker($params = array())
	{
		
		$marker = array();
		
		$marker['lat_long'] = '';
		$marker['address'] = '';
		$marker['infowindow_type'] = '';
		$marker['infowindow_content'] = '';
		$marker['infowindow_open'] = FALSE;
		$marker['icon_image'] = '';
		
		foreach ($params as $key => $value) {
		
			if (isset($marker[$key])) {
			
				$marker[$key] = $value;
				
			}
			
		}
		
		$marker_number = count($this->markers);
		
		$marker_script = '';
		
		// marker icon
		$marker_icon = '';
		if ($marker['icon_image']!="") {
			$marker_icon = $marker['icon_image'];
		}else{
			if ($this->icon_image!="") {
				$marker_icon = $this->icon_image;
			}
		}
		
		if ($marker_icon!="") {
			// get icon size
			$icon_width = '15';
			$icon_height = '15';
			list($icon_width, $icon_height, $icon_type, $icon_attr) = getimagesize($marker_icon);
			//
			
			$marker_script .= '
				var markerIcon = new GIcon(G_DEFAULT_ICON);
				markerIcon.image = "'.$marker_icon.'";
				markerIcon.shadow = "";
				markerIcon.iconSize = new GSize('.$icon_width.', '.$icon_height.');
				markerIcon.iconAnchor = new GPoint('.ceil($icon_width/2).', '.$icon_height.');
				markerOptions = { icon:markerIcon };
			';
		}else{
			$marker_script .= '
				markerOptions = "";
			';
		}
		//
		
		if ($marker['address']!="") { // if placing a marker based on an address
			$marker['lat_long'] = $this->get_lat_long_from_address($marker['address']);
		}
		
		$marker_script .= '
			var point'.$marker_number.' = new GLatLng('.$marker['lat_long'].');
			var marker'.$marker_number.' = new GMarker(point'.$marker_number.', markerOptions);
			map.addOverlay(marker'.$marker_number.');
		';
		
		switch (strtolower(trim($marker['infowindow_type']))) {
			case "text": {
				$marker_script .= '
					GEvent.addListener(marker'.$marker_number.', "click", function() {
						map.openInfoWindow(point'.$marker_number.', "'.$marker['infowindow_content'].'");
					});
				';
				break;
			}
			case "html": {
				$marker_script .= '
					GEvent.addListener(marker'.$marker_number.', "click", function() {
						map.openInfoWindowHtml(point'.$marker_number.', "'.$marker['infowindow_content'].'");
					});
				';
				break;
			}
		}
		
		// if open this infowindow by default and if not already one to be opened
		if ($marker['infowindow_open'] && $this->infowindow_onload=="") {
			$this->infowindow_onload = 'map.openInfoWindowHtml(point'.$marker_number.', "'.$marker['infowindow_content'].'");';
		}
		
		array_push($this->markers, $marker_script);
	
	}

	function create_map()
	{
	
		$this->javascript = "";
		$this->mapdiv = "";
		
		// set map type
		switch (strtolower(trim($this->type))) {
			case "satellite": { $this->type = 'G_SATELLITE_MAP'; break; }
			case "earth": { $this->type = 'G_SATELLITE_3D_MAP'; break; }
			case "hybrid": { $this->type = 'G_HYBRID_MAP'; break; }
			default: { $this->type = 'G_NORMAL_MAP'; }
		}
		//
		
		if ($this->center_address!="") { // if centering the map based on an address
			$this->center_lat_long = $this->get_lat_long_from_address($this->center_address);
		}
		
		$this->javascript = '
							<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key='.$this->apikey.'&sensor='.$this->sensor.'" type="text/javascript"></script>

							<script type="text/javascript">

								function initialize() {
								
									if (GBrowserIsCompatible()) {
									
										var map = new GMap2(document.getElementById("'.$this->map_div_id.'"));
										map.setCenter(new GLatLng('.$this->center_lat_long.'), '.$this->zoom.');
							';
		if (!$this->hide_controls) {
			$this->javascript .= '
										map.setUIToDefault();
								 ';
		}
		$this->javascript .= '
										map.setMapType('.$this->type.');
							';
		
		if (count($this->controls)) {
			foreach ($this->controls as $control) {
				if (in_array($control, $this->possible_controls)) {
					$this->javascript .= '
						map.addControl(new '.$control.'());
					';
				}
			}
		}
		
		if (count($this->markers)) {
			
			foreach ($this->markers as $marker) {
			
				$this->javascript .= $marker;
									
			}
			
		}
		
		$this->javascript .= $this->infowindow_onload;
		
		$this->javascript .= '	
								  	}
									
								}
								
								window.onload = initialize;
								window.onunload = GUnload();
								
							</script>';
		
		// set height and width
		if (is_numeric($this->map_width)) { // if no width type set
			$this->map_width = $this->map_width.'px';
		}
		if (is_numeric($this->map_height)) { // if no height type set
			$this->map_height = $this->map_height.'px';
		}
		//
		
		$this->mapdiv = '<div id="'.$this->map_div_id.'" style="width:'.$this->map_width.'; height:'.$this->map_height.';"></div>';
		
		return array('javascript'=>$this->javascript, 'mapdiv'=>$this->mapdiv);
		
	}

}

?>