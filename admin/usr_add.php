<?php
  include("includes/header.php");
?>
    <div class="admin-panel">
      <form method="POST" action="process/usr.php">
        First name:<br>
        <input type="text" name="first_name" value=""><br>
        Last name:<br>
        <input type="text" name="name" value=""><br>
        Email :<br>
        <input type="email" name="email" value=""><br>
        Street's adress:<br>
        <input type="text" name="street" value=""><br>
        Zipcode:<br>
        <input type="text" name="zipcode" value=""><br>
        City:<br>
        <input type="text" name="city" value=""><br>
        Country:<br>
        <input type="text" name="country" value=""><br><br>
        <input type="hidden" name="add" value="1">
        <input type="submit" value="Register">
      </form>
    </div>

<?php include("includes/footer.php") ?>
