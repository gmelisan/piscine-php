<?php

class NightsWatch {

    private $fighters = array();
    
    public function recruit($man) {
        array_push($this->fighters, $man);
    }

    public function fight() {
        foreach ($this->fighters as $fighter) {
            if ($fighter instanceof IFighter)
                $fighter->fight();
        }
    }
}

?>
