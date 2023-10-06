<?php 

class LogInRepo extends DB_Handler{

    protected function getUser($email, $password){
        $stmt = $this->connect()->prepare("SELECT password FROM jobapplicant WHERE email = ?;");
        
        if(!$stmt->execute(array($email))){
            $stmt = null;
            header("location: ../login.php?error=stmtFailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login.php?error=userNotFound");
            exit();
        }

        $hashedPWD = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPWD[0]["password"]);

        if($checkPassword == false){
            $stmt = null;
            header("location: ../login.php?error=wrongPassword");
            exit();
        }elseif($checkPassword == true){
            $stmt = $this->connect()->prepare("SELECT jobApplicant_id, name FROM jobapplicant WHERE email = ? AND password = ?;");

            if(!$stmt->execute(array($email, $hashedPWD[0]["password"]))){
                $stmt = null;
                header("location: ../login.php?error=stmtFailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login.php?error=userNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["jobApplicant_id"] = $user[0]["jobApplicant_id"];
            $_SESSION["name"] = $user[0]["name"];
            header("location: ../index.php/name=". $_SESSION["name"]);

            $stmt = null;

        }

        $stmt = null;
    }

    protected function getEmployer($email, $password){
        $stmt = $this->connect()->prepare("SELECT password FROM employer WHERE email = ?;");
        
        if(!$stmt->execute(array($email))){
            $stmt = null;
            header("location: ../login.php?error=stmtFailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../login.php?error=userNotFound");
            exit();
        }

        $hashedPWD = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPWD[0]["password"]);

        if($checkPassword == false){
            $stmt = null;
            header("location: ../login.php?error=wrongPassword");
            exit();
        }elseif($checkPassword == true){
            $stmt = $this->connect()->prepare("SELECT employer_id, company_name FROM employer WHERE email = ? AND password = ?;");

            if(!$stmt->execute(array($email, $hashedPWD[0]["password"]))){
                $stmt = null;
                header("location: ../login.php?error=stmtFailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../login.php?error=userNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["employer_id"] = $user[0]["employer_id"];
            $_SESSION["name"] = $user[0]["company_name"];

            $stmt = null;
        }

        $stmt = null;
    }
} 