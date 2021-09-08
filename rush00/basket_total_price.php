<?php

function basket_total_price() {
    session_start();
    if ($_SESSION["basket"]) {
        $basket = unserialize($_SESSION["basket"]);
        $total = 0;
        foreach ($basket as $item) {
            $total += $item["total"];
        }
        echo '('.$total.')';
    }
}

?>
