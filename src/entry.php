<?php
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
  die('это не AJAX запрос');
  };
session_start();
include_once "class_user.php";
include_once "crud_db_class.php";
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$login = trim($_POST['login']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);
$db = json_decode(file_get_contents('users.json'),true);
$user = new User($name,$email,$login,md5($password.$login),md5($confirm_password.$login));
$s_user = serialize($user);
$valid = Crud_db::reg_valid($user);

  if(isset($db)&&Crud_db::check_login($user,$db)){
  $valid["login"]=false;
  $valid["login_mess"]='такой логин уже существует';
  $valid["all_valid"]=false;
}
if(isset($db)&&Crud_db::check_email($user,$db)){
  $valid["email"]=false;
  $valid["email_mess"]='такой email уже существует';
  $valid["all_valid"]=false;
}

  if($valid["all_valid"]){
  Crud_db::add_user($s_user,$db);
  $_SESSION['message']='Вы зарегистрированы!';
  $_SESSION['name']=$user->name;
  $_SESSION['email']=$user->email;
  $_SESSION['login']=$user->login;
  }
echo json_encode($valid);
?>
