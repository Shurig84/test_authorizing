<?php
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
  die('это не AJAX запрос');
  };
  
session_start();
include_once "class_user.php";
include_once "crud_db_class.php";
$login = trim($_POST['login']);
$password = trim($_POST['password']);
$db = json_decode(file_get_contents('users.json'),true);
$user = new User('','',$login,md5($password.$login),'');

if(isset($db)){
  if(Crud_db::check_login($user,$db))
  { 
    if(Crud_db::check_password($db,$user)){
    
        if($_POST['action']==='del')  //обработка запроса на удаление профиля
        {
        Crud_db::del_user($db,$user);
        $response = [
        "login"=>true,
        "password"=>true,
        "del_mes"=>'ваш аккаунт успешно удален'
         ];
        echo json_encode($response);
        die();
        }

    
        if($_POST['action']==='update')   //обработка запроса на изменение пароля
        {
           $new_password = trim($_POST['new_password']);
        
           if(Crud_db::is_valid_pass($new_password))
           {
           Crud_db::update_user($db,$user,$new_password);
           $response = [
           "login"=>true,
           "password"=>true,
           "update_mes"=>'ваш пароль успешно изменен'
            ];
            echo json_encode($response);
            die();
            }
        
            else      
            {
             $response = [
            "login"=>true,
            "new_password"=>true,
            "message"=>'неверно введен пароль'
             ];
             echo json_encode($response);
             die();
    
            }
        }
    
        $user=Crud_db::get_user($db,$user);  //обработка ajax запроса на авторизацию профиля
        $name = $user->name;
        $email = $user->email;
        $login = $user->login;
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['login']=$login;
        $response = [
          "name"=> $name,
          "login"=> true,
          "password"=> true,
         ];
        echo json_encode($response);
        die();
    }
    else  
    {       //неправильный ввод пароля
        
         $response = [
        "login"=>true,
        "password"=>false,
        "message"=>'неверно введен пароль'
         ];
         echo json_encode($response);
         die();
    }
  }
  else
  {          //неправильный ввод логина
    $response = [     
        "login"=>false,
        "password"=>false,
        "message"=>'неверно введен логин' 
    ];
    echo json_encode($response);
    
    die(); 
  }
}


else 
{                  //база данных не имеет записей
    $response = [
        "login"=>false,
        "password"=>false,
        "message"=>false
    ];
    echo json_encode($response);

}

?>