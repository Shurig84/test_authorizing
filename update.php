<?php
session_start();
if(isset($_SESSION['name']))
header('Location:start.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>авторизация</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </head>
  <body>
      <form >
        <label>Логин</label>
        <p><input type="text" name="login" placeholder="введите свой логин" />
        <text class="login_err"></text></p>
        <label>Пароль</label>
        <p><input type="password" name="password" placeholder="введите свой старый пароль" />
        <text class="password_err"></text></p>
        <p><input type="password" name="new_password" placeholder="введите свой новый пароль" />
        <text class="new_password_err"></text></p>
        <input type="submit" class="update_btn" value="сменить пароль"/>
        <text class="is_update_mess"></text></p>
        <p><a href="reg.php"> регистрация</a><a href="index.php"> авторизация</a></p>
        <script src="auth.js"></script>
      </form>
  </body>
</html>