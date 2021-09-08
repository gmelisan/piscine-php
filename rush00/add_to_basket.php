<?php

session_start();

if (!$_SESSION["basket"])
    $basket = array();
else
    $basket = unserialize($_SESSION["basket"]);


$item["id"] = $_POST["id"];
$item["name"] = $_POST["name"];
$item["img"] = $_POST["img"];
$item["count"] = $_POST["count"];
$item["price"] = $_POST["price"];
$item["total"] = $_POST["count"] * $_POST["price"];

$found = false;

foreach ($basket as &$b) {
    if ($b["id"] === $item["id"]) {
        $found = true;
        $b["count"] += (int)$item["count"];
        $b["price"] += (int)$item["price"];
        $b["total"] += (int)$item["total"];
    }
}

if (!$found)
    array_push($basket, $item);

$_SESSION["basket"] = serialize($basket);

header("Location: index.php");
    
?>
