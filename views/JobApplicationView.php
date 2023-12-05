<?php

class JobApplicationView
{
    private $jobApplicationModel;

    public function __construct()
    {
        $this->jobApplicationModel = new JobApplicationModel();
    }

    public function fetchJobApplicationDetails($jobApplication_id)
    {
        $jobApplicationDetail = $this->jobApplicationModel->getJobApplicationDetails($jobApplication_id);
        return $jobApplicationDetail;
    }

    public function fetchAllJobApplicationsForJobSeeker($jobApplicantId)
    {
        $jobApplications = $this->jobApplicationModel->getAllJobApplicationsByJobApplicant($jobApplicantId);
        if (empty($jobApplications)) {
            return null;
        } else {
            return $jobApplications;
        }
    }

    public function fetchListJobApplicationsForEmployer($jobListing_id)
    {
        $listJobApplications = $this->jobApplicationModel->getListJobApplicationsByJobListingId($jobListing_id);
        if (empty($listJobApplications)) {
            return null;
        } else {
            return $listJobApplications;
        }
    }

    public function processJobApplicationAction($jobApplicationId, $newApplicationStatusId)
    {
        $jobApplicationStatus = $this->jobApplicationModel->updateApplicationStatus($jobApplicationId, $newApplicationStatusId);
        return $jobApplicationStatus;
    }

    
     /**
     * This function is used to get all job advertisements.     
     * @return array A list of job advertisements.
     */

     public function fetchEmployerID($jobListing_id){
        return $this->jobApplicationModel->getEmployerIDForListing($jobListing_id);
     }
}