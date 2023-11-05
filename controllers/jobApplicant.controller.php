<?php

require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobApplicant/jobApplicant.model.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";

class JobApplicantController
{


    public function edit()
    {

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

        foreach ($_POST["skills"] as $skill) {
            array_push($data["userSkills"], $skill);
        }

        //Validate empty inputs
        if (Validator::areInputsEmpty($data["userName"], $data["userEmail"], $data["userPhone"], $data["userSummary"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputError); 
            header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
            exit();
        }


        //Validate a valid name
        if (!Validator::isNameValid($data["userName"])) {
            ErrorHandler::setError(ErrorHandler::$invalidNameError); 
            header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
            exit();
        }
        //Validate a valid summary
        if (!Validator::isNameValid($data["userSummary"])) {
            ErrorHandler::setError("Oppsumeringen du har skrevet er ikke gyldig"); 
            header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
            exit();
        }


        //Validate a valid email
        if (!Validator::isEmailValid($data["userEmail"])) {
            ErrorHandler::setError(ErrorHandler::$invalidEmailError); 
            header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
            exit();
        }

        //Update db using model
        //Redirect user to profile if successful, if else redirect to other page with errormessages
        if ($model->updateJobApplicantProfile($data)) {
            ErrorHandler::setSuccess("Brukeren ble oppdatert!"); 
            header("location: ../applicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
            exit();
        } else {
            ErrorHandler::setError(ErrorHandler::$unknownError); 
            header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
            exit();
        }
    }

    public function delete($id)
    {
    }

    public function display($id)
    {
    }

    public function applyToJob()
    {
        $model = new JobApplicantModel();

        $data = [
            "jobApplicant_id" => htmlspecialchars(trim($_POST["applicantid"])),
            "userName" => htmlspecialchars(trim($_POST["name"])),
            "userPhone" => htmlspecialchars(trim($_POST["phone"])),
            "userEmail" => htmlspecialchars(trim($_POST["email"])),
            "coverletter" => htmlspecialchars(trim($_POST["coverletter"])),
            "userEducationLevel" => htmlspecialchars(trim($_POST["education"]))
        ];

            //Validate empty inputs
            if (Validator::areInputsEmpty($data["userName"], $data["userEmail"], $data["userPhone"], $data["userSummary"])) {
                ErrorHandler::setError(ErrorHandler::$emptyInputError); 
                header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"] . "&error=emptyInputs");
                exit();
            }
    
    
            //Validate a valid name
            if (!Validator::isNameValid($data["userName"])) {
                ErrorHandler::setError(ErrorHandler::$emptyInputError); 
                header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"] . "&error=invalidName");
                exit();
            }
            //Validate a valid summary
            if (!Validator::isNameValid($data["userSummary"])) {
                ErrorHandler::setError(ErrorHandler::$emptyInputError); 
                header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"] . "&error=invalidSummary");
                exit();
            }
    
    
            //Validate a valid email
            if (!Validator::isEmailValid($data["userEmail"])) {
                ErrorHandler::setError(ErrorHandler::$emptyInputError); 
                header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"] . "&error=invalidEmail");
                exit();
            }

    }
}

$init = new JobApplicantController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["type"]) {
        case "edit":
            $init->edit();
            break;
        case "apply":
            $init->applyToJob();
            break;
    }
} else {
}
