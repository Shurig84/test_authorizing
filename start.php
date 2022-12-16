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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </head>
  <body>
    <div>
    <h1><p>Привет  <span class="user_name"></span></p><h1>
    <p>логин - <span class="user_login"></span></p>
    <p>email - <span class="user_email"></span></p>
    <a href="logout.php">выход</a>  
    </div>
    <script src="hello.js"></script>
  </body>
</html>