<?php
  include("includes/header.php");
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 1)
      echo "Erreur : La categorie doit etre nomme";
  }
?>
    <div class="admin-panel">
      <form method="POST" action="process/cat.php">
        Name:<br>
        <input type="text" name="name" value=""><br>
        Description:<br>
        <textarea name="description" rows=5 cols=40></textarea><br><br>
        <input type="hidden" name="add" value="1">
        <input type="submit" value="Add Category">
      </form>
    </div>

<?php include("includes/footer.php") ?>
