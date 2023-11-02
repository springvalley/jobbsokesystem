<?php
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
class JobListingModel
{

    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler;
    }

    /**
     * Description: This function is used to retrieve a single joblisting from the database.
     * Params1: $jobListingID = The ID (int) of a job listing in the database
     * Returns: The joblisting requestee if it was found in the database as an object, false otherwise. 
     */
    protected function getJobListing($jobListingID)
    {
        $this->db->query("SELECT jl.jobListing_id, jl.job_title, jl.description, jl.published_time, e.company_name, e.email, l.location_name, jt.jobType, i.industry_name FROM joblisting as jl
        INNER JOIN location as l on jl.location_id = l.location_id INNER JOIN employer as e ON jl.employer_id = e.employer_id INNER JOIN industry as i on e.industry_id = i.industry_id INNER JOIN jobtype as jt on jl.jobType_id = jt.jobType_id
        WHERE jl.jobListing_id = :jobListing_id");
        $this->db->bind(":jobListing_id", $jobListingID);
        $row = $this->db->fetchSingleRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Description: This function is used to retrieve a single joblisting from the database.
     * Params1: $jobListingID = The ID (int) of a job listing in the database
     * Returns: The joblisting requestee if it was found in the database as an object, false otherwise. 
     */
    protected function getAllJobListings()
    {
        $this->db->query("SELECT jl.jobListing_id, jl.job_title, jl.description, jl.published_time, e.company_name, e.email, l.location_name, jt.jobType 
        FROM joblisting as jl
        INNER JOIN location as l on jl.location_id = l.location_id 
        INNER JOIN employer as e ON jl.employer_id = e.employer_id 
        INNER JOIN jobtype as jt on jl.jobType_id = jt.jobType_id");
        $row = $this->db->fetchSingleRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Description: This function is used to retrieve the total amount of joblistings in the database.
     * Params:
     * Returns: The number of jobListings in the database as an int. 
     */
    public function getNumberOfJobListingsInDB()
    {
        $this->db->query("SELECT COUNT(*) as joblistingCount FROM joblisting");
        $row = $this->db->fetchSingleRow();
        if ($this->db->rowCount() > 0) {
            return $row->joblistingCount;
        } else {
            return false;
        }
    }
}
