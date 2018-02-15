<?php

/* geoplugin.net - location based on user ip */
class geoplugin {

  // This function will return an array with location details using the HTTP requested IP
  public static function locationInfo() {
     $ip = "192.197.54.136";//$_SERVER['REMOTE_ADDR'];
     $get = file_get_contents("http://www.geoplugin.net/xml.gp?ip={$ip}");
     $details = simplexml_load_string($get);
     return $details;
  }

}



?>
