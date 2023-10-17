<?php
require_once "/xampp/htdocs/jobbsokesystem/classes/dbhImproved.php";
class JobApplicantModel
{

    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler_Improved;
    }

    public function updateJobApplicantProfile($data){
        $this->db->query("UPDATE jobapplicant SET 
        name=:name,
        email=:email, 
        phone_number=:phone_number,
        location_id=:location_id,
        summary=:summary,
        educationlevel_id=:educationlevel_id
        WHERE jobapplicant_id = :jobapplicant_id;
        ");
        $this->db->bind(":name", $data["userName"]);
        $this->db->bind(":email", $data["userEmail"]);
        $this->db->bind(":phone_number", $data["userPhone"]);
        $this->db->bind(":location_id", $data["userLocation"]);
        $this->db->bind(":summary", $data["userSummary"]);
        $this->db->bind(":educationlevel_id", $data["userEducationLevel"]);
        $this->db->bind(":jobapplicant_id", $data["jobApplicant_id"]);
        
        $this->db->execute();

        ///TODO: Update skills
        $this->updateJobApplicantSkill($data["jobApplicant_id"], $data["userSkills"]);

        return true;
    }

    private function updateJobApplicantSkill($jobApplicantID, $skills){
        //First we remove all the skills the applicant already has registered because this makes it easier
        $this->db->query("DELETE FROM applicantskill WHERE jobApplicant_id = :jobApplicant_id");
        $this->db->bind(":jobApplicant_id", (int)$jobApplicantID);

        //Troubleshooting variables
        $finalCount = count($skills);
        $currentCount = 0;

        if($this->db->execute()){
            foreach($skills as $skill => $value){
                $this->db->query("INSERT INTO applicantskill(jobApplicant_id, skill_id) VALUES (:jobApplicant_id, :skill_id)");
                $this->db->bind(":jobApplicant_id", (int)$jobApplicantID);
                $this->db->bind(":skill_id", (int)$value);
                if($this->db->execute()){
                    $currentCount++;
                }
            }
        }

        //We check if we updated the skills the right amount of time. 
        if($finalCount == $currentCount){
            return true;
        }else{
            return false;
        }
    }

    protected function getJobApplicantProfile($jobApplicantID)
    {
        $this->db->query("SELECT ja.jobApplicant_id, ja.name, ja.email, ja.phone_number, ja.summary, l.location_name FROM jobapplicant as ja INNER JOIN location as l on ja.location_id = l.location_id WHERE ja.jobApplicant_id = :jobapplicant_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $row = $this->db->fetchSingleRow();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    protected function getNumberOfJobApplicantsInDB(){
        $this->db->query("SELECT COUNT(*) as headcount FROM jobapplicant");
        $row = $this->db->fetchSingleRow();
        if($this->db->rowCount() > 0){
            return $row->headcount;
        }else{
            return false;
        }
    }

    protected function getTopJobApplicantInDB(){
        $this->db->query("SELECT * FROM jobapplicant LIMIT 1");
        $row = $this->db->fetchSingleRow();

        if($this->db->rowCount() > 0){
            return $row->jobApplicant_id;
        }else{
            return false;
        }
    }

    protected function getEducationData($jobApplicantID){
        $this->db->query("SELECT educationlevel_name from educationlevel as el INNER JOIN jobapplicant as ja ON el.educationlevel_id = ja.educationlevel_id WHERE ja.jobapplicant_id = :jobapplicant_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $row = $this->db->fetchSingleRow();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return array();
        }
    }

    protected function getSkillData($jobApplicantID){
        $this->db->query("SELECT s.skill_name FROM skill as s INNER JOIN applicantskill as appskill ON appskill.skill_id = s.skill_id INNER JOIN jobapplicant as ja on ja.jobapplicant_id = appskill.jobapplicant_id WHERE ja.jobapplicant_id = :jobapplicant_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $row = $this->db->fetchMultiRow();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return array();
        }
    }
}
