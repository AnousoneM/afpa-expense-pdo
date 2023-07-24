<?php
// Définition des constantes de connexion à la base de données : mdp, login, nom de la base, host ...
define('DB_HOST', 'localhost');
define('DB_NAME', 'expense');
define('DB_USER', 'expense-user');
define('DB_PASS', 'expense-password');

// Définition des regex sous forme de constante
define('REGEX_NAME', '/^[a-zA-ZÀ-ÖØ-öø-ÿ\' -]+$/');
define('REGEX_PHONENUMBER', '/^06|07\d{8}$/');