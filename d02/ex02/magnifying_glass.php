#!/usr/bin/php
<?php

if ($argc < 2)
    exit();

$str = file_get_contents($argv[1]);

$str = preg_replace_callback("/<a.*?<\/a>/si", function ($matches) {
    $matches[0] = preg_replace_callback("/(title=\")(.*?)(\")/si", function ($matches2) {
        return ($matches2[1] . strtoupper($matches2[2]) . $matches2[3]);
    }, $matches[0]);
    $matches[0] = preg_replace_callback("/(>)(.*?)(<)/si", function ($matches2) {
        return ($matches2[1] . strtoupper($matches2[2]) . $matches2[3]);
    }, $matches[0]);
    return $matches[0];
}, $str);

echo $str;

?>
