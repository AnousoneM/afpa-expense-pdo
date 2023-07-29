<?php

// nous ouvrons une session
session_start();

// j'inclus les fichiers nécessaires se trouvant dans le fichier config.php
require_once '../config.php';

// j'inclus les fichiers nécessaires se trouvant dans le dossier helpers
require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

// j'inclus les fichiers nécessaires se trouvant dans le dossier models type
require_once '../models/Type.php';


// Nous définissons un tableau d'erreurs
$errors = [];

// Nous définissons une variable permettant de cacher / afficher le formulaire de note de frais, de base = true
$showForm = true;

// Déclenchement des actions uniquement à l'aide d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Contrôle du date : vide
    if (isset($_POST['date'])) {
        if (empty($_POST['date'])) {
            $errors['date'] = 'La date est obligatoire';
        }
    }

    // Contrôle du type : vide
    if (!isset($_POST['type'])) {
        $errors['type'] = 'veuillez choisir un type de frais';
    }

    // Contrôle du type : être un entier
    if (isset($_POST['type'])) {
        if (!is_numeric($_POST['type'])) {
            $errors['type'] = 'ce type de frais n\'existe pas';
        }
    }

    // Contrôle du amount : vide et uniquement des nombres
    if (isset($_POST['amount'])) {
        if (empty($_POST['amount'])) {
            $errors['amount'] = 'Le montant TTC est obligatoire';
        } else if (!is_numeric($_POST['amount'])) {
            $errors['amount'] = 'Le montant TTC doit être un nombre';
        }
    }

    // Contrôle du motif : vide
    if (isset($_POST['description'])) {
        if (empty($_POST['description'])) {
            $errors['description'] = 'Le motif est obligatoire';
        }
    }

    // Contrôle du justificatif : vide
    if (isset($_FILES['proof'])) {
        // si le code d'erreur est égal à 4, cela signifie que l'utilisateur n'a pas téléchargé de fichier
        if ($_FILES['proof']['error'] == 4) {
            $errors['proof'] = 'Le justificatif est obligatoire';
        } else {
            // nous regardons s'il s'agit bien d'un fichier image
            var_dump(mime_content_type($_FILES["proof"]["tmp_name"]));
            $test = base64_encode(file_get_contents($_FILES["proof"]["tmp_name"]));
        }
    }


    // si le tableau d'erreurs est vide, on ajoute la note de frais dans la base de données
    if (empty($errors)) {




        // nous mettons en place un message d'erreur dans le cas où la requête échouée
        $errors['bdd'] = 'Une erreur est survenue lors de la creation de votre compte';
    }
}

?>

<!-- nous incluons la vue register-view.php -->
<?php include_once '../views/add-expense-view.php'; ?>