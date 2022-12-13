<?php
session_start();
if(isset($_SESSION['name']))
header('Location:start.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <title>регистрация</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </head>
  <body>
      <form>
        <label>Имя</label>
        <p><input type="text" name="name" placeholder="введите свое имя" required />
        <text class="name_err"></text></p>
        <label>Email</label>
        <p><input type="email" name="email" placeholder="введите свой email" required />
        <text class="email_err"></text></p>
        <label>Логин</label>
        <p><input type="text" name="login" placeholder="введите свой логин" required/>
        <text class="login_err"></text></p>
        <label>Пароль</label>
        <p><input type="password" name="password" placeholder="введите свой пароль" required/>
        <text class="password_err"></text></p>
        <label>Подтверждение пароля</label>
        <p><input type="password" name="confirm_password" placeholder="введите свой пароль повторно" required />
        <text class="confirm_password_err"></text></p>
        <input type="submit" class="reg_btn" value="отправить"/>
        <p>Вы зарегистрированы?<a href="index.php"> авторизация</a><a href="update.php"> смена пароля</a></p>
        <script src="reg.js"></script>
      </form>
      
  </body>
</html>