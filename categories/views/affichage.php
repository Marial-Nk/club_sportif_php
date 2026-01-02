<link rel="stylesheet" href="../../styles/affichage_categorie.css">

<script src="../../public/js/toast.js"></script>
<?php if (isset($_GET['status'])) :  ?> <div id="toast" class="toast hidden"></div> <?php endif; ?>

<div class="body">

    <div class="header-actions">
        <div class="left">
            <?php require_once  '../back_to_home.php'; ?>
        </div>
        <div class="right">
            <a href="views/create.php" class="btn-add"> Ajouter une nouvelle catégorie</a>
        </div>
    </div>

    <table class="courses-table">
        <thead>
        <tr>
            <th>Clé</th>
            <th>Libellé</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php if (empty($courses)): ?>
            <tr>
                <td colspan="3" style="text-align:center; color:#666;">
                    Aucune course enregistrée
                </td>
            </tr>
        <?php else: ?>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td>
                        <code><?= htmlspecialchars($course['course_key']) ?></code>
                    </td>
                    <td>
                        <?= htmlspecialchars($course['label']) ?>
                    </td>
                    <td class="action-cell">

                        <a
                                href="edit.php?key=<?= urlencode($course['course_key']) ?>"
                                class="btn-action btn-edit"
                        >
                            Modifier
                        </a>

                        <form
                                method="post"
                                action="controllers/category_action.php"
                                class="inline-form"
                                onsubmit="return confirm('Supprimer cette category ?');"
                        >
                            <input type="hidden" name="action" value="delete">
                            <input
                                    type="hidden"
                                    name="course_key"
                                    value="<?= htmlspecialchars($course['course_key']) ?>"
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
