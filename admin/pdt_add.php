<?php
  include("includes/header.php");
?>
    <div class="admin-panel">
      <form method="POST" action="process/pdt.php" enctype="multipart/form-data">
        Name:<br>
        <input type="text" name="name" value=""><br>
        Description:<br>
        <textarea name="description" rows=5 cols=40></textarea><br>
        Price:<br>
        <input type="number" name="price" value=""><br>
        Stock:<br>
        <input type="number" name="description" value=""><br>
        Upload Image:<br>
        <p style="border:1px;"><input type="file" name="image" id="imgupload"><br><br></p>
        <input type="hidden" name="add" value="1">
        <input type="submit" value="Add Product">
      </form>
    </div>

<?php include("includes/footer.php") ?>
