<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends Model{
	
	function Admin_model()
	{
		parent::Model();
	}	
	
	// Define the Submenu of Admin
	function menu()
	{
		$menu = anchor('admin',		'General') 	. ' | ' .
				anchor('admin/system',	'System') 	. ' | ' .
				anchor('admin/components',	'Components'). ' | ' .
				anchor('admin/updates','Updates') 	. ' | ' .
				anchor('admin/groups',	'Groups') 	. ' | ' .
				anchor('admin/companies',	'Companies') 	. ' | ' .				
				anchor('admin/persons',	'Persons') 	. ' | ' .
				anchor('admin/feedback',	'Feedback') . ' | ' .
				'<a href="' . site_url() . '/../fm/" title="its temporarily not in our theme">FM</a>';				
			
		return $menu;
	
	}
	function get_suffix()
	{
	   $suffix = array
			  ( 
			   array ('name' => "Jr"),
			   array ('name' => "Sr"),
			   array ('name' => "I"),
			   array ('name' => "II"),
			   array ('name' => "III") 
			  );			
       return $suffix;
	}
	function get_title()
	{	
	  $title = array
			  ( 
			   array ('name' => "Mr"),
			   array ('name' => "Miss"),
			   array ('name' => "Mrs"),
			   array ('name' => "Ms"),
			   array ('name' => "Dr"),
			   array ('name' => "Prof")
			  );			
       return $title;
	}
	function get_priority()
	{
	   $priority = array
			  ( 
			   array ('name' => "High"),
			   array ('name' => "Medium"),
			   array ('name' => "Low") 
			  );			
       return $priority;
	}
	function get_gender()
	{
	    $gender = array
			  ( 
			   array ('name' => "Male"),
			   array ('name' => "Female") 
			  );			
       return $gender;
	}
	function get_sensitivity()
	{
	   $sensitivity = array
			  ( 
			   array ('name' => "Normal"),
			   array ('name' => "Confidential") 
			  );			
       return $sensitivity;
	}
	function get_department()
	{
	   $department = array
			  ( 
			   array ('name' => "RF"),
			   array ('name' => "Civil Engineering"),
			   array ('name' => "Installation"),
			   array ('name' => "Comissioning"),
			   array ('name' => "Testing"),
			   array ('name' => "Acceptance"),
			   array ('name' => "Quality Control"),
			   array ('name' => "Site Act"),
			   array ('name' => "Structural Engineering") 
			  );			
       return $department;
	}
	function get_cities()
	{
	  	    $cities = array
			  ( 
			   array ('name' => "Afghanistan"),
               array ('name' => "Albania"),
			   array ('name' => "Algeria"),
			   array ('name' => "Andorra"),
		       array ('name' => "Angola"),
			   array ('name' => "Antigua and Barbuda"),
			   array ('name' => "Argentina"),
			   array ('name' => "Armenia"),
			   array ('name' => "Australia"),
			   array ('name' => "Austria"),
			   array ('name' => "Azerbaijan"),
			   array ('name' => "Bahamas"),
			   array ('name' => "Bahrain"),
			   array ('name' => "Bangladesh"),
			   array ('name' => "Barbados"),
			   array ('name' => "Belarus"),
			   array ('name' => "Belgium"),
			   array ('name' => "Belize"),
			   array ('name' => "Benin"),
			   array ('name' => "Bermuda"),
			   array ('name' => "Bhutan"),
			   array ('name' => "Bolivia"),
			   array ('name' => "Bosnia and Herzegovina"),
			   array ('name' => "Botswana"),
			   array ('name' => "Brazil"),
			   array ('name' => "Brunei"),
			   array ('name' => "Bulgaria"),
			   array ('name' => "Burkina Faso"),
			   array ('name' => "Burundi"),
			   array ('name' => "Cambodia"),
			   array ('name' => "Cameroon"),
			   array ('name' => "Canada"),
			   array ('name' => "Cape Verde"),
			   array ('name' => "Central African Republic"),
			   array ('name' => "Chad" ),
			   array ('name' => "Chile"),
			   array ('name' => "China"),
			   array ('name' => "Colombia"),
			   array ('name' => "Comoros"),
			   array ('name' => "Congo"),
			   array ('name' => "Costa Rica"),
			   array ('name' => "C&ocirc;te d'Ivoire"),
			   array ('name' => "Croatia"),
			   array ('name' => "Cuba"),
			   array ('name' => "Cyprus"),
			   array ('name' => "Czech Republic"),
			   array ('name' => "Denmark"),
			   array ('name' => "Djibouti"),
			   array ('name' => "Dominica"),
			   array ('name' => "Dominican Republic"),
			   array ('name' => "East Timor"),
			   array ('name' => "Ecuador"),
			   array ('name' => "Egypt"),
			   array ('name' => "El Salvador"),
			   array ('name' => "Equatorial Guinea"),
			   array ('name' => "Eritrea"),
			   array ('name' => "Estonia"),
			   array ('name' => "Ethiopia"),
			   array ('name' => "Fiji"),
			   array ('name' => "Finland"),
			   array ('name' => "France"),
			   array ('name' => "Gabon"),
			   array ('name' => "Gambia"),
		       array ('name' => "Georgia"),
	           array ('name' => "Germany"),
		       array ('name' => "Ghana"),
               array ('name' => "Gibraltar"),
			   array ('name' => "Greece"),
			   array ('name' => "Grenada"),
			   array ('name' => "Guatemala"),
			   array ('name' => "Guinea"),
			   array ('name' => "Guinea-Bissau"),
			   array ('name' => "Guyana"),
			   array ('name' => "Haiti"),
			   array ('name' => "Honduras"),
			   array ('name' => "Hong Kong"),
			   array ('name' => "Hungary"),
			   array ('name' => "Iceland"),
			   array ('name' => "India"),
			   array ('name' => "Indonesia"),
			   array ('name' => "Iran"),
			   array ('name' => "Iraq"),
			   array ('name' => "Ireland"),
			   array ('name' => "Israel"),
			   array ('name' => "Italy"),
			   array ('name' => "Jamaica"),
			   array ('name' => "Japan"),
			   array ('name' => "Jordan"),
			   array ('name' => "Kazakhstan"),
			   array ('name' => "Kenya"),
			   array ('name' => "Kiribati"),
			   array ('name' => "North Korea"),
			   array ('name' => "South Korea"),
			   array ('name' => "Kuwait"),
		       array ('name' => "Kyrgyzstan"),
			   array ('name' => "Laos"),
			   array ('name' => "Latvia"),
		       array ('name' => "Lebanon"),
			   array ('name' => "Lesotho"),
			   array ('name' => "Liberia"),
			   array ('name' => "Libya"),
			   array ('name' => "Liechtenstein"),
			   array ('name' => "Lithuania"),
			   array ('name' => "Luxembourg"),
			   array ('name' => "Macedonia"),
			   array ('name' => "Madagascar"),
			   array ('name' => "Malawi"),
			   array ('name' => "Malaysia"),
			   array ('name' => "Maldives"),
			   array ('name' => "Mali"),
			   array ('name' => "Malta"),
			   array ('name' => "Marshall Islands"),
			   array ('name' => "Mauritania"),
			   array ('name' => "Mauritius"),
			   array ('name' => "Mexico"),
			   array ('name' => "Micronesia"),
			   array ('name' => "Moldova"),
			   array ('name' => "Monaco"),
			   array ('name' => "Mongolia"),
			   array ('name' => "Montenegro"),
			   array ('name' => "Morocco"),
			   array ('name' => "Mozambique"),
			   array ('name' => "Myanmar"),
			   array ('name' => "Namibia"),
			   array ('name' => "Nauru"),
			   array ('name' => "Nepal"),
			   array ('name' => "Netherlands"),
			   array ('name' => "New Zealand"),
			   array ('name' => "Nicaragua"),
			   array ('name' => "Niger"),
			   array ('name' => "Nigeria"),
			   array ('name' => "Norway"),
			   array ('name' => "Oman"),
			   array ('name' => "Pakistan"),
			   array ('name' => "Palau"),
			   array ('name' => "Palestine"),
			   array ('name' => "Panama"),
			   array ('name' => "Papua New Guinea"),
			   array ('name' => "Paraguay"),
			   array ('name' => "Peru"),
			   array ('name' => "Philippines"),
			   array ('name' => "Poland"),
			   array ('name' => "Portugal"),
			   array ('name' => "Puerto Rico"),
			   array ('name' => "Qatar"),
			   array ('name' => "Romania"),
			   array ('name' => "Russia"),
			   array ('name' => "Rwanda"),
			   array ('name' => "Saint Kitts and Nevis"),
			   array ('name' => "Saint Lucia"),
			   array ('name' => "Saint Vincent and the Grenadines"),
			   array ('name' => "Samoa"),
			   array ('name' => "San Marino"),
			   array ('name' => "Sao Tome and Principe"),
			   array ('name' => "Saudi Arabia"),
			   array ('name' => "Senegal"),
			   array ('name' => "Serbia and Montenegro"),
			   array ('name' => "Seychelles"),
			   array ('name' => "Sierra Leone"),
			   array ('name' => "Singapore"),
			   array ('name' => "Slovakia"),
			   array ('name' => "Slovenia"),
			   array ('name' => "Solomon Islands"),
			   array ('name' => "Somalia"),
			   array ('name' => "South Africa"),
			   array ('name' => "Spain"),
			   array ('name' => "Sri Lanka"),
			   array ('name' => "Sudan"),
			   array ('name' => "Suriname"),
			   array ('name' => "Swaziland"),
			   array ('name' => "Sweden"),
			   array ('name' => "Switzerland"),
			   array ('name' => "Syria"),
			   array ('name' => "Taiwan"),
			   array ('name' => "Tajikistan"),
			   array ('name' => "Tanzania"),
			   array ('name' => "Thailand"),
			   array ('name' => "Togo"),
			   array ('name' => "Tonga"),
			   array ('name' => "Trinidad and Tobago"),
			   array ('name' => "Tunisia"),
			   array ('name' => "Turkey"),
			   array ('name' => "Turkmenistan"),
			   array ('name' => "Tuvalu"),
			   array ('name' => "Uganda"),
			   array ('name' => "Ukraine"),
			   array ('name' => "United Arab Emirates"),
			   array ('name' => "United Kingdom"),
			   array ('name' => "United States"),
			   array ('name' => "Uruguay"),
			   array ('name' => "Uzbekistan"),
			   array ('name' => "Vanuatu"),
			   array ('name' => "Vatican City"),
			   array ('name' => "Venezuela"),
			   array ('name' => "Vietnam"),
			   array ('name' => "Yemen"),
			   array ('name' => "Zambia"),
	           array ('name' => "Zimbabwe") 
			  );		
       return $cities;
	}

	
}

