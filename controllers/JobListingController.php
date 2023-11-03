<?php
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
// require_once "../models/jobListing/JobListingModel.php";
/**
 * JobListingController is a class responsible for controlling and managing all operations that related to job advertisements, 
 * including validating inputs and interacting with 'JobListingModel' for creating/updating/deleting the job advertisements.
 * @since 0.5.0
 * @see JobListingModel which is the class that JobListingController associates with. 
 */

class JobListingController {

    private $jobListingModel;

    //Constructor
    public function __construct()
    {
        $this->jobListingModel = new JobListingModel;
    }

    /**
     * This function is used to check if employer users have been login into system. 
     * @param int $employerId The id of employer user.      
     * @return boolean True if employer user has not login into the system, otherwise false.
     */
    public function is_employer_loggedIn($employerId) {
        if(empty($employerId)) {
            return true;
        } else {
            return false;
        }        
    }

   /**
     * This function is used to check if any of the input fields 'Job title', 'Position', 'Job description' are empty. 
     * @param string $jobTitle The job title input.  
     * @param string $positionName The job position name input.
     * @param string $jobDescription The description input for job advertisement.
     * @return boolean true if any of input fields are empty, otherwise false.
     */
    public function is_empty_input_form($jobTitle, $positionName, $jobDescription) {
        if (empty($jobTitle) || empty($positionName) || empty($jobDescription)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * This function is used to check if the location is empty or set to the default "Velg sted".
     * @param string $location The selected location.  
     * @return boolean true if location is empty or set to "Velg sted", otherwise false.
     */
    public function is_empty_select_location($location) {
        if (empty($location) || $location === "Velg sted") {       
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * This function is used to check if the industry is empty or set to the default "Velg bransje".
     * @param string $industry The selected industry.  
     * @return boolean true if industry is empty or set to "Velg bransje", otherwise false.
     */
    public function is_empty_select_industry($industry) {
        if (empty($industry) ||$industry === "Velg bransje") {      
            return true;
        } else {
            return false;
        }
    }

     /**
     * This function is used to check if the job type is empty or set to the default "Velg ansettelsesform".
     * @param string $industry The selected jobtype.  
     * @return boolean true if job type is empty or set to "Velg ansettelsesform", otherwise false.
     */
    public function is_empty_select_jobType($jobType) {
        if (empty($jobType) ||$jobType === "Velg ansettelesform") {       
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to check if application deadline is empty.
     * @param string $applicationDeadline The application deadline to be checked.  
     * @return boolean true if application deadline is empty, otherwise false.
     */
    public function is_empty_applicationDeadline($applicationDeadline) {
        if (empty($applicationDeadline)) {
            return true;
        } else {
            return false;
        }
    }   
    
    /**
     * This function is used to check if the provided application deadline is earlier than the current date.
     * @param string $applicationDeadline The application deadline to be checked.
     * @return boolean true if application deadline is earlier than the current date, otherwise false.
     */
    public function is_invalid_applicationDeadline($applicationDeadline) {
        $today = date("d-m-Y");
        if(strtotime($applicationDeadline) < strtotime($today)) {
            return true;
        } else {
            return false;
        }
    }

     /**
     * This function is used to create a new job advertisement.
     * @param int $employerId The ID of employer who creates the job advertisement.
     * @param string $jobTitle The title of job advertisement.
     * @param string $jobDescription The description for the job advertisement.
     * @param int $jobType The ID of job type.
     * @param int $location The ID of location.
     * @param int $industry The ID of industry.
     * @param string $applicationDeadline The application deadline date.
     * @param string $positionName The job position name.
     * @see JobListingModel The class associates with JobListingController. 
     * @return void 
     */
    public function createNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName) : void
    {
        $this->jobListingModel->insertNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName);
    }
}