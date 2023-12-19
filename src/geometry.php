<?php
class Point {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX() {
        return $this->x;
    }

    public function getY() {
        return $this->y;
    }

    public function moveX($dx) {
        $this->x += $dx;
    }

    public function moveY($dy) {
        $this->y += $dy;
    }
}


class Vector {
    private $x;
    private $y;

    public function __construct($x, $y) {
        if (is_integer($x)){
            $this->x = $x;
        }
        if (is_integer($y)){
            $this->y = $y;
        }
    }

    public function getX() {
        return $this->x;
    }

    public function getY() {
        return $this->y;
    }

    public function length() {
        return sqrt($this->x * $this->x + $this->y * $this->y);
    }

    public function isZeroVector() {
        return $this->x === 0 && $this->y === 0;
    }

    public function isPerpendicular(Vector $vect) {
        return ($this->x * $vect->getX() + $this->y * $vect->getY()) === 0;
    }
}
?>