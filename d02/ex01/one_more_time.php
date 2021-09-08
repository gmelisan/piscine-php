#!/usr/bin/php
<?php

date_default_timezone_set("Europe/Paris");

$weeks = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche",
               "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");

$months = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout",
                "septembre", "octobre", "novembre", "decembre",
                "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout",
                "Septembre", "Octobre", "Novembre", "Decembre");

if ($argc < 2)
    exit();

$str = $argv[1];

$date = array();

// Week

foreach ($weeks as $week) {
    $pos = strpos($str, $week);
    if ($pos === 0) {
        $date["week"] = $week;
    }
}

if (!isset($date["week"]))
    exit("Wrong Format\n");

$str = str_replace($date["week"], "", $str, $count);
if ($count != 1 || $str[0] != ' ')
    exit("Wrong Format\n");

$date["week"] = strtolower($date["week"]);
$str = substr($str, 1);

// Day

sscanf($str, "%d", $date["day"]);

if ($date["day"] <= 0 || $date["day"] > 31)
    exit("Wrong Format\n");

if ($date["day"] < 10)
    $str = substr($str, 1);
else
    $str = substr($str, 2);

if ($str[0] != ' ')
    exit("Wrong Format\n");

$str = substr($str, 1);

// Month

foreach ($months as $month) {
    $pos = strpos($str, $month);
    if ($pos === 0) {
        $date["month"] = $month;
    }
}

if (!isset($date["month"]))
    exit("Wrong Format\n");

$str = str_replace($date["month"], "", $str, $count);
if ($count != 1 || $str[0] != ' ')
    exit("Wrong Format\n");

$date["month"] = strtolower($date["month"]);

for ($i = 0; $i <= 12; $i++) {
    if ($months[$i] == $date["month"])
        $date["month"] = $i + 1;
}

$str = substr($str, 1);

// Year, time

if (strlen($str) != 13)
    exit("Wrong Format\n");

sscanf($str, "%d %d:%d:%d",
       $date["year"], $date["hour"], $date["min"], $date["sec"]);

if (!isset($date["year"]) || !isset($date["hour"]) ||
    !isset($date["min"]) || !isset($date["sec"]))
    exit("Wrong Format\n");

if ($date["hour"] < 0 || $date["hour"] > 23 ||
    $date["min"] < 0 || $date["min"] > 59 ||
    $date["sec"] < 0 || $date["sec"] > 59)
    exit("Wrong Format\n");

if (!checkdate($date["month"], $date["day"], $date["year"]))
    exit("Wrong Format\n");

//print_r($date);

$format = $date["year"] . "-" . $date["month"] . "-" . $date["day"] . " ";
$format .= $date["hour"] . ":" . $date["min"] . ":" . $date["sec"];

echo strtotime($format) . "\n";

?>
