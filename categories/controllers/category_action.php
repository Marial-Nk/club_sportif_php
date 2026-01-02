<?php
declare(strict_types=1);

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/CategoryController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$action = $_POST['action'] ?? '';

try {
    switch ($action) {

        case 'create':
            CategoryController::create(
                $pdo,
                trim($_POST['course_key'] ?? ''),
                trim($_POST['course_label'] ?? '')
            );
            header('Location: ../index.php?status=created');
            break;

        case 'update':

//            var_dump($_POST); die();

            CategoryController::update(
                $pdo,
                (int)$_POST['course_id'] ,
                $_POST['course_key'] ?? '',
                trim($_POST['course_label'] ?? '')
            );
            header('Location: ../index.php?status=updated');
            break;

        case 'delete':
            CategoryController::delete(
                $pdo,
                $_POST['course_key'] ?? ''
            );
            header('Location: ../index.php?status=deleted');
            break;

        default:
            header('Location: ../index.php?status=error');
    }

} catch (Throwable $e) {
    header('Location: ../index.php?status=error');
}

exit;
