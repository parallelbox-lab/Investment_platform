<?php
//ini_alter('date.timezone','Africa/Lagos');
date_default_timezone_set("Africa/Lagos");
$info = getdate();
$date = str_pad($info['mday'], 2, 0, STR_PAD_LEFT);
$month = str_pad($info['mon'], 2, 0, STR_PAD_LEFT);
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
//if($hour>12){$hour=$hour-12; $tz="PM";}else{$hour=$hour; $tz="AM";}
$time= "$hour:$min:$sec";
$dtime = "$year-$month-$date $hour:$min:$sec";
?>