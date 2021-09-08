<?php

require_once "Vertex.class.php";

class Vector {

    public static $verbose = false;
    
    private $_x;
    private $_y;
    private $_z;
    private $_w;

    public function __construct($arr) {
        $dest = $arr["dest"];
        if (isset($arr["orig"]))
            $orig = $arr["orig"];
        else
            $orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
        $this->_x = $dest->x - $orig->x;
        $this->_y = $dest->y - $orig->y;
        $this->_z = $dest->z - $orig->z;
        $this->_w = 0;
        if (self::$verbose)
            echo $this . " constructed\n";
    }

    public function __destruct() {
        if (self::$verbose)
            echo $this . " destructed\n";
    }

    public function __toString() {
        return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
                       $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public function doc() {
        echo file_get_contents("Vector.doc.txt");
    }

    public function __get($name) {
        if ($name === "x" || $name === "y" ||
            $name === "z" || $name === "w")
        {
            $name = "_" . $name;
            return $this->$name;
        }
        else if (self::$verbose)
            echo "Trying to get unknown attribute '$name'\n";
    }

    public function magnitude() {
        return (float)sqrt($this->_x * $this->_x +
                           $this->_y * $this->_y +
                           $this->_z * $this->_z);
    }

    public function normalize() {
        $len = $this->magnitude();
        return new Vector(array("dest" => new Vertex(array(
            'x' => $this->_x / $len,
            'y' => $this->_y / $len,
            'z' => $this->_z / $len))));
    }

    public function add($rhs) {
        return new Vector(array("dest" => new Vertex(array(
            'x' => $this->_x + $rhs->x,
            'y' => $this->_y + $rhs->y,
            'z' => $this->_z + $rhs->z))));
    }

    public function sub($rhs) {
        return new Vector(array("dest" => new Vertex(array(
            'x' => $this->_x - $rhs->x,
            'y' => $this->_y - $rhs->y,
            'z' => $this->_z - $rhs->z))));
    }

    public function opposite() {
        return new Vector(array("dest" => new Vertex(array(
            'x' => $this->_x * -1,
            'y' => $this->_y * -1,
            'z' => $this->_z * -1))));
    }

    public function scalarProduct($k) {
        return new Vector(array("dest" => new Vertex(array(
            'x' => $this->_x * $k,
            'y' => $this->_y * $k,
            'z' => $this->_z * $k))));
    }

    public function dotProduct($rhs) {
        return (float)($this->_x * $rhs->x +
                       $this->_y * $rhs->y +
                       $this->_z * $rhs->z);
    }

    public function cos($rhs) {
        return (float)($this->dotProduct($rhs) /
                       ($this->magnitude() * $rhs->magnitude()));
    }

    public function crossProduct($rhs) {
        return new Vector(array("dest" => new Vertex(array(
            'x' => $this->_y * $rhs->z - $this->_z * $rhs->y,
            'y' => $this->_z * $rhs->x - $this->_x * $rhs->z,
            'z' => $this->_x * $rhs->y - $this->_y * $rhs->x))));
    }
}

?>
