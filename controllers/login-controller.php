<?php
// j'ouvre une session
session_start();

require_once '../config.php';
require_once '../helpers/Database.php';

require_once '../models/Employees.php';

// Nous définissons un tableau d'erreurs
$errors = [];

// Déclenchement des actions uniquement à l'aide d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Contrôle du mail : vide
    if (isset($_POST['mail'])) {
        if (empty($_POST['mail'])) {
            $errors['signIn'] = 'L\'identifiant est obligatoire';
        }
    }

    // Contrôle du password : vide
    if (isset($_POST['password'])) {
        if (empty($_POST['password'])) {
            $errors['signIn'] = 'Le mdp est obligatoire';
        }
    }
}

require_once '../views/login-view.php';
