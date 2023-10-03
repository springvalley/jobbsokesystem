<?php

class JoblistingController extends Joblisting
{
    private $employerId;
    private $jobTypeId;
    private $locationId;
    private $industryId;
    private $jobTitle;
    private $jobDescription;
    private $positionName;
    private $isActive;

    //Create a constructor
    //Inside the contructor we want to grab the data we get from the user and assign it to the properties
    public function __construct($employerId, $jobTypeId, $locationId, $industryId, $jobTitle, $jobDescription, $positionName, $isActive)
    {
        $this->employerId = $employerId;
        $this->jobTypeId = $jobTypeId;
        $this->locationId = $locationId;
        $this->industryId = $industryId;
        $this->jobTitle = $jobTitle;
        $this->jobDescription = $jobDescription;
        $this->positionName = $positionName;
        $this->isActive = $isActive;
    }


    public function updateJobAds($jobListingId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName)
    {
        //Error handlers
        if ($this->emptyInputCheck($jobListingId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName) == true) {
            header("location: ../postnewjob.php?error=emptyinput");
            exit();
        }

        //Update jobads
        $this->setNewJobAds($this->$jobListingId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName);
    }

    public function createNewJobAds($employerId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName)
    {
        if ($this->emptyInputCheck($employerId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $publishTime, $isActive, $industryId, $positionName) == true) {
            header("location: ../postnewjob.php?error=emptyinput");
            exit();
        }
        $this->setJobAds($this->employerId, $jobTitle, $jobDescription, $this->jobTypeId, $this->locationId, $publishTime, $isActive, $this->industryId, $positionName);
    }

    private function emptyInputCheck()
    {
        $result = false;
        if (
            empty($this->jobTitle) || empty($this->jobDescription) || empty($this->jobTypeId) || empty($this->isActive) ||
            empty($this->locationId) ||  empty($this->industryId) || empty($this->positionName)
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
