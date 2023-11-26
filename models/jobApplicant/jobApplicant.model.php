<?php

/**
 * JobApplicantModel is a class responsible for for managing job applicant data in the database. 
 * It provides methods to update job applicant profiles, retrieve job applicant data, and manage their skills.
 * @since 0.5.0
 * @see DB_Handler which is the database class used by JobApplicantModel.
 */


require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
class JobApplicantModel
{

    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler;
    }

    /**
     * This function is used to update the data about a job applicant in the database.
     * @param array $data An array of data about the user which we want to input into the database.
     * @return
     */

    public function updateJobApplicantProfile($data)
    {

        //Prepare the sql query
        $this->db->query("UPDATE jobapplicant SET 
        name=:name,
        email=:email, 
        phone_number=:phone_number,
        location_id=:location_id,
        summary=:summary,
        educationlevel_id=:educationlevel_id
        WHERE jobapplicant_id = :jobapplicant_id;
        ");

        //Bind the variables to the data array
        $this->db->bind(":name", $data["userName"]);
        $this->db->bind(":email", $data["userEmail"]);
        $this->db->bind(":phone_number", $data["userPhone"]);
        $this->db->bind(":location_id", $data["userLocation"]);
        $this->db->bind(":summary", $data["userSummary"]);
        $this->db->bind(":educationlevel_id", $data["userEducationLevel"]);
        $this->db->bind(":jobapplicant_id", $data["jobApplicant_id"]);

        //Execute the statement
        $this->db->execute();

        //Update the users skills via a seperate function
        $this->updateJobApplicantSkill($data["jobApplicant_id"], $data["userSkills"]);


        //TODO: return false if anything failed. 
        return true;
    }

    /**
     * This function is used to update the skills of a jobapplicant in the database.
     * @param int $jobApplicantID The ID of job applicant.
     * @param array $skills The skills array.
     * @return boolean True if the number of updated skills matches the expected number, otherwise false. 
     */
    private function updateJobApplicantSkill($jobApplicantID, $skills)
    {
        //First we remove all the skills the applicant already has registered because this makes it easier
        $this->db->query("DELETE FROM applicantskill WHERE jobApplicant_id = :jobApplicant_id");

        //Bind the variable to the jobapplicantid
        $this->db->bind(":jobApplicant_id", (int)$jobApplicantID);

        //Troubleshooting variables
        $finalCount = count($skills);
        $currentCount = 0;

        //If we successfully delete all the previous skills we then go on
        if ($this->db->execute()) {
            //For each skill in the array
            foreach ($skills as $skill => $value) {
                //Make a new sql query
                $this->db->query("INSERT INTO applicantskill(jobApplicant_id, skill_id) VALUES (:jobApplicant_id, :skill_id)");

                //Bind the variables
                $this->db->bind(":jobApplicant_id", (int)$jobApplicantID);
                $this->db->bind(":skill_id", (int)$value);

                //Execute the query, if the query executes successfully it will add to the currentCount. 
                if ($this->db->execute()) {
                    $currentCount++;
                }
            }
        }

        //We check if we updated the skills the right amount of time. 
        if ($finalCount == $currentCount) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to retrieve the profile of a jobapplicant in the database.
     * @param int $jobapplicantID The ID of a job applicant in the database
     * @return: The jobapplicant requesteed if it was found in the database as an object, false otherwise. 
     */
    protected function getJobApplicantProfile($jobApplicantID)
    {
        $this->db->query("SELECT ja.jobApplicant_id, ja.name, ja.email, ja.phone_number, ja.summary, l.location_name FROM jobapplicant as ja INNER JOIN location as l on ja.location_id = l.location_id WHERE ja.jobApplicant_id = :jobapplicant_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $row = $this->db->fetchSingleRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * This function is used to retrieve the total amount of jobapplicants in the database.
     * @return: The number of jobapplicants in the database as an int. 
     */
    protected function getNumberOfJobApplicantsInDB()
    {
        $this->db->query("SELECT COUNT(*) as headcount FROM jobapplicant");
        $row = $this->db->fetchSingleRow();
        if ($this->db->rowCount() > 0) {
            return $row->headcount;
        } else {
            return false;
        }
    }


    /**
     * This function is used to retrieve the top i.e first registered jobapplicant in the database.
     * @return: The ID of the first registered jobapplicant if found, false otherwise. 
     */
    protected function getTopJobApplicantInDB()
    {
        $this->db->query("SELECT * FROM jobapplicant LIMIT 1");
        $row = $this->db->fetchSingleRow();

        if ($this->db->rowCount() > 0) {
            return $row->jobApplicant_id;
        } else {
            return false;
        }
    }

    /**
     * This function is used to retrieve the education data of a specific job applicant.
     * @param int $jobApplicantID  The ID of a job applicant in the database.
     * @return: An object containing the education data of the specified job applicant, otherwise an empty array.
     */
    protected function getEducationData($jobApplicantID)
    {
        $this->db->query("SELECT educationlevel_name from educationlevel as el INNER JOIN jobapplicant as ja ON el.educationlevel_id = ja.educationlevel_id WHERE ja.jobapplicant_id = :jobapplicant_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $row = $this->db->fetchSingleRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return array();
        }
    }

    /**
     * This function is used to retrieve the skill data of a specific job applicant.
     * @param int $jobApplicantID  The ID of a job applicant in the database.
     * @return: An object containing the skill data of the specified job applicant, otherwise an empty array.
     */
    protected function getSkillData($jobApplicantID)
    {
        $this->db->query("SELECT s.skill_name FROM skill as s INNER JOIN applicantskill as appskill ON appskill.skill_id = s.skill_id INNER JOIN jobapplicant as ja on ja.jobapplicant_id = appskill.jobapplicant_id WHERE ja.jobapplicant_id = :jobapplicant_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $row = $this->db->fetchMultiRow();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return array();
        }
    }

    /**
     * This function is used to make a new jobapplication.
     * @param mixed $data the data for the jobapplication that is to  be made.
     * @return bool true if the application was made, false otherwise.
     */

    public function applyToJob($data)
    {
        $this->db->query("INSERT INTO jobapplication(jobApplicant_id, jobListing_id, current_or_lastJob, cover_letter, application_status_id) VALUES (:jobApplicant_id, :jobListing_id, :lastJob, :cover_letter, 1)");
        $this->db->bind(":jobApplicant_id", $data["jobApplicant_id"]);
        $this->db->bind(":jobListing_id", $data["jobListing_id"]);
        $this->db->bind(":lastJob", $data["lastJob"]);
        $this->db->bind(":cover_letter", $data["coverletter"]);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check if an applicant has already applied to a job.
     * @param int $jobApplicantID  The ID of a job applicant in the database.
     * @param int $jobListingID  The ID of a job listing in the database.
     * @return bool true if they have already applied, false otherwise 
     */

    public function applicantHasAppliedToJob($jobListingID, $jobApplicantID)
    {
        $this->db->query("SELECT * FROM jobapplication WHERE jobApplicant_id = :jobapplicant_id AND joblisting_id = :joblisting_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $this->db->bind(":joblisting_id", $jobListingID);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
