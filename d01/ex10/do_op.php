#!/usr/bin/php
<?php

if ($argc != 4)
    exit("Incorrect Parameters\n");

$a = trim($argv[1]);
$op = trim($argv[2]);
$b = trim($argv[3]);
   

switch ($op) {
case "+":
    echo ($a + $b) . "\n";
    break ;
case "-":
    echo ($a - $b) . "\n";
    break ;
case "*":
    echo ($a * $b) . "\n";
    break ;
case "/":
    echo ($a / $b) . "\n";
    break ;
case "%":
    echo ($a % $b) . "\n";
    break ;

}

?>
