<?php 

class LoginController extends LogInRepo{

    private $email;
    private $password;


    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function signInEmployer(){
        if($this->emptyInputs() == false){
            header("location: ../login.php?error=emptyInputs");
            exit();
        }

        $this->getEmployer($this->email, $this->password);
    }

    public function signInUser(){
        if($this->emptyInputs() == false){
            header("location: ../login.php?error=emptyInputs");
            exit();
        }
        
        $this->getUser($this->email, $this->password);
    } 

    public function emptyInputs(){
        $result = false;
        if(empty($this->email) || empty($this->password)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    } 
} 