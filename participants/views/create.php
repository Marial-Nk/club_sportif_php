<link rel="stylesheet" href="../../styles/create_participant.css">

<h2>Ajouter un nouveau participant </h2>
<a href="index.php" class="link-courses">
    Voir les participants déjà enregistrés
</a>


<form method="post" class="participant-form"
      action="controllers/participant_action.php"
      onsubmit="return confirm('Voulez-vous créer ce participant ?');"
>

    <input type="hidden" name="action" value="create">
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
        <label>Categorie *<br>
            <select name="category" required>
                <option value="">Sélectionner une course</option>

                <?php foreach ($courses as $course): ?>
                    <option value="<?= htmlspecialchars($course['id']) ?>"
                            <?= ($category ?? '') === $course['id'] ? 'selected' : '' ?>>
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
        <button type="submit" class="btn-submit">Ajouter</button>
        <a href="index.php" class="btn-cancel">Annuler</a>
    </div>

</form>


