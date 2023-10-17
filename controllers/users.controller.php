<?php

require_once "../models/user.Model.php";
class UserController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel;
    }

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

        //Validate inputs
        if (empty($data["userName"]) || empty($data["userEmail"]) || empty($data["userPhone"]) || empty($data["userPassword"]) || empty($data["userPasswordRepeat"]) || empty($data["userOrgNumber"])) {
            header("location: ../signup.php?error=emptyInputs");
            exit();
        }

        if (!preg_match("/^([a-åA-å' ]+)$/", $data["userName"])) {
            header("location: ../signup.php?error=invalidName");
            exit();
        }

        if (!filter_var($data["userEmail"], FILTER_VALIDATE_EMAIL)) {
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }

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

        if ($this->userModel->registerUser($data)) {
            header("location: ../login.php?error=userCreated");
            exit();
        } else {
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }
    }
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

    public function logout(){
        unset($_SESSION["name"]);
        unset($_SESSION["id"]);
        unset($_SESSION["email"]);
        session_destroy();
        header("location: ../index.php");
        exit();
    }
}



$init = new UserController();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
