<?php

if ($_SERVER["PHP_AUTH_USER"] == "zaz" &&
    $_SERVER["PHP_AUTH_PW"] == "jaimelespetitsponeys") {
    $file = file_get_contents("../img/42.png");
    $encoded = base64_encode($file);
    echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64,$encoded'>\n</body></html>\n";
}
else {
    $out = "<html><body>That area is accessible for members only</body></html>\n";
    $size = strlen($out);
    header("HTTP/1.0 401 Unauthorized");
    header("WWW-Authenticate: Basic realm=''Member area''");
    header("Content-Length: $size");
    header("Content-Type: text/html");
    echo $out;
}
    
