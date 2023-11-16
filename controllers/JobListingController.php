<?php
require_once "/xampp/htdocs/jobbsokesystem/components/header.php";
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";

/**
 * JobListingController is a class responsible for controlling and managing all operations that related to job advertisements, 
 * including validating inputs and interacting with 'JobListingModel' for creating/updating/deleting the job advertisements.
 * @since 0.5.0
 * @see JobListingModel which is the class that JobListingController associates with. 
 */

class JobListingController
{

    /**
     * This function is used to create a new job advertisement.
     * 
     */
    public function createNewJobAd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get input data from the form  
            $data = [
                "employerId" => htmlspecialchars(($_SESSION["id"])),
                "jobTitle" => htmlspecialchars($_POST["jobTitle"], ENT_QUOTES, "UTF-8"),
                "location" => htmlspecialchars($_POST["location"], ENT_QUOTES, "UTF-8"),
                "industry" => htmlspecialchars($_POST["industry"], ENT_QUOTES, "UTF-8"),
                "positionName" => htmlspecialchars($_POST["positionName"], ENT_QUOTES, "UTF-8"),
                "jobType" => htmlspecialchars($_POST["jobType"], ENT_QUOTES, "UTF-8"),
                "applicationDeadline" => htmlspecialchars($_POST["applicationDeadline"], ENT_QUOTES, "UTF-8"),
                "jobDescription" => htmlspecialchars($_POST["jobDescription"], ENT_QUOTES, "UTF-8")
            ];
            $_SESSION["dataInputForPostNewJob"] = $data;

            //Call 'validateJobAdInputForm' function
            $this->validateJobAdInputForm($data, "../postnewjob.php");
            $jobListingModel = new JobListingModel();
            if ($jobListingModel->insertNewJobAd($data)) {
                ErrorHandler::setSuccess("Din jobbannonse har publisert!");
                header("Location: ../companyjobads.php");
                unset($_SESSION["dataInputForPostNewJob"]);
                exit();
            } else {
                ErrorHandler::setError(ErrorHandler::$unknownError);
                header("Location: ../postnewjob.php");
                exit();
            }
        }
    }

    /**
     * This function is used to update a job ad.
     * 
     */
    public function editJobAd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get input data from the form  
            $data = [
                "jobListing_id" => htmlspecialchars(($_POST["jobListing_id"])),
                "employerId" => htmlspecialchars(($_SESSION["id"])),
                "jobTitle" => htmlspecialchars($_POST["jobTitle"], ENT_QUOTES, "UTF-8"),
                "location" => htmlspecialchars($_POST["location"], ENT_QUOTES, "UTF-8"),
                "industry" => htmlspecialchars($_POST["industry"], ENT_QUOTES, "UTF-8"),
                "positionName" => htmlspecialchars($_POST["positionName"], ENT_QUOTES, "UTF-8"),
                "jobType" => htmlspecialchars($_POST["jobType"], ENT_QUOTES, "UTF-8"),
                "applicationDeadline" => htmlspecialchars($_POST["applicationDeadline"], ENT_QUOTES, "UTF-8"),
                "jobDescription" => htmlspecialchars($_POST["jobDescription"], ENT_QUOTES, "UTF-8")
            ];

            $this->validateJobAdInputForm($data, "../editJobAd.php?jobListing_id=" . (int)$data["jobListing_id"]);
            $jobListingModel = new JobListingModel();
            if ($jobListingModel->updateJobAd($data)) {
                ErrorHandler::setSuccess("Din jobbannonse har blitt oppdatert!");
                header("Location: ../jobadvertisementdetail.php?jobListing_id=" . (int)$data["jobListing_id"]);

                exit();
            } else {
                ErrorHandler::setError(ErrorHandler::$unknownError);
                header("Location: ../editJobAd.php?jobListing_id=" . (int)$data["jobListing_id"]);
                exit();
            }
        }
    }

    public function deleteJobAd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jobListing_id"])) {
            $jobListingId = htmlspecialchars($_POST["jobListing_id"]);

            // Perform any necessary validation here
            // For example, check if the user has the permission to delete the job ad

            $jobListingModel = new JobListingModel();
            if ($jobListingModel->deleteJobAd($jobListingId)) {
                ErrorHandler::setSuccess("Din jobbannonse har blitt slettet!");
                header("Location: ../companyjobads.php");
                exit();
            } else {
                ErrorHandler::setError(ErrorHandler::$unknownError);
                header("Location: ../companyjobads.php");
                exit();
            }
        }
    }

    /**
     * This private function is used to validate data input to the form for both "createNewJobAd" and "editJobAd".
     * @param $data The data input to the form.
     * @param $redirection The redirectURL.
     */
    private function validateJobAdInputForm($data, $redirection)
    {
        if (Validator::isEmployerLoggedIn($data["employerId"])) {
            ErrorHandler::setError(ErrorHandler::$employerIsNotLoggedIn);
            header("Location: $redirection");
            exit();
        }

        if (Validator::areInputsEmpty($data["jobTitle"], $data["positionName"], $data["jobDescription"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputError);
            header("Location: $redirection");
            exit();
        }

        if (!Validator::isLocationValid($data["location"])) {
            ErrorHandler::setError(ErrorHandler::$invalidLocationError);
            header("Location: $redirection");
            exit();
        }

        if (!Validator::isIndustryValid($data["industry"])) {
            ErrorHandler::setError(ErrorHandler::$invalidIndustryError);
            header("Location: $redirection");
            exit();
        }

        if (!Validator::isJobTypeValid($data["jobType"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputJobTypeError);
            header("Location: $redirection");
            exit();
        }

        if (Validator::isEmptyInputApplicationDeadline($data["applicationDeadline"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputApplicationDeadlineError);
            header("Location: $redirection");
            exit();
        }
        if (Validator::isOldApplicationDeadlineDate($data["applicationDeadline"])) {
            ErrorHandler::setError(ErrorHandler::$isOldApplicationDeadlineDateError);
            header("Location: $redirection");
            exit();
        }
    }
}


$init = new JobListingController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["type"]) {
        case "createANewJobAd":
            $init->createNewJobAd();
            break;
        case "editJobAd":
            $init->editJobAd();
            break;
        case "deleteJobAd":
            $init->deleteJobAd();
            break;
    }
}