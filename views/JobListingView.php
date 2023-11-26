<?php

/**
 * JobListingView is a class responsible for managing all operations that related to job advertisements, 
 * including showing errors message to the user and interacting with the 'Helper' class for retrieving data from database.
 * @since 0.5.0
 * @see Helper classe that is used by JobListingView. 
 */

require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";

class JobListingView
{
    private $helper;
    private $jobListingModel;

    //Constructor
    public function __construct()
    {
        $this->helper = new Helper();
        $this->jobListingModel = new JobListingModel();
    }

    /**
     * This function is used to get all job advertisements.     
     * @return array A list of job advertisements.
     */
    public function fetchAllJobAds()
    {
        $jobAds = $this->helper->getJobListing();
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
        if (empty($jobAdsByEmployer)) {
            return null;
        } else {
            return $jobAdsByEmployer;
        }
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