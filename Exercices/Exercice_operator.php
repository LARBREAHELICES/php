<?php

// true
echo (true || false) && ((!false && true) || true);

// true 
echo (5.5 * 2 == 11 || 1 / 2 != .5) && (3 % 2 == 1);

// 
echo "\n";
// le et passif résultat no, PHP n'évalue pas la deuxième expression
echo (0 != 0 && 1/0 == 2) ? "yes" : "no";
echo "\n";

// Ou passif || 
echo (0 == 0 || 1/0 == 2) ? "yes" : "no";
echo "\n";

echo (!true || true); // true
echo "\n";

echo (!true || false);  // false
echo "\n";

echo !(true || true); // false
echo "\n";

echo (true || false) && false; // false
echo "\n";

echo (true || false) && true; // true
echo "\n";

echo (true || false) && ((!false && true) || true); // true
echo "\n";

echo  ((false || false) && (!false && false)) || true;  // true
echo "\n";

echo (false || false) && (!false && false) || true; // true 
echo "\n";

echo 0 < pow(2, 10) == pow(2, 10) ? "yes" : "no"; 
echo "\n";

echo true == pow(2, 10) ? "yes" : "no"; 
echo "\n";

echo "  " ? "yes" : "no" ;
echo "\n";

echo "" ? "yes" : "no" ;
echo "\n";

// trouver toutes valeurs qui sont fasses en PHP
echo "\n";
echo "----------------------"; 
echo "\n";

echo "" == false ? "yes" : "no" ;
echo "\n";

echo 0  == false ? "yes" : "no" ;
echo "\n";

echo "0" == false ? "yes" : "no" ;
echo "\n";

echo [] == false ? "yes" : "no" ;
echo "\n";

echo ("0.0" && "0." && 0.0) == false ? "yes" : "no" ;
echo "\n";

echo null == false ? "yes" : "no" ;
echo "\n";

echo false  == false ? "yes" : "no" ;
echo "\n";

echo "----------------------"; 
echo "\n";
echo [1] == true ? "yes" : "no" ;
echo "\n";