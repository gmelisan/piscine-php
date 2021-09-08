<?php
include "config.php";
session_start();
$mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
if (!$mysqli)
    exit("db connection error (code " . mysqli_connect_errno() . ")\n");
$cat_name = $_POST["cat_name"];
$article_name = $_POST["article_name"];
if ($_POST["submit1"] === "Добавить")
{
    $query = "INSERT INTO categories (name) VALUES ('$cat_name');";
}
if ($_POST["submit1"] === "Удалить")
{
    $query = "SELECT id FROM categories WHERE (name='$cat_name');";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    $cat_id = $res[0];
    $query = "DELETE FROM cat_list WHERE (cat_id='$cat_id');";
    $res = mysqli_query($mysqli, $query);
    $query = "DELETE FROM categories WHERE (name='$cat_name');";
    $res = mysqli_query($mysqli, $query);
}
if ($_POST["submit2"] === "Добавить")
{
    $query = "SELECT id FROM categories WHERE (name='$cat_name');";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    $cat_id = $res[0];
    $query = "SELECT id FROM articles WHERE (name='$article_name');";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    $art_id = $res[0];
    $query = "INSERT INTO cat_list (cat_id, article_id) VALUES ('$cat_id', '$art_id');";
    $res = mysqli_query($mysqli, $query);
}
if ($_POST["submit2"] === "Удалить")
{
    $query = "SELECT id FROM articles WHERE (name='$article_name');";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    $art_id = $res[0];
    $query = "DELETE FROM cat_list WHERE (article_id='$art_id');";
    $res = mysqli_query($mysqli, $query);
}
//$query = "UPDATE articles SET name='$name', pic='$pic', price='$price' WHERE id='$id';";
$res = mysqli_query($mysqli, $query);
mysqli_close($mysqli);
header("Location: account.php?edit=ok");
return ($res);
