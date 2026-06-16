<?php
class Employee {
    // 3
    private $name;
    private $salary;
    private $age;
    // 2
    public function __construct($name, $salary, $age) {
        $this->name = $name;
        $this->salary = $salary;
        $this->setAge($age); 
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setSalary($salary) {
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary . '$';
    }

    public function setAge($age) {
        if ($age >= 0 && $age <= 120) {
            $this->age = $age;
        } else {
            echo 'возраст неверный';
        }
    }

    public function getAge() {
        return $this->age;
    }

    public function show() {
        return $this->name . ' ' . $this->getSalary() . ' ' . $this->age;
    }

    public function increaseSalary() {
        $this->salary = $this->salary * 1.1;
    }
}
?>