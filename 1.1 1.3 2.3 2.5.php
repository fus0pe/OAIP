<?php
        // 1.1 
        // 1
    $num = -1;
    if ($num > 0) {
        echo $num . ' Положительно';
    } else {
        echo $num . ' Отрицательно';
    }
        // 2
    $string = "Mystring";
	$len = strlen($string);
	echo $len;
	    // 3
    $string = "Mystring";
	echo substr($string, -1);
        //4
    $num = 12;
	if ($num % 2 == 0) {
		echo $num . ' Четное';
	} else {
		echo $num . ' Нечетное';
	}
        //5
    $word1 = "Слово";
	$word2 = "Слово";
	
	if ($word1 == $word2){
		echo 'Слова идентичны';
	} else {
		echo 'Слова не идентичны';
	}
        // 1.3
        // 1
    $string = "Строка";
	
	if (mb_strlen($string) > 1){
		echo mb_substr($string, -2, 1);
	} else {
		echo 'В строке меньше одного символа';
	}
        // 2
    
    $num1 = 1;
    $num2 = 2;
    
    if ($num1 % $num2 == 0){
        echo 'Делится без остатка';
    } else {
        echo 'Делится с остатком';
    }
    
        // 2.3
        // 1

    $word1 = 'Слово';
    $word2 = 'олово';
    
    if (mb_substr($word1, -1, 1) == mb_substr($word2, 0, 1)){
        echo 'Совпадает';
    } else {
        echo 'Не совпадает';
    }
        // 2
    $string = "abc0bde0bde0";
    $pos1 = strpos($string, '0');
    $pos2 = strpos($string, '0', $pos1 + 1);
    $pos3 = strpos($string, '0', $pos2 + 1);
    echo $pos3
        // 3
    $numbers = '12,36,54';
    $numberArray = explode(',', $numbers);
    $sum = array_sum($numberArray);
    echo $sum
        // 4

    $date = '2025-12-31';
    $dateArray = explode('-', $date);
    
    $rArray = [
        'year' => $dateArray[0],
        'month' => $dateArray[1],
        'day' => $dateArray[2],
    ];
    print_r($rArray)

        // 2.5
        // 1

    $string = '023m0df0dfg0';
    $positions = [];
    $pos = -1;

    while (($pos = strpos($string, '0', $pos + 1)) !== false) {
        $positions[] = $pos;
    }

    print_r($positions);

        // 2
    $str = 'abcdefg';
    $result = '';

    for ($i = 0; $i < strlen($str); $i++) {
        if (($i + 1) % 3 !== 0) {
            $result .= $str[$i];
        }
    }
    echo $result;
    
        // 3
    $numbers = [1, 2, 3, 4, 5, 6];
    $s1 = 0;
    $s2 = 0;

    foreach ($numbers as $key => $value) {
        if ($key % 2 === 0) {
            $s1 += $value;
        } else {
            $s2 += $value;
        }
    }

    $result = $s1 / $s2;
    echo $result 
?>