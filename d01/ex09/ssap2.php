#!/usr/bin/php
<?php

function ft_split($str) {
    $ret = preg_split("/ +/", trim($str));
    sort($ret);
    return $ret;
}

function precedence($a) {
    if (ctype_alpha($a))
        return 0;
    if (ctype_digit($a))
        return 1;
    return 2;
}

function charcmp($a, $b) {
    $prec_a = precedence($a);
    $prec_b = precedence($b);
    if ($prec_a == 0)
        $a = strtolower($a);
    if ($prec_b == 0)
        $b = strtolower($b);
    if ($prec_a != $prec_b)
        return ($prec_a - $prec_b);
    if ($a == $b)
        return (0);
    return ($a < $b) ? -1 : 1;
}

function cmp($a, $b) {

    for ($i = 0; $i < strlen($a); $i++) {
        if ($a[$i] != $b[$i])
            return charcmp($a[$i], $b[$i]);
    }
    return 0;
}


$out = array();

for ($i = 1; $i < $argc; $i++) {
    $out = array_merge($out, ft_split($argv[$i]));
}

usort($out, "cmp");

foreach ($out as $elem)
    echo "$elem\n";

?>
