<?php
declare(strict_types=1);

require_once '../config/db.php';
require_once 'controllers/ParticipantController.php';

$participants = ParticipantController::getAll($pdo);
$currentDate = date('Y-m-d');

require 'views/setdossard.php';
require '../footer.php';

