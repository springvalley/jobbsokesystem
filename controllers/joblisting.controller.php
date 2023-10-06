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
    public function __construct(
        $employerId,
        $jobTypeId,
        $locationId,
        $industryId,
        $jobTitle,
        $jobDescription,
        $positionName,
        $isActive
    ) {
        $this->employerId = $employerId;
        $this->jobTypeId = $jobTypeId;
        $this->locationId = $locationId;
        $this->industryId = $industryId;
        $this->jobTitle = $jobTitle;
        $this->jobDescription = $jobDescription;
        $this->positionName = $positionName;
        $this->isActive = $isActive;
    }

    public function updateJobAds(
        $jobListingId,
        $jobTitle,
        $jobDescription,
        $jobTypeId,
        $locationId,
        $isActive,
        $industryId,
        $positionName
    ) {
        //Error handlers
        if ($this->emptyInputCheck(
            $jobListingId,
            $jobTitle,
            $jobDescription,
            $jobTypeId,
            $locationId,
            $isActive,
            $industryId,
            $positionName
        ) == true) {
            header("location: ../postnewjob.php?error=emptyinput");
            exit();
        }

        //Update jobads
        $this->setNewJobAds(
            $this->$jobListingId,
            $jobTitle,
            $jobDescription,
            $jobTypeId,
            $locationId,
            $isActive,
            $industryId,
            $positionName
        );
    }

    public function createNewJobAds(
        $employerId,
        $jobTitle,
        $jobDescription,
        $jobTypeId,
        $locationId,
        $isActive,
        $industryId,
        $positionName
    ) {
        if ($this->emptyInputCheck(
            $employerId,
            $jobTitle,
            $jobDescription,
            $jobTypeId,
            $locationId,
            $isActive,
            $industryId,
            $positionName
        ) == true) {
            header("location: ../postnewjob.php?error=emptyinput");
            exit();
        }
        $jobListingCreated =  $this->setJobAds(
            $employerId,
            $jobTitle,
            $jobDescription,
            $jobTypeId,
            $locationId,
            $isActive,
            $industryId,
            $positionName
        );
        if ($jobListingCreated) {
            header("location: ../postnewjob.php?success.php");
            exit();
        } else {
            // Handle failure (Need to be fixed)!!!!
            header("location: ../postnewjob.php?error=createfailed");
            exit();
        }
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