<?php

session_start();

function delete_item($arr, $id) {
    $res = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if ($i != $id) {
            array_push($res, $arr[$i]);
        }
    }
    return ($res);
}

session_start();

$id = $_POST["id"];

$basket = unserialize($_SESSION["basket"]);

$to_del = 0;

foreach($basket as $item) {
    if ($item["id"] === $id) {
        break;
    }
    $to_del++;
}

//$basket = delete_item($bakset, $to_del);

array_splice($basket, $to_del, 1);

if (empty($basket))
    $_SESSION["basket"] = "";
else
    $_SESSION["basket"] = serialize($basket);

header("Location: basket.php");
