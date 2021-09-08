#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Moscow");

function cmp($a, $b) {
    return $a["time"] - $b["time"];
}

$fd = fopen("/var/run/utmpx", 'r');
$str = fread($fd, 628);
$out = array();
while ($str = fread($fd, 628))
{
    $arr = unpack("a256user/a4id/a32terminal/i1pid/i1login/I1time", $str);
    if ($arr["login"] == 7)
        array_push($out, $arr);
}
    
usort($out, "cmp");

foreach ($out as $i)
    echo $i["user"]." ".$i["terminal"]."  ".date("M  j H:i", $i["time"])."\n";

fclose($fd);

?>
