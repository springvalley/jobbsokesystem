<?php
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
class JobApplicantEditModel extends JobApplicantModel
{
    private $helper;
    private $jobApplicant_id;
    private $name;
    private $email;
    private $phoneNumber;
    private $location_name;
    private $summary;
    private $profilePicture;
    private $skills = array();
    private $educationData;
    private $possibleEducations = array();
    private $locations = array();
    private $possibleSkills = array();
    private $allData;

    public function __construct($jobApplicant_id)
    {
        parent::__construct();
        $this->helper = new Helper();
        $this->jobApplicant_id = $jobApplicant_id;
        $jobApplicantData = $this->getJobApplicantProfile($jobApplicant_id);
        $this->allData = $jobApplicantData;
        $this->name = $jobApplicantData->name;
        $this->email = $jobApplicantData->email;
        $this->phoneNumber = $jobApplicantData->phone_number;
        $this->location_name = $jobApplicantData->location_name;
        $this->summary = $jobApplicantData->summary;
        $this->profilePicture = $jobApplicantData->location_name;
        $this->educationData =  $this->getEducationData($jobApplicant_id);
        $this->skills = $this->getSkillData($jobApplicant_id);
        $this->locations = $this->helper->getAllLocations();
        $this->possibleSkills = $this->helper->getAllSkills();
        $this->possibleEducations = $this->helper->getAllEducations();
    }

    public function getPossibleEducations(){
        return $this->possibleEducations;
    }

    public function getPossibleSkills(){
        return $this->possibleSkills;
    }
    public function getLocations(){
        return $this->locations;
    }

    public function getSkillNames(){
        $newArray = array();
        foreach($this->skills as $skill){
            array_push($newArray, $skill->skill_name);
        }
        return $newArray;
    }


    public function getAll()
    {
        return $this->allData;
    }

    public function getApplicantID(){
        return $this->jobApplicant_id;
    }

    public function getEducation()
    {
        return $this->educationData;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getLocation_name()
    {
        return $this->location_name;
    }
    public function getSummary()
    {
        return $this->summary;
    }
    public function getProfilePicture()
    {
        return $this->profilePicture;
    }

    public function getSkills()
    {
        return $this->skills;
    }

    public function addSkill($id){
        array_push($this->skills, $id);
        var_dump($this->skills);
        exit();
    }
    public function removeSKill($id){
        //foreach
    }
}
