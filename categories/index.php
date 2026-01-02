<?php
// Active le typage strict
declare(strict_types=1);

// Connexion à la base de données
require_once '../config/db.php';

// Chargement du contrôleur des catégories
require_once 'controllers/CategoryController.php';

// Récupération de toutes les catégories
$courses = CategoryController::getAll($pdo);

// Affichage de la liste des catégories
require 'views/affichage.php';

// Pied de page
require '../footer.php';
