<?php
include("includes/connect_sql.php");
$sql = db_connect();
$tmp = '';
$file = file("ressources/sql_create.sql");
foreach ($file as $line)
{
  if (substr($line, 0, 2) == '--' || $line == '')
      continue;
  $templine .= $line;
  if (substr(trim($line), -1, 1) == ';')
  {
    mysqli_query($sql, $templine) or print('Errer en traitant la requete \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    $templine = '';
  }
}
echo "Tables imported successfully";
?>
