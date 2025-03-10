<?php

// Créez un script qui permet de déterminer la plus grande valeur
$a = 10;
$b = 55;
$c = 77;

if ($a > $b) {
    if ($a > $c) echo "Max $a";
} elseif ($b > $c)
    echo "Max $b";
else
    echo "Max $c";

echo "\n";

// 
$m = $a;
if ($b > $m) $m = $b;
if ($c > $m) $m = $c;

echo $m;
echo "\n";

function my_max($a, $b)
{
    return $a > $b ? $a : $b;
}
echo "\n";

// une fonction peut appeler dans ses paramètres une autre fonction
echo my_max($a, my_max($b, $c));
echo "\n";

// Faire le max des valeurs 
$numbers = [1, 2, 5, 10, 5, 12, 55, 100, 48, 123, 54];

// les boucles en PHP 
$m = $numbers[0];
for ($i = 1; $i < count($numbers); $i++) {
    if ($numbers[$i] > $m) $m = $numbers[$i];
}
echo "\n";
echo "La plus grande valeur est: $m";
echo "\n";

$m = 0;
foreach ($numbers as $number) {
    if ($number > $m) $m = $number;
}

echo "\n";
echo "La plus grande valeur est: $m";
echo "\n";

/**
 * Exercise
 *
 * Soit le tableau $data ci-dessous, compter dans un tableau $results le nombre d'occurences des entiers du tableau $data
 *
 * Note: la clé du tableau $results sera la valeur du tableau $data et la valeur son nombre d'occurences
 *
 *  */


$data = [1, 1, 2, 3, 4, 8, 8, 5, 6, 6, 9, 9, 10, 11, 12, 14, 48, 48, 51, 51, 1, 1, 1, 51, 3, 3, 3, 51, 51, 51, 51, 51, 0];
