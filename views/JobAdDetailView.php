<?php
require_once "/xampp/htdocs/jobbsokesystem/models/helpers.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";

class JobAdDetailView extends JobListingModel
{

    // private $helper;
    // private $jobListingModel;
    private $jobListing_id;
    private $companyName;
    private $industry;
    private $jobTitle;
    private $positionName;
    private $jobType;
    private $location;
    private $locations;
    private $industries;
    private $jobTypes;
    // private $publishDate;
    private $applicationDeadline;
    private $jobDescription;

    public function __construct($jobListing_id)
    {
        parent::__construct();
        // $this->helper = new Helper();
        // $jobListingModel = new JobListingModel();
        $this->jobListing_id = $jobListing_id;

        $jobAdInfo = $this->getJobAdByJobListingId($jobListing_id);
        $this->companyName = $jobAdInfo->company_name;
        $this->jobTitle = $jobAdInfo->job_title;
        $this->positionName = $jobAdInfo->position_name;
        $this->location = $jobAdInfo->location_name;
        $this->industry = $jobAdInfo->industry_name;
        $this->jobType = $jobAdInfo->jobType;
        $this->applicationDeadline = $jobAdInfo->application_deadline;
        $this->jobDescription = $jobAdInfo->description;
        // $this->locations = $this->helper->getAllLocations();
        // $this->industries = $this->helper->getAllIndustries();
        // $this->jobTypes = $this->helper->getAllJobTypes();
    }

    public function getJobAdId()
    {
        return $this->jobListing_id;
    }

    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    public function getPositionName()
    {
        return $this->positionName;
    }

    public function getLocationOfJobAd()
    {
        return $this->location;
    }

    public function getIndustry()
    {
        return $this->industry;
    }

    public function getJobTypeOfJobAd()
    {
        return $this->jobType;
    }

    public function getApplicationDeadlineDateOfJobAd()
    {
        return $this->applicationDeadline;
    }

    public function getjobDescription()
    {
        return $this->jobDescription;
    }

    // public function getLocations()
    // {
    //     return $this->locations;
    // }

    // public function getIndustries()
    // {
    //     return $this->industries;
    // }

    // public function getJobTypes()
    // {
    //     return $this->jobTypes;
    // }
}