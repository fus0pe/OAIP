<?php
function getCurrentDayOfWeek(): string {
    $days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    return $days[date('w')];
}

// Пример использования:
echo getCurrentDayOfWeek(); 
?>
<?php
function getDayOfWeekFromDate(string $dateString): string {
    $days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    $timestamp = strtotime($dateString);
    return $days[date('w', $timestamp)];
}
// Пример использования:
echo getDayOfWeekFromDate('2026-06-17'); // Среда
?>
<?php
function secondsToDays(int $seconds): float {
    return $seconds / 86400;
}

// Пример использования:
echo secondsToDays(172800); // 2
?>
<?php
function truncateString(int $length, string $string): string {
    return mb_substr($string, 0, $length, 'UTF-8');
}

// Пример использования:
echo truncateString(5, 'Привет, Мир!'); // Приве
?>
<?php
function getZodiacSign(string $dateString): string {
    $timestamp = strtotime($dateString);
    $month = (int)date('n', $timestamp);
    $day = (int)date('j', $timestamp);

    $zodiacs = [
        ['Козерог', 20], ['Водолей', 19], ['Рыбы', 20], ['Овен', 20], 
        ['Телец', 21], ['Близнецы', 21], ['Рак', 22], ['Лев', 21], 
        ['Дева', 23], ['Весы', 23], ['Скорпион', 22], ['Стрелец', 22], 
        ['Козерог', 31]
    ];

    return ($day <= $zodiacs[$month - 1][1]) ? $zodiacs[$month - 1][0] : $zodiacs[$month][0];
}

// Пример использования:
echo getZodiacSign('2026-06-17'); // Близнецы
?>
<?php
function getSumOfDivisors(int $number): int {
    $sum = 0;
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i === 0) {
            $sum += $i;
        }
    }
    return $sum;
}

// Пример использования (делители 12: 1, 2, 3, 4, 6, 12):
echo getSumOfDivisors(12); // 28
?>
<?php
$str = "12345";

if (ctype_digit($str)) {
    echo "Строка состоит только из цифр";
} else {
    echo "В строке есть другие символы или она пустая";
}
?>
<?php
$str = "12.34";

// Шаблон проверяет наличие цифр, одной точки и цифр после неё
if (preg_match('/^\d+\.\d+$/', $str)) {
    echo "Строка является дробью";
} else {
    echo "Строка не является дробью";
}
?>
<?php
function getSecondLargest(array $numbers) {
    // Удаляем дубликаты
    $uniqueNumbers = array_unique($numbers);
    
    if (count($uniqueNumbers) < 2) {
        return null; // Если уникальных чисел меньше двух
    }
    
    // Сортируем от большего к меньшему
    rsort($uniqueNumbers);
    
    return $uniqueNumbers[1];
}

// Пример использования:
echo getSecondLargest([10, 5, 20, 20, 8]); // 10
?>
<?php
function createRange(int $num1, int $num2): array {
    $min = min($num1, $num2);
    $max = max($num1, $num2);
    
    return range($min, $max);
}

// Пример использования (порядок аргументов не важен):
print_r(createRange(8, 3)); // [3, 4, 5, 6, 7, 8]
?>
<?php
function fillWithRandomLetters(int $length): array {
    $letters = range('a', 'z'); // Создаем массив букв от a до z
    $result = [];
    
    for ($i = 0; $i < $length; $i++) {
        $result[] = $letters[array_rand($letters)];
    }
    
    return $result;
}

// Пример использования (массив из 5 случайных букв):
print_r(fillWithRandomLetters(5)); 
?>
<?php
function sumFibonacci(int $n): int {
    if ($n <= 0) return 0;
    if ($n === 1) return 0; // Первое число Фибоначчи — 0

    $fib =[];
    $sum = 1; // Начальная сумма (0 + 1)

    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        $sum += $fib[$i];
    }

    return $sum;
}

// Пример использования (для первых 5 чисел: 0, 1, 1, 2, 3 -> сумма 7):
echo sumFibonacci(5); // 7
?>
<?php
function checkAlphabet(string $char): string {
    // Проверяем латиницу (A-Z, a-z)
    if (preg_match('/^[a-zA-Z]$/u', $char)) {
        return "Латиница";
    }
    // Проверяем кириллицу (А-Я, а-я, включая Ё и ё)
    if (preg_match('/^[А-Яа-яЁё]$/u', $char)) {
        return "Кириллица";
    }
    return "Другой символ";
}

// Пример использования:
echo checkAlphabet('б'); // Кириллица
echo checkAlphabet('R'); // Латиница
?>
<?php
function shuffleArray(array $arr): array {
    shuffle($arr);
    return $arr;
}

// Пример использования:
$input =[];
print_r(shuffleArray($input)); 
?>
<?php
function groupWordsByFirstLetter(string $text): array {
    // Очищаем текст от знаков препинания и разбиваем на слова
    $cleanText = preg_replace('/[^\p{L}\s]/u', '', $text);
    $words = preg_split('/\s+/u', $cleanText, -1, PREG_SPLIT_NO_EMPTY);
    
    $result = [];
    
    foreach ($words as $word) {
        // Получаем первую букву в нижнем регистре (работает и с кириллицей)
        $firstLetter = mb_strtolower(mb_substr($word, 0, 1, 'UTF-8'), 'UTF-8');
        
        // Добавляем слово в массив под соответствующим ключом
        $result[$firstLetter][] = $word;
    }
    
    // Сортируем ключи по алфавиту для удобства
    ksort($result);
    
    return $result;
}

// Пример использования:
$text = "Арбуз ананас банан барабан виноград";
print_r(groupWordsByFirstLetter($text));
/* Результат:
Array (
    [а] => Array ([0] => Арбуз, [1] => ананас)
    [б] => Array ([0] => банан, [1] => барабан)
    [в] => Array ([0] => виноград)
)
*/
?>
<?php
// Вспомогательная функция проверки на простое число
function isPrime(int $num): bool {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) return false;
    }
    return true;
}

// Основная функция
function getPrimeDivisors(int $number): array {
    $divisors = [];
    for ($i = 2; $i <= $number; $i++) {
        if ($number % $i === 0 && isPrime($i)) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}

// Пример использования:
print_r(getPrimeDivisors(30)); // [2, 3, 5] (хотя делители также 6, 10, 15)
?>
<?php
function splitIntoSyllables(string $word): array {
    // Список гласных букв русского языка
    $vowels = 'аеёиоуыэюяАЕЁИОУЫЭЮЯ';
    
    // Регулярное выражение находит гласную и все идущие за ней согласные, 
    // кроме тех, что стоят перед самой последней гласной
    preg_match_all('/[^' . $vowels . ']*[' . $vowels . ']+[^' . $vowels . ']*/u', $word, $matches);
    
    $syllables = $matches[0];
    
    // Корректировка: если на конце остались согласные без гласной, присоединяем их к последнему слогу
    $allMatchedLen = mb_strlen(implode('', $syllables), 'UTF-8');
    $wordLen = mb_strlen($word, 'UTF-8');
    
    if ($allMatchedLen < $wordLen && count($syllables) > 0) {
        $tail = mb_substr($word, $allMatchedLen, null, 'UTF-8');
        $syllables[count($syllables) - 1] .= $tail;
    }
    
    return $syllables;
}

// Пример использования:
print_r(splitIntoSyllables('молоко'));   // ['мо', 'ло', 'ко']
print_r(splitIntoSyllables('программа')); // ['про', 'грам', 'ма']
?>

