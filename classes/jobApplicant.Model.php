<?php
    class JobApplicantRepo extends DB_Handler
    {

        protected function getJobApplicantProfile($£jobApplicantID){
            $stmt = $this->connect()->prepare("SELECT * FROM jobapplicant WHERE jobApplicant_id = ?");
            $locationStmt = $this->connect()->prepare("SELECT location_name FROM location where ")
            if(!$stmt->execute(array($£jobApplicantID))){
                $stmt = null;
                header("location: ../index.php?error=stmtFailed");
                exit();
            }
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: index.php?error=profileNotfound");
                exit();
            }

            $jobApplicantData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $jobApplicantData;
        }
    }
