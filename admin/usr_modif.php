<?php
  include("includes/header.php");
  if (isset($_GET['error'])) {
    if ($_GET['error'] == 1)
      echo "Erreur : Veuillez remplir tous les champs";
    if ($_GET['error'] == 2)
      echo "Erreur : Cet email est deja utilise";
  }
?>
    <div class="admin-panel">
      <form method="POST" action="process/usr.php">
        Email:<br>
        <input type="email" name="email" value=""><br>
        Password:<br>
        <input type="password" name="password" value=""><br>
        First name:<br>
        <input type="text" name="first_name" value=""><br>
        Last name:<br>
        <input type="text" name="name" value=""><br>
        Street's adress:<br>
        <input type="text" name="street" value=""><br>
        Zipcode:<br>
        <input type="text" name="zipcode" value=""><br>
        City:<br>
        <input type="text" name="city" value=""><br>
        Country:<br>
        <input type="text" name="country" value=""><br>

        <input type="checkbox" name="is_root" value="1">
        <label for="coding">Administrateur</label><br><br>
        <input type="hidden" name="add" value="1">
        <input type="submit" value="Register">
      </form>
    </div>

<?php include("includes/footer.php") ?>
