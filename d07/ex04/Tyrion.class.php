<?php

class Tyrion {
    public function sleepWith($target) {
        switch (get_class($target)) {
        case "Jaime":
            print("Not even if I'm drunk !" . PHP_EOL);
            break;
        case "Cersei":
            print("Not even if I'm drunk !" . PHP_EOL);
            break;
        case "Sansa":
            print("Let's do this." . PHP_EOL);
            break;
        }
    }
}

?>
