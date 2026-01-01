<?php
declare(strict_types=1);

$dbPath = __DIR__ . '/../database/club_sportif.sqlite';

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur connexion SQLite : ' . $e->getMessage());
}
