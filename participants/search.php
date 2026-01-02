<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/db.php';
require_once 'controllers/ParticipantController.php';

try {


    $q = trim($_GET['q'] ?? '');

    if (strlen($q) < 2) {
        echo json_encode([]);
        exit;
    }

    echo json_encode(ParticipantController::getAllLikeName($pdo,$q));

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}