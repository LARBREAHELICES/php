<?php

require_once __DIR__ . '/service_db.php' ;

function tasks(): bool|PDOStatement{
    global $pdo;
    
    $stmt = $pdo->query('SELECT * FROM task');

    return $stmt;
}

function insert(string $title): void{
    global $pdo;

    $stmt = $pdo->prepare('INSERT INTO task (title) VALUE (?)');
    $stmt->execute([$title]);
}