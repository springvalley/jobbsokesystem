<?php 

class SignUpRepo extends DB_Handler{

    protected function setUser($name, $email, $phone, $password){
        $stmt = $this->connect()->prepare("INSERT INTO jobapplicant(name, email, phone_number, password) VALUES (?,?,?,?);");
        
        $hashedPWD = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $email, $phone, $hashedPWD))){
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    protected function setEmployer($name, $email, $phone, $password){
        $stmt = $this->connect()->prepare("INSERT INTO employer(company_name, email, phone_number, password) VALUES (?,?,?,?);");
        
        $hashedPWD = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $email, $phone, $hashedPWD))){
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkEmployer($email, $phone, $orgNumber){
        $stmt = $this->connect()->prepare("SELECT * FROM employer WHERE email = ? OR phone_number = ? OR orgNumber = ?;");
        if(!$stmt->execute(array($email, $phone, $orgNumber))){
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function checkUser($email, $phone){
        $stmt = $this->connect()->prepare("SELECT * FROM jobApplicant WHERE email = ? OR phone_number = ?;");
        if(!$stmt->execute(array($email, $phone))){
            $stmt = null;
            header("location: ../signup.php?error=stmtFailed");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }else{
            $resultCheck = true;
        }
        return $resultCheck;
    }
} 