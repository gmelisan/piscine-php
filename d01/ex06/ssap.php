#!/usr/bin/php
<?php

function ft_split($str) {
    $ret = preg_split("/ +/", trim($str));
    sort($ret);
    return $ret;
}

$out = array();

for ($i = 1; $i < $argc; $i++) {
    $out = array_merge($out, ft_split($argv[$i]));
}

sort($out);

foreach ($out as $elem)
    echo "$elem\n";

?>
