<?php

require_once __DIR__ . '/../services/service_db.php';

$login = "admin'; -- ";
$password = '123';

$sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";

echo '<pre>';
print_r($sql);
echo '</pre>';

$stmt= $pdo->query($sql);

if($stmt->rowCount() > 0){
    echo "La connexion est réussie";
}else{
    echo "Erreur d'identifiant";
}
