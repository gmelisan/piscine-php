<?php
session_start();

function edit_articles_link() {
include("config.php");

$mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
if (!$mysqli)
exit("db connection error (code " . mysqli_connect_errno() . ")\n");
$query = "SELECT login, priv FROM users WHERE login='".$_SESSION["login"]."';";
$res = mysqli_fetch_all(mysqli_query($mysqli, $query));
mysqli_close($mysqli);
if ($res[0][1] == "admin")
echo '<a href="edit_articles.php">Изменить артиклы</a>';
}
?>