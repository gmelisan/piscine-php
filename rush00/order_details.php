<?php

function order_details($order_id) {
    
    function get_artname($mysqli, $id) {
        $query = "SELECT id, name FROM articles WHERE id='$id'";
        $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
        return ($res[0][1]);
    }
        function show_one_field($field)
        {
            echo "<td>";
            echo "$field";
            echo "</td>";
        }
        function show_one_ord($mysqli, $ord) {
            //print_r($ord);
            foreach ($ord as $key => $field)
            {
                if ($key === 0)
                    continue ;
                if ($key === 1) {
                    
                    $field = get_artname($mysqli, $field);
                }
                show_one_field($field);
            }
        }
    include("config.php");
    $mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
    if (!$mysqli)
        exit("db connection error (code " . mysqli_connect_errno() . ")\n");
    $query = "SELECT * FROM order_details WHERE order_id='$order_id';";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    echo "<table>";
    show_one_field("<b>Товар</b>");
    show_one_field("<b>Количество</b>");
    show_one_field("<b>Цена</b>");
    foreach ($res as $ent) {
        echo "<tr>";
        show_one_ord($mysqli, $ent);
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($mysqli);
}
