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

    public function fetchJobDescritopn($jobListingId)
    {
        $joblisting = $this->getJobAdsByEmployer($jobListingId);
        echo  $joblisting[0]["employer_id"];
    }

    public function fetchPositionName($jobListingId)
    {
        $joblisting = $this->getJobAdsByEmployer($jobListingId);
        echo  $joblisting[0]["posistion_name"];
    }

    public function fetchLocation($locationId)
    {
        $joblisting = $this->getLocation($locationId);
        echo  $joblisting[0]["location_name"];
    }

    public function fetchJobType($jobTypeId)
    {
        $joblisting = $this->getJobType($jobTypeId);
        echo  $joblisting[0]["jobtype"];
    }

    public function fetchIndustry($industryId)
    {
        $joblisting = $this->getIndustry($industryId);
        echo  $joblisting[0]["industry_name"];
    }
}
