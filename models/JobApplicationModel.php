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
                        JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
                        JOIN jobapplicant AS j ON ja.jobApplicant_id = j.jobApplicant_id
                        JOIN employer AS e ON jl.employer_id = e.employer_id
                        JOIN location AS l ON jl.location_id = l.location_id
                        JOIN industry AS i ON jl.industry_id = i.industry_id
                        JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                        JOIN applicationstatus AS a ON ja.application_status_id = a.application_status_id        
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

    public function getJobApplication($jobApplication_id)
    {
        $this->db->query("SELECT ja.*, jl.job_title, jl.position_name
                        FROM jobapplication AS ja 
                        JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
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
        $this->db->query("SELECT ja.jobApplication_id, ja.application_text, ja.cover_letter, ja.cv_path, ja.apply_date, a.application_status_name,
        jl.position_name, jl.published_time, jl.application_deadline, 
        e.company_name, l.location_name, i.industry_name, jl.jobListing_id, jt.jobType
        FROM jobapplication AS ja
        JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
        JOIN employer AS e ON jl.employer_id = e.employer_id
        JOIN location AS l ON jl.location_id = l.location_id
        JOIN industry AS i ON jl.industry_id = i.industry_id
        JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
        JOIN applicationstatus AS a ON ja.application_status_id = a.application_status_id
        WHERE ja.jobApplicant_id = :jobApplicantId
        ORDER BY ja.apply_date DESC");

        $this->db->bind(":jobApplicantId", $jobApplicantId);
        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}