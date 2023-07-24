<?php

// j'ouvre ma session
session_start();


require_once '../config.php';

require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

require_once '../models/Employees.php';


// Nous définissons un tableau d'erreurs
$errors = [];

// Nous définissons une variable permettant cacher / afficher le formulaire d'inscription
$showForm = true;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Contrôle du nom : vide et pattern
    if (isset($_POST['lastname'])) {

        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Le nom est obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['lastname'])) {
            $errors['lastname'] = 'Le nom n\'est pas valide';
        }
    }

    if (isset($_POST['firstname'])) {

        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'Le nom est obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['firstname'])) {
            $errors['firstname'] = 'Le prénom n\'est pas valide';
        }
    }

    if (isset($_POST['mail'])) {

        if (empty($_POST['mail'])) {
            $errors['mail'] = 'Le courriel est obligatoire';
        } 
    }

    if (isset($_POST['phoneNumber'])) {

        if (empty($_POST['phoneNumber'])) {
            $errors['phoneNumber'] = 'Le numére est obligatoire';
        } 
    }

    if (isset($_POST['password'])) {

        if (empty($_POST['password'])) {
            $errors['password'] = 'Le mdp est obligatoire';
        } 
    }

    if (isset($_POST['confirmPassword'])) {

        if (empty($_POST['confirmPassword'])) {
            $errors['confirmPassword'] = 'Confirmation obligatoire';
        } 
    }



    // si le tableau d'erreurs est vide, on ajoute l'animal dans la base de données
    if (empty($errors)) {
        // instanciation de la classe Animals
        $employees = new Employees();
        // utilisation de la méthode addAnimal pour ajouter un animal dans la base de données
        // si la méthode retourne true, on cache le formulaire à l'aide de la variable $showForm
        if ($employees->addEmployee($_POST)) {
            $showForm = false;
        } else {
            // nous mettons en place un message d'erreur dans le cas où la requête échouée
            $errors['bdd'] = 'Une erreur est survenue lors de la creation de votre compte';
        }
    }
}



?>

<?php include_once '../views/view-subscribe.php'; ?>


