<?php
include "./query.php";
function create($login, $passwd, $priv, $first_name, $second_name, $phone)
{
    //if (preg_match('/([a-z]|[A-Z]|[0-9]|-|_){1,}/', $login) !== 1)
    //    return (false);
    //if (preg_match('/[а-я]|[А-Я]|[a-z]|[A-Z]/u', $first_name) !== 1)
    //    return (false);
    //if (preg_match('/[а-я]|[А-Я]|[a-z]|[A-Z]/u', $second_name) !== 1)
    //    return (false);
    //if (preg_match('/([0-9]| |-|){1,}/', $phone) !== 1)
    //    return (false);

    $query = "SELECT login FROM users WHERE login='$login'";
    $res = mysqli_fetch_all(query($query));
    if (!empty($res))
        return false;
    $pas = hash("whirlpool", $passwd);
    $query = "INSERT INTO users (login, passwd, priv, first_name, second_name, phone) VALUES ('$login', '$pas', '$priv', '$first_name', '$second_name', '$phone')";
    $result = query($query);
    return ($result);
}
