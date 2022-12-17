<?php  //выход из сессии 
session_start();
unset($_SESSION['name']);
unset($_SESSION['login']);
unset($_SESSION['email']);
if(isset($_SESSION['message']))
unset($_SESSION['message']);
header('Location:index.php')
?>