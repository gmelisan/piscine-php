<?php
include "query.php";
function auth($login, $passwd)
{
    //if (preg_match('/([a-z]|[A-Z]|[0-9]|-|_){1,}/', $login) !== 1 || $passwd === "")
     //   return (false);
    $pas = hash("whirlpool", $passwd);
    $query = "SELECT login, passwd FROM users WHERE login = '$login' AND passwd = '$pas'";
    $query_result = query($query);
    $res = mysqli_fetch_all($query_result);
    if (!$res)
        return (false);
    return (true);
}
