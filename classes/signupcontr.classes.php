<?php
include('../includes/autoloader.php');


/*
{''''''''''''}
{  Erc Ernst }
{____________}
*/

class SignupContr extends Signup{
    private $uid;
    private $email;
    private $password;
    private $pwd_repeat;

    public function __construct($uid,$email,$password,$pwd_repeat){
        $this->uid = $uid;
        $this->email = $email;
        $this->password = $password;
        $this->pwd_repeat = $pwd_repeat;
    }

    public function signUp(){

        if(!$this->emptyInput()){
         header('location:../index.php?error=Some field(s) are empty!');
         exit();
       }
        if(!$this->validateUid()){
         header('location:../index.php?error=Invalid Username!');
         exit();
       }
        if(!$this->validateEmail()){
         header('location:../index.php?error=Invalid email address!');
         exit();
       }
        if(!$this->pwdMatch()){
         header('location:../index.php?error=Password Mismatch!');
         exit();
       }
        if($this->userHasTaken()){
         header('location:../index.php?error=Username or Email has already taken!');
         exit();
       }

       Parent::setUser($this->uid,$this->password,$this->email);
       
    }

    public function emptyInput(){
        $result;
        if(empty($this->uid) || empty($this->email) || empty($this->password) || empty($this->pwd_repeat)){
           $result = false; 
        }else{
            $result = true;
        }
       
        return $result;
    }
    public function validateUid(){
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)){
           $result = false; 
        }else{
            $result = true;
        }
       
        return $result;
    }

    public function validateEmail(){
        $result;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
           $result = false; 
        }else{
            $result = true;
        }
       
        return $result;
    }
    public function pwdMatch(){
        $result;
        if($this->password !== $this->pwd_repeat){
           $result = false; 
        }else{
            $result = true;
        }
       
        return $result;
    }
    public function userHasTaken(){
        $result;
        if(!Parent::checkUser($this->uid,$this->email)){
           $result = false; 
        }else{
            $result = true;
        }
       
        return $result;
    }
}