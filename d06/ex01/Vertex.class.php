<?php

class Vertex {

    public static $verbose = false;
    
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color;

    public function __construct($arr) {
        $this->_x = $arr["x"];
        $this->_y = $arr["y"];
        $this->_z = $arr["z"];
        if (isset($arr["w"]))
            $this->_w = $arr["w"];
        if (isset($arr["color"]))
            $this->_color = $arr["color"];
        else
            $this->_color = new Color(array("rgb" => 0xFFFFFF));
        if (self::$verbose)
            echo $this . " constructed\n";
    }

    public function __destruct() {
        if (self::$verbose)
            echo $this . " destructed\n";
    }

    public function __toString() {
        if (self::$verbose)
            return sprintf("Vertex( x: %1.2f, y: %1.2f, z:%1.2f, w:%1.2f, %s )",
                       $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        else
            return sprintf("Vertex( x: %1.2f, y: %1.2f, z:%1.2f, w:%1.2f )",
                       $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public function doc() {
        echo file_get_contents("Vertex.doc.txt");
    }

    public function __get($name) {
        if ($name === "x" || $name === "y" ||
            $name === "z" || $name === "w" || $name === "color")
        {
            $name = "_" . $name;
            return $this->$name;
        }
        else if (self::$verbose)
            echo "Trying to get unknown attribute '$name'\n";
    }

    public function __set($name, $val) {
        if ($name === "x" || $name === "y" ||
            $name === "z" || $name === "w" || $name === "color")
        {
            $name = "_" . $name;
            $this->$name = $val;
        }
        else if (self::$verbose)
            echo "Trying to set '$val' to unknown attribute '$name'\n";
    }
}

?>
