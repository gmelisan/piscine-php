<?php

// ~/.brew/etc/my.cnf - add "default-authentication-plugin = mysql_native_password"
// CREATE USER 'rush'@'localhost' IDENTIFIED WITH mysql_native_password BY 'rushpw';
// create database rush00;
// grant all previleges on rush00.* to 'rush'@'localhost';

include("config.php");

$mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
if (!$mysqli)
    exit("db connection error (code " . mysqli_connect_errno() . ")\n");

$file = file("rush00.sql");
$query = "";
foreach ($file as $line) {
    $query .= $line;
    if (substr(trim($line), -1, 1) == ";") {
        if (!mysqli_query($mysqli, $query))
            exit(mysqli_error($mysqli));
        $query = "";
    }
}

echo "Success\n";

mysqli_close($mysqli);
