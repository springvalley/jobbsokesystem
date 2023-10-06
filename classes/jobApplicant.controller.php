<?php

class JobApplicantController extends JobApplicantRepo
{
    private $jobApplicant_id;
    private $name;
    private $email;
    private $phoneNumber;
    private $location_id;
    private $summary;
    private $profilePicture;

    //Create a constructor
    //Inside the contructor we want to grab the data we get from the user and assign it to the properties
    public function __construct($jobApplicant_id, $name, $email, $phoneNumber, $location_id, $summary, $profilePicture)
    {
        $this->jobApplicant_id = $jobApplicant_id;
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->location_id = $location_id;
        $this->summary = $summary;
        $this->profilePicture = $profilePicture;
    }

    public function getJobApplicantView(){
        $jobApplicantData = $this->getJobApplicantProfile($this->jobApplicant_id);
        
    }
}
