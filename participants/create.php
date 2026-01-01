<?php
declare(strict_types=1);

require_once __DIR__ . '/../config/db.php';

$errors  = [];
$success = false;

/* =====================
   RÉCUPÉRATION DES COURSES
   ===================== */

$courses = [];

try {
    $stmt = $pdo->query("
        SELECT course_key, label
        FROM courses
        ORDER BY label ASC
    ");
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $errors[] = "Impossible de charger les courses.";
}


// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lastName    = trim($_POST['last_name'] ?? '');
    $firstName   = trim($_POST['first_name'] ?? '');
    $gender      = $_POST['gender'] ?? '';
    $birthDate   = $_POST['birth_date'] ?? '';
    $category    = $_POST['category'] ?? '';
    $club        = trim($_POST['club'] ?? '');
    $nationality = $_POST['nationality'] ?? 'Belgique';

    /* =====================
       VALIDATION
       ===================== */

    if ($lastName === '') {
        $errors[] = "Le nom est obligatoire.";
    }

    if ($firstName === '') {
        $errors[] = "Le prénom est obligatoire.";
    }

    if ($gender === '') {
        $errors[] = "Le genre est obligatoire.";
    }

    if ($birthDate === '') {
        $errors[] = "La date de naissance est obligatoire.";
    }

    if ($category === '') {
        $errors[] = "La course est obligatoire.";
    }

    /* =====================
       INSERTION SI OK
       ===================== */

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
            INSERT INTO participants (
                last_name,
                first_name,
                gender,
                birth_date,
                category,
                club,
                nationality
            ) VALUES (
                :last_name,
                :first_name,
                :gender,
                :birth_date,
                :category,
                :club,
                :nationality
            )
        ");

            $stmt->execute([
                    ':last_name'   => $lastName,
                    ':first_name'  => $firstName,
                    ':gender'      => $gender,
                    ':birth_date'  => $birthDate,
                    ':category'    => $category,
                    ':club'        => $club,
                    ':nationality' => $nationality,
            ]);


            header('Location: ../index.php?success=1');
            exit;
        } catch (PDOException $e) {
            $errors[] = "Erreur base de données : " . $e->getMessage();
        }
    }
}

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
?>

<link rel="stylesheet" href="../styles/create_participant.css">
<div>
    <?php require_once  '../back_to_home.php'; ?>
</div>
<form method="post" class="participant-form">

    <div class="identity-row">
        <div>
            <label>Nom *<br>
                <input type="text" name="last_name"
                       value="<?= htmlspecialchars($lastName ?? '') ?>" required>
            </label>
        </div>
        <div>
            <label>Prénom *<br>
                <input type="text" name="first_name"
                       value="<?= htmlspecialchars($firstName ?? '') ?>" required>
            </label>
        </div>
        <div class="gender-group">
            <label>Genre</label><br>
            <label>
                <input type="radio" name="gender" value="Homme"
                        <?= ($gender ?? '') === 'Homme' ? 'checked' : '' ?>>
                Homme
            </label>
            <label>
                <input type="radio" name="gender" value="Femme"
                        <?= ($gender ?? '') === 'Femme' ? 'checked' : '' ?>>
                Femme
            </label>
            <label>
                <input type="radio" name="gender" value="Autres"
                        <?= ($gender ?? '') === 'Autres' ? 'checked' : '' ?>>
                Autres
            </label>
        </div>
    </div>

    <div>
        <label>Date de naissance *<br>
            <input type="date" name="birth_date"
                   value="<?= htmlspecialchars($birthDate ?? '') ?>"
                   max="<?= date('Y-m-d') ?>" required>
        </label>
    </div>

    <div>
        <label>Course *<br>
            <select name="category" required>
                <option value="">Sélectionner une course</option>

                <?php foreach ($courses as $course): ?>
                    <option value="<?= htmlspecialchars($course['course_key']) ?>"
                            <?= ($category ?? '') === $course['course_key'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($course['label']) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </label>
    </div>

    <div>
        <label>Club<br>
            <input type="text" name="club"
                   value="<?= htmlspecialchars($club ?? '') ?>">
        </label>
    </div>

    <div>
        <label>
            Nationalité<br>
            <select name="nationality">
                <?php foreach ($countries as $country): ?>
                    <option value="<?= htmlspecialchars($country) ?>"
                            <?= ($nationality ?? 'Belgique') === $country ? 'selected' : '' ?>>
                        <?= htmlspecialchars($country) ?>
                    </option>

                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <!-- BOUTONS -->
    <div>
        <button type="reset">Réinitialiser</button>
        <button type="submit" class="btn-submit">OK</button>
    </div>

</form>
