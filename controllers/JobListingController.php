<?php
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
// require_once "../models/jobListing/JobListingModel.php";
/**
 * JobListingController is a class responsible for controlling and managing all operations that related to job advertisements, 
 * including validating inputs and interacting with 'JobListingModel' for creating/updating/deleting the job advertisements.
 * @since 0.5.0
 * @see JobListingModel which is the class that JobListingController associates with. 
 */

class JobListingController
{

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
    public function is_employer_loggedIn($employerId)
    {
        if (empty($employerId)) {
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
    //     public function createNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName): void
    //     {
    //         $this->jobListingModel->insertNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName);
    //     }
}