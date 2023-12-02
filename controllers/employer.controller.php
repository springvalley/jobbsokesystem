<?php

require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";
require_once "/xampp/htdocs/jobbsokesystem/models/employer/employer.model.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/FileUploadHandler.php";


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

        $profileImage = $_FILES["profileImage"];
        if (!empty($profileImage["tmp_name"])) {

            $profileImageFilePath = FileUploadHandler::uploadFile($profileImage);
            if ($profileImageFilePath === false) {
                ErrorHandler::setSuccess("Profile bildet kan ikke lastet opp. Vennligst, prøv på nytt!");
                header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
                exit();
            }
            $data["profileImage"] = $profileImageFilePath;
        } else {
            //Get the existing files that are already uploaded

            $existingFile = $model->getExistingProfileImageFile($data["employer_id"]);
            // Check if the files are already uploaded, so retrieve the existing file 
            //instead of asking upload new files every time user edit profile.
            if ($existingFile) {
                $data["profileImage"] = $existingFile->profile_picture;
            } else {
                ErrorHandler::setError("Du har ikke lastet opp noen filer på din profil.");
                header("location: ../editcompanyprofile.php?id=" . (int)$data["employer_id"]);
            }
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