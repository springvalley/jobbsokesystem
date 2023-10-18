<?php
/* 
Denne klassen er lik den gamle DB_Handler vi hadde men den lar oss binde parametere osv direkte i klassen
Se users.controller.php for bruk
*/


class DB_Handler_Improved
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

    //Construcotr
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
     * Description: This function is used to prepare a SQL statement. 
     * Param1: $sql = The sql statement you want to send to the database. 
     * Returns:
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

      /**
     * Description: This function is used to bind parameters to the PDO statement. 
     * Param1: $param: The paramter you want to bind. 
     * Param2: $value: The value you want to bind to the parameter
     * Param3: $type: Type of the value you want to bind, null by default.
     * Returns: Nothing.
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
     * Description: This function is used to execute a prepared statement in the database
     * Params:
     * Returns: True or false based on if the prepared statement executede successfully.
     */

    public function execute(){
        return $this->stmt->execute();
    }

      /**
     * Description: This function is used to fetch multiple rows of data from a database. 
     * Params:
     * Returns: An array of objects or false if no rows were found.
     */
    public function fetchMultiRow(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

      /**
     * Description: This function is used to fetch a single row of data from the database
     * Params:
     * Returns: A single object or false if no rows were found.
     */
    public function fetchSingleRow(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

      /**
     * Description: This function is used to retrieve the rowcount of the previously executed statement.
     * Params:
     * Returns: The amount of rows affected by the previous SQL statement.
     */
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}
