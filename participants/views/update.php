<link rel="stylesheet" href="../../styles/create_participant.css">

<h2>Modifier un participant </h2>

<a href="index.php" class="link-courses">
    Voir les participants déjà enregistrés
</a>

<form method="post" class="participant-form"
      action="controllers/participant_action.php"
      onsubmit="return confirm('Voulez-vous Modifier ce participant ?');"
>

    <input type="hidden" name="action" value="update">
    <input type="hidden" name="participant_id"  value="<?= htmlspecialchars($participant['id']) ?>" required>
    <div class="identity-row">
        <div>
            <label>Nom *<br>
                <input type="text" name="last_name"
                       value="<?= htmlspecialchars($participant['last_name']) ?>" required>
            </label>
        </div>
        <div>
            <label>Prénom *<br>
                <input type="text" name="first_name"
                       value="<?= htmlspecialchars($participant['first_name']) ?>" required>
            </label>
        </div>
        <div class="gender-group">
            <label>Genre</label><br>
            <label>
                <input type="radio" name="gender" value="Homme"
                    <?= ($participant['gender']) === 'Homme' ? 'checked' : '' ?>>
                Homme
            </label>
            <label>
                <input type="radio" name="gender" value="Femme"
                    <?= ($participant['gender']) === 'Femme' ? 'checked' : '' ?>>
                Femme
            </label>
            <label>
                <input type="radio" name="gender" value="Autres"
                    <?= ($participant['gender']) === 'Autres' ? 'checked' : '' ?>>
                Autres
            </label>
        </div>
    </div>

    <div>
        <label>Date de naissance *<br>
            <input type="date" name="birth_date"
                   value="<?= htmlspecialchars($participant['birth_date']) ?>"
                   max="<?= date('Y-m-d') ?>" required>
        </label>
    </div>

    <div>
        <label>Categorie *<br>
            <select name="category" required>
                <option value="">Sélectionner une course</option>

                <?php foreach ($courses as $course): ?>
                    <option value="<?= htmlspecialchars($course['id']) ?>"
                        <?= $participant['course_id'] === $course['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($course['label']) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </label>
    </div>

    <div>
        <label>Club<br>
            <input type="text" name="club"
                   value="<?= htmlspecialchars($participant['club']) ?>">
        </label>
    </div>

    <div>
        <label>
            Nationalité<br>
            <select name="nationality">
                <?php foreach ($countries as $country): ?>
                    <option value="<?= htmlspecialchars($country) ?>"
                        <?= $participant['nationality']=== $country ? 'selected' : '' ?>>
                        <?= htmlspecialchars($country) ?>
                    </option>

                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <!-- BOUTONS -->
    <div>
        <button type="submit" class="btn-submit">Update</button>
        <a href="index.php" class="btn-cancel">Annuler</a>
    </div>

</form>

<?php require '../../footer.php';
?>
