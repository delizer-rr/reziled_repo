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

class Rectangle extends Figure implements AreaCalculable {
    private $a;
    private $b;
    public $sidesCount = 4;
    
    public function __construct($a, $b){
        $this->a = $a;
        $this->b = $b;
    }
    
    public function getArea(){
        return $this->a * $this->b;
    }
    
    public function infoAbout(){
        return "Это класс прямоугольника. У него " . $this->sidesCount . " стороны";
    }
}

class Square extends Figure implements AreaCalculable {
    private $a;
    public $sidesCount = 4;
    
    public function __construct($a){
        $this->a = $a;
    }
    
    public function getArea(){
        return $this->a * $this->a;
    }
    
    public function infoAbout(){
        return "Это класс квадрата. У него " . $this->sidesCount . " стороны";
    }
}

class Triangle extends Figure implements AreaCalculable {
    private $a;
    private $b;
    private $c;
    public $sidesCount = 3;
    
    public function __construct($a, $b, $c){
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    
    public function getArea(){
        $p = ($this->a + $this->b + $this->c) / 2;
        return sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
    }
    
    public function infoAbout(){
        return "Это класс треугольника. У него " . $this->sidesCount . " стороны";
    }
}
?>
