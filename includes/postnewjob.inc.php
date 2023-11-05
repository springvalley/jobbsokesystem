<?php
// Include necessary files
// require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
// require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
// require_once "/xampp/htdocs/jobbsokesystem/controllers/JobListingController.php";
require_once "../library/database_handler.php";
require_once "../models/jobListing/JobListingModel.php";
require_once "../controllers/JobListingController.php";
require_once "../library/validator.php";
require_once "../library/errorhandler.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from the form  
    $employerId = $_SESSION["id"];
    $jobTitle = htmlspecialchars($_POST["jobtitle"], ENT_QUOTES, "UTF-8");
    $location = htmlspecialchars($_POST["location"], ENT_QUOTES, "UTF-8");
    $industry = htmlspecialchars($_POST["industry"], ENT_QUOTES, "UTF-8");
    $positionName = htmlspecialchars($_POST["positionname"], ENT_QUOTES, "UTF-8");
    $jobType = htmlspecialchars($_POST["jobtype"], ENT_QUOTES, "UTF-8");
    $applicationDeadline = htmlspecialchars($_POST["applicationdeadline"], ENT_QUOTES, "UTF-8");
    $jobDescription = htmlspecialchars($_POST["jobdescription"], ENT_QUOTES, "UTF-8");


    // try {
    //Error handlers
    if (Validator::areInputsEmpty($jobTitle, $positionName, $jobDescription)) {
        ErrorHandler::setError(ErrorHandler::$emptyInputError);
        header("Location: ../postnewjob.php");
        exit();
    }

    if (!Validator::isLocationValid($location)) {
        ErrorHandler::setError(ErrorHandler::$invalidLocationError);
        header("Location: ../postnewjob.php");
    }

    if (!Validator::isIndustryValid($industry)) {
        ErrorHandler::setError(ErrorHandler::$invalidIndustryError);
        header("Location: ../postnewjob.php");
    }

    if (!Validator::isJobTypeValid($jobType)) {
        ErrorHandler::setError(ErrorHandler::$emptyInputJobTypeError);
        header("Location: ../postnewjob.php");
    }

    if (Validator::isEmptyInputApplicationDeadline($applicationDeadline)) {
        ErrorHandler::setError(ErrorHandler::$emptyInputApplicationDeadlineError);
        header("Location: ../postnewjob.php");
    }
    if (Validator::isOldApplicationDeadlineDate($applicationDeadline)) {
        ErrorHandler::setError(ErrorHandler::$isOldApplicationDeadlineDateError);
        header("Location: ../postnewjob.php");
    }

    // $jobListingController = new JobListingController();
    $jobListingModel = new JobListingModel();
    if ($jobListingModel->insertNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName)) {
        ErrorHandler::setSuccess("Din jobbannonse har publisert!");
        // header("Location: ../companyjobads.php");
        exit();
    } else {
        ErrorHandler::setError(ErrorHandler::$unknownError);
        header("Location: ../postnewjob.php");
        exit();
    }

    // } catch (PDOException $e) {
    //     ErrorHandler::setError(ErrorHandler::$unknownError);
    //     header("Location: ../postnewjob.php");
    // }
}
