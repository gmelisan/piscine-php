<?php

class Color {

    public static $verbose = false;
    public $red;
    public $green;
    public $blue;

    function __construct($arr) {
        foreach ($arr as $key => $val) {
            if ($key === "rgb") {
                $this->red = ((int)$val >> 16) & 0xFF;
                $this->green = ((int)$val >> 8) & 0xFF;
                $this->blue = (int)$val & 0xFF;
                break ;
            }
            if ($key === "red")
                $this->red = (int)$val;
            if ($key === "green")
                $this->green = (int)$val;
            if ($key === "blue")
                $this->blue = (int)$val;
        }
        if (Color::$verbose)
            echo $this . " constructed.\n";
    }

    function __destruct() {
        if (Color::$verbose)
            echo $this . " destructed.\n";
    }
    
    function __toString() {
        return sprintf("Color( red: %3d, green: %3d, blue: %3d )",
                       $this->red, $this->green, $this->blue);
    }

    function doc() {
        echo file_get_contents("Color.doc.txt");
    }

    function add($color) {
        return new Color(array(
            "red" => $this->red + $color->red,
            "green" => $this->green + $color->green,
            "blue" => $this->blue + $color->blue));
    }
    
    function sub($color) {
        return new Color(array(
            "red" => $this->red - $color->red,
            "green" => $this->green - $color->green,
            "blue" => $this->blue - $color->blue));
    }

    function mult($f) {
        return new Color(array(
            "red" => $this->red * $f,
            "green" => $this->green * $f,
            "blue" => $this->blue * $f));
    }
}

?>
