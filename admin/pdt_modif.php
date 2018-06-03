<?php
  include("includes/header.php");
  $get_cats = get_categories();
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 1)
      echo "Erreur : Le produit doit etre nomme";
    if ($_GET['error'] == 2)
      echo "Erreur : Il manque des donnees ( Image ? )";
  }
  if (!isset($_GET['id'])) {
    header("Location: pdt_list.php");
    exit ;
  }
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
        <input type="number" name="stock" value=""><br>
        Upload Image:<br>
        <p><input type="file" name="image" id="imgupload"><br><br></p>
        Categorie(s) :<br>
        <?php foreach ($get_cats as $v) { ?>
          <input type="checkbox" name="cat[]" value="<?php echo $v['id_category']?>">
          <label for="coding"><?php echo $v['name'];?></label><br>
        <?php }?>
        <input type="hidden" name="modif" value="<?php echo $_GET['id']; ?>">
        <input type="submit" value="Modifier Produit">
      </form>
    </div>

<?php include("includes/footer.php") ?>
