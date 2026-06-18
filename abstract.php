<?php
// 1
abstract class Shape {
    protected $name;

    abstract public function calculateArea();

    public function getName() {
        return $this->name;
    }
}

class Circle extends Shape {
    private $radius;

    public function setRadius($radius) {
        $this->name = "Круг";
        $this->radius = $radius;
    }

    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;

    public function setDimensions($width, $height) {
        $this->name = "Прямоугольник";
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() {
        return $this->width * $this->height;
    }
}

class Triangle extends Shape {
    private $base;
    private $height;

    public function setDimensions($base, $height) {
        $this->name = "Треугольник";
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea() {
        return 0.5 * $this->base * $this->height;
    }
}

$circle = new Circle();
$circle->setRadius(5);

$rectangle = new Rectangle();
$rectangle->setDimensions(4, 6);

$triangle = new Triangle();
$triangle->setDimensions(3, 8);

$shapes = [$circle, $rectangle, $triangle];

foreach ($shapes as $shape) {
    echo "Фигура: " . $shape->getName() . " | Площадь: " . round($shape->calculateArea(), 2) . "\n";
}

echo '<br>';


// 2


class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function getBalance() {
        return $this->balance;
    }

    protected function setBalance($amount) {
        $this->balance = $amount;
    }
}

class SavingsAccount extends BankAccount {
    private $interestRate = 0.05;

    public function addInterest() {
        $interest = $this->getBalance() * $this->interestRate;
        $this->deposit($interest);
    }
}

class CreditAccount extends BankAccount {
    private $creditLimit = 0;

    public function setCreditLimit($limit) {
        if ($limit >= 0) {
            $this->creditLimit = $limit;
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && ($this->getBalance() - $amount) >= -$this->creditLimit) {
            $newBalance = $this->getBalance() - $amount;
            $this->setBalance($newBalance);
            return true;
        }
        return false;
    }
}

$savings = new SavingsAccount();
$savings->deposit(1000);
$savings->addInterest();

$credit = new CreditAccount();
$credit->setCreditLimit(500);
$credit->deposit(200);
$credit->withdraw(600);

$accounts = [$savings, $credit];

foreach ($accounts as $account) {
    echo "Баланс счета: " . $account->getBalance() . "\n";
}
echo '<br>';
// 3


abstract class Transport {
    protected $speed;

    abstract public function move();

    public function setSpeed($speed) {
        $this->speed = $speed;
    }
}

class Car extends Transport {
    public function move() {
        echo "Скорость машины " . $this->speed . " км/ч.\n";
    }
}

class Bike extends Transport {
    public function move() {
        echo "Скорость велосипеда " . $this->speed . " км/ч.\n";
    }
}

class Plane extends Transport {
    public function move() {
        echo "Скорость самолета " . $this->speed . " км/ч.\n";
    }
}

$car = new Car();
$car->setSpeed(90);

$bike = new Bike();
$bike->setSpeed(20);

$plane = new Plane();
$plane->setSpeed(850);

$transports = [$car, $bike, $plane];

foreach ($transports as $transport) {
    $transport->move();
}

echo '<br>';


// 4


abstract class Product {
    protected $price;

    abstract public function getFinalPrice();

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

class PhysicalProduct extends Product {
    private $deliveryCost = 300;

    public function getFinalPrice() {
        return $this->price + $this->deliveryCost;
    }
}

class DigitalProduct extends Product {
    public function getFinalPrice() {
        return $this->price;
    }
}

class DiscountedProduct extends Product {
    private $discountPercent = 15;

    public function getFinalPrice() {
        return $this->price * (1 - $this->discountPercent / 100);
    }
}

$book = new PhysicalProduct();
$book->setPrice(500);

$course = new DigitalProduct();
$course->setPrice(1500);

$phone = new DiscountedProduct();
$phone->setPrice(20000);

$cart = [$book, $course, $phone];

foreach ($cart as $product) {
    echo "Базовая цена: " . $product->getPrice() . " | Итоговая стоимость: " . $product->getFinalPrice() . "\n";
}


?>