<?php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employerId = $_SESSION["employerid"];
    $jobTitle = htmlspecialchars($_POST["jobtitle"], ENT_QUOTES, "UTF-8");
    $location = htmlspecialchars($_POST["location"], ENT_QUOTES, "UTF-8");
    $industry = htmlspecialchars($_POST["industry"], ENT_QUOTES, "UTF-8");
    $positionName = htmlspecialchars($_POST["positionname"], ENT_QUOTES, "UTF-8");
    $jobType = htmlspecialchars($_POST["jobtype"], ENT_QUOTES, "UTF-8");
    include "..classes/dbh.php";
    include "..classes/joblisting.classes.php";
    include "..classes/joblistingcontroller.classes.php";
    $joblisting = new JoblistingController($employerId, $jobTypeId, $locationId, $industryId, $jobTitle, $jobDescription, $positionName, $isActive);


    header("location: ../postnewjob.php?error=none");
}
