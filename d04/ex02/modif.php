<?php

if ($_POST["submit"] != "OK" ||
    $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "")
    exit("ERROR\n");

$file = file_get_contents("../private/passwd");
if (!$file)
    exit("ERROR\n");
$data = unserialize($file);
foreach ($data as &$d) {
    if ($d["login"] === $_POST["login"]) {
        if (hash("whirlpool", $_POST["oldpw"]) != $d["passwd"])
            exit("ERROR\n");
        $d["passwd"] = hash("whirlpool", $_POST["newpw"]);
        file_put_contents("../private/passwd", serialize($data));
        exit("OK\n");
    }
}
echo "ERROR\n";
