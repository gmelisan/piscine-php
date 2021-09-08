<?php

session_start();

function ask_login() {
    include("login_form.html");
}

function logged_in() {
    echo "Вы залогинены как ". $_SESSION["login"];
    echo "<br>";
    echo '<a href="account.php"> Личный кабинет </a>';
    echo '<br>';
    echo '<a href="logout.php"> Выход </a>';
}

function show_account_info() {
    if ($_SESSION["login"])
        logged_in();
    else
        ask_login();
}
