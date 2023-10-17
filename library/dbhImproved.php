<?php
/* 
Denne klassen er lik den gamle DB_Handler vi hadde men den lar oss binde parametere osv direkte i klassen
Se users.controller.php for bruk
*/


class DB_Handler_Improved
{
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbpwd = "";
    private $dbName = "is115";

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //Set dsn
        $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create PDO instance

        try {
            $this->dbh = new PDO($dsn, $this->dbUsername, $this->dbpwd, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Prepared statement query
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    //Denne funksjonen brukes til for å binde parametere til verdier, samme som PDO::bind
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //Execute a prepared statement
    public function execute(){
        return $this->stmt->execute();
    }

    //Fetch multiple rows of data, returns PHP Object.
    public function fetchMultiRow(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Fetch a single row of data, returns a single PHP Object.
    public function fetchSingleRow(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Returns the rowcount (i.e how many rows were returned by the statement)
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}
