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


$rect1 = new Rectangle(5, 10);
$rect2 = new Rectangle(3, 7);

$square1 = new Square(4);
$square2 = new Square(6);

$triangle1 = new Triangle(3, 4, 5);
$triangle2 = new Triangle(6, 8, 10);

echo "<h2>Прямоугольники</h2>";
echo $rect1->infoAbout() . "<br>";
echo "Площадь: " . $rect1->getArea() . "<br><br>";

echo $rect2->infoAbout() . "<br>";
echo "Площадь: " . $rect2->getArea() . "<br><br>";

echo "<h2>Квадраты</h2>";
echo $square1->infoAbout() . "<br>";
echo "Площадь: " . $square1->getArea() . "<br><br>";

echo $square2->infoAbout() . "<br>";
echo "Площадь: " . $square2->getArea() . "<br><br>";

echo "<h2>Треугольники</h2>";
echo $triangle1->infoAbout() . "<br>";
echo "Площадь: " . $triangle1->getArea() . "<br><br>";

echo $triangle2->infoAbout() . "<br>";
echo "Площадь: " . $triangle2->getArea() . "<br>";
?>
