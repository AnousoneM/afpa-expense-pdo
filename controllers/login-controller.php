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
    // Contrôle du nom : vide et pattern
    if (isset($_POST['lastname'])) {

        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Le nom est obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['lastname'])) {
            $errors['lastname'] = 'Le nom n\'est pas valide';
        }
    }

    // Contrôle du prénom : vide et pattern
    if (isset($_POST['firstname'])) {

        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'Le nom est obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['firstname'])) {
            $errors['firstname'] = 'Le prénom n\'est pas valide';
        }
    }
}

require_once '../views/login-view.php';
