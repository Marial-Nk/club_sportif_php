<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/db.php';

$pdo->exec("PRAGMA foreign_keys = ON;");

$sql = "
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

    FOREIGN KEY (course_id) REFERENCES courses(id)
);
";

$pdo->exec($sql);

echo "✅ Table participants créée avec succès";
