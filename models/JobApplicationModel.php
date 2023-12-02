<?php
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";

class JobApplicationModel
{
    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler();
    }

    public function getListJobApplicationsByJobListingId($jobListing_id)
    {
        $this->db->query("SELECT ja.jobApplication_id, ja.apply_date, j.jobApplicant_id, j.name, j.educationlevel_id,
                        a.application_status_name, jl.position_name, jl.published_time, jl.application_deadline, 
                        e.company_name, l.location_name, i.industry_name, jl.jobListing_id, jt.jobType
                        FROM jobapplication AS ja
                        INNER JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
                        INNER JOIN jobapplicant AS j ON ja.jobApplicant_id = j.jobApplicant_id
                        INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                        INNER JOIN location AS l ON jl.location_id = l.location_id
                        INNER JOIN industry AS i ON jl.industry_id = i.industry_id
                        INNER JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                        INNER JOIN applicationstatus AS a ON ja.application_status_id = a.application_status_id        
                        WHERE ja.jobListing_id = :jobListing_id
                        ORDER BY ja.apply_date DESC");
        // $this->db->bind(":employer_id", $employer_id);
        $this->db->bind(":jobListing_id", $jobListing_id);

        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getJobApplicationDetails($jobApplication_id)
    {
        $this->db->query("SELECT ja.*, jl.position_name, jl.published_time, jl.application_deadline, a.application_status_name,
        e.company_name, l.location_name, i.industry_name, jl.jobListing_id, jt.jobType, j.jobApplicant_id, j.name, j.email, j.phone_number, j.profile_picture, el.educationlevel_name
                        FROM jobapplication AS ja 
                        INNER JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id                       
                        INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                        INNER JOIN location AS l ON jl.location_id = l.location_id
                        INNER JOIN industry AS i ON jl.industry_id = i.industry_id
                        INNER JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                        INNER JOIN jobapplicant AS j ON ja.jobApplicant_id = j.jobApplicant_id                         
                        INNER JOIN educationlevel AS el ON j.educationlevel_id = el.educationlevel_id  
                        INNER JOIN applicationstatus AS a ON ja.application_status_id = a.application_status_id                                           
                        WHERE jobApplication_id = :jobApplication_id");
        $this->db->bind(":jobApplication_id", $jobApplication_id);
        $row = $this->db->fetchSingleRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to get all job applications for the job applicant.
     * @param $jobApplicantId The Id of jobapplicant.
     * @return 
     */
    public function getAllJobApplicationsByJobApplicant($jobApplicantId)
    {
        $this->db->query("SELECT ja.*, a.application_status_name, jl.application_deadline,
        jl.position_name, e.company_name, l.location_name, i.industry_name, jt.jobType
        FROM jobapplication AS ja
        JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
        JOIN employer AS e ON jl.employer_id = e.employer_id
        JOIN location AS l ON jl.location_id = l.location_id
        JOIN industry AS i ON jl.industry_id = i.industry_id
        JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
        JOIN applicationstatus AS a ON ja.application_status_id = a.application_status_id
        WHERE ja.jobApplicant_id = :jobApplicantId");

        $this->db->bind(":jobApplicantId", $jobApplicantId);
        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function updateApplicationStatus($jobApplicationId, $newApplicationStatusId)
    {
        $this->db->query("UPDATE jobapplication SET application_status_id = :newApplicationStatusId
                        WHERE jobApplication_id = :jobApplicationId");

        $this->db->bind(":newApplicationStatusId", $newApplicationStatusId);
        $this->db->bind(":jobApplicationId", $jobApplicationId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}