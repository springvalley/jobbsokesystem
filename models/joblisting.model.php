 <?php
    //Model 

    class Joblisting extends DB_Handler
    {

        //protected method to keep the data safe so that the other classes cannot access to these methods here or extend to this class.
        protected function setJobAds($employerId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $isActive, $industryId, $positionName)
        {
            try {
                //stmt = statement
                //variable "statement" is set to $this class and point to connect function that is in DB_Handler
                //with this connection we run the sql statement and query it inside the database by using the method "prepare"
                $stmt = $this->connect()->prepare("INSERT INTO joblisting(employer_id, job_title, description, jobType_id,
                location_id, is_Active, industry_id, position_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
                $stmt->bindParam(1, $employerId, PDO::PARAM_INT);
                $stmt->bindParam(2, $jobTitle, PDO::PARAM_STR);
                $stmt->bindParam(3, $jobDescription, PDO::PARAM_STR);
                $stmt->bindParam(4, $jobTypeId, PDO::PARAM_INT);
                $stmt->bindParam(5, $locationId, PDO::PARAM_INT);
                $stmt->bindParam(6, $isActive, PDO::PARAM_INT);
                $stmt->bindParam(7, $industryId, PDO::PARAM_INT);
                $stmt->bindParam(8, $positionName, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                    header("location:  ../postnewjob.php?error=stmtFailed");
                    exit();
                }
            } catch (PDOException $e) {
                error_log("Database error: " . $e->getMessage());
                return false;
            }
        }

        protected function setNewJobAds($jobListingId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $isActive, $industryId, $positionName)
        {
            $stmt = $this->connect()->prepare("UPDATE joblisting SET job_title = ?, description = ? , jobType_id = ?
            location_id = ?, published_time = ?, is_active = ?,  industry_id = ?, position_name = ?,
            WHERE joblisting_id = ?;");

            if (!$stmt->execute(array($jobListingId, $jobTitle, $jobDescription, $jobTypeId, $locationId, $isActive, $industryId, $positionName))) {
                $stmt = null; //delete the statement entirely
                //NEED TO FIX ERROR MESSAGE!!!!!!
                header("location:  ../postnewjob.php?error=stmtFailed"); //send user back to the page with the errormessage.
                exit();
            }
            $stmt = null;
        }

        protected function getJobAdsByEmployer($employerId)
        {
            $stmt = $this->connect()->prepare("SELECT * FROM joblisting WHERE employer_id = ?;");
            if (!$stmt->execute(array($employerId))) {
                $stmt = null; //delete the statement entirely
                header("location:  ../postnewjob.php?error=stmtFailed"); //send user back to the page with the errormessage.
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: index.php?error=jobbannonsenfinnesikke");
                exit();
            }
            $jobListingByEmployerData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $jobListingByEmployerData;
        }

        public function getAllJobAds()
        {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM joblisting;");

                if (!$stmt->execute()) {
                    // $stmt = null; //delete the statement entirely
                    $jobListingData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $jobListingData;
                }
                if (empty($jobListingData)) {
                    $errormessage = "Fant ingen jobbannonser.";
                }
            } catch (Exception $e) {
                $errormessage = "Prøv igjen.";
            }
        }

        public function getAllLocations()
        {
            $stmt = $this->connect()->prepare("SELECT * FROM location");

            if ($stmt->execute()) {
                $locationData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $locationData;
            } else {
                //Return an empty array if there's a problem with the query. 
                return array();
            }
        }

        public function getAllJobType()
        {
            $stmt = $this->connect()->prepare("SELECT * FROM jobtype");
            if ($stmt->execute()) {
                $jobTypeData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $jobTypeData;
            } else {
                return array();
            }
        }

        public function getAllIndustry()
        {
            $stmt = $this->connect()->prepare("SELECT * FROM industry");
            if ($stmt->execute()) {
                $industryData = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $industryData;
            } else {
                return array();
            }
        }
    }