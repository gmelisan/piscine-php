<?php
include "auth.php";
include "config.php";
session_start();
$mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
if (!$mysqli)
    exit("db connection error (code " . mysqli_connect_errno() . ")\n");
$login = $_SESSION["login"];
if (!auth($login, $_POST["old_passwd"]))
{
    header("Location: edit_account.php?edit=error");
    return false;
}
$pas = hash("whirlpool", $_POST["new_passwd"]);
$query = "SELECT id FROM users WHERE login='$login';";
$res = mysqli_fetch_all(mysqli_query($mysqli, $query));
$user_id = $res[0][0];
$first_name = $_POST["first_name"];
$second_name = $_POST["second_name"];
$phone = $_POST["phone"];
$query = "UPDATE users SET passwd='$pas', first_name='$first_name', second_name='$second_name', phone='$phone' WHERE id='$user_id';";
$res = mysqli_query($mysqli, $query);
mysqli_close($mysqli);
header("Location: edit_account.php?edit=ok");
return ($res);