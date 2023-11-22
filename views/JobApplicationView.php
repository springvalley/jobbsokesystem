<?php

class JobApplicationView
{
    private $jobApplicationModel;

    public function __construct()
    {
        $this->jobApplicationModel = new JobApplicationModel();
    }

    public function fetchJobApplication($jobApplication_id)
    {
        $jobApplicationDetail = $this->jobApplicationModel->getJobApplication($jobApplication_id);
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
}