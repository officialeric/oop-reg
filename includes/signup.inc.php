<?php

/*
{''''''''''''}
{  Erc Ernst }
{____________}
*/

if(isset($_POST['submit'])){
  $uid = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $pwd_repeat = $_POST['pwd_repeat'];

  #instantiate signup-contr class
  include('../classes/dbh.classes.php');
  include('../classes/signup.classes.php');
  include('../classes/signup-contr.classes.php');
  
  $signup = new SignupContr($uid,$email,$password,$pwd_repeat);

  #running error handlers
  $signup->signUp();

  #redirecting home page
  header('location:../index.php');

}else{
    header('location: ../index.php');
    exit();
}