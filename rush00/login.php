<?php

session_start();

include ("auth.php");
if (auth($_POST["login"], $_POST["passwd"]))
{
    $_SESSION["login"] = $_POST["login"];
    header("Location: index.php?login=ok");
}
else
{
    $_SESSION["login"] = "";
    
    header("Location: index.php?login=error");
}
