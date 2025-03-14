<?php

require_once __DIR__ . '/../services/service_db.php';

$login = "admin'; -- ";
$password = '123';

$stmt = $pdo->prepare('SELECT * FROM users WHERE username = ? AND password = ?');

$stmt->execute([$login, $password]);

if($stmt->rowCount() > 0){
    echo "La connexion est réussie";
}else{
    echo "Erreur d'identifiant";
}
