<?php

require_once "../models/user.Model.php";
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
            "userOrgNumber" => htmlspecialchars(trim($_POST["orgNumber"]))
        ];

        //Validate empty inputs
        if (empty($data["userName"]) || empty($data["userEmail"]) || empty($data["userPhone"]) || empty($data["userPassword"]) || empty($data["userPasswordRepeat"]) || empty($data["userOrgNumber"])) {
            header("location: ../signup.php?error=emptyInputs");
            exit();
        }

        //Validate a valid name
        if (!preg_match("/^([a-åA-å' ]+)$/", $data["userName"])) {
            header("location: ../signup.php?error=invalidName");
            exit();
        }

        //Validate a valid email
        if (!filter_var($data["userEmail"], FILTER_VALIDATE_EMAIL)) {
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }

        //Validate if the passwords match
        if ($data["userPassword"] !== $data["userPasswordRepeat"]) {
            header("location: ../signup.php?error=invalidPassword");
            exit();
        }

        //Check if user already exists

        if ($this->userModel->findUserByMatch($data["userEmail"], $data["userPhone"], $data["userOrgNumber"], $data["jobApplicant"])) {
            header("location: ../signup.php?error=userExists");
            exit();
        }

        //Passed all the validation, now its time to hash the password. 
        $data["userPassword"] = password_hash($data["userPassword"], PASSWORD_DEFAULT);

        //Register the user in the database using the model. If the registration is successful send them
        //To the login page otherwise return to the singup page with an error. 
        if ($this->userModel->registerUser($data)) {
            header("location: ../login.php?error=userCreated");
            exit();
        } else {
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }
    }

      /**
     * This function is used to process the form input and log in a user.
     * @param
     * @return
     */

    public function login(){

        $data = [
            "jobApplicant" => htmlspecialchars(trim($_POST["jobapplicant"])),
            "userEmail" => htmlspecialchars(trim($_POST["email"])),
            "userPassword" => htmlspecialchars(trim($_POST["password"])),
        ];

        if (empty($data["userEmail"]) || empty($data["userPassword"])) {
            header("location: ../login.php?error=emptyInputs");
            exit();
        }

        if ($this->userModel->findUserByMatch($data["userEmail"], $data["userPhone"], 0 , $data["jobApplicant"])) {
            $loggedInUser = $this->userModel->login($data["userEmail"], $data["userPassword"], $data["jobApplicant"]);
            if($loggedInUser){
                $this->createUserSession($loggedInUser, $data["jobApplicant"]);
            }else{
                header("location: ../login.php?error=wrongPassword");
                exit();
            }
        }else{
            header("location: ../login.php?error=userNotFound");
            exit();
        }
    }

     /**
     * This function is used to create a new session and store variables about the user in the $_SESSION superglobal.
     * @param 
     * @return
     */

    public function createUserSession($user, $jobApplicant){
        if($jobApplicant == 1){
            $_SESSION["name"] = $user->name;
            $_SESSION["id"] = $user->jobApplicant_id;
            $_SESSION["email"] = $user->email;
        }else{
            $_SESSION["name"] = $user->company_name;
            $_SESSION["id"] = $user->employer_id;
            $_SESSION["email"] = $user->email;
        }
        header("location: ../index.php");
    }

     /**
     * This function is used to logout a user i.e remove the session variables and destroy the session.
     * @param
     * @return
     */

    public function logout(){
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
}else{
    switch($_GET["q"]){
        case "logout":
            $init->logout();
            break;
        default: 
        header("location: ../jobapplicant.php");
        exit();
        break;
    }
}
