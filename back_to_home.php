<link rel="stylesheet" href="../styles/back_to_home.css">

<div>
    <a href="/index.php" class="acces_rapide">
        &larr; Retour à la page d'accueil
    </a>
</div>

<!--   Toast Messages-->
<?php if (isset($_GET['status']) && $_GET['status'] === 'created'): ?>
    <script>
        showToast("Ajout effectué avec succès ", "success", 3000);
    </script>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'updated'): ?>
    <script>
        showToast("Mise à jour efféctuée avec succès", "success", 3000);
    </script>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
    <script>
        showToast("Suppression effectuée avec succès ", "success", 3000);
    </script>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
    <script>
        showToast("Erreur rencontrée lors de l'opération : Si Attribution Dossard, Assurez-vous d'attribuer un nouveau dossard pour une categorie donnée. ", "error", 3000);
    </script>
<?php endif; ?>
