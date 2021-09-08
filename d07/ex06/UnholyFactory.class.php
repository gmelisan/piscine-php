<?php

class UnholyFactory {
    private $absorbed = array();
    
    public function absorb($fighter) {

        if (!($fighter instanceof Fighter)) {
            print("(Factory can't absorb this, it's not a fighter)\n");
        }
        else if ($this->isAbsorbed($fighter))
            print("(Factory already absorbed a fighter of type $fighter)\n");
        else {
            array_push($this->absorbed, $fighter);
            print("(Factory absorbed a fighter of type $fighter)\n");
        }
    }

    private function isAbsorbed($fighter) {
        foreach ($this->absorbed as $man) {
            if (get_class($man) === get_class($fighter))
                return true;
        }
        return false;
    }

    public function fabricate($type) {
        $man = $this->findFighter($type);
        if (!$man)
            print("(Factory hasn't absorbed any fighter of type $type)\n");
        else {
            print("(Factory fabricates a fighter of type $type)\n");
            return $man;
        }
        return null;
    }

    private function findFighter($type) {
        foreach ($this->absorbed as $man) {
            if ((string)$man === $type)
                return $man;
        }
        return false;
    }
}

?>
