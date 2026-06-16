<?php
require_once 'employee.php';

$worker = new Employee('секрет', 2000, 25);

echo $worker->show();
echo '<br>';

$worker->increaseSalary();
echo $worker->getSalary();
echo '<br>';

$worker->setAge(150);
?>