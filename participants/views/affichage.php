<link rel="stylesheet" href="../../styles/affichage_categorie.css">

<div id="toast" class="toast hidden"></div>

<div class="body">
    <div class="header-actions">
        <div class="left">
            <?php require_once '../back_to_home.php'; ?>
        </div>

        <div class="right">
            <a href="create.php" class="btn-add">Ajouter un nouveau participant</a>
        </div>
    </div>

    <table class="courses-table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Genre</th>
            <th>Date de Naissance</th>
            <th>Catégorie</th>
            <th>Club</th>
            <th>Nationalité</th>
            <th>Code UCI</th>
            <th>Dossard</th>
            <th>Action</th>

        </tr>
        </thead>

        <tbody>
        <?php if (empty($participants)) : ?>
            <tr>
                <td colspan="9" style="text-align:center; color:#666;">
                    Aucun Participant enregistré
                </td>
            </tr>
        <?php else: ?>
            <?php foreach ($participants as $participant): ?>
                <tr>
                    <!-- Nom prenom-->
                    <td>
                        <code><?= htmlspecialchars($participant['last_name']) ?>   <?= htmlspecialchars($participant['first_name']) ?></code>
                    </td>
                    <!--   genre-->
                    <td>
                        <?= htmlspecialchars($participant['gender']) ?>
                    </td>
                    <!-- Date de naissance-->
                    <td>
                        <code><?= htmlspecialchars($participant['birth_date']) ?></code>
                    </td>
                    <!--   category course-->
                    <td>
                        <?= htmlspecialchars($participant['category']) ?>
                    </td>
                    <!-- club -->
                    <td>
                        <?= htmlspecialchars($participant['club']) ?>
                    </td>
                    <!-- Nationalité -->
                    <td>
                        <?= htmlspecialchars($participant['nationality']) ?>
                    </td>
                    <!-- code uci -->
                    <td>
                        <?= htmlspecialchars($participant['code_uci']) ?>
                    </td>
                    <!-- Dossard -->
                    <td>
                        <?= htmlspecialchars($participant['dossard']) ?>
                    </td>


                    <td class="action-cell">

                        <a
                                href="edit.php?id=<?= urlencode($participant['id']) ?>"
                                class="btn-action btn-edit"
                        >
                            Modifier
                        </a>

                        <form
                                method="post"
                                action="controllers/participant_action.php"
                                class="inline-form"
                                onsubmit="return confirm('Supprimer ce participant ?');"
                        >
                            <input type="hidden" name="action" value="delete">
                            <input
                                    type="hidden"
                                    name="participant_id"
                                    value="<?= htmlspecialchars($participant['id']) ?>"
                            >
                            <button type="submit" class="btn-action btn-delete">
                                Supprimer
                            </button>
                        </form>

                    </td>

                </tr>
            <?php endforeach; ?>

        <?php endif; ?>
        </tbody>
    </table>
</div>