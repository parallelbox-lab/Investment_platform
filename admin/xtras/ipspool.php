<?php
/**
 * Check if a client IP is in our Server subnet
 *
 * @param string $client_ip
 * @param string $server_ip
 * @return boolean
 */
function clientInSameSubnet($client_ip=false,$server_ip=false) {
    if (!$client_ip)
        $client_ip = $_SERVER['REMOTE_ADDR'];
    if (!$server_ip)
       $server_ip = $_SERVER['SERVER_ADDR'];
    // Extract broadcast and netmask from ifconfig
    if (!($p = popen("ifconfig","r"))) return false;
    $out = "";
    while(!feof($p))
        $out .= fread($p,1024);
    fclose($p);
    // This is because the php.net comment function does not
    // allow long lines.
    $match  = "/^.*".$server_ip;
    $match .= ".*Bcast:(\d{1,3}\.\d{1,3}i\.\d{1,3}\.\d{1,3}).*";
    $match .= "Mask:(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})$/im";
    if (!preg_match($match,$out,$regs))
        return false;
    $bcast = ip2long($regs[1]);
    $smask = ip2long($regs[2]);
    $ipadr = ip2long($client_ip);
    $nmask = $bcast & $smask;
   return (($ipadr & $smask) == ($nmask & $smask));
}

if (getenv('HTTP_X_FORWARDED_FOR')) {
$pipaddress = getenv('HTTP_X_FORWARDED_FOR');
$ipaddress = getenv('REMOTE_ADDR');
//echo "Your Proxy IP address is : ".$pipaddress. "(via $ipaddress)" ;
} else {
$ipaddress = getenv('REMOTE_ADDR');
 //echo "Your IP address is : $ipaddress";
 $country = getenv('GEOIP_COUNTRY_NAME');
   //echo "Your country : $country";
}?>