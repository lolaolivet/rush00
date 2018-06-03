<?php
  include("includes/header.php");
  $usr_list = get_users();
?>
<table style="width:100%">
  <tr>
    <th>Id</th>
    <th>Email</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Admin</th>
    <th>Adresse</th>
    <th>CP</th>
    <th>Ville</th>
    <th>Pays</th>
    <th>Modification</th>
    <th>Suppression</th>
  </tr>
  <?php foreach($usr_list as $v) { ?>
    <tr>
      <?php
      echo "<td>".$v['id_user']."</td>";
      echo "<td>".stripslashes($v['email'])."</td>";
      echo "<td>".stripslashes($v['name'])."</td>";
      echo "<td>".stripslashes($v['first_name'])."</td>";
      if ($v['is_user'] == 1) { $admin = "NON"; } else { $admin = "OUI"; }
      echo "<td>".$admin."</td>";
      echo "<td>".stripslashes($v['street'])."</td>";
      echo "<td>".stripslashes($v['zipcode'])."</td>";
      echo "<td>".stripslashes($v['city'])."</td>";
      echo "<td>".stripslashes($v['country'])."</td>";
      echo "<td><a id='list-cat' href='usr_modif.php?id=".$v['id_user']."'>Modifier User</a></td>";
      echo "<td><a id='list-cat' href='process/usr.php?id=".$v['id_user']."&del=1'>Supprimer User</a></td>";
      ?>
    </tr>
  <?php } ?>
</table>
<?php include("includes/footer.php"); ?>
