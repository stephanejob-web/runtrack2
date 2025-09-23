<?php

function leetSpeak($str) {
    $leetAlphabet = [
        'a' => '4',
        'b' => '8',
        'c' => '(',
        'd' => 'd',
        'e' => '3',
        'f' => 'f',
        'g' => '6',
        'h' => '#',
        'i' => '1',
        'j' => 'j',
        'k' => 'k',
        'l' => '1',
        'm' => 'm',
        'n' => 'n',
        'o' => '0',
        'p' => 'p',
        'q' => 'q',
        'r' => 'r',
        's' => '5',
        't' => '7',
        'u' => 'u',
        'v' => 'v',
        'w' => 'w',
        'x' => 'x',
        'y' => 'y',
        'z' => '2'
    ];
    $result = "";
    $strInArray = str_split($str);
    foreach ($strInArray as $char) {
        $result .= $leetAlphabet[$char];
    }
    return $result;
};


print(leetSpeak("abeglst"));


