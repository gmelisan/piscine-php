<?php

function show_one_item($item) {
    echo '<tr>';
    echo '<td>'.$item["name"].'</td>';
    echo '<td><img src="images/'.$item["img"].'"></td>';
    echo '<td>'.$item["count"].'</td>';
    echo '<td>'.$item["total"].'</td>';
    echo '<td>';
    echo '<form method="post" action="clear_basket_item.php">';
    echo ' <input type="submit" value="Удалить">';
    echo ' <input type="hidden" name="id" value="'.$item["id"].'">';
    echo '</form>';
    echo '</td>';
    echo '</tr>';
}

function show_basket() {
    
    session_start();

    if (!$_SESSION["basket"]) {
        echo "Корзина пуста";
        return ;
    }
    $items = unserialize($_SESSION["basket"]);

    echo '<table>';
    $total = 0;
    foreach ($items as $item) {
        show_one_item($item);
        $total += $item["total"];
    }
    echo '</table>';
    echo '<div id="totalcost">Цена заказа: '. $total;
    echo '</div><br>';
    echo '<form method="post" action="basket_action.php">';
    echo '<input type="submit" name="clear" value="Очистить корзину">';
    echo '<input type="submit" name="confirm" value="Подтвердить заказ">';
    echo '</form>';

}
