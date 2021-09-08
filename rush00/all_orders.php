<?php
function all_orders() {
    function show_one_filed($filed)
    {
        echo "<td>";
        echo "$filed";
        echo "</td>";
    }
    function show_one_ord($ord) {
        $url = "show_order_details.php";
        foreach ($ord as $key => $filed)
        {
            if ($key === 0)
                show_one_filed('<a href="' . $url . '?id=' . $ord[0] . '">' . $ord[0] . '</a>');
            else
                show_one_filed($filed);
        }
    }

    function show($mysqli) {
        $query = "SELECT * FROM orders;";
        $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
        echo "<table>";
        show_one_filed("Номер заказа");
        show_one_filed("Дата");
        show_one_filed("ID пользователя");
        show_one_filed("Цена");
        foreach ($res as $ent) {
            echo "<tr>";
            show_one_ord($ent);
            echo "</tr>";
        }
        echo "</table>";
    }
    include("config.php");
    $mysqli = mysqli_connect($host, $user, $pass, $dbname, $port, $socket);
    if (!$mysqli)
        exit("db connection error (code " . mysqli_connect_errno() . ")\n");
    session_start();
    //check if admin
    //show table for all
    $login = $_SESSION["login"];
    $query = "SELECT priv FROM users WHERE login = '$login'";
    $res = mysqli_fetch_all(mysqli_query($mysqli, $query));
    if ($res[0][0] === "admin")
        show($mysqli);
    mysqli_close($mysqli);
}
