<?php

function getIP() {
      foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
         if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
               if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                  return $ip;
               }
            }
         }
      }
   }

/* MapQuest - geocoding */
class geocoding {

  public static $mapquestKey = "WAcQvgEMTRe78rtpuPGm10r5MOibs4Jl"; //API Key provided by mapquest

  // Function to return all information from mapquest geocoding by passing an address
  public static function locationFinderByAddress($address) {
     $key = self::$mapquestKey;
     $json = file_get_contents("http://www.mapquestapi.com/geocoding/v1/address?key={$key}&location={$address}");
     $details = json_decode($json);
     return $details;
  }

  // Function to return latitude and longitude from mapquest geocoding by passing an address
  public static function LatLongFinderByAddress($address){
    $key = self::$mapquestKey;
    $json = file_get_contents("http://www.mapquestapi.com/geocoding/v1/address?key={$key}&location={$address}");
    $details = json_decode($json);
    if (!empty($details)){
        $lat = $details->results[0]->locations[0]->latLng->lat;
        $lng = $details->results[0]->locations[0]->latLng->lng;
        $latLngArr = [$lat, $lng];
        return $latLngArr;
    }
    else {
        return "Error";
    }

  }

  // Geobytes
  public static function getLocationsInRadius($radius, $lat, $lng){
      $url = 'http://getnearbycities.geobytes.com/GetNearbyCities?radius='.$radius.'&Latitude='.$lat.'&Longitude='.$lng.'&limit=999';
      $response_json = file_get_contents($url);

      $response = json_decode($response_json, true);

      return $response;
  }


  public static function getNearbyCitiesByIP() {
     //$ip = getIP();
     $ip = "192.197.54.136";
     if ($ip){
         $valid = true;
     }
     else { $valid = false; }
     if ($valid){
         $tags=json_decode(file_get_contents('http://getnearbycities.geobytes.com/GetNearbyCities?radius=100&limit=30&locationcode='. $ip), true);
         foreach ($tags as $i => $city){
             $cities[$i] = $city[1];
         }
         return $cities;
     }
     else {
         return false;
     }

  }

}

?>
