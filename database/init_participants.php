<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/db.php';

// Activer les clés étrangères (IMPORTANT pour SQLite)
$pdo->exec("PRAGMA foreign_keys = ON;");

$sql = "
CREATE TABLE IF NOT EXISTS participants (
    id INTEGER PRIMARY KEY AUTOINCREMENT,

    bib_number INTEGER UNIQUE,

    last_name TEXT NOT NULL,
    first_name TEXT NOT NULL,
    gender TEXT NOT NULL,

    birth_date TEXT NOT NULL,

    club TEXT,
    nationality TEXT,
    uci_code TEXT,

    course_id INTEGER NOT NULL,

    FOREIGN KEY (course_id) REFERENCES courses(id)
);
";

$pdo->exec($sql);

echo "✅ Table participants créée avec succès";
