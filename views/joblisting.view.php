<?php
class JobListingView extends Joblisting
{
    public function fetchCompanyName($employerId)
    {
        $joblisting = $this->getJobAdsByEmployer($employerId);
        echo  $joblisting[0]["employer_id"];
    }

    public function fetchJobTitle($jobListingId)
    {
        $joblisting = $this->getJobAdsByEmployer($jobListingId);
        echo  $joblisting[0]["job_title"];
    }

    public function fetchJobDescription($jobListingId)
    {
        $joblisting = $this->getJobAdsByEmployer($jobListingId);
        echo  $joblisting[0]["employer_id"];
    }

    public function fetchPositionName($jobListingId)
    {
        $joblisting = $this->getJobAdsByEmployer($jobListingId);
        echo  $joblisting[0]["posistion_name"];
    }

    public function fetchAllLocation()
    {
        $joblisting = new JobListing(); // Create a new instance of JobListing
        $locations = $joblisting->getAllLocations();

        return $locations;
    }

    public function fetchAllJobType()
    {
        $joblisting = new Joblisting();
        $jobtypes = $this->getAllJobType();
        return $jobtypes;
    }

    public function fetchAllIndustry()
    {
        $joblisting = new Joblisting();
        $industries = $this->getAllIndustry();
        return $industries;
    }
}