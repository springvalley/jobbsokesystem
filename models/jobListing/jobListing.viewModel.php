<?php
class JobListingViewModel extends JobListingModel
{

    private $jobListing_id;
    private $job_title;
    private $description;
    private $published_time;
    private $company_name;
    private $email;
    private $location;
    private $jobType;
    private $industry;

    public function __construct($joblisting_id)
    {
        parent::__construct();
        $this->jobListing_id = $joblisting_id;
        $jobListingData = $this->getJobListing($joblisting_id);
        $this->job_title = $jobListingData->job_title;
        $this->description = $jobListingData->description;
        $this->published_time = $jobListingData->published_time;
        $this->company_name = $jobListingData->company_name;
        $this->email = $jobListingData->email;
        $this->location = $jobListingData->location_name;
        $this->jobType = $jobListingData->jobType;
        $this->industry = $jobListingData->industry_name;
    }

    public function getListingID()
    {
        return $this->jobListing_id;
    }


    public function getIndustry()
    {
        return $this->industry;
    }
    public function getJobTitle()
    {
        return $this->job_title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getTime()
    {
        return $this->published_time;
    }
    public function getCompanyName()
    {
        return $this->company_name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getLocation()
    {
        return $this->location;
    }

    public function getJobType()
    {
        return $this->jobType;
    }
}
