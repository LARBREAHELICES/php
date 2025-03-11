<?php
// porté dans le script mais pas dans le scope des fonctions
$a = 1;

function dump_terminal($data){
    echo "\n";
    echo $data;
    echo "\n";
}

function calcul(){
    // global $a; PHP cherchera à voir si la variable $a est définie à l'extérieur de la fonction 

    return $a ;
}

// produit une erreur la variable $a n'existe pas
// dump_terminal( calcul()) ;

$a = 1 ;
$b = 2;
$calcul = function () use($a, $b) {
    return $a;
};

dump_terminal( $calcul());

// les variables super globales qui elles traversent tous les scope
showVariable();
function showVariable(){

    function data(){
        var_dump($_SERVER);
    }

    data();
}

// la porté des variables n'est pas modifiée dans les structures de controle
$a = 2 ;

for ($i=0; $i < 2; $i++) { 
    var_dump($i*$a);
}
echo "\n";
// effet de bord car on accède aux symboles à l'extérieur des structure de controle
echo "$i :$i" ;


// 
