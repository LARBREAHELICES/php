<?php
// phpinfo() ; 

$name = "Alan";
$age = 45;

// printf("Name : %s, age : %d", $name, $age);

$a = 1;
$b = 2;
$c = 3;

printf('$a %d, $b %d, $c %d', $a, $b, $c);
echo "\n";
// algo variable temporaire
$t = $a;
$a = $c;
$c = $b;
$b = $t;

echo "\n";

printf('$a %d, $b %d, $c %d', $a, $b, $c);


echo "\n";

$a = 1;
$b = 2;
$c = 3;

// algo 
$a = $a + $b;
$b = $a - $b;
$c =  $a - $b;
printf('$a %d, $b %d, $c %d', $a, $b, $c);

echo "\n";

$a = 1;
$b = 2;
$c = 3;

// assignation par décomposition 
[$a, $b, $c] = [$c, $a, $b] ;

printf('$a %d, $b %d, $c %d', $a, $b, $c);

echo "\n";

// $a + "Bonjour";

echo "2" + 6 ;

echo "\n";

// définition d'une constante

define("PI", 3.14159);

echo PI ; 


echo "<br />";
echo "<br />";

// ./ chemin relatif 
echo "<a href='./Exercice_variable_constante.php'>Exercice variable</a>";