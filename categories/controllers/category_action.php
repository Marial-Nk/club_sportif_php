<?php
// Active le typage strict
declare(strict_types=1);

// Connexion à la base de données
require_once __DIR__ . '/../../config/db.php';

// Contrôleur des catégories
require_once __DIR__ . '/CategoryController.php';

// Autorise uniquement les requêtes POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// Action envoyée par le formulaire (create, update, delete)
$action = $_POST['action'] ?? '';

try {

    // Choix de l’action à exécuter
    switch ($action) {

        // Création d’une catégorie
        case 'create':
            CategoryController::create(
                $pdo,
                trim($_POST['course_key'] ?? ''),
                trim($_POST['course_label'] ?? '')
            );
            header('Location: ../index.php?status=created');
            break;

        // Mise à jour d’une catégorie
        case 'update':
            CategoryController::update(
                $pdo,
                (int) $_POST['course_id'],
                $_POST['course_key'] ?? '',
                trim($_POST['course_label'] ?? '')
            );
            header('Location: ../index.php?status=updated');
            break;

        // Suppression d’une catégorie
        case 'delete':
            CategoryController::delete(
                $pdo,
                $_POST['course_key'] ?? ''
            );
            header('Location: ../index.php?status=deleted');
            break;

        // Action inconnue
        default:
            header('Location: ../index.php?status=error');
    }

} catch (Throwable $e) {
    // En cas d’erreur, retour à l’index
    header('Location: ../index.php?status=error');
}

exit;
