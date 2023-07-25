<?php
// j'ouvre une session
session_start();

require_once '../config.php';
require_once '../helpers/Database.php';

require_once '../models/Employees.php';

require_once '../views/login-view.php';