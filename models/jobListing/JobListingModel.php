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

}