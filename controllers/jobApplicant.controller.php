<?php

require_once("../classes/dbhImproved.php");
require_once("../models/jobApplicant.model.php");

class JobApplicantController
{
    

    public function edit(){

        $model = new JobApplicantModel();

        $data = [
            "jobApplicant_id" => htmlspecialchars(trim($_POST["jobapplicant_id"])),
            "userName" => htmlspecialchars(trim($_POST["name"])),
            "userPhone" => htmlspecialchars(trim($_POST["phone"])),
            "userEmail" => htmlspecialchars(trim($_POST["email"])),
            "userLocation" => htmlspecialchars(trim($_POST["location"])),
            "userSummary" => htmlspecialchars(trim($_POST["summary"])),
            "userSkills" => array(),
            "userEducationLevel" => htmlspecialchars(trim($_POST["educationlevel"])),
        ];
        
        foreach($_POST["skills"] as $skill){
            array_push($data["userSkills"], $skill);
        }
        /*
        foreach($_POST as $entry => $value){
            echo var_dump($entry) . " : " . var_dump($value);
            echo "<br>";
        }
        echo "<br>";
        echo "<br>";
        echo "<br>";
        foreach($data as $entry => $value){
            echo var_dump($entry) . " : " . var_dump($value);
            echo "<br>";
        }
        exit();*/

        //Check for empty inputs

        if (empty($data["userName"]) || empty($data["userEmail"]) || empty($data["userPhone"]) || empty($data["userSummary"])) {
            header("location: ../editapplicantprofile.php?id=". (int)$data["jobApplicant_id"] ."&error=emptyInputs");
            exit();
        }
        
        //Validate inputs
        
        if (!preg_match("/^([a-åA-å' ]+)$/", $data["userName"])) {
            header("location: ../editapplicantprofile.php?id=". (int)$data["jobApplicant_id"] ."&error=invalidName");
            exit();
        }
        
        if (!preg_match("/^([a-åA-å' ]+)$/", $data["userSummary"])) {
            header("location: ../editapplicantprofile.php?id=". (int)$data["jobApplicant_id"] ."&error=invalidSummary");
            exit();
        }
        
        if (!filter_var($data["userEmail"], FILTER_VALIDATE_EMAIL)) {
            header("location: ../editapplicantprofile.php?id=". (int)$data["jobApplicant_id"] ."&error=invalidEmail");
            exit();
        }

        //Update db using model
        //Redirect user to profile if successful, if else redirect to other page with errormessages
        if($model->updateJobApplicantProfile($data)){
            header("location: ../applicantprofile.php?id=". (int)$data["jobApplicant_id"] ."&error=updateSuccess");
            exit();
        }else{
            header("location: ../editapplicantprofile.php?id=". (int)$data["jobApplicant_id"] ."&error=updateFailed");
            exit();
        }
    }

    public function delete($id){

    }

    public function display($id){
    }
}

$init = new JobApplicantController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["type"]) {
        case "edit":
            $init->edit();
            break;
        case "login":
            $init->delete($id);
            break;
    }
}else{
}

