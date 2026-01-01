<form method="post"
      action="controllers/category_action.php"
      class="delete-form">

    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="course_key"
           value="<?= htmlspecialchars($course['course_key']) ?>">

    <button class="btn-delete">Supprimer</button>
</form>
