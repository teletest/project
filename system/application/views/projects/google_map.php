<?PHP
$this->load->library('Cigooglemapapi');
$this->cigooglemapapi->setAPIKey('yourapikey'); 

$this->cigooglemapapi->addMarkerByAddress('621 N 48th St # 6 Lincoln NE 68502','PJ Pizza','<b>PJ Pizza</b>');
$this->cigooglemapapi->addMarkerByAddress('826 P St Lincoln NE 68502','Old Chicago','<b>Old Chicago</b>');
$this->cigooglemapapi->addMarkerByAddress('3457 Holdrege St Lincoln NE 68502',"Valentino's","<b>Valentino's</b>");
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
    <?php $this->cigooglemapapi->printHeaderJS(); ?>
    <?php $this->cigooglemapapi->printMapJS(); ?>
    <!-- necessary for google maps polyline drawing in IE -->
    <style type="text/css">
      v\:* {
        behavior:url(#default#VML);
      }
    </style>
    </head>
    <body onload="onLoad()">
    <table border=1>
    <tr><td>
    <?php $this->cigooglemapapi->printMap(); ?>
    </td><td>
    <?php $this->cigooglemapapi->printSidebar(); ?>
    </td></tr>
    </table>
    </body>
    </html>