<?php 

$dsn = "mysql:host=db;dbname=db_todolist;charset=utf8";
$user = "root";
$password = "admin";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active les erreurs PDO
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Définit le mode de récupération par défaut
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}