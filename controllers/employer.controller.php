<?php

require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";
require_once "/xampp/htdocs/jobbsokesystem/models/employer/employer.model.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";

class EmployerController
{

  /**
     * This function is used to edit an employer in the database.
     * @param  
     * @return
     */
    public function edit()
    {

        $model = new EmployerModel();

        $data = [
            "employer_id" => htmlspecialchars(trim($_POST["employer_id"])),
            "userName" => htmlspecialchars(trim($_POST["name"])),
            "orgNumber" => htmlspecialchars(trim($_POST["orgNumber"])),
            "userPhone" => htmlspecialchars(trim($_POST["phone"])),
            "userLocation" => htmlspecialchars(trim($_POST["location"])),
            "userEmail" => htmlspecialchars(trim($_POST["email"])),
            "userSummary" => htmlspecialchars(trim($_POST["summary"])),
        ];



        //Validate empty inputs
        if (Validator::areInputsEmpty($data["orgNumber"], $data["userName"], $data["userEmail"], $data["userPhone"], $data["userSummary"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputError);
            header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
            exit();
        }


        //Validate a valid name
        if (!Validator::isNameValid($data["userName"])) {
            ErrorHandler::setError(ErrorHandler::$invalidNameError);
            header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
            exit();
        }
        //Validate a valid summary
        if (!Validator::isNameValid($data["userSummary"])) {
            ErrorHandler::setError("Oppsumeringen du har skrevet er ikke gyldig");
            header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
            exit();
        }

        //Validate a valid location
        if (!Validator::isLocationValid($data["userLocation"])) {
            ErrorHandler::setError(ErrorHandler::$invalidLocationError);
            header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
            exit();
        }


        //Validate a valid email
        if (!Validator::isEmailValid($data["userEmail"])) {
            ErrorHandler::setError(ErrorHandler::$invalidEmailError);
            header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
            exit();
        }

        //Update db using model
        //Redirect user to profile if successful, if else redirect to other page with errormessages
        if ($model->updateEmployerProfile($data)) {
            ErrorHandler::setSuccess("Brukeren ble oppdatert!");
            header("location: ../companyprofile.php?id=" . (int)$data["employer_id"]);
            exit();
        } else {
            ErrorHandler::setError(ErrorHandler::$unknownError);
            header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
            exit();
        }
    }
}

$init = new EmployerController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["type"]) {
        case "edit":
            $init->edit();
            break;
    }
} else {
}
