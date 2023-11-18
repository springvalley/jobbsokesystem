
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
     * This function is used to update the data about an employer in the database.
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
        summary=:summary
        WHERE employer_id = :employer_id;
        ");

        //Bind the variables to the data array
        $this->db->bind(":name", $data["userName"]);
        $this->db->bind(":email", $data["userEmail"]);
        $this->db->bind(":phone_number", $data["userPhone"]);
        $this->db->bind(":location_id", $data["userLocation"]);
        $this->db->bind(":summary", $data["userSummary"]);
        $this->db->bind(":employer_id", $data["employer_id"]);

        //Execute the statement
        return ($this->db->execute());
    }
    /**
     * This function is used to retrieve the profile of an employer in the database.
     * @param int $jobapplicantID The ID of an employer in the database
     * @return: The employer requesteed if it was found in the database as an object, false otherwise. 
     */
    protected function getEmployerProfile($employerID)
    {
        $this->db->query("SELECT e.employer_id, e.company_name, e.orgNumber, e.email, e.phone_number, e.summary, l.location_name, i.industry_name FROM employer as e INNER JOIN location as l on e.location_id = l.location_id INNER JOIN industry as i on e.industry_id = i.industry_id WHERE e.employer_id = :employer_id");
        $this->db->bind(":employer_id", $employerID);
        $row = $this->db->fetchSingleRow();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
