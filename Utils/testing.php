<?php
$notes = [12, 5, 18, 21, 25, 30, 19];

$grandesNotes = array_filter($notes, function($note) {
    return $note > 20;
});

$a = [1, 2, 3];
$b = [4, 5, 6];

$somme = array_map(function($x, $y) {
    return $x + $y;
}, $a, $b);

$fruits = ["pomme de terre", "banane", "orange"];

$majuscules = array_map("ucwords", $fruits);

print_r($majuscules);

print_r($somme);
