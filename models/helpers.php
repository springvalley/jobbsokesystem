<?php

/**
 * Helper is a class responsible for providing utility functions to retrieve various data from the database.
 * This class is created for the other classes can use it if they need to retrives data such as locations, skills, job types, industries, and education levels by calling the methods.
 * @since 0.5.0
 * @see DB_Handler which is the database handler class used by Helper to interact with the database.
 */

require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";


class Helper
{

    private $db;

    //Constructor
    public function __construct()
    {
        $this->db = new DB_Handler;
    }

    /**
     * This function is used to retrieve a list of locations from database.     
     * The function queries the database to fetch all location records.  
     * @return array|false An array of location records if found, or false if no records exist in the database.
     */
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

    /**
     * This function is used to retrieve a list of skills from database.     
     * The function queries the database to fetch all skill records.  
     * @return array|false An array of skill records if found, or false if no records exist in the database.
     */
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

    /**
     * This function is used to retrieve a list of job type from database.     
     * The function queries the database to fetch all types of job.  
     * @return array|false An array of job type records if found, or false if no records exist in the database.
     */
    public function getAllJobTypes()
    {
        $this->db->query("SELECT * FROM jobtype");
        $row = $this->db->fetchMultiRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to retrieve a list of industries from database.     
     * The function queries the database to fetch all industry records.  
     * @return array|false An array of industry records if found, or false if no records exist in the database.
     */
    public function getAllIndustries()
    {
        $this->db->query("SELECT * FROM industry");
        $row = $this->db->fetchMultiRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to retrieve a list of educations from database.     
     * The function queries the database to fetch all education records.  
     * @return array|false An array of education records if found, or false if no records exist in the database.
     */
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


    /**
     * This function is used to retrieve a list of job ads from database.     
     * The function queries the database to fetch all education records.  
     * @return array|false An array of job ads records if found, or false if no records exist in the database.
     */
    public function getJobListing()
    {
        $this->db->query("SELECT jl.jobListing_id, jl.job_title, jl.description, jl.published_time, jl.position_name, jl.application_deadline, e.company_name, e.email, l.location_name, jt.jobType, i.industry_name
        FROM joblisting as jl 
        INNER JOIN location as l on jl.location_id = l.location_id 
        INNER JOIN employer as e ON jl.employer_id = e.employer_id 
        INNER JOIN jobtype as jt on jl.jobType_id = jt.jobType_id
        INNER JOIN industry as i on jl.industry_id = i.industry_id
        ORDER BY jl.published_time DESC");

        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}