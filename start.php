<?php
session_start();
if(!isset($_SESSION['name']))
header('Location:index.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <title>главная</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
  </head>
  <body>
    <div>
      <?php
      echo "<h1>Привет  ". $_SESSION['name'] ."!</h1>";
      if(isset($_SESSION['message'])){
      echo "<h2>". $_SESSION['message'] ."</h2>";}
      ?>
     <a href="logout.php">выход</a>  
    </div>
  </body>
</html>