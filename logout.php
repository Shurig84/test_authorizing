<?php
session_start();
unset($_SESSION['name']);
if(isset($_SESSION['message']))
unset($_SESSION['message']);
header('Location:index.php')
?>