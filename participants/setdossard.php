<?php
$currentDate = date('Y-m-d');
?>

<link rel="stylesheet" href="../styles/edit_participant.css">

<div class="header">
    <h2>Attribuer un dossard </h2>
    <?php require_once  '../back_to_home.php'; ?>
</div>

<form method="post" class="participant-form">

    <!-- RECHERCHE -->
    <div>
        <label>Rechercher un participant :<br>
            <input type="text" name="search" placeholder="Tapez le nom ou prénom...">
        </label>
    </div>

    <div class="form-columns">

        <!-- COLONNE 1 : 3 lignes -->
        <div class="column">
            <label>Dossard *<br>
                <input type="number" name="bib_number" min="1" required>
            </label>

            <label>Nom *<br>
                <input type="text" name="last_name" required>
            </label>

            <label>Prénom *<br>
                <input type="text" name="first_name" required>
            </label>
        </div>

        <!-- COLONNE 2 : 2 lignes -->
        <div class="column">
            <label>Date de naissance<br>
                <input type="date" name="birth_date" max="<?= $currentDate ?>">
            </label>

            <label>Course<br>
                <select name="category">
                    <option value="">Sélectionner une course</option>
                    <option value="5km">5 km</option>
                    <option value="10km">10 km</option>
                    <option value="semi">Semi-marathon</option>
                    <option value="marathon">Marathon</option>
                </select>
            </label>
        </div>

        <!-- COLONNE 3 : 3 lignes -->
        <div class="column">
            <label>Club<br>
                <input type="text" name="club">
            </label>

            <label>Nationalité<br>
                <select name="nationality">
                    <option value="Belgique">Belgique</option>
                    <option value="France">France</option>
                    <option value="Autre">Autre</option>
                </select>
            </label>

            <label>Code UCI<br>
                <input type="text" name="uci_code">
            </label>
        </div>

    </div>

    <div class="inline-group">
        <span class="group-title">Genre</span>
        <div class="radio-row">
            <label>
                <input type="radio" name="gender" value="Homme"> Homme
            </label>
            <label>
                <input type="radio" name="gender" value="Femme"> Femme
            </label>
            <label>
                <input type="radio" name="gender" value="Mixte"> Mixte
            </label>
        </div>
    </div>

    <div class="inline-group">
        <span class="group-title">Acquité</span>
        <div class="checkbox-row">
            <label class="checkbox-label">
                <input type="checkbox" name="paid" value="1">
                <span>Paiement reçu</span>
            </label>
        </div>
    </div>

    <div>
        <a href="../index.php" class="btn-cancel">Annuler</a>
        <button type="submit" class="btn-submit">Mettre à jour</button>
    </div>

</form>
