<?php
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";

class IndexModel
{

    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler;
    }

    public function getAllLocations()
    {
        $this->db->query("SELECT * from Location");
        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAllSkills()
    {
        $this->db->query("SELECT * FROM Skill");
        $row = $this->db->fetchMultiRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getAllEducations()
    {
        $this->db->query("SELECT * FROM educationlevel");
        $row = $this->db->fetchMultiRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}