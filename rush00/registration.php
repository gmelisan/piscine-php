<?php
include "create.php";
if (!$_POST["submit"] === "Подтвердить")
    return;

$res = create($_POST["login"],
              $_POST["passwd"],
              "user",
              $_POST["first_name"],
              $_POST["second_name"],
              $_POST["phone"]);
if (!$res)
    header("Location: index.php?registration=error");
else {
    header("Location: index.php?registration=ok");
}
