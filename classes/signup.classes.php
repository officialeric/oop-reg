<?php

/*
{''''''''''''}
{  Erc Ernst }
{____________}
*/

class Signup extends Dbh{
    protected function setUser($uid,$pwd,$email){
        $sql = Parent::connection() 
             ->prepare("INSERT INTO users(users_uid,users_pwd,users_email) VALUES(?,?,?);");
        
        $hashed_pwd = password_hash($pwd,PASSWORD_DEFAULT);
        if(!$sql->execute(array($uid,$hashed_pwd,$email))){
            $sql = null;
            header('location : ../index.php?error=Failed to process Signup request!');
            exit();
        }
        

    }

    protected function checkUser($uid,$email){
        $sql = Parent::connection() 
             ->prepare("SELECT * FROM users WHERE users_uid=? AND users_email=?;");
   
        if(!$sql->execute(array($uid,$email))){
          $sql = null;
          header('location : ../index.php?error=Failed to process Signup request!');
          exit();
        }

        $result;
        if($sql->rowCount() > 0){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
}