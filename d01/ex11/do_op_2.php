#!/usr/bin/php
<?php

function check_op($c)
{
    if ($c == '+' || $c == '-' || $c == '*' || $c == '/' || $c == '%')
        return (1);
    return (0);
}

if ($argc != 2)
    exit("Incorrect Parameters\n");

$str = preg_replace("/ +/", "", $argv[1]);

$a = 0;
$b = 0;
$i = 0;

for ($i; $i < strlen($str); $i++) {
    if (!ctype_digit($str[$i]))
        break ;
    $a = $a * 10 + $str[$i];
}

if (!check_op($str[$i]))
    exit("Syntax Error\n");

$op = $str[$i];
$i++;

for ($i; $i < strlen($str); $i++) {
    if (!ctype_digit($str[$i]))
        exit("Syntax Error\n");
    $b = $b * 10 + $str[$i];
}

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
