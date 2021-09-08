<?php

if ($_POST["submit"] != "OK" || $_POST["login"] === "" || $_POST["passwd"] === "")
    exit("ERROR\n");

if (!file_exists("../private"))
    mkdir("../private");

$entry = array("login" => $_POST["login"],
               "passwd" => hash("whirlpool", $_POST["passwd"]));

if (file_exists("../private/passwd")) {
    $data = unserialize(file_get_contents("../private/passwd"));
    $count = 0;
    foreach ($data as $d) {
        $count++;
        if ($d["login"] === $entry["login"])
            exit("ERROR\n");
    }
    $count++;
    $data[$count] = $entry;
    file_put_contents("../private/passwd", serialize($data));
}
else {
    $data[0] = $entry;
    file_put_contents("../private/passwd", serialize($data));
}

echo "OK\n";
