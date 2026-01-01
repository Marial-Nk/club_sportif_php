<?php
declare(strict_types=1);

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/ParticipantController.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$action = $_POST['action'] ?? '';
try {
    switch ($action) {

        case 'create':


            $participant = get_participant();

            ParticipantController::create(
                $pdo,
                $participant
            );
            header('Location: ../index.php?status=created');
            break;

        case 'update':

            $participant = get_participant();

//            var_dump($participant); die();

            ParticipantController::update(
                $pdo,
                (int) $_POST['participant_id'] ,
                $participant
            );
            header('Location: ../index.php?status=updated');
            break;

        case 'delete':

            ParticipantController::delete(
                $pdo,
                (int)$_POST['participant_id']
            );
            header('Location: ../index.php?status=deleted');
            break;

        default:
            header('Location: ../index.php?status=error');
    }

} catch (Throwable $e) {

    header('Location: ../index.php?status=error');
}


function get_participant(){


    $participant['last_name'] = trim($_POST['last_name'] ?? '');
    $participant['first_name'] = trim($_POST['first_name'] ?? '');
    $participant['birth_date'] = trim($_POST['birth_date'] ?? '');
    $participant['gender'] = trim($_POST['gender'] ?? '-');
    $participant['nationality'] = trim($_POST['nationality'] ?? '-');
    $participant['category'] = trim($_POST['category'] ?? '');
    $participant['club'] =  empty($_POST['club']) ?  '-' :  trim($_POST['club'] );

    return $participant;

}

exit;
