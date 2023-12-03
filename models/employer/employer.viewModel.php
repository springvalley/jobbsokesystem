<?php
class EmployerViewModel extends EmployerModel
{

    private $employer_id;
    private $company_name;
    private $email;
    private $phoneNumber;
    private $location_name;
    private $industry_name;
    private $profileImage;
    private $orgNumber;
    private $summary;
    private $allData;

    public function __construct($employer_id)
    {
        parent::__construct();
        $this->employer_id = $employer_id;
        $jobApplicantData = $this->getEmployerProfile($employer_id);
        // $totalJobListing = $this->totalCountJobListingByEmployerId($employer_id);
        $this->company_name = $jobApplicantData->company_name;
        $this->email = $jobApplicantData->email;
        $this->phoneNumber = $jobApplicantData->phone_number;
        $this->location_name = $jobApplicantData->location_name;
        $this->industry_name = $jobApplicantData->industry_name;
        $this->profileImage = $jobApplicantData->profile_picture;
        $this->orgNumber = $jobApplicantData->orgNumber;
        $this->summary = $jobApplicantData->summary;
        $this->allData = $jobApplicantData;
    }


    public function getAll()
    {
        return $this->allData;
    }

    public function getEmployer_id()
    {
        return $this->employer_id;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhonenumber()
    {
        return $this->phoneNumber;
    }
    public function getLocationName()
    {
        return $this->location_name;
    }
    public function getIndustryName()
    {
        return $this->industry_name;
    }
    public function getOrganizationNumber()
    {
        return $this->orgNumber;
    }
    public function getSummary()
    {
        return $this->summary;
    }

    public function getProfileImage()
    {
        return $this->profileImage;
    }


    public function getTotalNumberOfJobListingsByEmployerId($employerId)
    {
        $totalNumberOfJobListings = $this->totalNumberOfJobListingsGroupByEmployerId($employerId);
        foreach ($totalNumberOfJobListings as $jobListing) {
            return $jobListing->totalJobListings;
        }
    }

    public function getTotalNumberOfJobApplicationsByEmployerId($employerId)
    {
        $totalNumberOfJobApplications = $this->totalNumberOfJobApplications($employerId);
        foreach ($totalNumberOfJobApplications as $jobApplication) {
            return $jobApplication->totalJobApplications;
        }
    }

    public function getTotalNumberOfJobApplicants($employerId)
    {
        $totalNumberOfJobApplicants = $this->totalNumberOfJobApplicants($employerId);
        foreach ($totalNumberOfJobApplicants as $jobApplicant) {
            return $jobApplicant->totalApplicants;
        }
    }

    public function displayOverviewOfJobApplications($employerId)
    {
        $overviewJobApplications = $this->getOverviewOfJobApplicationsGroupByJobListing($employerId);
        return $overviewJobApplications;
    }

    public function displayOverviewOfCandidates($employerId)
    {
        $overviewCandidates = $this->getOverviewOfCandidatesGroupByJobListing($employerId);
        return $overviewCandidates;
    }
}