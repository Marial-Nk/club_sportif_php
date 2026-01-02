
<link rel="stylesheet" href="../../styles/create_categorie.css">

<h2>Modifier une Catégorie</h2>
<a href="index.php" class="link-courses">
    Voir liste categories
</a>

<form method="post" class="participant-form"
      action="controllers/category_action.php"
      onsubmit="return confirm('Voulez-vous Modifier cette Category ?');"
>

    <input type="hidden" name="action" value="update">
    <input type="hidden" name="course_id" value="<?= htmlspecialchars($course['id'])  ?>">
    <!-- CLÉ -->
    <div>
        <label>
            Clé (identifiant unique)<br>
            <small>Exemple : <code>ultra_3000</code></small>
            <input type="text" name="course_key"
                   value="<?= htmlspecialchars($course['course_key'])  ?>"
                   required>
        </label>
    </div>

    <!-- LIBELLÉ -->
    <div>
        <label>
            Libellé (texte affiché)<br>
            <input type="text" name="course_label"
                   value="<?= htmlspecialchars($course['label']) ?>"
                   required>
        </label>
    </div>

    <!-- BOUTONS -->
    <div style="margin-top: 20px;">
        <button type="submit" class="btn-submit">Update</button>
        <a href="index.php" class="btn-cancel">Annuler</a>
    </div>

</form>

<?php require '../../footer.php';
?>
