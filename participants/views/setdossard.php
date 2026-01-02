<link rel="stylesheet" href="../../styles/affichage_categorie.css">
<link rel="stylesheet" href="../styles/edit_participant.css">

<script src="../../public/js/toast.js"></script>
<?php if (isset($_GET['status'])) :  ?> <div id="toast" class="toast hidden"></div> <?php endif; ?>


<div class="header">
    <h2>Attribuer un dossard </h2>
    <?php require_once  '../back_to_home.php'; ?>
</div>


<!-- RECHERCHE -->


<form method="post" class="participant-form"
      action="controllers/participant_action.php"
      onsubmit="return confirm('Voulez-vous Attribuer un dossard à ce participant ?');"
>
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="participant_id"  id="participant_id"  required>

    <div >
        <label>Rechercher un participant :<br>
            <input
                    type="text"
                    id="search-participant"
                    placeholder="Tapez le nom ou prénom.."
                    autocomplete="off"
            >
            <ul id="search-results" class="dropdown hidden"></ul>
        </label>
    </div>

    <div class="form-columns">

        <!-- COLONNE 1 : 3 lignes -->
        <div class="column">
            <label>Dossard *<br>
                <input type="number" name="dossard" id="dossard" min="1" required>
            </label>

            <label>Nom *<br>
                <input type="text" name="last_name" id = "last_name" required>
            </label>

            <label>Prénom *<br>
                <input type="text" name="first_name" id="first_name" required>
            </label>
<!--              Genre-->
            <div class="inline-group">
                <span class="group-title">Genre</span>
                <div class="radio-row">
                    <label>
                        <input type="radio" name="gender" id="gender-m" value="Homme"> Homme
                    </label>
                    <label>
                        <input type="radio" name="gender" id="gender-f" value="Femme"> Femme
                    </label>
                    <label>
                        <input type="radio" name="gender" id="gender-x" value="Autre"> Autre
                    </label>
                </div>
            </div>
<!--            Acquité-->
            <div class="inline-form">
                <span class="group-title">Acquité</span>
                <div class="checkbox-row">
                    <label >
                        <input type="checkbox" name="paid" id="paid"  value="1">
                        <span> Paiement reçu</span>
                    </label>
                </div>
            </div>
            <br>
            <div>
                <button type="submit" class="btn-submit">Mettre à jour</button>
                <a href="../index.php" class="btn-cancel">Annuler</a>
            </div>

        </div>

        <!-- COLONNE 2 : 2 lignes -->
        <div class="column">
            <label>Date de naissance<br>
                <input type="date" name="birth_date" id="birth_date" max="<?= $currentDate ?>">
            </label>

            <label>Catégorie<br>
                <input type="text" name="category" id="category">
                <input type="hidden" name="category_id" id="category_id" required>
            </label>
        </div>

        <!-- COLONNE 3 : 3 lignes -->
        <div class="column">
            <label>Club<br>
                <input type="text" name="club" id="club">
            </label>
            <label>Nationalité<br>
                <input type="text" name="nationality" id="nationality">
            </label>

            <label>Code UCI<br>
                <input type="text" name="uci_code" id="uci_code">
            </label>
        </div>

    </div>





    <script src="../public/js/participant_autocomplete.js"></script>

</form>
