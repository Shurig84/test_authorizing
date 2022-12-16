<?php
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
  die('это не AJAX запрос');
  };
session_start();
if($_POST['action']==='hello'){
$email=$_SESSION['email'];
$name=$_SESSION['name'];
$login=$_SESSION['login'];
$response = [
"name"=> $name,
"email"=> $email,
"login"=> $login
];
echo json_encode($response);
die();
}
?>