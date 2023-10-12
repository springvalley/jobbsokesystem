<?php
require_once "classes\dbhImproved.php";
class JobApplicantModel
{

    private $db;

    public function __construct()
    {
        $this->db = new DB_Handler_Improved;
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
        $this->db->query("SELECT edu.education_name, l.location_name FROM education as edu INNER JOIN location AS l ON edu.location_id = l.location_id INNER JOIN applicanteducation as ae on edu.education_id = ae.education_id INNER JOIN jobapplicant ON ae.jobapplicant_id = jobapplicant.jobapplicant_id WHERE jobapplicant.jobapplicant_id = :jobapplicant_id");
        $this->db->bind(":jobapplicant_id", $jobApplicantID);
        $row = $this->db->fetchMultiRow();

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
