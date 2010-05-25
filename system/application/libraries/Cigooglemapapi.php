<?php
require('GoogleMapAPI.class.php');

class CiGoogleMapAPI extends GoogleMapAPI{
function CiGoogleMapAPI(){

        parent::GoogleMapAPI();
    }
        
    function fetchURL($url) {
    
        if(ini_get('allow_url_fopen')==true)
		{
			return file_get_contents($url);
		}else{
			return $this->curlFetchURL($url);
		
		}
		
    }
	function curlFetchURL($url){
		// create a new curl resource
		$ch = curl_init();
		
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		// grab URL and pass it to the browser
		$content= curl_exec($ch);
		
		// close curl resource, and free up system resources
		curl_close($ch);
		return $content;
	}
 	function getCache($address) {

	    $_ret = array();
		$this->ci =& get_instance();
		$this->ci->load->database();
		$sql='SELECT lon,lat FROM ' . $this->_db_cache_table. ' WHERE address ="'.$address.'"';
			
		$_res=$this->ci->db->query($sql);

			 
		if($_row = $_res->row()) {  

		$_ret['lon'] = $_row->lon;
		$_ret['lat'] = $_row->lat;
	    }
      
       
        return !empty($_ret) ? $_ret : false;
    }
    function putCache($address, $lon, $lat) {
           if(strlen($address) == 0 || strlen($lon) == 0 || strlen($lat) == 0)
           return false;
             
                $this->ci =& get_instance();
                $this->ci->load->database();

             
             $data = array(
               'address' => $address,
               'lon' => $lon,
               'lat' => $lat,
               
            );
            $this->ci->db->insert($this->_db_cache_table, $data); 
            return true;
          }
     }
?>