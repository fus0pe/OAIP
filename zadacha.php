<?php
function rdup($str): array {
    if ($str === '') {
        return [];
    }
    $chars = str_split($str);
    $res = [];

    foreach ($chars as $i => $char) {
        if ($i === 0 || $char !== $chars[$i - 1]) {
            $res[] = $char;
        }
    }

    return $res;
}

$res1 = rdup('sdsdDFF2122');
print_r($res1);

?>
