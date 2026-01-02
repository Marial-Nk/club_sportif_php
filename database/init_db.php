<?php
// Active le typage strict
declare(strict_types=1);

// Inclusion du fichier de connexion à la base de données (PDO)
require_once __DIR__ . '/../config/db.php';

// Active la gestion des clés étrangères dans SQLite
$pdo->exec("PRAGMA foreign_keys = ON;");

/*
|--------------------------------------------------------------------------
| Création de la table COURSES
|--------------------------------------------------------------------------
| Cette table contient les différentes catégories.
| - id : identifiant unique auto-incrémenté
| - course_key : clé technique
| - label : libellé lisible
*/
$sqlCourses = "
CREATE TABLE IF NOT EXISTS courses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    course_key TEXT NOT NULL,
    label TEXT NOT NULL
);
";

/*
|--------------------------------------------------------------------------
| Création de la table PARTICIPANTS
|--------------------------------------------------------------------------
| Cette table stocke les participants inscrits à une catégorie.
|
| Contraintes :
| - UNIQUE(course_id, dossard) :
|   ➜ empêche deux participants d'avoir le même dossard
|     dans une même course
| - FOREIGN KEY(course_id) :
|   ➜ garantit que la course existe
*/
$sqlParticipants = "
CREATE TABLE IF NOT EXISTS participants (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    last_name TEXT NOT NULL,
    first_name TEXT NOT NULL,
    gender TEXT NOT NULL,
    birth_date DATE NOT NULL,
    course_id INTEGER,
    club TEXT,
    nationality TEXT,
    uci_code TEXT,
    dossard INTEGER,
    is_paid INTEGER NOT NULL DEFAULT 0,

    UNIQUE (course_id, dossard),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);
";

// Exécution de la création de la table courses
$pdo->exec($sqlCourses);

// Exécution de la création de la table participants
$pdo->exec($sqlParticipants);

// Message de confirmation en cas de succès
echo "Tables courses et participants créées avec succès";
