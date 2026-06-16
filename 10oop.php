<?php
    // 1
class User {
    public $name;
    public $email;

    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;

    }

    public function getInfo() {
        return "Пользователь: {$this->name}, Email: {$this->email}";
    }
}

$user = new User("Арсен", "3grge@gmail.com");
echo $user->getInfo();

    // 2
class Rectangle {
    public $width;
    public $height;

    public function __construct($width, $height)    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }

    public function getPerimetr() {
        return 2 * ($this->width + $this->height);
    }
}

$rect = new Rectangle(10,5);
echo $rect->getPerimetr();

    // 3

class Counter {
    public $value;

    public function __construct($value){
        $this->value = $value;
    }

    public function increment(){
        return $this->value ++;
    }
    
    public function decrement(){
        return $this->value --;
    }

    public function getValue(){
        return $this->value;
    }
}

$count = new Counter(10);
echo $count->increment();

    // 4
class Car {
    public $brand;
    public $speed = 0;

    public function __construct($brand) {
        $this->brand = $brand;
    }
    
    public function accelerate($value) {
        return $this->speed += $value;
    }

    public function brake($value) {
        $this->speed -= $value;

        if ($this->speed < 0) {
            $this->speed = 0;
        }

        return $this->speed;
    }
}

$myCar = new Car("Ferrari");
echo $myCar->brake(50);

    // 5
class Student {
    public $name;
    public $grades = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addGrade($grade) {
        $this->grades[] = $grade;
        return $grade;
    }

    public function getAverageGrade(){
        if (count($this->grades) === 0) {
            return 0;
        }
        $sum = array_sum($this->grades);
        $count = count($this->grades);

        return $sum / $count;
    }
}


$student = new Student('Арсен');
$student->addGrade(3);
$student->addGrade(4);
$student->addGrade(5);
$student->addGrade(5);
echo $student->getAverageGrade();

    // 6
class BankAccount {
    public $owner;
    public $balance = 0;

    public function __construct($owner){
        $this->owner = $owner;
    }

    public function deposit($amount){
        $this->balance += $amount;
    }

    public function withdraw($amount){
        if ($amount > $this->balance){
            echo 'Денег нет';
            return;
        }
        $this->balance -= $amount;
    }

    public function getBalance(){
        return $this->balance;
    }

}

$myOwner = new BankAccount('Арсен');
$myOwner->deposit(4);
$myOwner->deposit(4);
$myOwner->deposit(4);
$myOwner->deposit(4);
$myOwner->withdraw(8);
echo $myOwner->getBalance();

    // 7

class Product {
    public $name;
    public $price = 12;

    public function __construct($name){
        $this->name = $name;
    }

    public function setDiscount($percent){
        $discount = ($this->price * $percent) / 100;
        $this->price -= $discount;
    }
    public function getPrice(){
        return $this->price;
    }
}

$t = new Product ('Арбуз');
$t->setDiscount(12);
echo $t->getPrice();

    // 8

class TodoList {
    public $tasks = [];

    public function addTask($task){
        $this->tasks[] = $task;
    }

    public function removeTask($i){
        if (isset($this->tasks[$i])) {
            unset($this->tasks[$i]);
            $this->tasks = array_values($this->tasks);
        } else {
            echo "Такой задачи нет";
        }
    }

    public function getTask(){
        return $this->tasks;
    }
}

$list = new TodoList();
$list->addTask('Сделать');
$list->addTask('Убрать');
$list->addTask('Пойти');
$list->addTask('Подумать');
print_r($list->getTask());
$list->removeTask(2);
print_r($list->getTask());

    // 9

class Loger {
    public $messages= [];

    public function log($message){
        $this->messages[] = $message;
    }

    public function getLogs(){
        print_r($this->messages);
    }
}

$l = new Loger();
$l->log('оошпкошпк');
$l->log('оошпауцпк');
$l->log('ауцауц');
echo $l->getLogs();

    // 10

class Auth {
    private $login;
    private $password;

    public function __construct($login, $password){
        $this->login = $login;
        $this->password = $password;
    }

    public function check($login, $password){
        if ($login == $this->login && $password === $this->password){
            return true;
        }

        return false;
    }
}

$me = new Auth('al', 'ds');
var_dump($me->check('al', 'ds'));
?>