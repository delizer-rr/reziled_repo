<?php
abstract class Figure {
    public $area;
    public $color;
    public $sidesCount;
    
    abstract public function infoAbout();
}

interface AreaCalculable {
    public function getArea();
}
?>
