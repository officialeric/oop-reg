<?php

/*
{''''''''''''}
{  Erc Ernst }
{____________}
*/

class Dbh {
    protected function connection(){
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=pdo","xnova","#Xnova2023");
            return $dbh;
        } catch (PDOException $e) {
            print 'Error!: ' . $e->getMessage() . '<br>';
            die();
        }
    }
}