<?php
ва  
$numbers = [1, 2, 3, 4, 5];
$sum = 0;
foreach ($numbers as $number) {
    $sum += $number;
}
echo "Сумма: $sum\n";

$max = null;
foreach ($numbers as $number) {
    if (is_null($max) || $number > $max) {
        $max = $number;
    }
}
echo "Максимальный элемент: $max\n";

$countEven = 0;
foreach ($numbers as $number) {
    if ($number % 2 == 0) {
        $countEven++;
    }
}
echo "Чётные числа: $countEven\n";

$average = $sum / count($numbers);
echo "Среднее арифметическое: $average\n";

for ($i = 0; $i < count($numbers); $i++){
    if ($numbers[$i] < 0) {
        $numbers[$i] = 0;
    }
}
unset($number);
print_r($numbers);

$reversed = [];
for ($i = count($numbers) - 1; $i >= 0; $i--) {
    $reversed[] = $numbers[$i];
}
print_r($reversed);

$x = 3;
$index = array_search($x, $numbers);
if ($index !== false) {
    echo "Число $x найдено по индексу: $index\n";
} else {
    echo "Число $x не найдено\n";
}

$countAboveAverage = 0;
foreach ($numbers as $number) {
    if ($number > $average) {
        $countAboveAverage++;
    }
}
echo "Количество элементов больше среднего: $countAboveAverage\n";

к  
$strings = ["apple", "banana", "kiwi", "grape"];
$longStrings = array_filter($strings, function($str) {
    return strlen($str) > 5;
});
print_r($longStrings);

$multiplicationTable = [];
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        $multiplicationTable[$i][$j] = $i * $j;
    }
}
print_r($multiplicationTable);
?>