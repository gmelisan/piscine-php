#!/usr/bin/php
<?php

function ft_split($str) {
    $ret = preg_split("/ +/", trim($str));
    sort($ret);
    return $ret;
}

?>
