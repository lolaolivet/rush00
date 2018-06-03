<?php
  include("includes/header.php");
?>
    <div class="admin-panel">
      <form method="POST" action="process/cat.php">
        Name:<br>
        <input type="text" name="name" value=""><br>
        Description:<br>
        <textarea name="description" rows=5 cols=40></textarea><br><br>
        <input type="submit" value="Add Category">
      </form>
    </div>

<?php include("includes/footer.php") ?>
