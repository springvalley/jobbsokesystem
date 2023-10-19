<?php
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";

class JobListingController {
    private $jobListingModel;

    public function __construct()
    {
        $this->jobListingModel = new JobListingModel;
    }

    public function is_employer_loggedIn($employerId) {
        if(empty($employerId)) {
            return true;
        } else {
            return false;
        }        
    }

    public function is_empty_input_form($jobTitle, $positionName, $jobDescription) {
        if (empty($jobTitle) || empty($positionName) || empty($jobDescription)) {
            return true;
        } else {
            return false;
        }
    }

    // public function is_empty_jobTitle($jobTitle) {
    //     if (empty($jobTitle)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    
    // public function is_empty_positionName($positionName) {
    //     if (empty($positionName)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    
    public function is_empty_select_location($location) {
        if ($location === "Velg sted") {
        // if ($data["location"] === "Velg sted") {
            return true;
        } else {
            return false;
        }
    }
    
    public function is_empty_select_industry($industry) {
        if ($industry === "Velg bransje") {
        // if ($data["industry"] === "Velg bransje") {
            return true;
        } else {
            return false;
        }
    }

    public function is_empty_select_jobType($jobType) {
        if ($jobType === "Velg ansettelseform") {
        // if ($data["jobType"] === "Velg ansettelseform") {
            return true;
        } else {
            return false;
        }
    }

    public function is_empty_applicationDeadline($applicationDeadline) {
        if (empty($applicationDeadline)) {
            return true;
        } else {
            return false;
        }
    }

    public function is_invalid_applicationDeadline($applicationDeadline) {
        $today = date("d-m-Y");
        if(strtotime($applicationDeadline) < strtotime($today)) {
            return true;
        } else {
            return false;
        }
    }

    // public function is_empty_jobDescription($jobDescription) {
    //     if (empty($jobDescription)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function createNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName) {
        $this->jobListingModel->insertNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName);
    }
}