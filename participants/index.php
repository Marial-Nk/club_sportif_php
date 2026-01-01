<?php
declare(strict_types=1);

require_once '../config/db.php';
require_once 'controllers/ParticipantController.php';

$participants = ParticipantController::getAll($pdo);

require 'views/affichage.php';
