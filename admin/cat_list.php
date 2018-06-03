<?php
  include("includes/header.php");
  $cat_list = get_categories();
?>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Modification</th>
    <th>Suppression</th>
  </tr>
  <?php foreach($cat_list as $v) { ?>
    <tr>
      <?php
      echo "<td>".$v['id_category']."</td>";
      echo "<td>".stripslashes($v['name'])."</td>";
      echo "<td>".stripslashes($v['description'])."</td>";
      echo "<td><a id='list-cat' href='cat_modif.php?id=".$v['id_category']."'>Modifier Categorie</a></td>";
      echo "<td><a id='list-cat' href='process/cat.php?id=".$v['id_category']."&del=1'>Supprimer Categorie</a></td>";
      ?>
    </tr>
  <?php } ?>
</table>
<?php include("includes/footer.php"); ?>
