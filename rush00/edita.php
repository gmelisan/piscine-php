<?php
include "auth.php";
include "config.php";
session_start();
$mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
if (!$mysqli)
    exit("db connection error (code " . mysqli_connect_errno() . ")\n");
$name = $_POST["name"];
$pic = $_POST["pic"];
$price = $_POST["price"];
if ($_POST["submit"] === "Добавить")
{
    $query = "INSERT INTO articles (name, pic, price) VALUES ('$name', '$pic', '$price');";
}
if ($_POST["submit"] === "Удалить")
{
    $query = "DELETE FROM articles WHERE (name='$name')";
}
//$query = "UPDATE articles SET name='$name', pic='$pic', price='$price' WHERE id='$id';";
$res = mysqli_query($mysqli, $query);
mysqli_close($mysqli);
header("Location: account.php?edit=ok");
return ($res);