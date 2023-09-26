<?php 

class SignUpController extends SignUpRepo{

    private $name;
    private $email;
    private $phone;
    private $password;
    private $passwordRepeat;
    private $orgNumber;

    public function __construct($name, $email, $phone, $password, $passwordRepeat, $orgNumber){
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->orgNumber = $orgNumber;
    }

    public function signUpEmployer(){
        if($this->emptyInputs() == false){
            header("location: ../signup.php?error=emptyInputs");
            exit();
        }
        if($this->invalidName() == false){
            header("location: ../signup.php?error=invalidName");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false){
            header("location: ../signup.php?error=invalidPassword");
            exit();
        }
        if($this->userExists() == false){
            header("location: ../signup.php?error=userExists");
            exit();
        }
        
        $this->setEmployer($this->name, $this->email, $this->phone, $this->password);
    }

    public function signUpUser(){
        if($this->emptyInputs() == false){
            header("location: ../signup.php?error=emptyInputs");
            exit();
        }
        if($this->invalidName() == false){
            header("location: ../signup.php?error=invalidName");
            exit();
        }
        if($this->invalidEmail() == false){
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }
        if($this->passwordMatch() == false){
            header("location: ../signup.php?error=invalidPassword");
            exit();
        }
        if($this->userExists() == false){
            header("location: ../signup.php?error=userExists");
            exit();
        }
        
        $this->setUser($this->name, $this->email, $this->phone, $this->password);
    } 

    public function printAll(){
        return $this->name . " " . $this->email . " " . $this->phone . " " . $this->password. " " . $this->passwordRepeat . " " . $this->orgNumber;
    }

    public function emptyInputs(){
        $result = false;
        if(empty($this->orgNumber) || empty($this->name) || empty($this->email) || empty($this->phone) || empty($this->password) || empty($this->passwordRepeat)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } 

    private function invalidName(){
        $result = false;
        if(!preg_match("/^[a-åA-å]*$/",$this->name)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function passwordMatch(){
        $result = false;
        if($this->password !== $this->passwordRepeat){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function userExists(){
        $result = false;
        if(!$this->checkUser($this->email, $this->phone)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }
} 