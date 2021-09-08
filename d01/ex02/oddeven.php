#!/usr/bin/php
<?php

echo "Enter a number: ";
while ($n = fgets(STDIN)) {
    $n = trim($n);
    if (!is_numeric($n))
        echo "'$n' is not a number\n";
    else if ($n % 2 == 0)
        echo "The number $n is even\n";
    else
        echo "The number $n is odd\n";
    echo "Enter a number: ";
}

?>
