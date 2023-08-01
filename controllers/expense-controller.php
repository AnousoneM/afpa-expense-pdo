<?php
// nous ouvrons une session
session_start();

// nous vérifions si l'utilisateur est connecté à l'aide de la variable de session user
// si l'utilisateur n'est pas connecté, nous le redirigeons vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../controllers/login-controller.php');
    exit();
}

require_once '../config.php';
require_once '../helpers/Database.php';

require_once '../models/Employees.php';
require_once '../models/Expense_report.php';

require_once '../helpers/Form.php';

if (isset($_GET['expense'])) {
    // Nous récupérons les infos de la dépense
    $expense = Expense_report::getExpense($_GET['expense']);

    // Nous vérifions que les données de la dépense n'est pas vide = n'éxiste pas
    if (empty($expense)) {
        // si la dépense est vide, nous redirigeons l'utilisateur vers la page d'accueil
        header('Location: ../controllers/home-controller.php');
        exit();
    }
} else {
    // si l'id de la dépense n'est pas défini, nous redirigeons l'utilisateur vers la page d'accueil
    header('Location: ../controllers/home-controller.php');
    exit();
}


?>


<!-- nous incluons la vue home-view.php -->
<?php include_once '../views/expense-view.php' ?>