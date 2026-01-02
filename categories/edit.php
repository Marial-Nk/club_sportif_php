<?php
// Active le typage strict
declare(strict_types=1);

// Connexion à la base de données
require_once '../config/db.php';

// Chargement du contrôleur des catégories
require_once 'controllers/CategoryController.php';

// Récupération de la catégorie à modifier via la clé passée en URL
$course = CategoryController::getOne($pdo, $_GET['key']);

// Affichage du formulaire de modification
require 'views/update.php';
