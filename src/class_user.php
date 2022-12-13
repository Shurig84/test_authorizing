<?php
class User{
    public $name,$email,$login,$password,$confirm_password;
    function __construct($name,$email,$login,$password,$confirm_password)
    {
        $this->name=$name;
        $this->email=$email;
        $this->login=$login;
        $this->password=$password;
        $this->confirm_password=$confirm_password;
    }
}

?>