<?php
declare(strict_types=1);

require_once '../config/db.php';
require_once 'controllers/CategoryController.php';

$courses = CategoryController::getAll($pdo);

require 'views/affichage.php';
