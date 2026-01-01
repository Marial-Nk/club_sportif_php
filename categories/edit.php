<?php
declare(strict_types=1);

require_once '../config/db.php';
require_once 'controllers/CategoryController.php';

$course = CategoryController::getOne($pdo, $_GET['key']);

require 'views/update.php';
