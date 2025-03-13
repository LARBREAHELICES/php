<?php

require_once __DIR__ . '/service_db.php' ;

function tasks(){
    global $pdo;
    
    $stmt = $pdo->query('SELECT * FROM task');

    return $stmt;
}