<?php

function show_item($ent) {
    echo '<div class="item">';
    echo '<center>'.$ent[1].'</center>';
    echo '<img src="images/'.$ent[2].'" title="'.$ent[1].'" alt="'.$ent[1].'">';
    echo '<form action="add_to_basket.php" method="post">';
    echo 'Цена: '.$ent[3];
    echo '<input type="hidden" name="id" value="'.$ent[0].'">';
    echo '<input type="hidden" name="name" value="'.$ent[1].'">';
    echo '<input type="hidden" name="img" value="'.$ent[2].'">';
    echo '<input type="hidden" name="price" value="'.$ent[3].'">';
	echo '<input type="number" name="count" value="1" width="20">';
	echo '<input type="submit" value="В корзину">';
    //print_r($str);
    echo '</form>';
    echo '</div>';
}

function get_catname($mysqli, $id) {
    $query = "SELECT * FROM categories WHERE id='$id';";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    return ($res[0][1]);
}

function get_cats_for($mysqli, $id) {
    $query = "SELECT * FROM cat_list where article_id='$id'";
    $cat_list = mysqli_fetch_all(mysqli_query($mysqli, $query));
    $result = array();
    foreach ($cat_list as $cl) {
        array_push($result, get_catname($mysqli, $cl[0]));
    }
    return $result;
}

function show_items() {
    include("config.php");
    $mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
    if (!$mysqli)
        exit("db connection error (code " . mysqli_connect_errno() . ")\n");
    $query = "SELECT * FROM articles;";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    foreach ($res as $ent) {
        $cat = get_cats_for($mysqli, $ent[0]);
        if (!isset($_GET["cat"]))
            show_item($ent);
        else {
            if (in_array($_GET["cat"], $cat))
                show_item($ent);
        }
    }
    mysqli_close($mysqli);
}
