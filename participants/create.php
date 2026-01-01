<?php
declare(strict_types=1);

require_once '../config/db.php';
require_once '../categories/controllers/CategoryController.php';

$courses = CategoryController::getAll($pdo);

$currentYear = date('Y');
$countries = [
        "Belgique",
        "France",
        "Luxembourg",
        "Allemagne",
        "Pays-Bas",
        "Espagne",
        "Italie",
        "Portugal",
        "Suisse",
        "Autriche",
        "Royaume-Uni",
        "Irlande",
        "Danemark",
        "Suède",
        "Norvège",
        "Finlande",
        "Pologne",
        "Tchéquie",
        "Slovaquie",
        "Hongrie",
        "Roumanie",
        "Bulgarie",
        "Grèce",
        "Croatie",
        "Slovénie",
        "Serbie",
        "Bosnie-Herzégovine",
        "Monténégro",
        "Albanie",
        "Macédoine du Nord",
        "Estonie",
        "Lettonie",
        "Lituanie",
        "Islande",
        "Malte",
        "Chypre",
        "Canada",
        "États-Unis",
        "Brésil",
        "Argentine",
        "Mexique",
        "Maroc",
        "Tunisie",
        "Algérie",
        "Sénégal",
        "Cameroun",
        "Côte d’Ivoire",
        "Afrique du Sud",
        "Japon",
        "Corée du Sud",
        "Chine",
        "Australie",
        "Nouvelle-Zélande"
    // Russie volontairement exclue
];

require 'views/create.php';
