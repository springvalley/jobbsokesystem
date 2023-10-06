<?php
// Include necessary files
include "../classes/dbh.php";
include "../models/joblisting.model.php";
include "../controllers/joblisting.controller.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from the form
    $employerId = $_SESSION["employerid"];
    $jobTitle = htmlspecialchars($_POST["jobtitle"], ENT_QUOTES, "UTF-8");
    $location = htmlspecialchars($_POST["location"], ENT_QUOTES, "UTF-8");
    $industry = htmlspecialchars($_POST["industry"], ENT_QUOTES, "UTF-8");
    $positionName = htmlspecialchars($_POST["positionname"], ENT_QUOTES, "UTF-8");
    $jobType = htmlspecialchars($_POST["jobtype"], ENT_QUOTES, "UTF-8");
    $jobDescription = htmlspecialchars($_POST["jobdescription"], ENT_QUOTES, "UTF-8");

    // Create a new JoblistingController instance
    $joblisting = new JoblistingController(
        $employerId,
        $jobTitle,
        $jobDescription,
        $jobType,
        $location,
        $isActive,
        $industry,
        $positionName
    );

    // Check for empty fields
    if (
        empty($jobTitle) || empty($location) || empty($industry) ||
        empty($positionName) || empty($jobType) || empty($jobDescription)
    ) {
        //HAVE TO FIX THIS !!!!!! 
        header("Location: ../postnewjob.php?error=emptyinput");
        exit();
    }

    // Create a new job advertisement
    $result = $joblisting->createNewJobAds(
        $employerId,
        $jobTitle,
        $jobDescription,
        $jobType,
        $location,
        $isActive,
        $industry,
        $positionName
    );

    if ($result) {
        // The job ad was created successfully
        header("Location: ../success.php");
        exit();
    } else {
        // Handle the case where the job ad creation failed
        header("Location: ../postnewjob.php?error=createfailed");
        exit();
    }
} else {
    header("Location: ../postnewjob.php"); // Redirect to the form page if the request method is not POST
    exit();
}