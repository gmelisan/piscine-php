<?php
function query($query)
{
    $host = "localhost";
    $user = "rush";
    $pass = "rushpw";
    $dbname = "rush00";
    $port = 3306;
    $socket = "/tmp/mysql.sock";
    $mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
    if (!$mysqli)
        exit("db connection error (code " . mysqli_connect_errno() . ")\n");
    if (($result = mysqli_query($mysqli, $query)) === false) {
        mysqli_error($mysqli);
        exit("can't perform query\n");
    }
    mysqli_close($mysqli);
    return ($result);
}
