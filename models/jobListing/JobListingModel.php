<?php
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";

class JobListingModel {
    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler;
    }
    
    public function insertNewJobAd ($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName) {
        $this->db->query("INSERT INTO joblisting(employer_id, job_title, description, jobType_id, location_id, industry_id, application_deadline, position_name) 
                        VALUES (:employerId, :jobTitle, :jobDescription, :jobType, :location, :industry, :applicationDeadline, :positionName);");
        
        $this->db->bind(":employerId", $employerId);
        $this->db->bind(":jobTitle", $jobTitle);
        $this->db->bind(":jobDescription", $jobDescription);
        $this->db->bind(":jobType", $jobType);
        $this->db->bind(":location", $location);
        $this->db->bind(":industry", $industry);
        $this->db->bind(":applicationDeadline", $applicationDeadline);
        $this->db->bind(":positionName", $positionName);

        if($this->db->execute()) {
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

    public function getJobAdByJobListingId($jobListingId) {
        $this->db->query("SELECT jl.jobListing_id, jl.job_title, jl.description, jl.published_time, e.company_name, l.location_name, i.industry_name, jt.jobType, jl.position_name, jl.application_deadline
                     FROM joblisting AS jl
                     INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                     INNER JOIN location AS l ON jl.location_id = l.location_id
                     INNER JOIN industry AS i ON jl.industry_id = i.industry_id
                     INNER JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                     WHERE jl.jobListing_id = :jobListingId");

        $this->db->bind(":jobListingId", $jobListingId);
        $row = $this->db->fetchSingleRow();
        
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

}