<?php

include ("query.php");
session_start();
date_default_timezone_set("Europe/Moscow");

function get_user_id() {

    $login = $_SESSION["login"];
    $query = "SELECT id, login FROM users WHERE login='$login'";
    $res = mysqli_fetch_all(query($query));
    return ($res[0][0]);
}

function get_total_price() {
    $basket = unserialize($_SESSION["basket"]);
    $total = 0;
    foreach ($basket as $item) {
        $total += $item["total"];
    }
    return ($total);
}

function get_max_id() {
    $query = "SELECT MAX(id) FROM orders";
    $res = mysqli_fetch_all(query($query));
    return ($res[0][0]);
}

function save_order_details() {
    $order_id = get_max_id();
    $basket = unserialize($_SESSION["basket"]);
    foreach ($basket as $item) {
        $art_id = $item["id"];
        $count = $item["count"];
        $price = $item["total"];
        $query = "INSERT INTO order_details (order_id, article_id, quantity, price) ";
        $query .= "VALUES ('$order_id', '$art_id', '$count', '$price')";
        //print_r($query);
        query($query);
    }
}

function save_order() {!
    
    $date = date("Y-m-d H:i:s");
    $id = get_user_id();
    $price = get_total_price();
    $query = "INSERT INTO orders (id, date, user_id, price) ";
    $query .= "VALUES (NULL, '$date', '$id', '$price')";
    query($query);
    save_order_details();
    $_SESSION["basket"] = "";
}

function clear() {
    $_SESSION["basket"] = "";
    header("Location: basket.php");
}

function confirm() {
    if (!$_SESSION["login"])
        header("Location: order_confirm.php?status=needlogin");
    else {
        save_order();
        header("Location: order_confirm.php?status=ok");
    }
}

if (isset($_POST["clear"]))
    clear();

if (isset($_POST["confirm"]))
    confirm();
