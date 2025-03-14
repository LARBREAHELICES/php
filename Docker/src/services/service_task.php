<?php

require __DIR__ . '/service_model.php';

session_start();

// echo '<pre>';
// print_r($_POST);
// print_r($_SESSION['csrf_token']);
// echo '</pre>';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_SESSION['csrf_token'] == $_POST['csrf_token']) {

    }
}
