<?php
// Include necessary files
require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobListing/JobListingModel.php";
require_once "/xampp/htdocs/jobbsokesystem/controllers/JobListingController.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from the form
    // $employerId = $_SESSION["employerid"];
    // $data = [
    //     "employerId" => 1,
    //     "jobTitle" => htmlspecialchars($_POST["jobtitle"]),
    //     "positionName" => htmlspecialchars($_POST["positionname"]),
    //     "location" => htmlspecialchars($_POST["location"]),
    //     "industry" => htmlspecialchars($_POST["industry"]),
    //     "jobType" => htmlspecialchars($_POST["jobtype"]),
    //     "japplicationDeadline" => htmlspecialchars($_POST["applicationdeadline"]),
    //     "jobDescription" => htmlspecialchars($_POST["jobdescription"]),
    // ];
    // $employerId = $_SESSION["employer_id"];
    $employerId = 1;
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
            $errors["not_login"] = "Vennligst, logg inn i din konto for å lage en ny jobbannonse.";
        }
        if ($jobListingController->is_empty_input_form($jobTitle, $positionName, $jobDescription)) {
            $errors["empty_form"] = "Vennsligst, fyll ut alle feltene!";
        }         
        if ($jobListingController->is_empty_select_location($location)) {
            $errors["empty_select_location"] = "Vennsligst, velg et sted!";
        }
        if ($jobListingController->is_empty_select_industry($industry)) {
            $errors["empty_select_industry"] = "Vennsligst, velg en bransje!";
        }
        if ($jobListingController->is_empty_select_jobType($jobType)) {
            $errors["empty_select_jobType"] = "Vennsligst, velg en ansettelseform!";
        }
        if ($jobListingController->is_empty_applicationDeadline($applicationDeadline)) {
            $errors["empty_applicationDeadline"] = "Vennsligst, velg en gyldig søknadsfrist dato!";
        }
        if ($jobListingController->is_invalid_applicationDeadline($applicationDeadline)) {
            $errors["invalid_applicationDeadline"] = "Dato til søknadsfrist er ugyldig! Vennligst, velg en ny dato!";
        }       

        if ($errors) {
            $_SESSION["errors_postnewjob"] = $errors;
            header ("Location: ../postnewjob.php");
            die();
        }        
        $jobListingController->createNewJobAd($employerId, $jobTitle, $jobDescription, $jobType, $location, $industry, $applicationDeadline, $positionName);
        header("Location: ../postnewjob.php?postnewjob=success");
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
} else {
    header("Location: ../postnewjob.php");
    die();
}