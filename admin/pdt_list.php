<?php
  include("includes/header.php");
  $pdt_list = get_products();
?>

<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Description</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Modification</th>
    <th>Suppression</th>
  </tr>
  <?php foreach($pdt_list as $v) { ?>
    <tr>
      <?php
      echo "<td>".$v['id_product']."</td>";
      echo "<td>".stripslashes($v['name'])."</td>";
      echo "<td>".stripslashes($v['description'])."</td>";
      echo "<td>".stripslashes($v['price'])."</td>";
      echo "<td>".stripslashes($v['stock'])."</td>";
      echo "<td><a id='list-cat' href='pdt_modif.php?id=".$v['id_product']."'>Modifier Produit</a></td>";
      echo "<td><a id='list-cat' href='process/pdt.php?id=".$v['id_product']."&del=1'>Supprimer Produit</a></td>";
      ?>
    </tr>
  <?php } ?>
</table>

<?php include("includes/footer.php") ?>
