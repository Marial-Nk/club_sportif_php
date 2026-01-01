
<link rel="stylesheet" href="../../styles/create_categorie.css">

<h2>Ajouter une nouvelle catégorie</h2>
<a href="../index.php" class="link-courses">
    Voir les courses déjà enregistrées
</a>

<div id="toast" class="toast hidden"></div>

<form method="post" class="participant-form"
      action="../controllers/category_action.php"
      onsubmit="return confirm('Voulez-vous créer cettez Category ?');"
>

    <input type="hidden" name="action" value="create">
    <!-- CLÉ -->
    <div>
        <label>
            Clé (identifiant unique)<br>
            <small>Exemple : <code>ultra_3000</code></small>
            <input type="text" name="course_key"
                   value="<?= htmlspecialchars($courseKey) ?>"
                   required>
        </label>
    </div>

    <!-- LIBELLÉ -->
    <div>
        <label>
            Libellé (texte affiché)<br>
            <input type="text" name="course_label"
                   value="<?= htmlspecialchars($courseLabel) ?>"
                   required>
        </label>
    </div>

    <!-- BOUTONS -->
    <div style="margin-top: 20px;">
        <button type="submit" class="btn-submit">Ajouter </button>
        <a href="../index.php" class="btn-cancel" >Annuler</a>
    </div>

</form>
