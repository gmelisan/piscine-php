<?php

function print_error() {
    if ($_GET["login"] == "error")
        echo "Неправильный логин/пароль";
    if ($_GET["registration"] == "error")
        echo "Такой пользователь уже существует либо неверные данные";
}
