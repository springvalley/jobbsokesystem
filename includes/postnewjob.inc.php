<?php
// Include necessary files
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "/xampp/htdocs/jobbsokesystem/controllers/JobListingController.php";
#require_once "../controllers/JobListingController.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from the form
    $employerId = 1;
    // $employerId = $_SESSION["employer_id"];
    $jobTitle = htmlspecialchars($_POST["jobtitle"], ENT_QUOTES, "UTF-8");
    $location = htmlspecialchars($_POST["location"], ENT_QUOTES, "UTF-8");
    $industry = htmlspecialchars($_POST["industry"], ENT_QUOTES, "UTF-8");
    $positionName = htmlspecialchars($_POST["positionname"], ENT_QUOTES, "UTF-8");
    $jobType = htmlspecialchars($_POST["jobtype"], ENT_QUOTES, "UTF-8");
    $applicationDeadline = htmlspecialchars($_POST["applicationdeadline"], ENT_QUOTES, "UTF-8");
    $jobDescription = htmlspecialchars($_POST["jobdescription"], ENT_QUOTES, "UTF-8");

    try {
        //Error handlers
        $errors = [];
        $jobListingController = new JobListingController();
        if ($jobListingController->is_employer_loggedIn($employerId)) {
            $errors["not_login"] = "Vennligst, logg inn i din konto for å lage en ny jobbannonse. " . "<a href='login.php'>Login her.</a>";
        } elseif ($jobListingController->is_empty_input_form($jobTitle, $positionName, $jobDescription)) {
            $errors["empty_form"] = "Vennsligst, fyll ut alle feltene!";
        } elseif ($jobListingController->is_empty_select_location($location)) {
            $errors["empty_select_location"] = "Vennsligst, velg et sted!";
        } elseif ($jobListingController->is_empty_select_industry($industry)) {
            $errors["empty_select_industry"] = "Vennsligst, velg en bransje!";
        } elseif ($jobListingController->is_empty_select_jobType($jobType)) {
            $errors["empty_select_jobType"] = "Vennsligst, velg en ansettelseform!";
        } elseif ($jobListingController->is_empty_applicationDeadline($applicationDeadline)) {
            $errors["empty_applicationDeadline"] = "Vennsligst, velg en gyldig søknadsfrist dato!";
        } elseif ($jobListingController->is_invalid_applicationDeadline($applicationDeadline)) {
            $errors["invalid_applicationDeadline"] = "Dato til søknadsfrist er ugyldig! Vennligst, velg en ny dato!";
        }
        //Check if there are any errors related to the form data validation during the creation of a new job advertisement.
        //
        if ($errors) {
            $_SESSION["errors_postnewjob"] = $errors;

            $postNewJobData = [
                "jobtitle" => $jobTitle,
                "location" => $location,
                "industry" => $industry,
                "positionname" => $positionName,
                "jobtype" => $jobType,
                "applicationDeadline" => $applicationDeadline,
                "jobdescription" => $jobDescription
            ];
            $_SESSION["postnewjob_data"] = $postNewJobData;
            header("Location: ../postnewjob.php");
            die();
        }
        //Create a new job advertisement by calling the function 'createNewJobAd' from the JobListingController.
        $jobListingController->createNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName);
        header("Location: ../postnewjob.php?postnewjob=success"); //Display successfull message when the new job ad has been created.
        die();
    }
    //If there is an error when using PDO(PHP Data Objects) for database communication, the user is redirected to postnewjob and 
    //the error message will be displayed for the user.
    catch (PDOException $e) {
        // 
        header("Location: ../postnewjob.php?postnewjob=queryFailed");
    }
} else {
    header("Location: ../postnewjob.php");
    die();
}
