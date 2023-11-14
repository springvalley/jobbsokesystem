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
     * This function is used to insert a new job advertisement in the database.
     * @param array $data 
     */
    public function insertNewJobAd($data)
    {
        $this->db->query("INSERT INTO joblisting(employer_id, job_title, description, jobType_id, location_id, industry_id, application_deadline, position_name) 
                        VALUES (:employerId, :jobTitle, :jobDescription, :jobType, :location, :industry, :applicationDeadline, :positionName);");
        //Binding parameters
        $this->db->bind(":employerId", $data["employerId"]);
        $this->db->bind(":jobTitle", $data["jobTitle"]);
        $this->db->bind(":jobDescription", $data["jobDescription"]);
        $this->db->bind(":jobType", $data["jobType"]);
        $this->db->bind(":location", $data["location"]);
        $this->db->bind(":industry", $data["industry"]);
        $this->db->bind(":applicationDeadline", $data["applicationDeadline"]);
        $this->db->bind(":positionName", $data["positionName"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateJobAd($newData)
    {
        $this->db->query("UPDATE joblisting SET
        job_title = :jobTitle, description = :jobDescription, jobType_id = :jobType, location_id = :location, industry_id = :industry, application_deadline = :applicationDeadline,
        position_name = :positionName WHERE jobListing_id = :jobListing_id");
        //Binding parameters
        $this->db->bind(":jobListing_id", $newData["jobListing_id"]);
        $this->db->bind(":jobTitle", $newData["jobTitle"]);
        $this->db->bind(":jobDescription", $newData["jobDescription"]);
        $this->db->bind(":jobType", $newData["jobType"]);
        $this->db->bind(":location", $newData["location"]);
        $this->db->bind(":industry", $newData["industry"]);
        $this->db->bind(":applicationDeadline", $newData["applicationDeadline"]);
        $this->db->bind(":positionName", $newData["positionName"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllJobListingsByEmployer($employerId)
    {
        $this->db->query("SELECT jl.jobListing_id, jl.job_title, jl.description, jl.published_time, e.company_name, l.location_name, i.industry_name, jt.jobType, jl.position_name, jl.application_deadline
                     FROM joblisting AS jl
                     INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                     INNER JOIN location AS l ON jl.location_id = l.location_id
                     INNER JOIN industry AS i ON jl.industry_id = i.industry_id
                     INNER JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                     WHERE jl.employer_id = :employerId");

        $this->db->bind(":employerId", $employerId);

        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getJobAdByJobListingId($jobListing_id)
    {
        $this->db->query("SELECT jl.jobListing_id, jl.job_title, jl.description, jl.published_time, e.company_name, l.location_name, i.industry_name, jt.jobType, jl.position_name, jl.application_deadline
                     FROM joblisting AS jl
                     INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                     INNER JOIN location AS l ON jl.location_id = l.location_id
                     INNER JOIN industry AS i ON jl.industry_id = i.industry_id
                     INNER JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                     WHERE jl.jobListing_id = :jobListing_id");

        $this->db->bind(":jobListing_id", $jobListing_id);
        $row = $this->db->fetchSingleRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
