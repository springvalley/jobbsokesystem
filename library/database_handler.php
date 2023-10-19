<?php

/**
 * DB_Handler is a class responsible for establishing a connection to a phpMyAdmin database using PDO(PHP Data Objects).
 * @since 0.5.0 
 */

class DB_Handler
{
    //Database variables
    private $dbHost = "localhost";
    private $dbUsername = "root";
    private $dbpwd = "";
    private $dbName = "is115";

    //Class variables
    private $dbh;
    private $stmt;
    private $error;

    //Constructor
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

      /**
     * This function is used to prepare a SQL statement for execution.
     * @param string $sql The SQL statement to be prepared. 
     * @return void
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

      /**
     * This function is used to bind parameters to the PDO statement. 
     * @param mixed $param The parameter to bind. 
     * @param mixed $value The value to bind to the parameter
     * @param int $type The type of the value to bind, default is null.
     * 
     */
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

    /**
     * This function is used to execute a prepared statement in the database.     
     * @return boolean True or false based on if the prepared statement executede successfully.
     */

    public function execute(){
        return $this->stmt->execute();
    }

      /**
     * This function is used to fetch multiple rows of data from a database. 
     * @return array|boolean An array of objects or false if no rows were found.
     */
    public function fetchMultiRow(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

      /**
     * This function is used to fetch a single row of data from the database.
     * @return mixed A single object or false if no rows were found.
     */
    public function fetchSingleRow(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

      /**
     * This function is used to retrieve the rowcount of the previously executed statement.
     * @return int The number of rows affected by the previous SQL statement.
     */
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}
