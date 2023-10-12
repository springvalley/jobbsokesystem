<?php
class JobApplicantViewModel extends JobApplicantModel
{

    private $jobApplicant_id;
    private $name;
    private $email;
    private $phoneNumber;
    private $location_name;
    private $summary;
    private $profilePicture;
    private $skills = array();
    private $educationData = array();
    private $allData;

    public function __construct($jobApplicant_id)
    {
        parent::__construct();
        $this->jobApplicant_id = $jobApplicant_id;
        $jobApplicantData = $this->getJobApplicantProfile($jobApplicant_id);
        $this->allData = $jobApplicantData;
        $this->jobApplicant_id = $jobApplicant_id;
        $this->name = $jobApplicantData->name;
        $this->email = $jobApplicantData->email;
        $this->phoneNumber = $jobApplicantData->phone_number;
        $this->location_name = $jobApplicantData->location_name;
        $this->summary = $jobApplicantData->summary;
        $this->profilePicture = $jobApplicantData->location_name;
        $this->educationData =  $this->getEducationData($jobApplicant_id);
        $this->skills = $this->getSkillData($jobApplicant_id);
    }


    public function getAll()
    {
        return $this->allData;
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
}
