<?php

/**
 * JobApplicantModel is a class responsible for for managing job applicant data in the database. 
 * It provides methods to update job applicant profiles, retrieve job applicant data, and manage their skills.
 * @since 0.5.0
 * @see DB_Handler which is the database class used by JobApplicantModel.
 */


require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
class EmployerModel
{

    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler;
    }

    /**
     * This function is used to query database for updating the company profile info.
     * @param array $data An array of data about the user which we want to input into the database.
     * @return
     */

    public function updateEmployerProfile($data)
    {

        //Prepare the sql query
        $this->db->query("UPDATE employer SET 
        company_name=:name,
        email=:email, 
        phone_number=:phone_number,
        location_id=:location_id,
        summary=:summary,
        profile_picture = :profileImage
        WHERE employer_id = :employer_id;
        ");

        //Bind the variables to the data array
        $this->db->bind(":name", $data["userName"]);
        $this->db->bind(":email", $data["userEmail"]);
        $this->db->bind(":phone_number", $data["userPhone"]);
        $this->db->bind(":location_id", $data["userLocation"]);
        $this->db->bind(":summary", $data["userSummary"]);
        $this->db->bind(":employer_id", $data["employer_id"]);
        $this->db->bind(":profileImage", $data["profileImage"]);

        //Execute the statement
        return ($this->db->execute());
    }
    /**
     * This function is used to query the database to retrieve the profile of an employer.
     * @param int $jobapplicantID The ID of an employer in the database
     * @return mixed The employer requesteed if it was found in the database as an object, false otherwise. 
     */
    protected function getEmployerProfile($employerID)
    {
        $this->db->query("SELECT e.employer_id, e.company_name, e.orgNumber, e.email, e.phone_number, e.summary, e.profile_picture, l.location_name, i.industry_name 
                            FROM employer as e 
                            INNER JOIN location as l on e.location_id = l.location_id 
                            INNER JOIN industry as i on e.industry_id = i.industry_id 
                            WHERE e.employer_id = :employer_id");

        $this->db->bind(":employer_id", $employerID);
        $row = $this->db->fetchSingleRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to query for getting existed company profileImage if the company has already uploaded the image for the first editing profile.
     * This purpose of this function is not to require employer users uploading profile image for each time they edit profile.
     * @param int $employerID The ID of employer user
     * @return mixed Return profile image filename if it is found, otherwise return false.
     * 
     */
    public function getExistingProfileImageFile($employerID)
    {
        $this->db->query("SELECT profile_picture FROM employer WHERE employer_id = :employer_id");
        $this->db->bind(":employer_id", $employerID);

        $row = $this->db->fetchSingleRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to query the database to retrive the total number of jobListing by employerId.
     * @param int $employerId The ID of employer user.
     * @return mixed Return an associative array containing the employer_id and the total count of jobListing if it is found, otherwise false.
     */
    public function totalNumberOfJobListingsGroupByEmployerId($employerId)
    {
        $this->db->query("SELECT e.employer_id, COUNT(jl.jobListing_id) AS totalJobListings
                        FROM joblisting AS jl
                        INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                        WHERE e.employer_id = :employerId
                        GROUP BY e.employer_id");

        $this->db->bind(":employerId", $employerId);
        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to query the database to retrive the total number of jobApplications by employerId.
     * @param int $employerId The ID of employer user.
     * @return mixed Return an associative array containing employer_id and the total count of jobApplications if it is found, otherwise false.
     */
    public function totalNumberOfJobApplications($employerId)
    {
        $this->db->query("SELECT e.employer_id, COUNT(ja.jobApplication_id) AS totalJobApplications
                    FROM jobapplication AS ja
                    INNER JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
                    INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                    WHERE e.employer_id = :employerId");

        $this->db->bind(":employerId", $employerId);

        $row = $this->db->fetchMultiRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to query the database to retrive the total number of jobApplicant by employerId.
     * 'DISTINCT' is used to remove the duplicated values.
     * @param int $employerId The ID of employer user.
     * @return mixed Return an associative array containing employer_id and the total count of jobApplicants if it is found, otherwise false.
     */
    public function totalNumberOfJobApplicants($employerId)
    {
        $this->db->query("SELECT e.employer_id, COUNT(DISTINCT ja.jobApplicant_id) AS totalApplicants
                        FROM jobapplication AS ja
                        INNER JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
                        INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                        WHERE e.employer_id = :employerId");

        $this->db->bind(":employerId", $employerId);

        $row = $this->db->fetchMultiRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getOverviewOfJobApplicationsGroupByJobListing($employerId)
    {
        $this->db->query("SELECT jl.jobListing_id, jl.position_name, l.location_name, jt.jobType, e.employer_id, 
                        ROW_NUMBER() OVER (ORDER BY jl.jobListing_id) AS 'index', 
                        COUNT(ja.jobApplication_id) AS totalJobApplications 
                        FROM jobapplication AS ja 
                        INNER JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id 
                        INNER JOIN employer AS e ON jl.employer_id = e.employer_id 
                        INNER JOIN location AS l ON jl.location_id = l.location_id
                        INNER JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                        WHERE e.employer_id = :employerId
                        GROUP BY jl.jobListing_id;");

        $this->db->bind(":employerId", $employerId);
        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getOverviewOfCandidatesGroupByJobListing($employerId)
    {
        $this->db->query("SELECT jl.jobListing_id, jl.position_name, l.location_name, jt.jobType, e.employer_id, 
                        ROW_NUMBER() OVER (ORDER BY jl.jobListing_id) AS 'index',
                        COUNT(ja.jobApplicant_id) AS totalCandidates
                        FROM jobapplication AS ja
                        INNER JOIN joblisting AS jl ON ja.jobListing_id = jl.jobListing_id
                        INNER JOIN employer AS e ON jl.employer_id = e.employer_id
                        INNER JOIN location AS l ON jl.location_id = l.location_id
                        INNER JOIN jobtype AS jt ON jl.jobType_id = jt.jobType_id
                        WHERE e.employer_id = :employerId
                        GROUP BY jl.jobListing_id;");

        $this->db->bind(":employerId", $employerId);
        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function getListJobApplicationsByJobListingId($jobListing_id)
    {
        $this->db->query("SELECT ja.jobApplication_id, ja.apply_date, j.jobApplicant_id, j.name, j.educationlevel_id,
                        a.application_status_name, jl.position_name, jl.published_time, jl.application_deadline, 
                        e.company_name, e.employer_id, l.location_name, i.industry_name, jl.jobListing_id, jt.jobType
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
}