<?php

require_once "../models/user.Model.php";
require_once "/xampp/htdocs/jobbsokesystem/library/validator.php";
require_once "/xampp/htdocs/jobbsokesystem/library/errorhandler.php";
class UserController
{

    private $userModel;

    //Constructor
    public function __construct()
    {
        $this->userModel = new UserModel;
    }


    /**
     * This function is used to process the form input from a new user and register them into the database
     * @param
     * @return
     */
    public function register()
    {
        //process form

        //Sanitize post data
        $data = [
            "userName" => htmlspecialchars(trim($_POST["name"])),
            "jobApplicant" => htmlspecialchars(trim($_POST["jobapplicant"])),
            "userEmail" => htmlspecialchars(trim($_POST["email"])),
            "userPhone" => htmlspecialchars(trim($_POST["phone"])),
            "userPassword" => htmlspecialchars(trim($_POST["password"])),
            "userPasswordRepeat" => htmlspecialchars(trim($_POST["repeatPassword"])),
            "userOrgNumber" => htmlspecialchars(trim($_POST["orgNumber"])),
            "location" => htmlspecialchars(trim($_POST["location"])),
            "education" => htmlspecialchars(trim($_POST["education"])),
            "industry" => htmlspecialchars(trim($_POST["industry"]))
        ];


        //Validate empty inputs
        if (Validator::areInputsEmpty($data["userName"], $data["userEmail"], $data["userPhone"], $data["userPassword"], $data["userPasswordRepeat"], $data["userOrgNumber"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputError);
            header("location: ../signup.php");
            exit();
        }

        //Validate a valid name
        if (!Validator::isNameValid($data["userName"])) {
            ErrorHandler::setError(ErrorHandler::$invalidNameError);
            header("location: ../signup.php");
            exit();
        }

        /*
        //Validate a valid phone number
        if (!Validator::isPhoneNumberValid($data["userPhone"])) {
            ErrorHandler::setError("Telefonnummeret du har valgt er ikke gyldig");  
            header("location: ../signup.php?error=invalidPhone");
            exit();
        }
        */

        //Validate a valid email
        if (!Validator::isEmailValid($data["userEmail"])) {
            ErrorHandler::setError(ErrorHandler::$invalidEmailError);
            header("location: ../signup.php");
            exit();
        }

        //Validate if passwords match
        if (!Validator::doPasswordsMatch($data["userPassword"], $data["userPasswordRepeat"])) {
            ErrorHandler::setError(ErrorHandler::$invalidPasswordMatchError);
            header("location: ../signup.php");
            exit();
        }

        if ($data["jobApplicant"] == 1) {
            //Validate if education is valid
            if (!Validator::isLocationValid($data["education"])) {
                ErrorHandler::setError(ErrorHandler::$invalidEducationError);
                header("location: ../signup.php");
                exit();
            }
        } else {
            //Validate if industry is valid
            if (!Validator::isLocationValid($data["industry"])) {
                ErrorHandler::setError(ErrorHandler::$invalidIndustryError);
                header("location: ../signup.php");
                exit();
            }
        }

        //Validate if location is valid
        if (!Validator::isLocationValid($data["location"])) {
            ErrorHandler::setError(ErrorHandler::$invalidLocationError);
            header("location: ../signup.php");
            exit();
        }



        //Check if user already exists
        if ($this->userModel->findUserByMatch($data["userEmail"], $data["userPhone"], $data["userOrgNumber"], $data["jobApplicant"])) {
            ErrorHandler::setError("Brukeren du har prødv å opprette eksisterer allerede");
            header("location: ../signup.php");
            exit();
        }

        //Passed all the validation, now its time to hash the password. 
        $data["userPassword"] = password_hash($data["userPassword"], PASSWORD_DEFAULT);

        //Register the user in the database using the model. If the registration is successful send them
        //To the login page otherwise return to the singup page with an error. 
        if ($this->userModel->registerUser($data)) {
            ErrorHandler::setSuccess("Brukeren ble opprettet");
            header("location: ../login.php");
            exit();
        } else {
            ErrorHandler::setError(ErrorHandler::$unknownError);
            header("location: ../signup.php?");
            exit();
        }
    }

    /**
     * This function is used to process the form input and log in a user.
     * @param
     * @return
     */

    public function login()
    {

        $data = [
            "jobApplicant" => htmlspecialchars(trim($_POST["jobapplicant"])),
            "userEmail" => htmlspecialchars(trim($_POST["email"])),
            "userPassword" => htmlspecialchars(trim($_POST["password"])),
        ];

        //Check if inputs are empty
        if (Validator::areInputsEmpty($data["userEmail"]) || empty($data["userPassword"])) {
            ErrorHandler::setError(ErrorHandler::$emptyInputError);
            header("location: ../login.php");
            exit();
        }

        if ($this->userModel->findUserByMatch($data["userEmail"], $data["userPhone"], 0, $data["jobApplicant"])) {
            $loggedInUser = $this->userModel->login($data["userEmail"], $data["userPassword"], $data["jobApplicant"]);
            if ($loggedInUser) {
                $this->createUserSession($loggedInUser, $data["jobApplicant"]);
            } else {
                ErrorHandler::setError(ErrorHandler::$wrongPasswordError);
                header("location: ../login.php");
                exit();
            }
        } else {
            ErrorHandler::setError(ErrorHandler::$unknownUserError);
            header("location: ../login.php");
            exit();
        }
    }

    /**
     * This function is used to create a new session and store variables about the user in the $_SESSION superglobal.
     * @param 
     * @return
     */

    public function createUserSession($user, $jobApplicant)
    {
        session_start();
        if ($jobApplicant == 1) {
            $_SESSION["name"] = $user->name;
            $_SESSION["userType"] = "jobapplicant";
            $_SESSION["id"] = $user->jobApplicant_id;
            $_SESSION["email"] = $user->email;
            $_SESSION["phone"] = $user->phone_number;
        } else {
            $_SESSION["name"] = $user->company_name;
            $_SESSION["userType"] = "employer";
            $_SESSION["id"] = $user->employer_id;
            $_SESSION["email"] = $user->email;
            $_SESSION["phone"] = $user->phone_number;
        }
        header("location: ../index.php");
    }

    /**
     * This function is used to logout a user i.e remove the session variables and destroy the session.
     * @param
     * @return
     */

    public function logout()
    {
        unset($_SESSION["name"]);
        unset($_SESSION["id"]);
        unset($_SESSION["email"]);
        session_destroy();
        header("location: ../index.php");
        exit();
    }
}

//This handles routing for the controller.
$init = new UserController();
//If we access this via a post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //We have a hidden input called type which tells the controller which function to execute. 
    switch ($_POST["type"]) {
        case "register":
            $init->register();
            break;
        case "login":
            $init->login();
            break;
    }
} else {
    switch ($_GET["q"]) {
        case "logout":
            $init->logout();
            break;
        default:
            header("location: ../jobapplicant.php");
            exit();
            break;
    }
}