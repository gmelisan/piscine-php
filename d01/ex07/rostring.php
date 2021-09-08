#!/usr/bin/php
<?php

if ($argv[1]) {
    $arr = preg_split("/ +/", trim($argv[1]));
    $first = $arr[0];
    unset($arr[0]);
    array_push($arr, $first);
    $str = implode(" ", $arr);
    echo "$str\n";
}
?>
