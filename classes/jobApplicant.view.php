<?php
class JobApplicantViewModel extends JobApplicantRepo
{

    private $jobApplicant_id;
    private $name;
    private $email;
    private $phoneNumber;
    private $location_id;
    private $summary;
    private $profilePicture;

    public function __construct($jobApplicant_id)
    {
        $jobApplicantData = $this->getJobApplicantProfile($jobApplicant_id);

        $this->jobApplicant_id = $jobApplicant_id;
        $this->name = $jobApplicantData[0]["name"];
        $this->email = $jobApplicantData[0]["email"];
        $this->phoneNumber = $jobApplicantData[0]["phone_number"];
        $this->location_id = $jobApplicantData[0]["location_id"];
        $this->summary = $jobApplicantData[0]["summary"];
        $this->profilePicture = $jobApplicantData[0]["profile_picture"];
    }

    public function getJobApplicantViewModelData(){
        $jobApplicantData = $this->getJobApplicantProfile($this->jobApplicant_id);   
    }

    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function getLocation_id(){
        return $this->location_id;
    }
    public function getSummary(){
        return $this->summary;
    }
    public function getProfilePicture(){
        return $this->profilePicture;
    }
}