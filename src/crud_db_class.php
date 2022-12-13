<?php
 class Crud_db{

static function add_user($s_user,$db){
    
    if(isset($db)){
        array_push($db,$s_user);
        file_put_contents('users.json',json_encode($db,true));
    }
      else{
        file_put_contents('users.json',json_encode([0=>$s_user],true));
    }
}

static function get_user($db,$user) 
{
    
 foreach($db as $value)
    {
        $v = unserialize($value);
        if($v->password===$user->password && $v->login===$user->login)
        return $v;
    }
     return false;
}

static function update_user($db,$user,$new_password){
    $new_password=md5($new_password.$user->login);
    foreach($db as $key=>$value)
    {
        $v = unserialize($value);
        if($v->password===$user->password && $v->login===$user->login){
        $v->password=$new_password;
        $v->confirm_password=$new_password;
        unset($db[$key]);
        array_push($db,serialize($v));
        $db=array_values($db);
        break;}
    }
    file_put_contents('users.json',json_encode($db,true));
    
}

static function del_user($db,$user){

    foreach($db as $key=>$value)
    {
        $v = unserialize($value);
        if($v->password===$user->password && $v->login===$user->login)
        {
           if(count($db)===1)
           {
            file_put_contents('users.json',json_encode(null));
            break;
           }
           else
           {
            unset($db[$key]);
            file_put_contents('users.json',json_encode($db,true));
            break;
           }
        
        }
    }
    
    
}

static function check_email($user,$db) 
{
 foreach($db as $value)
    {
        $v = unserialize($value);
        if($v->email==$user->email)
        return true;
    }
     return false;
}

static function check_login($user,$db) 
{
 foreach($db as $value)
    {
        $v = unserialize($value);
        if($v->login==$user->login)
        return true;
    }
     return false;
}

static function check_password($db,$user) 
{
    
 foreach($db as $value)
    {
        $v = unserialize($value);
        if($v->password===$user->password && $v->login===$user->login)
        return true;
    }
     return false;
}

static function is_valid_pass($password){
    $res = preg_match('/^((?=.*[0-9])(?=.*[a-zа-яA-ZА-Я])[\w]{6,30})$/u',$password);
    if($res) {
       return true;}
    return false;
  } 

static function reg_valid($user){
    
  $is_name = preg_match( '/^[A-Za-zА-Яа-я]{2,20}$/u',$user->name);
  $is_email = filter_var($user->email, FILTER_VALIDATE_EMAIL);
  $is_login = preg_match( '/^\w{6,30}$/u',$user->login);
  $is_password = self::is_valid_pass($_POST['password']);
  $is_confirm_password = self::is_valid_pass($_POST['confirm_password'])
  &&$user->password===$user->confirm_password;
  $is_all_valid = $is_name&&$is_email&&$is_login&&$is_password&&$is_confirm_password;
  $resp = [
     "name"=>$is_name,
     "email"=>$is_email,
     "login"=>$is_login,
     "password"=>$is_password,
     "confirm_password"=>$is_confirm_password,
     "all_valid"=>$is_all_valid,
     "login_mess"=>'ошибка ввода логина',
     "email_mess"=>'ошибка ввода email'
 ];
 return $resp;
 }
}
?>