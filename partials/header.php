<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Club sportif</title>
    <link rel="stylesheet" href="/club-inscriptions/assets/css/style.css">
</head>
<body>

<nav>
    <a href="/club-inscriptions/index.php">Accueil</a> |
    <a href="/club-inscriptions/categories/index.php">Catégories</a> |
    <a href="/club-inscriptions/participants/create.php">Inscription</a> |
    <a href="/club-inscriptions/participants/index.php">Participants</a>
</nav>

<hr>
