<?php
// Active le typage strict
declare(strict_types=1);

// Connexion à la base de données
require_once __DIR__ . '/../../config/db.php';

// Contrôleur des participants
require_once __DIR__ . '/ParticipantController.php';

// Autorise uniquement les requêtes POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

// Action envoyée par le formulaire
$action = $_POST['action'] ?? '';

try {
    // Choix de l’action à exécuter
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

//            var_dump( $participant); die();

            ParticipantController::update(
                $pdo,
                (int) $_POST['participant_id'] ,
                $participant
            );

            // si attribution dossard
            if(isset($_POST['dossard'] )){
                header('Location: ../setdossard.php?status=updated');
                exit;
            }

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
    // En cas d’erreur, retour à l’index
    if(isset($_POST['dossard'] )){
        header('Location: ../setdossard.php?status=error');
        exit;
    }

    header('Location: ../index.php?status=error');
}

/**
 * get infos participant envoyées via un formulaire
 * @return array
 */
function get_participant(){


    $participant['last_name'] = trim($_POST['last_name'] ?? '');
    $participant['first_name'] = trim($_POST['first_name'] ?? '');
    $participant['birth_date'] = trim($_POST['birth_date'] ?? '');
    $participant['gender'] = trim($_POST['gender'] ?? '-');
    $participant['nationality'] = trim($_POST['nationality'] ?? '-');
    $participant['category'] = trim($_POST['category'] ?? '');
    $participant['club'] =  empty($_POST['club']) ?  '-' :  trim($_POST['club'] );

    // si attribution dossard
    if(isset($_POST['dossard'] )){ $participant['dossard'] = $_POST['dossard']; }
    if(isset($_POST['uci_code'] )){ $participant['uci_code'] = $_POST['uci_code']; }
    $participant['is_paid'] = isset($_POST['paid'] ) ?  1 : 0;
    if(isset($_POST['category_id'] )){ $participant['category'] = $_POST['category_id']; }

    return $participant;

}

exit;
