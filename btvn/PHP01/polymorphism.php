<?php

abstract class Shape {
    protected $name;
    public function __construct($name){
        $this->name = $name;
    }
    abstract function calculateArea();
}
// Lớp con triển khai (implements) interface
class Circle extends Shape {
    private $radius;
    public function __construct($name, $radius) {
        parent::__construct($name);
        $this->radius = $radius;
    }
    public function calculateArea() {
        return 3.14 * $this->radius * $this->radius;
    }
}

// Lớp con khác triển khai interface
class Square extends Shape {
    private $side;
    public function __construct($name, $side) {
        parent::__construct($name);
        $this->side = $side;
    }
    public function calculateArea() {
        return $this->side ** 2;
    }
}

// Tạo đối tượng từ lớp con và gọi các phương thức từ interface
$circle = new Circle("circle1", 5);
echo "Diện tích hình tròn: " . $circle->calculateArea() . "\n";

$rectangle = new Square( "square1", 4);
echo "Diện tích hình chữ vuông: " . $rectangle->calculateArea() . "\n";
