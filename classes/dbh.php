<?php

class DB_Handler
{

    protected function connect()
    {
        try {
            $username = "root";
            $pwd = "";
            $dbh = new PDO('mysql:host=localhost;dbname=is115', $username, $pwd);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
