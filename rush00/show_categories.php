<?php

function show_one_cat($str) {
    $cat = array("cat" => $str);
    $query = http_build_query($cat);
    echo "<a href=index.php?$query> $str </a>";
    echo "<br>";
}

function show_categories() {

    include("config.php");
    $mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
    if (!$mysqli)
    exit("db connection error (code " . mysqli_connect_errno() . ")\n");
    $query = "SELECT * FROM categories;";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    foreach ($res as $ent) {
        show_one_cat($ent[1]);
    }
    mysqli_close($mysqli);
}

?>
