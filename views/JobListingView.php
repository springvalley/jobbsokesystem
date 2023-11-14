<?php

/**
 * JobListingView is a class responsible for managing all operations that related to job advertisements, 
 * including showing errors message to the user and interacting with the 'Helper' class for retrieving data from database.
 * @since 0.5.0
 * @see Helper classe that is used by JobListingView. 
 */

require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";

class JobListingView
{

    private $helper;
    private $jobListingModel;
    // private $jobListingId;
    // private $companyName;
    // private $industry;
    // private $jobTitle;
    // private $positionName;
    // private $jobType;
    // private $location;
    // private $publishDate;
    // private $applicationDeadline;



    //Constructor
    public function __construct()
    {
        $this->helper = new Helper();
        $this->jobListingModel = new JobListingModel();
        // $jobAdDetail = $this->jobListingModel->getJobAdByJobListingId($jobListingId);
        // $this->companyName = $jobAdDetail->company_name;
        // $this->industry = $jobAdDetail->industry_name;
        // $this->jobTitle = $jobAdDetail->job_title;
        // $this->positionName = $jobAdDetail->position_name;
        // $this->jobType = $jobAdDetail->jobType;
        // $this->location = $jobAdDetail->location_name;
        // $this->publishDate = $jobAdDetail->published_time;
        // $this->applicationDeadline = $jobAdDetail->application_deadline;
    }

    /**
     * This function is used to get all job advertisements.     
     * @return array A list of job advertisements.
     */
    public function fetchAllJobAds()
    {
        $jobAds = $this->helper->getAllJobListings();
        return $jobAds;
    }

    public function fetchJobAdByJobListingId($jobListing_id)
    {
        $jobAdDetail = $this->jobListingModel->getJobAdByJobListingId($jobListing_id);
        return $jobAdDetail;
    }

    public function fetchAllJobAdsByEmployerId($employerId)
    {
        $jobAdsByEmployer = $this->jobListingModel->getAllJobListingsByEmployer($employerId);
        // return $jobAdsByEmployer;
        if (empty($jobAdsByEmployer)) {
            return null; //Need to fix this one!!!!!
        } else {
            return $jobAdsByEmployer;
        }
        // var_dump($jobAdsByEmployer); // Debugging output
    }

    /**
     * This function is used to get all locations.     
     * @return array A list of locations.
     */
    public function fetchAllLocations()
    {
        $locations = $this->helper->getAllLocations();
        return $locations;
    }

    /**
     * This function is used to get all job types.     
     * @return array A list of job types.
     */
    public function fetchAllJobTypes()
    {
        $jobtypes = $this->helper->getAllJobTypes();
        return $jobtypes;
    }

    /**
     * This function is used to get all industries.     
     * @return array A list of industries.
     */
    public function fetchAllIndustries()
    {
        $industries = $this->helper->getAllIndustries();
        return $industries;
    }
}
