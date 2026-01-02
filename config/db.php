<?php
// Active le typage strict
declare(strict_types=1);

// Chemin vers le fichier de la base de données SQLite
$dbPath = __DIR__ . '/../database/club_sportif.sqlite';

try {
    // Création de la connexion PDO à SQLite
    $pdo = new PDO('sqlite:' . $dbPath);

    // Active l’affichage des erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Arrête le script si la connexion échoue
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
