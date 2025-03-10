<?php 

// php.net date 

$valeur = 3;

var_dump($valeur);


//
$age = 100;
var_dump($age);


$a = 1;
$b = 2;
$c = 3;

printf('$a %d, $b %d, $c %d', $a, $b, $c);
echo "<br />";
// algo variable temporaire
$t = $a;
$a = $c;
$c = $b;
$b = $t;

echo "<br />";

printf('$a %d, $b %d, $c %d', $a, $b, $c);


// 
echo 16 % 2 ? "pair" : "impair" ;