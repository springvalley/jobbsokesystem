<?php

require_once "/xampp/htdocs/jobbsokesystem/library/database_handler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";
require_once "/xampp/htdocs/jobbsokesystem/models/jobApplicant/jobApplicant.model.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
require_once "/xampp/htdocs/jobbsokesystem/library/FileUploadHandler.php";

class JobApplicantController
{

    /**
     * This function is used to edit profile of jobapplicant.     
     */
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
        $profileImage = $_FILES["profileImage"];
        $cvFile = $_FILES["cv"];


        if (!empty($profileImage["tmp_name"]) && !empty($cvFile["tmp_name"])) {
            $cvFilePath = FileUploadHandler::uploadFile($cvFile);
            $profileImageFilePath = FileUploadHandler::uploadFile($profileImage);
            if ($cvFilePath === false && $profileImageFilePath === false) {
                ErrorHandler::setError("Filer kan ikke bli lastet opp. Vennligst, prøv igjen!");
                header("location: ../editapplicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
                exit();
            }

            //The file path of CV and diploma are stored in the '$data' array if the files are successfully uploaded.
            $data["profileImage"] = $profileImageFilePath;
            $data["cv"] = $cvFilePath;
        } else {
            //Get the existing files that are already uploaded
            $existingFiles = $model->getExistingFiles($data["jobApplicant_id"]);
            // Check if the files are already uploaded, so retrieve the existing file 
            //instead of asking upload new files every time user edit profile.
            if ($existingFiles) {
                $data["profileImage"] = $existingFiles->profile_picture;
                $data["cv"] = $existingFiles->cv_path;
            } else {
                ErrorHandler::setError("Du har ikke lastet opp noen filer på din profil.");
                header("location: ../applicantprofile.php?id=" . (int)$data["jobApplicant_id"]);
            }
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


    /**
     * This function is used to make a new jobapplication for a job applicant.
     * @param  
     * @return
     */

    /**
     * This function is used to apply for a job.
     */
    public function applyToJob()
    {
        $model = new JobApplicantModel();

        $data = [
            "jobApplicant_id" => htmlspecialchars(trim($_POST["applicantid"])),
            "jobListing_id" => htmlspecialchars(trim($_POST["jobListing_id"])),
            "userName" => htmlspecialchars(trim($_POST["name"])),
            "userPhone" => htmlspecialchars(trim($_POST["phone"])),
            "userEmail" => htmlspecialchars(trim($_POST["email"])),
            "lastJob" => htmlspecialchars(trim($_POST["lastJob"])),
            "coverletter" => htmlspecialchars(trim($_POST["coverletter"])),
            "userEducationLevel" => htmlspecialchars(trim($_POST["education"])),
        ];

        //Validate empty inputs
        if (Validator::areInputsEmpty($data["userName"], $data["userEmail"], $data["userPhone"], $data["coverletter"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputError);
            header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
            exit();
        }


        //Validate a valid name
        if (!Validator::isNameValid($data["userName"])) {
            ErrorHandler::setError(ErrorHandler::$invalidNameError);
            header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
            exit();
        }

        //Validate a valid email
        if (!Validator::isEmailValid($data["userEmail"])) {
            ErrorHandler::setError(ErrorHandler::$invalidEmailError);
            header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
            exit();
        }

        //Validate a valid education
        if (!Validator::isEducationValid($data["userEducationLevel"])) {
            ErrorHandler::setError(ErrorHandler::$invalidEducationError);
            header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
            exit();
        }


        if ($model->applicantHasAppliedToJob($data["jobListing_id"], $data["jobApplicant_id"])) {
            ErrorHandler::setError("Du har allerede søkt på denne jobben.");
            header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
            exit();
        }

        $cvFile = $_FILES["cv"];
        $diplomaFile = $_FILES["diploma"];
        if (!empty($cvFile["tmp_name"]) && !empty($diplomaFile["tmp_name"])) {
            //Call 'uploadFile' function from FileUploadHandler class
            $cvFilePath = FileUploadHandler::uploadFile($cvFile);
            $diplomaFilePath = FileUploadHandler::uploadFile($diplomaFile);
            if ($cvFilePath === false && $diplomaFilePath === false) {
                ErrorHandler::setError("Filer kan ikke bli lastet opp. Vennligst, prøv igjen!");
                header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
                exit();
            }

            //The file path of CV and diploma are stored in the '$data' array if the files are successfully uploaded.
            $data["cvFile"] = $cvFilePath;
            $data["diplomaFile"] = $diplomaFilePath;
        } else {
            ErrorHandler::setError("Vennligst, last opp CV og diplom!");
            header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
            exit();
        }

        if ($model->applyToJob($data)) {
            ErrorHandler::setSuccess("Søknaden din ble opprettet!");
            header("Location: ../myJobApplications.php");
            exit();
        } else {
            ErrorHandler::setError("Noe gikk galt, prøv igjen!");
            header("location: ../applyjob.php?id=" . (int)$data["jobListing_id"]);
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